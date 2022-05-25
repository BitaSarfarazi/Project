<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forums', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title_fr', 100);
			$table->text('title_en', 100);
            $table->text('content_fr', 250);
			$table->text('content_en', 250);
            $table->integer('etudiant_id')->unsigned();
            $table->foreign('etudiant_id')->references('id')->on('users');
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
        Schema::dropIfExists('forums');
    }
}
