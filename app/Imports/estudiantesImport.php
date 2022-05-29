<?php

namespace App\Imports;

use App\Models\estudiantes;
use Maatwebsite\Excel\Concerns\ToModel;

class estudiantesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new estudiantes([
            'numeroDocumento'     => $row[0],
            'cod_student'    => $row[1],
            'nombre1' => $row[2],
            'nombre2'     => $row[3],
            'apellido1'    => $row[4],
            'apellido2' => $row[5],
            'edad'     => $row[6],
            'fechaNacimiento'    =>  $row[7],
            'carrera' => $row[8],
            'periodo' => $row[9],
            'semestre' => $row[10],
            'promedio' => $row[11],
            'creditos' => $row[12],
            'estado' => $row[13],
        ]);
    }
}
