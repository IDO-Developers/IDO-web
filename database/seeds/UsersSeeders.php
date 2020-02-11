<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=1; $i <= 1; $i++) {
            \DB::table('users')->insert(array(
                'id' => "10",
                  'RNE_Alumno'  => '0801199518241',
                'RNE_Empleado'  => '007041995432',
                'Id_Rol'  => '1',
                'password' => bcrypt('1'),


            ));
        }
    }
}
