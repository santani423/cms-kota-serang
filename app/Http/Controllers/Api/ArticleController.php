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

            // Filter by category
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

            // Filter by author
            if ($request->filled('author')) {
                $author = $request->get('author');

                $query->whereHas('author', function ($q) use ($author) {
                    $q->where(function ($sub) use ($author) {
                        $sub->where('users.id', $author)
                            ->orWhere('users.name', 'like', '%' . $author . '%');
                    });
                });
            }

            // Sorting (default: terbaru)
            $query->latest();

            // Pagination (limit biar aman)
            $perPage = min($request->get('per_page', 10), 50);

            $articles = $query->paginate($perPage)->appends($request->query());

            return response()->json([
                'success' => true,
                'data' => $articles
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
