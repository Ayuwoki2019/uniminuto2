@extends('layouts.app')

@section('css')
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')

<div class="content-inicio">
  <h2 class="content-inicio-title">Listado de estudiantes</h2>
  <div>
    <form action="" class="row justify-content-center">
      <div class="from-group col-md-3">
        <input type="text" placeholder="Id Estudiante" class="form-control">
      </div>
      <div class="from-group col-md-3">
        <input type="text" placeholder="Semestre" class="form-control">
      </div>
      <div class="from-group col-md-3">
        <input type="text" placeholder="Periodos Cursados" class="form-control">
      </div>
      <div>
        <div>
          <button class="btn btn-primary" type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" height="48" width="48"><path d="M18.9 35.7 7.7 24.5 9.85 22.35 18.9 31.4 38.1 12.2 40.25 14.35Z"/></svg>
          </button>
        </div>
      </div>
    </form>
    <form>
      <label for="data_excel">Importar data</label>
      <input
          id="imagen_principal"
          type="file"
          class="form-control @error('data_excel') is-invalid @enderror "
          name="data_excel"
      >
    </form>
  </div>
  <table class="table table-striped" id="estudiantes">
      <thead>
        <tr>
          <th scope="col">Cod_estudiante</th>
          <th scope="col">Nombres</th>
          <th scope="col">Apellidos</th>
          <th scope="col">Estado</th>
          <th scope="col">NRC</th>
          <th scope="col">Materias</th>
          <th scope="col">Num_semestre</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>789465</td>
          <td>Mark</td>
          <td>Otto</td>
          <td>2</td>
          <td>Matematicas Discreta</td>
          <td>Activo</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>685269</td>
          <td>Jacob</td>
          <td>Thornton</td>
          <td>9</td>
          <td>Practica profesional</td>
          <td>Inactivo</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>142569</td>
          <td>Larry</td>
          <td>the Bird</td>
          <td>8</td>
          <td>Bases de datos</td>
          <td>Activo</td>
        </tr>
        <tr>
          <th scope="row">4</th>
          <td>789465</td>
          <td>Mark</td>
          <td>Otto</td>
          <td>2</td>
          <td>Matematicas Discreta <br>Matematicas Discreta</br></td>
          <td>Activo</td>
        </tr>
        <tr>
          <th scope="row">5</th>
          <td>685269</td>
          <td>Jacob</td>
          <td>Thornton</td>
          <td>9</td>
          <td>Practica profesional</td>
          <td>Inactivo</td>
        </tr>
        <tr>
          <th scope="row">6</th>
          <td>142569</td>
          <td>Larry</td>
          <td>the Bird</td>
          <td>8</td>
          <td>Bases de datos</td>
          <td>Activo</td>
        </tr>
        
      </tbody>
    </table>
</div>
@endsection

@section('js')
      <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
      <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
      <script>
        $('#estudiantes').DataTable();
      </script>
@endsection