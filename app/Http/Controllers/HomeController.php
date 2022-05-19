<?php

namespace App\Http\Controllers;

use App\Imports\StudentImport;
use App\Models\Student;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('inicio');
    }
    public function import(Request $request){
        $file = $request->file('file');
        Excel::import(new StudentImport, $file);
        return back()->with('message', 'Importación de usuarios completada');
    }
    public function studentList(Request $request){
        $students = Student::all();
        $concatenaTabla=collect([]);
        foreach($students as $student){
            $collectionTabla = collect([
                [
                    'id'=>$student->id,
                    'cod_student'=>$student->cod_student,
                    'name'=>$student->name,
                    'lastname'=>$student->lastname,
                    'status'=>$student->status,
                ]
            ]);
            $concatenaTabla = $collectionTabla->concat($concatenaTabla);
        }
        return response()->json(['data'=>$concatenaTabla],200);
    }
}
