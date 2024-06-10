<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LawSection extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'parent_id',
        'law_id',
        'law_part_id',
        'law_chapter_id',
        'title',
        'slug',
        'description',
        'description_bn',
        'sort',
        'status',
        'section_no',
        'section_no_bn',
        'title_bn',
        'is_act',
        'is_rules',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function parent()
    {
        return $this->belongsTo(LawSection::class, 'parent_id')->withDefault([
            'title' => '--'
        ]);
    }
    public function childs()
    {
        return $this->hasMany(LawSection::class, 'parent_id', 'id');
    }
    public function chapter()
    {
        return $this->belongsTo(LawChapter::class, 'law_chapter_id', 'id')->withDefault([
            'title' => '--'
        ]);
    }
}
