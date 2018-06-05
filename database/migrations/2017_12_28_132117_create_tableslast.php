<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableslast extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        DB::statement('CREATE TABLE Approved_Incidents (id int,
  ReportedBy VARCHAR(191),
  ReportedEmail VARCHAR(191),
  Lon VARCHAR(50),
  Lat VARCHAR(50),
  Date date,
  Time TIME,
  Level int,
  Type VARCHAR(30)
)');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        DB::statement('drop table Approved_Incidents');

    }
}
