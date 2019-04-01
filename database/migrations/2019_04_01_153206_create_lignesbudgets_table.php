<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLignesbudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lignesbudgets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelle');
            $table->float('montant');
            $table->integer('rubrique_id')->unsigned();
            $table->foreign('rubrique_id')->references('id')->on('rubriques');
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
        Schema::dropIfExists('lignesbudgets');
    }
}
