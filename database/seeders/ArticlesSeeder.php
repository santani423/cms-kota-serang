<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Articles;
use App\Models\Categories;
use App\Models\Tags;
use App\Models\ArticleCategories;
use App\Models\ArticleTags;
use Illuminate\Support\Str;

class ArticlesSeeder extends Seeder
{
    public function run(): void
    {
        // ======================
        // Categories
        // ======================
        Categories::insert([
            ['code' => 'CAT01', 'name' => 'Layanan Publik', 'slug' => 'layanan-publik' ,'style' => 'bg-accent-50 text-accent-dark'],
            ['code' => 'CAT02', 'name' => 'Ekonomi', 'slug' => 'ekonomi', 'style' => 'bg-amber-50 text-amber-700'],
            ['code' => 'CAT03', 'name' => 'Pendidikan', 'slug' => 'pendidikan', 'style' => 'bg-violet-50 text-violet-700'],
            ['code' => 'CAT04', 'name' => 'Lingkungan', 'slug' => 'lingkungan', 'style' => 'bg-green-50 text-green-700'],
            ['code' => 'CAT05', 'name' => 'Infrastruktur', 'slug' => 'infrastruktur', 'style' => 'bg-orange-50 text-orange-700'],
            ['code' => 'CAT06', 'name' => 'Sosial', 'slug' => 'sosial', 'style' => 'bg-rose-50 text-rose-700'],
        ]);

        $categoryIds = Categories::pluck('id')->toArray();

        // ======================
        // Tags (ditambah banyak)
        // ======================
        Tags::insert([
            ['name' => 'Laravel', 'slug' => 'laravel'],
            ['name' => 'PHP', 'slug' => 'php'],
            ['name' => 'Tutorial', 'slug' => 'tutorial'],
            ['name' => 'Pemerintah', 'slug' => 'pemerintah'],
            ['name' => 'Digital', 'slug' => 'digital'],
            ['name' => 'Infrastruktur', 'slug' => 'infrastruktur'],
            ['name' => 'Ekonomi', 'slug' => 'ekonomi'],
            ['name' => 'Sosial', 'slug' => 'sosial'],
            ['name' => 'Kesehatan', 'slug' => 'kesehatan'],
            ['name' => 'Pendidikan', 'slug' => 'pendidikan'],
        ]);

        $tagIds = Tags::pluck('id')->toArray();

        // ======================
        // Generate 100 Articles
        // ======================
        for ($i = 1; $i <= 100; $i++) {

            $title = "Artikel Dummy ke-$i Kota Serang";
            
            $article = Articles::create([
                'author_id' => 1,
                'title' => $title,
                'slug' => Str::slug($title),
                'alt' => "Gambar artikel ke-$i",
                'content' => "Ini adalah konten artikel ke-$i dengan topik dinamis untuk testing.",
                'featured_image' => "https://picsum.photos/seed/$i/800/600",
                'status' => 'published',
                'published_at' => now(),
                'updated_at' => now(),
                'view_count' => rand(0, 1000),
            ]);

            // ======================
            // Random Category (1 saja)
            // ======================
            ArticleCategories::create([
                'article_id' => $article->id,
                'category_id' => $categoryIds[array_rand($categoryIds)],
            ]);

            // ======================
            // Random Tags (2 - 4 tag)
            // ======================
            $randomTags = collect($tagIds)->random(rand(2, 4));

            foreach ($randomTags as $tagId) {
                ArticleTags::create([
                    'article_id' => $article->id,
                    'tag_id' => $tagId,
                ]);
            }
        }
    }
}