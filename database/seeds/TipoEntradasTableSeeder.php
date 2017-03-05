<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TipoEntradasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('tipo_entradas')->insert(array (
        	'nombre_entrada' => "VIP",
            // 'precio_entrada' => 120,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		));
        \DB::table('tipo_entradas')->insert(array (
        	'nombre_entrada' => "Regular",
            // 'precio_entrada' => 70,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		));
        \DB::table('tipo_entradas')->insert(array (
        	'nombre_entrada' => "Económica",
            // 'precio_entrada' => 30,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		));

    }//php artisan db:seed --class=TipoEntradasTableSeeder
}
