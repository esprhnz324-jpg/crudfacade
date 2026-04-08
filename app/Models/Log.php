<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'logs_event';
    protected $fillable = [
        'user_id',
        'logs_type',
        'logs_desc',
    
    ];
}
