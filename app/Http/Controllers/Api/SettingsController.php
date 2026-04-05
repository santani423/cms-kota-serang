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
                        "href" => "/informasi-publik/profil",
                        "desc" => "",
                    ],
                    [
                        "title" => "Wakil Walikota Serang",
                        "href" => "/informasi-publik/profil",
                        "desc" => "",
                    ],
                    [
                        "title" => "Visi Misi",
                        "href" => "/informasi-publik/profil",
                        "desc" => "",
                    ],
                    [
                        "title" => "Sejarah Kota Serang",
                        "href" => "/informasi-publik/profil",
                        "desc" => "",
                    ],
                    [
                        "title" => "Arti Lambang Kota Serang",
                        "href" => "/informasi-publik/profil",
                        "desc" => "",
                    ],
                    [
                        "title" => "Penghargaan",
                        "href" => "/informasi-publik/profil",
                        "desc" => "",
                    ],
                    [
                        "title" => "Latar Geografi",
                        "href" => "/informasi-publik/profil",
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

    public function imageHompage()
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
}
