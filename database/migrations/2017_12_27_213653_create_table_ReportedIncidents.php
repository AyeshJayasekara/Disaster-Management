<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableReportedIncidents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Reported_Incidents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('RepotedBy');
            $table->string('ReportedEmail');
            $table->string('Lon');
            $table->string('Lat');
            $table->integer('Type');
            $table->date('Date');
            $table->integer('Level');
            $table->time('Time');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Reported_Incidents');
    }
}
