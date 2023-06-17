<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    protected $fillable=[
        'Correo',
        'Edad',
        'Sexo',
        'RedFavorita',
        'tFacebook',
        'tWhatsapp',
        'tTwitter',
        'tInstagram',
        'tTiktok',
    ];
    use HasFactory;
}
