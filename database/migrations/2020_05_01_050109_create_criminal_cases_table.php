<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriminalCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criminal_cases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('case_name');
            $table->string('case_category');
            $table->string('case_details');
            $table->string('case_place');
            $table->string('status');
            $table->integer('officer_id')->unsigned()->index();
            $table->foreign('officer_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('criminal_cases');
    }
}
