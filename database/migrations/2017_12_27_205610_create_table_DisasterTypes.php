<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDisasterTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Disaster_Types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type')->unique();
        });

        DB::table('Disaster_Types')->insertGetId(
            ['type' => 'Fire']
        );
        DB::table('Disaster_Types')->insertGetId(
            ['type' => 'Robbery']
        );
        DB::table('Disaster_Types')->insertGetId(
            ['type' => 'Flood']
        );
        DB::table('Disaster_Types')->insertGetId(
            ['type' => 'Storm']
        );
        DB::table('Disaster_Types')->insertGetId(
            ['type' => 'Roadside Accident']
        );
        DB::table('Disaster_Types')->insertGetId(
            ['type' => 'Earthquake']
        );
        DB::table('Disaster_Types')->insertGetId(
            ['type' => 'Tsunami']
        );
        DB::table('Disaster_Types')->insertGetId(
            ['type' => 'Landslide']
        );
        DB::table('Disaster_Types')->insertGetId(
            ['type' => 'Other Accidents']
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Disaster_Types');
    }
}
