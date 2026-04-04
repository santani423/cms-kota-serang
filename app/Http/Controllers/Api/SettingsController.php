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
                "code" => "informasi-publik",
                "title" => "Informasi Publik",
                "href" => "/informasi-publik",
                "subMenu" => [
                    [
                        "title" => "Profil Pemerintah",
                        "href" => "/informasi-publik/profil",
                        "desc" => "Informasi struktur dan profil pemerintah daerah",
                    ],
                    [
                        "title" => "Visi & Misi",
                        "href" => "/informasi-publik/visi-misi",
                        "desc" => "Arah pembangunan dan tujuan daerah",
                    ],
                    [
                        "title" => "Dokumen Publik",
                        "href" => "/informasi-publik/dokumen",
                        "desc" => "Akses dokumen resmi dan laporan",
                    ],
                    [
                        "title" => "PPID",
                        "href" => "/informasi-publik/ppid",
                        "desc" => "Pejabat Pengelola Informasi dan Dokumentasi",
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

        return response()->json($data);
    }
}