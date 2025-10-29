<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ArticleSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $articles = Article::all();

        // S'assure de la présence des categories et les récupère
        if ($users->isEmpty()) {
            $this->call(UserSeeder::class);
            $users = User::all();
        }

        if ($articles->isEmpty()) {
            $this->call(ArticleSeeder::class);
            $articles = User::all();
        }

        // Création de 50 produits en utilisant Product et categories
        Comment::factory(100)->make()->each(function ($comment) use ($users,$articles) {
            // Assigne une random category au produit
            $comment->user_id = $users->random()->id;
            $comment->article_id = $articles->random()->id;
            $comment->save();
        });
    }
}
