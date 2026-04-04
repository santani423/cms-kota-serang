<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function cormenu(Request $request)
    {
        // Contoh data statis, bisa diganti dengan data dari database
        $data = [
            'menu' => [
                ['id' => 1, 'name' => 'Dashboard', 'url' => '/dashboard'],
                ['id' => 2, 'name' => 'Users', 'url' => '/users'],
                ['id' => 3, 'name' => 'Settings', 'url' => '/settings'],
            ],
        ];

        return response()->json($data);
    }
}
