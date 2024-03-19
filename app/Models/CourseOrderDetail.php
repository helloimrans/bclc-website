<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseOrderDetail extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    const PENDING = 'Pending';
    const RUNNING = 'Processing';
    const COMPLETE = 'Complete';

    protected $fillable = [
        'user_id',
        'order_id',
        'course_id',
        'status',
    ];

    public function scopeacl($query)
    {
        return $query->where('user_id', auth()->user()->id);
    }
    public function scopepending($query)
    {
        return $query->where('status', self::PENDING);
    }
    public function scoperunning($query)
    {
        return $query->where('status', self::RUNNING);
    }
    public function scopecomplete($query)
    {
        return $query->where('status', self::COMPLETE);
    }

    public function courses()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
