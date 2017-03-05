<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValidarTable extends Migration
{
    /**
     * Run the migrations.
     * @table validar
     *
     * @return void
     */
    public function up()
    {
        Schema::create('validar', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('usuario_id');
            $table->unsignedInteger('evento_id');
            $table->timestamps();


            $table->foreign('usuario_id', 'validar_usuarioid_foreign_idx')
                ->references('id')->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('evento_id', 'validar_eventoid_foreign_idx')
                ->references('id')->on('eventos')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists('validar');
     }
}
