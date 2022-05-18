<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'nombres', 'apellidos', 'cod_estudiante', 'estado'
    ];

    public function semeters(){
        return $this->belongsToMany('App\Models\Semeter')->withPivot('student_id', 'semeter_id');
        
    }
}
