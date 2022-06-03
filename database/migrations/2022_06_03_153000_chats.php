<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Chats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->string('chattext', 255);
            $table->BigInteger('forum_id')->unsigned();
            $table->foreign("forum_id")->references("id")->on('forums')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('userid_chat');
            $table->foreign('userid_chat')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chats');
    }
}
