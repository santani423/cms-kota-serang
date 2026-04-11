<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MassageSupport extends Model
{
    protected $fillable = [
        'email',
        'hp',
        'message',
        'active',
    ];
}
