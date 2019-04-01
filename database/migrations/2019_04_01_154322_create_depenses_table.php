<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depenses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->float('cout');
            $table->integer('activite_id')->unsigned();
            $table->foreign('activite_id')->references('id')->on('activites');
            $table->integer('lignebudget_id')->unsigned();
            $table->foreign('lignebudget_id')->references('id')->on('lignesbudgets');
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
        Schema::dropIfExists('depenses');
    }
}
