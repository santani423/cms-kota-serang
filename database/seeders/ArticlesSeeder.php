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
            'title' => 'Sistem Antrian Digital Puskesmas Kini Terintegrasi Portal SerangKota',
            'slug' => 'sistem-antrian-digital-puskesmas-kini-terintegrasi-portal-serangkota',
            'alt' => 'Gambar sistem antrian digital Puskesmas',
            'content' => 'Ini adalah konten lengkap artikel Laravel.',
            'featured_image' => "https://img.rocket.new/generatedImages/rocket_gen_img_11dd292e2-1764667687408.png",
            'status' => 'published',
            'published_at' => now(),
            'updated_at' => now(),
            'view_count' => 10,
        ]);
        $article2 = Articles::create([
            'author_id' => 1,
            'title' => 'Pasar UMKM Digital Serang Catat Transaksi Rp 4,2 Miliar di Kuartal I 2026',
            'slug' => 'pasar-umkm-digital-serang-catat-transaksi-rp-4-2-miliar-di-kuartal-i-2026',
            'alt' => 'Gambar pasar UMKM digital Serang',
            'content' => 'Ini adalah konten lengkap artikel PHP.',
            'featured_image' => "https://img.rocket.new/generatedImages/rocket_gen_img_1d5b361fd-1774649961794.png",
            'status' => 'published',
            'published_at' => now(),
            'updated_at' => now(),
            'view_count' => 5,
        ]);
        $article3 = Articles::create([
            'author_id' => 1,
            'title' => 'Serang Raih Penghargaan Kota Literasi Digital Terbaik Tingkat Provinsi Banten 2026',
            'slug' => 'serang-raih-penghargaan-kota-literasi-digital-terbaik-tingkat-provinsi-banten-2026',
            'alt' => 'Gambar Serang Raih Penghargaan Kota Literasi Digital Terbaik',
            'content' => 'Ini adalah konten lengkap artikel PHP.',
            'featured_image' => "https://img.rocket.new/generatedImages/rocket_gen_img_1f995b44c-1774649960096.png",
            'status' => 'published',
            'published_at' => now(),
            'updated_at' => now(),
            'view_count' => 5,
        ]);
        $article4 = Articles::create([
            'author_id' => 1,
            'title' => 'Program Serang Hijau: 10.000 Pohon Ditanam di Seluruh Kecamatan',
            'slug' => 'program-serang-hijau-10000-pohon-ditanam-di-seluruh-kecamatan',
            'alt' => 'Gambar Program Serang Hijau',
            'content' => 'Ini adalah konten lengkap artikel PHP.',
            'featured_image' => "https://img.rocket.new/generatedImages/rocket_gen_img_111a6e9b2-1774649959594.png",
            'status' => 'published',
            'published_at' => now(),
            'updated_at' => now(),
            'view_count' => 5,
        ]);

        // Artikel tambahan
        $article5 = Articles::create([
            'author_id' => 1,
            'title' => 'Pembangunan Jalan Lingkar Timur Serang Capai Progress 68%',
            'slug' => 'pembangunan-jalan-lingkar-timur-serang-capai-progress-68',
            'alt' => 'Proses pembangunan jalan raya baru dengan alat berat dan pekerja konstruksi di Kota Serang',
            'content' => 'Proyek strategis yang akan memperlancar konektivitas antar kecamatan ini ditargetkan selesai akhir 2026.',
            'featured_image' => 'https://img.rocket.new/generatedImages/rocket_gen_img_1227842d5-1770821562771.png',
            'status' => 'published',
            'published_at' => now(),
            'updated_at' => now(),
            'view_count' => 0,
        ]);
        $article6 = Articles::create([
            'author_id' => 1,
            'title' => 'Bantuan Sosial Langsung Tunai Tahap II Disalurkan ke 45.000 KPM',
            'slug' => 'bantuan-sosial-langsung-tunai-tahap-ii-disalurkan-ke-45000-kpm',
            'alt' => 'Petugas sosial membantu warga dalam proses penerimaan bantuan sosial di kantor kelurahan',
            'content' => 'Pemerintah Kota Serang menyalurkan BST tahap kedua kepada keluarga penerima manfaat melalui rekening bank.',
            'featured_image' => 'https://img.rocket.new/generatedImages/rocket_gen_img_131be2a6d-1774649961771.png',
            'status' => 'published',
            'published_at' => now(),
            'updated_at' => now(),
            'view_count' => 0,
        ]);
        $article7 = Articles::create([
            'author_id' => 1,
            'title' => 'Serang Investment Forum 2026 Tarik Minat 32 Investor Nasional',
            'slug' => 'serang-investment-forum-2026-tarik-minat-32-investor-nasional',
            'alt' => 'Para eksekutif dan investor duduk dalam forum diskusi bisnis di ruang konferensi modern',
            'content' => 'Forum investasi tahunan kota Serang berhasil menarik komitmen investasi senilai Rp 1,8 triliun di berbagai sektor.',
            'featured_image' => 'https://img.rocket.new/generatedImages/rocket_gen_img_130a039a2-1765172518149.png',
            'status' => 'published',
            'published_at' => now(),
            'updated_at' => now(),
            'view_count' => 0,
        ]);
        $article8 = Articles::create([
            'author_id' => 1,
            'title' => 'RSUD Kota Serang Tambah 3 Gedung Baru dengan Kapasitas 200 Tempat Tidur',
            'slug' => 'rsud-kota-serang-tambah-3-gedung-baru-dengan-kapasitas-200-tempat-tidur',
            'alt' => 'Gedung rumah sakit modern yang baru selesai dibangun dengan arsitektur kontemporer',
            'content' => 'Perluasan fasilitas rumah sakit daerah ini merupakan bagian dari investasi kesehatan jangka panjang pemerintah kota.',
            'featured_image' => 'https://img.rocket.new/generatedImages/rocket_gen_img_1008f3ef7-1767606960262.png',
            'status' => 'published',
            'published_at' => now(),
            'updated_at' => now(),
            'view_count' => 0,
        ]);
        $article9 = Articles::create([
            'author_id' => 1,
            'title' => 'E-Government Award 2026: Serang Masuk 10 Kota Terbaik Transformasi Digital',
            'slug' => 'e-government-award-2026-serang-masuk-10-kota-terbaik-transformasi-digital',
            'alt' => 'Tim pemerintah kota menerima penghargaan e-government di acara penghargaan nasional',
            'content' => 'Penghargaan nasional ini mengakui upaya Pemkot Serang dalam digitalisasi layanan publik selama dua tahun terakhir.',
            'featured_image' => 'https://img.rocket.new/generatedImages/rocket_gen_img_13ed0a2d2-1774649961452.png',
            'status' => 'published',
            'published_at' => now(),
            'updated_at' => now(),
            'view_count' => 0,
        ]);

        // Seeder untuk ArticleCategories
        ArticleCategories::insert([
            ['article_id' => $article1->id, 'category_id' => 1],
            ['article_id' => $article2->id, 'category_id' => 2],
            ['article_id' => $article3->id, 'category_id' => 3],
            ['article_id' => $article4->id, 'category_id' => 4],
            ['article_id' => $article5->id, 'category_id' => 5], // Infrastruktur
            ['article_id' => $article6->id, 'category_id' => 6], // Sosial
            ['article_id' => $article7->id, 'category_id' => 2], // Ekonomi
            ['article_id' => $article8->id, 'category_id' => 5], // Infrastruktur
            ['article_id' => $article9->id, 'category_id' => 1], // Layanan Publik
        ]);

        // Seeder untuk ArticleTags
        ArticleTags::insert([
            ['article_id' => $article1->id, 'tag_id' => 1],
            ['article_id' => $article1->id, 'tag_id' => 3],
            ['article_id' => $article2->id, 'tag_id' => 2],
            ['article_id' => $article3->id, 'tag_id' => 3],
            // ['article_id' => $article4->id, 'tag_id' => 4], // Tag id 4 tidak ada di seeder tags, jadi dihapus
            // Tambahan tags untuk artikel baru
            ['article_id' => $article5->id, 'tag_id' => 1], // Infrastruktur
            ['article_id' => $article5->id, 'tag_id' => 3], // Pembangunan
            ['article_id' => $article6->id, 'tag_id' => 2], // Sosial
            ['article_id' => $article6->id, 'tag_id' => 3], // Bantuan
            ['article_id' => $article7->id, 'tag_id' => 2], // Investasi
            ['article_id' => $article7->id, 'tag_id' => 3], // Ekonomi
            ['article_id' => $article8->id, 'tag_id' => 1], // Kesehatan
            ['article_id' => $article8->id, 'tag_id' => 3], // Infrastruktur
            ['article_id' => $article9->id, 'tag_id' => 1], // Penghargaan
            ['article_id' => $article9->id, 'tag_id' => 3], // Digital
        ]);
    }
}
