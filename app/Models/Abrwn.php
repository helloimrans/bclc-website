<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Abrwn extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'is_abrwn',
        'abrwn_category_id',
        'title',
        'slug',
        'description',
        'thumbnail_image',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
        'guard_name',
    ];

    public function category()
    {
        return $this->belongsTo(AbrwnCategory::class, 'abrwn_category_id', 'id')->withDefault([
            'name' => 'None',
        ]);
    }
    public function createdBy()
    {
        return $this->belongsTo(Admin::class, 'created_by', 'id')->withDefault([
            'name' => 'None',
        ]);
    }
    public function updatedBy()
    {
        return $this->belongsTo(Admin::class, 'updated_by', 'id')->withDefault([
            'name' => 'None',
        ]);
    }
}
