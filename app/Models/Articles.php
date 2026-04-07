<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }
}
