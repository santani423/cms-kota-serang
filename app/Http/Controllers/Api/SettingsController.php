<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function cormenu(Request $request)
    {
        $data = [
            [
                "code" => "beranda",
                "title" => "Beranda",
                "href" => "/",
            ],
            [
                "code" => "layanan-publik",
                "title" => "Layanan Publik",
                "href" => "/public-services",
            ],
            [
                "code" => "profile",
                "title" => "Profil",
                "href" => "/informasi-publik",
                "subMenu" => [
                    [
                        "title" => "Walikota Serang",
                        "href" => "/leadership/walikota-serang",
                        "desc" => "",
                    ],
                    [
                        "title" => "Wakil Walikota Serang",
                        "href" => "/leadership/wakil-walikota-serang",
                        "desc" => "",
                    ],
                    [
                        "title" => "Visi Misi",
                        "href" => "/visi-misi",
                        "desc" => "",
                    ],
                    [
                        "title" => "Sejarah Kota Serang",
                        "href" => "/sejarah-kota-serang",
                        "desc" => "",
                    ],
                    [
                        "title" => "Arti Lambang Kota Serang",
                        "href" => "/arti-lambang-kota-serang",
                        "desc" => "",
                    ],
                    [
                        "title" => "Penghargaan",
                        "href" => "/penghargaan",
                        "desc" => "",
                    ],
                    [
                        "title" => "Latar Geografi",
                        "href" => "/latar-geografi",
                        "desc" => "",
                    ],
                    [
                        "title" => "Pejabat Kota Serang",
                        "href" => "/leadership",
                        "desc" => "",
                    ],
                ],
            ],
            [
                "code" => "berita",
                "title" => "Berita",
                "href" => "/news",
            ],
            [
                "code" => "wisata",
                "title" => "Wisata",
                "href" => "/tourism",
            ],
        ];

        return response()->json([
            "status" => "success",
            "data" => $data,
        ]);
    }

    public function imageHomepage()
    {

        $baseUrl = env('APP_URL');
        $data = [
            [
                'code' => 'img1',
                'path' => $baseUrl . '/assets/hompage/1.jpg',
            ],
            [
                'code' => 'img2',
                'path' => $baseUrl . '/assets/hompage/2.jpg',
            ],
            [
                'code' => 'img3',
                'path' => $baseUrl . '/assets/hompage/3.jpg',
            ],
            [
                'code' => 'img4',
                'path' => $baseUrl . '/assets/hompage/4.jpg',
            ],
        ];

        return response()->json([
            "status" => "success",
            "data" => $data,
        ]);
    }

    public function getHomepage(Request $request)
    {

        $data = [
            'title' => 'Selamat Datang di Homepage',
            'description' => 'Ini adalah API homepage.',
            'date' => now()->toDateString(),
            'StatistikHeroSection' => [
                [
                    'code' => 'stat1',
                    'icon' => 'Users',
                    'label' => 'Penduduk',
                    'value' => '750K+',
                    'desc' => 'Jumlah penduduk di Kota Serang',
                ],
                [
                    'code' => 'stat2',
                    'icon' => 'Building2',
                    'label' => 'Kecamatan',
                    'value' => '6',
                    'desc' => 'Kecamatan di Kota Serang',
                ],
                [
                    'code' => 'stat3',
                    'icon' => 'Clock',
                    'label' => 'Layanan Publik',
                    'value' => '30+',
                    'desc' => 'Jumlah layanan publik di Kota Serang',
                ],
            ],
            'QuickServicesSection' => [
                [
                    'icon' => 'FileText',
                    'title' => "Perizinan Online",
                    'desc' => "Ajukan izin usaha, IMB, dan dokumen lainnya secara digital tanpa antri.",
                    'color' => "text-blue-600 dark:text-blue-400",
                    'bgColor' => "bg-blue-50 dark:bg-blue-900/20",
                    'span' => "col-span-1 md:col-span-2",
                    'href' => "/public-services",
                ],
                [
                    'icon' => 'IdCard',
                    'title' => "Kependudukan",
                    'desc' => "KTP, KK, Akta — semua dalam satu platform.",
                    'color' => "text-accent-dark dark:text-accent-light",
                    'bgColor' => "bg-accent-50 dark:bg-accent/10",
                    'href' => "/public-services",
                ],
                [
                    'icon' => 'Heart',
                    'title' => "Layanan Kesehatan",
                    'desc' => "Jadwal Puskesmas, rujukan, dan informasi kesehatan warga.",
                    'color' => "text-rose-600 dark:text-rose-400",
                    'bgColor' => "bg-rose-50 dark:bg-rose-900/20",
                    'href' => "/public-services",
                ],
                [
                    'icon' => 'GraduationCap',
                    'title' => "Pendidikan",
                    'desc' => "Pendaftaran sekolah, beasiswa, dan data pendidikan kota.",
                    'color' => "text-violet-600 dark:text-violet-400",
                    'bgColor' => "bg-violet-50 dark:bg-violet-900/20",
                    'href' => "/public-services",
                ],
                [
                    'icon' => 'Truck',
                    'title' => "Infrastruktur",
                    'desc' => "Laporkan kerusakan jalan, lampu, dan fasilitas umum.",
                    'color' => "text-amber-600 dark:text-amber-400",
                    'bgColor' => "bg-amber-50 dark:bg-amber-900/20",
                    'href' => "/public-services",
                ],
                [
                    'icon' => 'Store',
                    'title' => "UMKM & Investasi",
                    'desc' => "Dukung pertumbuhan ekonomi lokal dengan kemudahan perizinan UMKM.",
                    'color' => "text-primary-700 dark:text-primary-light",
                    'bgColor' => "bg-primary-50 dark:bg-primary-900/20",
                    'span' => "col-span-1 md:col-span-2",
                    'href' => "/public-services",
                ]
            ],
            'NewsItemHomepage' => [
                [
                    'id' => 1,
                    'category' => "Pembangunan",
                    'title' =>
                    "Pemkot Serang Resmikan Taman Digital Interaktif di Kawasan Pusat Kota",
                    'excerpt' =>
                    "Wali Kota Serang meresmikan taman digital pertama di Banten yang dilengkapi fasilitas Wi-Fi gratis, area co-working outdoor, dan instalasi seni interaktif berbasis teknologi.",
                    'date' => "2026-03-25",
                    'author' => "Humas Pemkot Serang",
                    'image' =>
                    "https://img.rocket.new/generatedImages/rocket_gen_img_11b6f0c0a-1766576933251.png",
                    'alt' => "Taman digital modern",
                    'featured' => true,
                ],
                [
                    'id' => 2,
                    'category' => "Layanan Publik",
                    'title' =>
                    "Sistem Antrian Digital Puskesmas Kini Terintegrasi Portal SerangKota",
                    'excerpt' =>
                    "Warga kini dapat mendaftar antrian Puskesmas dari rumah melalui portal resmi kota.",
                    'date' => "2026-03-22",
                    'author' => "Dinas Kesehatan",
                    'image' =>
                    "https://img.rocket.new/generatedImages/rocket_gen_img_1ddcb448a-1768154076773.png",
                    'alt' => "Sistem digital Puskesmas",
                ],
                [
                    'id' => 3,
                    'category' => "Ekonomi",
                    'title' =>
                    "Pasar UMKM Digital Serang Catat Transaksi Rp 4,2 Miliar di Kuartal I",
                    'excerpt' =>
                    "Program digitalisasi UMKM berhasil meningkatkan omzet pedagang lokal.",
                    'date' => "2026-03-20",
                    'author' => "Dinas Perdagangan",
                    'image' =>
                    "https://img.rocket.new/generatedImages/rocket_gen_img_101358c49-1772054905122.png",
                    'alt' => "UMKM digital",
                ],
                [
                    'id' => 4,
                    'category' => "Pendidikan",
                    'title' => "Serang Raih Penghargaan Kota Literasi Digital Terbaik",
                    'excerpt' =>
                    "Program literasi digital menjangkau 120 sekolah di seluruh kecamatan.",
                    'date' => "2026-03-18",
                    'author' => "Dinas Pendidikan",
                    'image' =>
                    "https://img.rocket.new/generatedImages/rocket_gen_img_1fe4dd004-1773800272776.png",
                    'alt' => "Siswa belajar digital",
                ],
            ],
            'CityStats' => [
                [
                    "icon" => "users",
                    "value" => 750,
                    "suffix" => "K+",
                    "label" => "Total Penduduk",
                    "sub" => "Data BPS 2025",
                    "color" => "text-primary-700 dark:text-primary-light",
                    "bgColor" => "bg-primary-50 dark:bg-primary-900/20",
                ],
                [
                    "icon" => "building-office",
                    "value" => 6,
                    "suffix" => "",
                    "label" => "Kecamatan",
                    "sub" => "Wilayah administratif",
                    "color" => "text-accent-dark dark:text-accent-light",
                    "bgColor" => "bg-accent-50 dark:bg-accent/10",
                ],
                [
                    "icon" => "document-check",
                    "value" => 120,
                    "suffix" => "+",
                    "label" => "Layanan Digital",
                    "sub" => "Tersedia 24/7 online",
                    "color" => "text-violet-600 dark:text-violet-400",
                    "bgColor" => "bg-violet-50 dark:bg-violet-900/20",
                ],
                [
                    "icon" => "chart-bar",
                    "value" => 98,
                    "suffix" => "%",
                    "label" => "Kepuasan Warga",
                    "sub" => "Survei Q1 2026",
                    "color" => "text-amber-600 dark:text-amber-400",
                    "bgColor" => "bg-amber-50 dark:bg-amber-900/20",
                ],
                [
                    "icon" => "storefront",
                    "value" => 42000,
                    "suffix" => "+",
                    "label" => "UMKM Terdaftar",
                    "sub" => "Aktif & terverifikasi",
                    "color" => "text-rose-600 dark:text-rose-400",
                    "bgColor" => "bg-rose-50 dark:bg-rose-900/20",
                ],
                [
                    "icon" => "academic-cap",
                    "value" => 320,
                    "suffix" => "+",
                    "label" => "Sekolah Aktif",
                    "sub" => "SD, SMP, SMA/SMK",
                    "color" => "text-cyan-600 dark:text-cyan-400",
                    "bgColor" => "bg-cyan-50 dark:bg-cyan-900/20",
                ],
            ],
            'PerformanceMetrics' => [
                [
                    "label" => "Realisasi APBD 2025",
                    "value" => 87,
                    "gradient" => "from-blue-500 via-indigo-500 to-emerald-400",
                ],
                [
                    "label" => "Tingkat Literasi Digital",
                    "value" => 74,
                    "gradient" => "from-emerald-500 via-green-400 to-teal-300",
                ],
                [
                    "label" => "Cakupan Layanan Online",
                    "value" => 92,
                    "gradient" => "from-purple-500 via-indigo-500 to-blue-500",
                ],
            ],
            'ServiceFeatures' => [
                [
                    "icon" => "Clock",
                    "title" => "Respons 1×24 Jam",
                    "desc" => "Ditindaklanjuti dalam 24 jam",
                ],
                [
                    "icon" => "ShieldCheck",
                    "title" => "Identitas Terlindungi",
                    "desc" => "Data aman & rahasia",
                ],
                [
                    "icon" => "BarChart",
                    "title" => "Tracking Real-time",
                    "desc" => "Pantau progres laporan",
                ],
            ],
            'CategoryAspirasi' => [
                [
                    "code" => "infrastruktur",
                    "title" => "Infrastruktur",
                    "icon" => "Road",
                ],
                [
                    "code" => "kesehatan",
                    "title" => "Kesehatan",
                    "icon" => "Heart",
                ],
                [
                    "code" => "pendidikan",
                    "title" => "Pendidikan",
                    "icon" => "AcademicCap",
                ],
                [
                    "code" => "lingkungan",
                    "title" => "Lingkungan",
                    "icon" => "Leaf",
                ],
                [
                    "code" => "ekonomi",
                    "title" => "Ekonomi & UMKM",
                    "icon" => "Storefront",
                ],
            ],
        ];

        return response()->json([
            "status" => "success",
            "data" => $data,
        ]);
    }
}
