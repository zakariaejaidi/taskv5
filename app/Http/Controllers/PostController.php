<?php

namespace App\Http\Controllers;

use App\Jobs\PostJob;
use App\Mail\PostMail;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Website;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    function create(Request $request)
    {

        $validation = Validator::make($request->all(),[ 
            'title'=>'required',
            'description'=>'required',
            'website_id'=>'required|exists:websites,id',
            'url'=>'required'
        ]);

        if($validation->fails()){
            return response()->json(['message' => 'Wrong params!']);
        }
        
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->website_id  = $request->website_id;
        $post->url  = 'https://google.com/';
        $post->save();
        $this->notify($post);
        return response()->json(['message' => 'Post published!']);
    }


    function notify($post)
    {
        $users = Website::findOrFail($post->website_id)->users;
        PostJob::dispatch($users, $post);
    }

}
