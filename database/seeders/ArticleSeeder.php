<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Article;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        // S'assure de la présence des categories et les récupère
        if ($users->isEmpty()) {
            $this->call(UserSeeder::class);
            $users = User::all();
        }

        // Création de 50 produits en utilisant Product et categories
        Article::factory(50)->make()->each(function ($article) use ($users) {
            // Assigne une random category au produit
            $article->user_id = $users->random()->id;
            $article->save();
        });
    }
}
