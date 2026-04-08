<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Articles;
use App\Models\Categories;

class ArticleController extends Controller
{

    public function index(Request $request)
    {
        try {
            $query = Articles::with(['categories', 'author', 'tags']);

            // Filter berdasarkan kategori
            if ($request->filled('category')) {
                $category = $request->get('category');
                $query->whereHas('categories', function ($q) use ($category) {
                    $q->where(function ($sub) use ($category) {
                        $sub->where('categories.id', $category)
                            ->orWhere('categories.slug', $category)
                            ->orWhere('categories.name', 'like', '%' . $category . '%');
                    });
                });
            }

            // Filter berdasarkan author
            if ($request->filled('author')) {
                $author = $request->get('author');
                $query->whereHas('author', function ($q) use ($author) {
                    $q->where(function ($sub) use ($author) {
                        $sub->where('users.id', $author)
                            ->orWhere('users.name', 'like', '%' . $author . '%');
                    });
                });
            }

            // --- PENYESUAIAN JUMLAH DATA (PER PAGE) ---
            // Ambil dari parameter 'per_page', jika tidak ada pakai default 10.
            // Kita batasi maksimal 100 agar user tidak narik data terlalu banyak sekaligus (mencegah lag).
            $perPage = (int) $request->get('per_page', 10);
            if ($perPage <= 0) $perPage = 10; // Antisipasi angka negatif
            $perPage = min($perPage, 100);

            // Sorting
            $query->latest();

            // Eksekusi Pagination
            $articles = $query->paginate($perPage)->appends($request->query());

            return response()->json([
                'success' => true,
                'message' => 'Data artikel berhasil diambil',
                'current_page' => $articles->currentPage(),
                'per_page' => $articles->perPage(),
                'total_data' => $articles->total(),
                'data' => $articles->items(), // Mengambil array data saja
                'pagination' => [
                    'next_page_url' => $articles->nextPageUrl(),
                    'prev_page_url' => $articles->previousPageUrl(),
                    'last_page' => $articles->lastPage(),
                ]
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data artikel',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }

    public function inRandomOrder()
    {
        try {
            $articles = Articles::with(['categories', 'author', 'tags'])->inRandomOrder()->first();
            return response()->json([
                'success' => true,
                'data' => $articles
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve articles',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function categories()
    {

        try {
            $categories = Categories::all();
            return response()->json([
                'success' => true,
                'data' => $categories
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve categories',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
