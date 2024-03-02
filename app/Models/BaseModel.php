<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use HasFactory;

    const STATUS_ACTIVE = 1;
    const STATUS_DEACTIVE = 0;
    
    const STATUS = [
        1 => 'Active',
        0 => 'Deactive',
    ];
}
