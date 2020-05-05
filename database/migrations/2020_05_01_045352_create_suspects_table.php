<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuspectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suspects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fist_name');
            $table->string('last_name');
            $table->char('nic', 10);
            $table->char('address', 100);
            $table->integer('case_id');
            // $table->integer('case_id')->unsigned();
            // $table->foreign('case_id')->references('id')->on('criminal_cases');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suspects');
    }
}
