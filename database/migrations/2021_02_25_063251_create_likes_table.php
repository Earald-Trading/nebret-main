<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('upload_id');
            $table->timestamps();

            $table->primary(['user_id', 'upload_id']);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('upload_id')->references('id')->on('uploads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('likes', function (Blueprint $table) {
            $table->dropForeign(['upload_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('likes');
    }
}
