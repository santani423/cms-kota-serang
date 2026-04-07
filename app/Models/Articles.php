<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $table = 'articles';

    protected $fillable = [
        'author_id',
        'title',
        'slug',
        'excerpt',
        'alt',
        'content',
        'featured_image',
        'status',
        'published_at',
        'view_count',
    ];

    /**
     * Relasi many-to-many ke Categories (via pivot)
     */
    public function categories()
    {
        return $this->belongsToMany(
            Categories::class,
            'article_categories',
            'article_id',
            'category_id'
        );
    }
    /**
     * Relasi many-to-one ke User (author)
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    /**
     * Accessor: ambil 1 category (misalnya untuk highlight)
     */
    public function getCategoryNameAttribute()
    {
        return $this->categories->first()->name ?? null;
    }

    /**
     * Accessor: ambil semua category (array)
     */
    public function getCategoryNamesAttribute()
    {
        return $this->categories->pluck('name');
    }

    /**
     * Accessor: format string (siap tampil)
     */
    public function getCategoryListAttribute()
    {
        return $this->categories->pluck('name')->implode(', ');
    }
    /**
     * Relasi many-to-many ke ArticleTags (via pivot)
     */
    public function tags()
    {
        return $this->belongsToMany(
            Tags::class,
            'article_tags',
            'article_id',
            'tag_id'
        );
    }
}
