<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /**
     * @var int|mixed
     */
    protected $table = 'tickets';
    protected $fillable = [
        'codigo', 'fecha_entrada','matricula','estado','importe','fechapago'
    ];
}

