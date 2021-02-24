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
            $table->string('state', 25)->primary();
        });

        DB::table('states')->insert([
            ['state' => 'Addis Ketema'],
            ['state' => 'Akaky Kaliti'],
            ['state' => 'Arada'],
            ['state' => 'Bole'],
            ['state' => 'Gullele'],
            ['state' => 'Kirkos'],
            ['state' => 'Kolfe Keranio'],
            ['state' => 'Lemi Kura'],
            ['state' => 'Lideta'],
            ['state' => 'Nifas Silk-Lafto'],
            ['state' => 'Yeka']
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
