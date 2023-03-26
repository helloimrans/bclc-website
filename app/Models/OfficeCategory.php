<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OfficeCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'sort',
        'status',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function officeFunctions()
    {
        return $this->hasMany(OfficeFunction::class);
    }
}
