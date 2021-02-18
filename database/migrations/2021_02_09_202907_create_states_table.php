<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('name', 25)->unique();
        });

        DB::table('states')->insert([
            ['name' => 'Addis Ketema'],
            ['name' => 'Akaky Kaliti'],
            ['name' => 'Arada'],
            ['name' => 'Bole'],
            ['name' => 'Gullele'],
            ['name' => 'Kirkos'],
            ['name' => 'Kolfe Keranio'],
            ['name' => 'Lemi Kura'],
            ['name' => 'Lideta'],
            ['name' => 'Nifas Silk-Lafto'],
            ['name' => 'Yeka']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('states');
    }
}
