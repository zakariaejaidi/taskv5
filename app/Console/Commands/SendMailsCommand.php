<?php

namespace App\Console\Commands;

use App\Http\Controllers\PostController;
use App\Jobs\PostJob;
use App\Mail\PostMail;
use App\Models\Website;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendMailsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending Mails';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //Get all websites
        $websites = Website::all();

        //Loop to each website
        foreach ($websites as $website) {
            //Get posts for each website
            $posts = $website->posts;
            //Get users websites
            $users = $website->users;

            //Check if users already been notify to post
            foreach ($users as $user) {
                foreach ($posts as $post) {
                    try{
                        PostJob::dispatch($users, $post);
                    }
                    catch(Exception $ex){
                        //Will be fired if user already have post alert in there inbox
                    }
                }
            }
        }
        return Command::SUCCESS;
    }
}
