<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswerCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer_comments', function (Blueprint $table) {
            $table->id();
            $table->string('content', 255);
            $table->unsignedBigInteger('answer_id');
            $table->unsignedBigInteger('profile_id');
            $table->timestamp('created_at');
        });

        Schema::table('answer_comments', function (Blueprint $table) {
            $table->foreign('answer_id')->references('id')->on('answers');
            $table->foreign('profile_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answer_comments');
    }
}
