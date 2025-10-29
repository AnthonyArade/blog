<?php
namespace Database\Factories;

use App\Models\User;
use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'content' => fake()->paragraphs(2, true),
            'user_id' => User::factory(),
            'article_id' => Article::factory(),
        ];
    }
}
