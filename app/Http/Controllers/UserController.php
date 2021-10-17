<?php

namespace App\Http\Controllers;

use App\Jobs\PostJob;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Website;
use Exception;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    function subscribe(Request $request){
        $validation = Validator::make($request->all(),[ 
            'user_id'=>'required|exists:users,id',
            'website_id'=>'required|exists:websites,id'
        ]);

        if($validation->fails()){
            return response()->json(['message' => 'Wrong params!']);
        }

        $user = User::findOrFail($request->user_id);
        $user->websites()->attach($request->website_id);
        return response()->json(['message'=>'Subscribed!']);
    }
}
