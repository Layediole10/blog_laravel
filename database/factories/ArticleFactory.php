<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            "title" => $this->faker->word(),
            "description" => $this->faker->paragraph(),
            "publish_date" => now(),
            "publish" => true,
            "photo" => $this->faker->imageUrl(),
            "author_id" => Arr::random([1,2,3,4]),
           
        ];
    }
}
