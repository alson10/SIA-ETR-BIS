<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newsfeeds_comment', function (Blueprint $table) {
            $table->id();
            $table->uuid('user_id');
            $table->uuid('newsfeeds_id');
            $table->longText('comments');
            $table->foreign('newsfeeds_id')->references('id')->on('newsfeeds')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('newsfeeds_comment');
    }
};
