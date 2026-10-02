<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'nombre_empresa', 'contacto_principal', 'telefono_whatsapp',
        'zona_geografica', 'user_id', 'origin_id',
    ];
}
