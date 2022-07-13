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
    ];

    protected $dates = ['dt_chamada'];

    public $timestamps = false;

    /*================================================================================================================*/
    /*==================== VALIDATION =============================================================================*/
    /*================================================================================================================*/
    /**
     * @return array
     */
    public static function validationArray()
    {
        return [
            'descricao' => 'required',
            'categoria_id' => 'nullable|exists:categorias,id',
            'entrada' => 'required|in:0,1',
            'scheme' => 'in:AGENDA,FINANCEIRO'
        ];
    }
}
