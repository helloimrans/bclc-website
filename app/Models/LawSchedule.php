<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LawSchedule extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'law_id',
        'title',
        'file',
        'status',
        'created_by',
        'updated_by',
        'deleted_by'
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
}
