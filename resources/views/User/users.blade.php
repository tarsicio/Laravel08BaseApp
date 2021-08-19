

<!DOCTYPE html>
<html>
<head>
    <title>HORUS | 2022</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css" rel="stylesheet">

</head>
<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="mb-4">USERS</h2>
                <table class="table table-bordered users_all">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Avatar</th>
                            <th>Correo</th>
                            <th>Condición</th>
                            <th>Confirmo</th>                
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
        </div>
    </div>
</div>   
</body>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>  
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>


<script type="text/javascript">
  $(function () {
    
    var table = $('.users_all').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth : false,        
        ajax: "{{ route('users.list') }}",        
        columns: [             
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'avatar', name: 'foto'},
            {data: 'email', name: 'email'},
            {data: 'activo', name: 'activo'},
            {data: 'confirmed_at', name: 'confirmed_at'},                        
        ],
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "Nada encontrado !!! - disculpe",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
            "infoEmpty": "Registros no disponible",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar:",
            "paginate": {
                "next": "Siguiente",
                "previous": "Anterior",
            }
        }       
    });    
  });
</script>
</html>