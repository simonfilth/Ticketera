<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TipoUsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('tipo_usuarios')->insert(array (
        	'nombre' => "Vendedor",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		));
		\DB::table('tipo_usuarios')->insert(array (
            'nombre' => "Organizador",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ));
        \DB::table('tipo_usuarios')->insert(array (
            'nombre' => "Portero",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ));

    }//php artisan db:seed --class=TipoUsuariosTableSeeder
}
