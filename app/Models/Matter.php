<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matter extends Model
{
    protected $fillable = [
        'nombre', 'creditos', 'Nrc'
    ];

    public function studens(){
        return $this->belongsToMany('App\Models\Sudent')->withPivot('semeter_id', 'matter_id');
    }
}