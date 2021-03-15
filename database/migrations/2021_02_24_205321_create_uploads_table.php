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
            // ids
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('admin_id');

            // images
            $table->string('images', 64);
            $table->string('youtube_id', 20)->nullable(true)->default(null);

            // description
            $table->text('description');
            $table->text('description_am');
            $table->text('comparative_analysis');
            $table->text('comparative_analysis_am');
            $table->string('house_type', 25);
            $table->string('listing_type', 25);
            $table->unsignedTinyInteger('beds');
            $table->unsignedTinyInteger('baths');
            $table->unsignedSmallInteger('footprint');
            $table->unsignedSmallInteger('lot');
            $table->unsignedSmallInteger('year');
            $table->unsignedBigInteger('price')->index();

            // location
            $table->float('latitude', 10, 6);
            $table->float('longitude', 10, 6);
            $table->string('city', 40)->default('Addis Ababa');
            $table->string('subcity', 25);
            $table->unsignedTinyInteger('wereda');
            $table->string('houseno', 10);

            // misc
            $table->boolean('featured')->default(false);
            $table->boolean('openhouse')->default(false);
            $table->boolean('newconstruction')->default(false);
            $table->boolean('reduced_price')->default(false);
            $table->boolean('job_finished')->default(false);

            $table->timestamps();

            $table->foreign('subcity')->references('state')->on('states');
            $table->foreign('listing_type')->references('type')->on('listing_types');
            $table->foreign('house_type')->references('type')->on('house_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('uploads', function (Blueprint $table) {
            $table->dropForeign(['subcity']);
            $table->dropForeign(['listing_type']);
            $table->dropForeign(['house_type']);
        });
        Schema::dropIfExists('uploads');
    }
}
