<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssociatedService extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title',
        'slug',
        'description',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function scopeIsActive($query)
    {
        return $query->where('status', 1);
    }

}
