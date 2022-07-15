<?php

namespace App\Models;

use Domain\User\Observers\Created;
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

    protected $dispatchesEvents = [
        'created' => Created::class
    ];
}
