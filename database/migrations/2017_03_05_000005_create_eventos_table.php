<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     * @table eventos
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nombre_evento', 45);
            $table->unsignedInteger('usuario_id');
            $table->date('fecha');
            $table->time('hora');
            $table->unsignedInteger('cupo_id');
            $table->integer('cantidad')->nullable();
            $table->timestamps();


            $table->foreign('usuario_id', 'eventos_usuariosid_foreign_idx')
                ->references('id')->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('cupo_id', 'eventos_cupoid_foreign_idx')
                ->references('id')->on('cupos')
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
       Schema::dropIfExists('eventos');
     }
}
