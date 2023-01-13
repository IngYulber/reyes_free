<?php

namespace Database\Factories;

use App\Models\ArtistType;
use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artist>
 */
class ArtistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {   
        $aka = fake()->name();

        return [
            'name' => fake()->name(),
            'last_name' => fake()->name(),
            'aka' => $aka,
            'slug' => Str::slug($aka),
            'date_of_birth' => now(),
            'description' => fake()->text(400),
            'photo' => fake()->word(50),
            'country' => Country::all()->random()->id,
            'type' => ArtistType::all()->random()->id
        ];
    }
}
