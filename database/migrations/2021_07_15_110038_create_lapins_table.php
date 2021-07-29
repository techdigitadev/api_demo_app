<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLapinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lapins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->boolean('sexe')->default(true);
            $table->decimal('poids',6,2);
            $table->string('couleur_pelage');
            $table->string('race');
            $table->string('type');  //adulte ou lapereau
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
        Schema::dropIfExists('lapins');
    }
}
