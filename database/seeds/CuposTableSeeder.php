<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CuposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		\DB::table('cupos')->insert(array (
        	'nombre_cupo' => "Limitado",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		));
		\DB::table('cupos')->insert(array (
        	'nombre_cupo' => "Ilimitado",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        	'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		));

    }
}
//php artisan db:seed --class=CuposTableSeeder
