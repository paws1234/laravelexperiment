<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    public function up()
{
    Schema::create('posts', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id'); // Foreign key to link posts to users
        $table->text('content')->nullable(); // Text content of the post
        $table->string('image')->nullable(); // Add the 'image' column
        $table->string('video')->nullable(); // Path to the uploaded image

        $table->timestamps();
        
        // Define foreign key constraint
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}


    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
