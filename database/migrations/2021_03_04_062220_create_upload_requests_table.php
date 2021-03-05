<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upload_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('house_type', 25);
            $table->string('phone');
            $table->enum('purchase_type', ['sell', 'rent']);
            $table->boolean('seen');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('upload_requests');
    }
}
