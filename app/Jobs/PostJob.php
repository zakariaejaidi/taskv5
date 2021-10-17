<?php

namespace App\Jobs;

use App\Mail\PostMail;
use App\Models\Website;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class PostJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public $post;
    public $users;

    public function __construct($users, $post)
    {
        $this->users = $users;
        $this->post = $post;
    }

    /**
     * Execute the job.
     *
     * @return void
     */

    


    public function handle()
    {
        foreach ($this->users as $user) {
            $mailer = new PostMail();
            $mailer->subject = 'Post Alert';
            $mailer->data = [
                'name'=>$user->name,
                'title' => $this->post->title,
                'url'=>$this->post->url
            ];
            $user->posts()->attach($this->post->id);
            Mail::to($user->email)->send($mailer);
            //Attach user to post so we don't have duplicate mail notification
            
        }
    }
}
