<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepertoiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repertoires', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title', 100);
            $table->dateTime('date');
            $table->string('langueTitle');
            $table->string('langueSystem');
            $table->integer('etudiant_id')->unsigned();
            $table->foreign('etudiant_id')->references('id')->on('etudiants');
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
        Schema::dropIfExists('repertoires');
    }
}
