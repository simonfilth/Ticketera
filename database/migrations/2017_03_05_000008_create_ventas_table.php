<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     * @table ventas
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('codigo');
            $table->unsignedInteger('usuario_id');
            $table->tinyInteger('status');
            $table->unsignedInteger('evento_id');
            $table->string('email');
            $table->timestamps();


            $table->foreign('usuario_id', 'ventas_usuarioid_foreign0_idx')
                ->references('id')->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('evento_id', 'ventas_eventotipoentradaid_foreign_idx')
                ->references('id')->on('evento_tipo_entradas')
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
       Schema::dropIfExists('ventas');
     }
}
