<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Articles;
use App\Models\Categories;
use App\Models\Tags;
use App\Models\ArticleCategories;
use App\Models\ArticleTags;

class ArticlesSeeder extends Seeder
{
    public function run(): void
    {
        // Seeder untuk Categories
        Categories::insert([
            ['name' => 'Layanan Publik', 'slug' => 'layanan-publik' ,'style' => 'bg-accent-50 text-accent-dark dark:bg-accent/15 dark:text-accent-light'],
            ['name' => 'Ekonomi', 'slug' => 'ekonomi', 'style' => 'bg-amber-50 text-amber-700 dark:bg-amber-900/20 dark:text-amber-300'],
            ['name' => 'Pendidikan', 'slug' => 'pendidikan', 'style' => 'bg-violet-50 text-violet-700 dark:bg-violet-900/20 dark:text-violet-300'],
            ['name' => 'Lingkungan', 'slug' => 'lingkungan', 'style' => 'bg-green-50 text-green-700 dark:bg-green-900/20 dark:text-green-300'],
            ['name' => 'Infrastruktur', 'slug' => 'infrastruktur', 'style' => 'bg-orange-50 text-orange-700 dark:bg-orange-900/20 dark:text-orange-300'],
            ['name' => 'Sosial', 'slug' => 'sosial', 'style' => 'bg-rose-50 text-rose-700 dark:bg-rose-900/20 dark:text-rose-300'],
        ]);

        // Seeder untuk Tags
        Tags::insert([
            ['name' => 'Laravel', 'slug' => 'laravel'],
            ['name' => 'PHP', 'slug' => 'php'],
            ['name' => 'Tutorial', 'slug' => 'tutorial'],
        ]);

        // Seeder untuk Articles
        $article1 = Articles::create([
            'author_id' => 1,
            'title' => 'Belajar Laravel Dasar',
            'slug' => 'belajar-laravel-dasar',
            'excerpt' => 'Panduan belajar Laravel untuk pemula.',
            'content' => 'Ini adalah konten lengkap artikel Laravel.',
            'featured_image' => null,
            'status' => 'published',
            'published_at' => now(),
            'updated_at' => now(),
            'view_count' => 10,
        ]);
        $article2 = Articles::create([
            'author_id' => 1,
            'title' => 'Tips Belajar PHP',
            'slug' => 'tips-belajar-php',
            'excerpt' => 'Tips dan trik belajar PHP.',
            'content' => 'Ini adalah konten lengkap artikel PHP.',
            'featured_image' => null,
            'status' => 'published',
            'published_at' => now(),
            'updated_at' => now(),
            'view_count' => 5,
        ]);

        // Seeder untuk ArticleCategories
        ArticleCategories::insert([
            ['article_id' => $article1->id, 'category_id' => 1],
            ['article_id' => $article2->id, 'category_id' => 2],
        ]);

        // Seeder untuk ArticleTags
        ArticleTags::insert([
            ['article_id' => $article1->id, 'tag_id' => 1],
            ['article_id' => $article1->id, 'tag_id' => 3],
            ['article_id' => $article2->id, 'tag_id' => 2],
        ]);
    }
}
