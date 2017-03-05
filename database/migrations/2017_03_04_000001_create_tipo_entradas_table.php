<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoEntradasTable extends Migration
{
    /**
     * Run the migrations.
     * @table tipo_entradas
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_entradas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nombre_entrada', 60);
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
       Schema::dropIfExists('tipo_entradas');
     }
}
