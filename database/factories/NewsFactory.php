<?php

namespace Database\Factories;

use App\Models\NewsCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->unique()->sentence();

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'frontpage' => $this->faker->text('50'),
            'extract' => $this->faker->text(250),
            'body' => $this->faker->text('2000'),
            'status' => $this->faker->randomElement([1,2]),
            'category' => NewsCategory::all()->random()->id
        ];
    }
}
