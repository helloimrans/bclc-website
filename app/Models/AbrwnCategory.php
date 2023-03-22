<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AbrwnCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'is_article',
        'is_blog',
        'is_review',
        'is_writeup',
        'is_news',
        'name',
        'slug',
        'sort',
        'status',
        'description',
        'image',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}
