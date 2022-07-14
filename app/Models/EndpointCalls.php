<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EndpointCalls extends Model
{
    protected $fillable = [
        'endpoint',
        'user_id',
        'message_id',
        'uuid'
    ];

    protected $dates = ['created_at', 'updated_at'];
}
