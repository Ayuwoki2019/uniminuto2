$(document).ready(function () {

});

var datatable = $('#lis_estudiantes').DataTable({
    "ajax": "/api/lista/estudiantes/@",
    "autoWidth": true,
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "info": true,
    "ordering": true,
    "dom": 'Bfrtip',
    "columns": [
        {
            "data": 'vacio'
        },
        {
            "data": "cod_student"
        },
        {
            "data": "numeroDocumento"
        },
        {
            "render": function(data,type,row) {
                return row.nombre1+' '+row.nombre2+' '+row.apellido1+' '+row.apellido2
            }
        },
        {
            "data": "carrera"
        },
        {
            "data": "promedio"
        },
        {
            "data": "semestre"
        },
        {
            "data": "promedio"
        },
        {
            "data": "creditos"
        },
        {
            "data": "estadoTotalCreditos"
        },
        {
            "data": "SmetreEstado"
        },
        {
            "data": "estado"
        },
    ],
    "buttons": [
        'copy', 'csv', 'excel', 'pdf', 'print'
    ],
    "responsive": {
        "details": {
            "type": 'column',
            "target": 'tr'
        }
    },
    "columnDefs": [
        {
            "className": 'control',
            "orderable": false,
            "targets":   0
        }
    ],
    "order": [[ 3, 'asc' ], [ 6, 'asc' ]]
});

$('#eliminar').click(function (e) {
    e.preventDefault();
    Swal.fire({
        title: 'Esta seguro de eliminar la infromacion?',
        text: "Se van a eliminar todos los datos",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "get",
                url: "/maie/elimina/datos/@",
                success: function (response) {
                    console.log(response);
                    Swal.fire(
                        response.title,
                        response.msg,
                        response.status
                    )
                    datatable.ajax.reload();
                }
            });
        }
    })
});
