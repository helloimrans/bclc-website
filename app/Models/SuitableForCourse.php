<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuitableForCourse extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'created_by', 'id');
    }
}