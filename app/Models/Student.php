<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name', 'lastname', 'cod_student', 'status'
    ];

    public function semeters(){
        return $this->belongsToMany('App\Models\Semeter')->withPivot('student_id', 'semeter_id');
        
    }
}
