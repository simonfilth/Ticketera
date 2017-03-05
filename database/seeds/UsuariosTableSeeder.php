<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert(array (
	        'name' => "Organizador1",
	        'email' => "organizador@organizador.com",
	        'password' => \Hash::make('123456'),
	        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
	        'tipo_usuario' => 2,
		));

        \DB::table('users')->insert(array (
            'name' => "Vendedor1",
            'email' => "vendedor@vendedor.com",
            'password' => \Hash::make('123456'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'tipo_usuario' => 1,
        ));
        \DB::table('users')->insert(array (
            'name' => "Portero1",
            'email' => "portero@portero.com",
            'password' => \Hash::make('123456'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'tipo_usuario' => 3,
        ));
    }//php artisan db:seed --class=UsuariosTableSeeder
}//php artisan make:seeder UsuariosTableSeeder
