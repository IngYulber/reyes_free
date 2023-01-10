<?php

namespace Database\Factories;

use App\Models\News;
use App\Models\NewsTag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NewsTagsDetail>
 */
class NewsTagsDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'new' => News::all()->random()->id,
            'tag' => NewsTag::all()->random()->id
        ];
    }
}
