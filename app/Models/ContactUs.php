<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactUs extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    const UNREAD = 'Unread';

    protected $fillable = [
        'name',
        'mobile',
        'email',
        'subject',
        'message',
    ];

    public function scopeunread($query){
        return $query->where('read_status', self::UNREAD);
    }
}
