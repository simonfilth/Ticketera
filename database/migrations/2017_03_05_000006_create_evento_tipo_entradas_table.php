<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventoTipoEntradasTable extends Migration
{
    /**
     * Run the migrations.
     * @table evento_tipo_entradas
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evento_tipo_entradas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('evento_id');
            $table->unsignedInteger('tipo_entradas_id');
            $table->integer('precio_entrada');
            $table->string('descripcion_entrada', 60);
            $table->timestamps();


            $table->foreign('evento_id', 'eventotipoentradas_eventoid_foreign_idx')
                ->references('id')->on('eventos')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('tipo_entradas_id', 'eventotipoentradas_tipoentradaid_foreign_idx')
                ->references('id')->on('tipo_entradas')
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
       Schema::dropIfExists('evento_tipo_entradas');
     }
}
