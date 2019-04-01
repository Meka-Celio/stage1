<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRubriquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rubriques', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->string('libelle');
            $table->integer('projet_id')->unsigned();
            $table->foreign('projet_id')->references('id')->on('projets');
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
        Schema::dropIfExists('rubriques');
    }
}
