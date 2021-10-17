<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersWebsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_websites', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('website_id')->constrained('websites');
            $table->timestamps();

            $table->primary(['user_id','website_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_websites');
    }
}
