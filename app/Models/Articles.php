<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $table = 'articles';

    protected $fillable = [
        'title',
        'content',
        'article_category_id',
    ];

    /**
     * Relasi ke tabel article_categories
     */
    public function articleCategory()
    {
        return $this->belongsTo(ArticleCategories::class, 'article_category_id', 'id');
    }

    /**
     * Shortcut langsung ke Categories (optional, tapi recommended)
     */
    public function category()
    {
        return $this->hasOneThrough(
            Categories::class,
            ArticleCategories::class,
            'article_id', // Foreign key di article_categories
            'category_id', // Foreign key di categories
            'id', // FK di articles
            'id' // FK di article_categories
        );
    }

    /**
     * Accessor untuk ambil nama category langsung
     */
    public function getCategoryNameAttribute()
    {
        return optional($this->articleCategory->category)->name;
    }
}