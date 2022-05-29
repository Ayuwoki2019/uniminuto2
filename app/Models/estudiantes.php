<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estudiantes extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $primaryKey = 'id';

    protected $fillable = [
        'numeroDocumento',
        'cod_student',
        'nombre1',
        'nombre2',
        'apellido1',
        'apellido2',
        'edad',
        'fechaNacimiento',
        'carrera',
        'periodo',
        'semestre',
        'promedio',
        'creditos',
        'estado',
    ];
}
