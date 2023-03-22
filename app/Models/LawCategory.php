<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LawCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'slug',
        'sort',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function laws()
    {
        return $this->hasMany(Law::class)->where('status',1);
    }
}
