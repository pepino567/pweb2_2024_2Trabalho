<?php

// app/Models/Tarefa.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;

    protected $table = 'tarefa';

    protected $fillable = [
        'tituloTarefa',
        'discricaoTarefa',
        'dataConclusaoTarefa',
        'horaConclusaoTarefa',

    ];
}
