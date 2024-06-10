<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConsultationRequest extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'service_id',
        'name',
        'subject',
        'email',
        'description',
        'file',
        'status',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id')->withDefault([
            'title' => 'None',
        ]);
    }
}
