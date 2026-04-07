<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Articles;
use App\Models\Categories;

class ArticleController extends Controller
{

    public function index()
    {
        try {
            $articles = Articles::with(['categories', 'author', 'tags'])->select(
                'title',
                'slug',
                'excerpt',
                'alt',
                'content',
                'featured_image',
                'status',
                'published_at',
                'categories.*',
                // 'author.name as author_name',
                // 'tags.name as tag_name'
            )->get();
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
