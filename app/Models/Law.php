<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Law extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'law_category_id',
        'title',
        'slug',
        'link',
        'description',
        'act_no',
        'act_year',
        'act_date',
        'rules_year',
        'rules_date',
        'total_views',
        'sort',
        'is_rules',
        'short_form',
        'rules_title',
        'rules_short_form',
        'last_amendment',
        'total_chapter',
        'total_section',
        'total_schedule',
        'total_form',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

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

    public function category()
    {
        return $this->belongsTo(LawCategory::class, 'law_category_id', 'id')->withDefault([
            'name' => 'None',
        ]);
    }

    public function actChapter()
    {
        return $this->hasMany(LawChapter::class)->where('is_act', 1)->orderBy('sort', 'ASC');
    }
    public function rulesChapter()
    {
        return $this->hasMany(LawChapter::class)->where('is_rules', 1)->orderBy('sort', 'ASC');
    }
}
