<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_websites', 'website_id','user_id')->withTimestamps()->as('users_websites');
    }


    public function posts(){
        return $this->hasMany(Post::class);
    }
}
