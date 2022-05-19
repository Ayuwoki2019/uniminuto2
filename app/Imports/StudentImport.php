<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        return new Student([
            'cod_student' =>$row[0],
            'name' =>$row[1],
            'lastname' =>$row[2],
            'status' =>$row[3],
        ]);
    }
}
