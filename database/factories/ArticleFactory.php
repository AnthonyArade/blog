<?php
namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title'   => fake()->word(), // simple category name
            'content' => fake()->paragraphs(10, true),
            'user_id' => User::factory(),
        ];
    }
}
