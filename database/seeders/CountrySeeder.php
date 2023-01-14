<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $countries = array(
            ["México", "MX"], ["Argentina", "AR"], ["Perú", "PE"], ["Estados Unidos", "US"], ["Venezuela", "VE"],
            ["España", "ES"], ["Ecuador", "EC"], ["Colombia", "CO"], ["Chile","CL"], ["Republica Dominicana","DO"],
            ["Costa Rica", "CR"], ["Bolivia", "BO"], ["Cuba", "CU"]
        );

        foreach ($countries as $country) {
            DB::table('countries')->insert([
                'name' => $country[0],
                'unicode' => $country[1],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
