<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semeter extends Model
{

    protected $fillable = [
        'numero_semestres', 'id'
    ];

    public function studens(){
        return $this->belongsToMany('App\Models\Student')->withPivot('semeter_id', 'student_id');
        
    }

    public function matters(){
        return $this->belongsToMany('App\Models\Matter')->withPivot('matter_id', 'semeter_id');
        
    }
}
