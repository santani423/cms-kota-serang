<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HomepageController extends Controller
{
    /**
     * Tampilkan data untuk homepage.
     */
    public function index(Request $request)
    {
        // Contoh data statis, bisa diganti dengan data dari database
        $data = [
            'title' => 'Selamat Datang di Homepage',
            'description' => 'Ini adalah API homepage.',
            'date' => now()->toDateString(),
        ];

        return response()->json($data);
    }
}
