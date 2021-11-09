<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Feedback extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_comment', function (Blueprint $table) {
            $table->id();
            $table->string('email_users');
            $table->string('comment');
            $table->timestamp('create_at');
            $table->integer('product_id');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_comment');
    }
}
