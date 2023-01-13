<?php

namespace Database\Seeders;

use App\Models\ArtistType;
use Illuminate\Database\Seeder;

class ArtistTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = array('Freestyler', 'Host', 'DJ', 'Jurado');

        foreach ($types as $type) {
            ArtistType::insert([
                'name' => $type,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
