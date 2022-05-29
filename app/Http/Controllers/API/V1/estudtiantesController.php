<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Imports\estudiantesImport;
use App\Models\estudiantes;
use App\Models\parametros;
use Exception;

class estudtiantesController extends Controller
{
    public function getEstudiantes($id){
        $parametros = parametros::where('nombre','ReglaCreditos')->first();
        $regla = json_decode($parametros->text);
        //return response()->json($regla, 200);
        $colletion = collect([$regla])->first();
        //return response()->json(, 200);
        if ($id == '@') {
            $estudiantes = estudiantes::all();
            $concatenated = collect([]);
            foreach ($estudiantes->groupBy('cod_student') as  $value) {
                $estado = 0;
                foreach ($value->groupBy('semestre','decs') as  $data) {
                    foreach ($data as $llave => $regis) {
                        $estado += $regis->creditos;
                        $con = 0;
                        $sonseme = 0;
                        $bandera = false;
                        $trank = 0;
                        foreach ($colletion->data as $key => $creditosBan) {
                            if ($estado == $creditosBan->semester) {
                                $bandera = true;
                                $sonseme = $key+1;
                            }elseif ($estado > $creditosBan->semester) {
                                $trank += 1;
                                $bandera = false;
                                $con++;
                            }
                        }
                        $collection = collect([
                            [
                                'id' => $regis->id,
                                'numeroDocumento'=> $regis->numeroDocumento,
                                'cod_student'=> $regis->cod_student,
                                'nombre1'=> $regis->nombre1,
                                'nombre2'=> $regis->nombre2,
                                'apellido1'=> $regis->apellido1,
                                'apellido2'=> $regis->apellido2,
                                'edad'=> $regis->edad,
                                'fechaNacimiento'=> $regis->fechaNacimiento,
                                'carrera'=> $regis->carrera,
                                'periodo'=> $regis->periodo,
                                'semestre'=> $regis->semestre,
                                'promedio'=> $regis->promedio,
                                'creditos'=> $regis->creditos,
                                'estadoTotalCreditos'=> $estado,
                                'SmetreEstado' => $bandera==true?$sonseme:$con,
                                'estado' => $regis->estado,
                                'vacio'=> '',
                            ]
                        ]);
                        $concatenated = ($collection->concat($concatenated));
                        $con = 0;
                        $sonseme = 0;
                        $bandera = false;
                    }
                }
            }
            return response()->json(['data'=>$concatenated], 200);
        }
        try {
        } catch (Exception $e) {
            return response()->json(['data'=>[],'error'=> 'Algo fallo','developers'=> $e], 200);
        }
    }

    public function imporEstudiantes(Request $request){
        try {
            $respose = Excel::import(new estudiantesImport, $request->file('archivoEstudiantes'));
            return redirect('/maie/seguimiento')->with('success', 'All good!');
        } catch (Exception $e) {
            return response()->json(['data'=>[],'error'=> 'Algo fallo','developers'=> $e], 200);
        }
    }

    public function EliminarDatos($id){
        try {
            if ($id == '@') {
                $data = estudiantes::all();
                foreach ($data as $value) {
                    if (!$value->delete()) {
                        return response()->json(['data'=>[$value],'status'=> 'error','title' => 'Ups, algo fallo', 'msg'=> 'Fallo la Eliminacion'], 200);
                    }
                }
                return response()->json(['status'=> 'succeess','title' => 'Proceso Exitoso', 'msg'=> 'Eliminacion de estudiantes'], 200);
            }
        } catch (Exeception $e) {
            return response()->json(['data'=>[],'error'=> 'Algo fallo','developers'=> $e], 200);
        }
    }
}
