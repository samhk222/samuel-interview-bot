<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Webhooks extends Model
{
    protected $table = 'webhook';

    protected $fillable = [
        'method',
        'header',
        'body',
        'referer',
        'dt_chamada',
        'imported'
    ];

    protected $dates = ['dt_chamada'];

    public $timestamps = false;
}
