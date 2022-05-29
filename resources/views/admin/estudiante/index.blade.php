@extends('layouts.app')
@section('css')
@endsection
@section('content')
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<form action="/maie/subir/documento" class="m-5" method="post"  enctype="multipart/form-data"php art>
    @csrf
    <div class="form-group">
        <div class="row">
            <label class="col-md-12 mb-0">Cargar Excel de estudiantes</label>
            <div class="col-md-9">
                <input type="file" class="form-control ps-0 form-control-line" name="archivoEstudiantes" id="archivoEstudiantes">
            </div>
            <div class="col-md-1">
                <button class="btn btn-success mx-auto mx-md-0 text-white" id="inputGroupFileAddon02">Cargar</button>
            </div>
            <div class="col-md-1">
                <button class="btn btn-danger mx-auto mx-md-0 text-white" id="eliminar">Eliminar</button>
            </div>
        </div>
    </div>
</form>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Listado de Estudiantes</h4>
                    <h6 class="card-subtitle">Reporte <code>MAIE</code></h6>
                    <div class="table-responsive">
                        <table id="lis_estudiantes" class="table user-table no-wrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0"></th>
                                    <th class="border-top-0">ID Estudiantil</th>
                                    <th class="border-top-0">Numero Identificacion</th>
                                    <th class="border-top-0">Nombre Estudiante</th>
                                    <th class="border-top-0">Carrera</th>
                                    <th class="border-top-0">Periodo</th>
                                    <th class="border-top-0">Semestre</th>
                                    <th class="border-top-0">Promedio</th>
                                    <th class="border-top-0">Creditos</th>
                                    <th class="border-top-0">Creditos Sumados</th>
                                    <th class="border-top-0">Semestre Calculado</th>
                                    <th class="border-top-0">Estado</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
@endsection
@section('js')
<script src="{{asset('maie/estudiantes/estudiantes.js')}}"></script>
@endsection
