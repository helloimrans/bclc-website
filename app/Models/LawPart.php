<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LawPart extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'law_id',
        'part_no',
        'title',
        'slug',
        'sort',
        'status',
        'part_no_bn',
        'title_bn',
        'is_act',
        'is_rules',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function section()
    {
        return $this->hasMany(LawSection::class)->orderBy('sort', 'ASC');
    }
    public function law()
    {
        return $this->belongsTo(Law::class)->withDefault([
            'title' => '--',
        ]);
    }

    public function chapter()
    {
        return $this->hasMany(LawChapter::class)->orderBy('sort', 'ASC');
    }
}
