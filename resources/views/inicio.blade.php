@extends('layouts.app')

@section('css')
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')

<div class="content-inicio">
  <h2 class="content-inicio-title">Listado de estudiantes</h2>
  <div>
    <form action="/importListExcel" class="m-5" method="post" enctype="multipart/form-data">
      @csrf
      
      <div class="input-group mb-3">
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="inputGroupFile02" name="file">
          <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Cargar Excel de estudiantes</label>
        </div>
        <div class="input-group-append">
          <button class="input-group-text" id="inputGroupFileAddon02">Cargar</button>
        </div>
      </div>
    </form>
  </div>
  <table class="table table-striped" id="estudiantes">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">codigo Estudiante</th>
          <th scope="col">Nombres</th>
          <th scope="col">Apellidos</th>
          <th scope="col">Estado</th>
          {{--  <th scope="col">NRC</th>
          <th scope="col">Materias</th>
          <th scope="col">Num_semestre</th>  --}}
        </tr>
      </thead>
      <thead>
        <td></td>
        <td>
            <input type="text" class="form-control filter-input" data-column="1">
        </td>
        <td>
            <input type="text" class="form-control filter-input" data-column="2">
        </td>
        <td>
            <input type="text" class="form-control filter-input" data-column="3">
        </td>
        <td>
            <input type="text" class="form-control filter-input" data-column="4">
        </td>
        {{--  <td>
            <input type="text" class="form-control filter-input" data-column="4">
        </td>
        <td>
            <input type="text" class="form-control filter-input" data-column="5">
        </td>
        <td>
            <input type="text" class="form-control filter-input" data-column="6">
        </td>  --}}
    </thead>
    <tbody></tbody>
    </table>
</div>
@endsection

@section('js')
      <script src="https://code.jquery.com/jquery-3.5.1.js"></script><link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css"> <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
      <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
      <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
      <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
      <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
      <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
      <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
      <script>
        var tablaEstudiantes = $('#estudiantes').DataTable({
            responsive: true,        
            "ajax":"/studentList",
            "columns":[
                {'defaultContent':''},
                {data:'cod_student'},
                {data:'name'},
                {data:'lastname'},
                {data:'status'},
            ],
        });
        tablaEstudiantes.on('order.dt search.dt', function () {
          tablaEstudiantes.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
            tablaEstudiantes.cell(cell).invalidate('dom');
          });
        }).draw();
        $('.filter-input').keyup(function(){
            tablaEstudiantes.column($(this).data('column'))
            .search($(this).val())
            .draw();
        });
      </script>
@endsection