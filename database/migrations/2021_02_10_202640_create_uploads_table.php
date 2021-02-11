<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uploads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(true)->default(null);
            $table->unsignedBigInteger('admin_id');
            $table->string('images');
            $table->integer('price')->index();
            $table->float('latitude', 10, 6);
            $table->float('longitude', 10, 6);
            $table->string('subcity')->index();
            $table->string('wereda');
            $table->string('houseno');
            $table->boolean('featured');
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
        Schema::dropIfExists('uploads');
    }
}
