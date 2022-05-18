<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Perfil;
use App\Models\Education;
use App\Models\Language;

class PerfilController extends Controller
{
    public function index(User $user){

        return view('users.perfil');
    }

    public function store(Request $request){

        $ruta_imagen = $request['imagen']->store('imagenes-perfil', 'public');
        // procesar imagen -> name

        $perfil = new Perfil();
        $perfil->profesion = $request->profesion;
        $perfil->telefono = $request->telefono;
        $perfil->ciudad = $request->ciudad;
        $perfil->imagen = $ruta_imagen;
        $perfil ->user_id = auth()->user()->id;
        $perfil->save();
        
        
    return view('home');

    }

    public function store_student(Request $request){

        
        $ruta_imagen = $request['perfil']->store('perfilStudents', 'public');
        $nuevo = new Perfil();
        $nuevo->nombre = $request->name;
        $nuevo->apellido= $request->lastname;
        $nuevo->imagen=  $ruta_imagen;
        $nuevo->descripcion= $request->descripcion;
        $nuevo->edad= $request->edad;
        $nuevo->cargo= $request->cargo;
        $nuevo->profesion = $request->profesion;
        $nuevo->añosemillero = $request->añossemillero;
        $nuevo->ponencias = $request->cantidaddeponencias;
        $nuevo->proyectos = $request->participacionproyectos;
        $nuevo->semestre = $request->semestreactual;

        $nuevo->save();
        $educacion = new Education();
        $educacion->year = $request->año;
        $educacion->title = $request->titulo;
        $educacion->category = $request->category;
        $educacion->description = $request->descripcion_education;
        $educacion->perfil_id = $nuevo->id;
        $educacion->save();

        for( $i =0;$i<count($request->leng);$i++){
            $lenguaje= new Language();
            $lenguaje->name_language = $request->leng[$i];
            $lenguaje->perfil_id = $nuevo->id;

            $lenguaje->save();
        }

        return redirect()->route('home',$nuevo->id)
        ->with('status_success','Operación con éxito'); 
        

    }
}
