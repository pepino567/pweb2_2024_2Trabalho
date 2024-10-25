<?php

// app/Models/Evento.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'evento';

    protected $fillable = [
        'tituloEvento',
        'discricaoEvento',
        'dataInicoEvento',
        'horaInicioEvento',
        'dataFimEvento',
        'horaFimEvento',

    ];
}
