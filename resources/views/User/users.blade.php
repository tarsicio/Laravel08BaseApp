@extends('adminlte::layouts.app')

@section('css_database')
    @include('adminlte::layouts.partials.link')
@endsection

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('contentheader_title')
    <div><h2 class="mb-4">{{ trans('message.users') }}</h2></div>    
    <div>
        <a href="{{ route('users.create') }}" id="new_user" class="btn btn-sm btn-primary">{{ trans('message.new_user') }}</a>
    </div>
    <div style="text-align:center;">
        <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm glyphicon glyphicon-print" role="button" aria-disabled="true"> {{ trans('message.botones.print') }}</a>
        <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm glyphicon glyphicon-cloud-download disabled" role="button" aria-disabled="true"> {{ trans('message.botones.download') }}</a>
        <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm glyphicon glyphicon-cloud-upload disabled" role="button" aria-disabled="true"> {{ trans('message.botones.upload') }}</a>
    </div>
@endsection

@section('link_css_datatable')
    <link href="{{ url ('/css_datatable/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url ('/css_datatable/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url ('/css_datatable/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url ('/css_datatable/buttons.dataTables.min.css') }}" rel="stylesheet">

@endsection

    
@section('main-content')

<div class="container-fluid">
    <div class="card">
        <div class="card-body">            
                <table class="table table-bordered users_all">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>{{ trans('message.datadatable_user.nombre') }}</th>
                                <th>Avatar</th>
                                <th>{{ trans('message.datadatable_user.mail') }}</th>
                                <th>{{ trans('message.datadatable_user.condicion') }}</th>
                                <th>{{ trans('message.datadatable_user.confirmo') }}</th>
                                <th>{{ trans('message.botones.edit') }}</th>
                                <th>{{ trans('message.botones.view') }}</th>
                                <th>{{ trans('message.botones.delete') }}</th>
                            </tr>
                        </thead>
                    <tbody>
                    </tbody>
                </table>
        </div>
    </div>
</div>
@endsection
@section('script_datatable')
<script src="{{ url ('/js_datatable/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ url ('/js_datatable/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ url ('/js_datatable/dataTables.responsive.min.js') }}" type="text/javascript"></script>
<script src="{{ url ('/js_datatable/responsive.bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ url ('/js_datatable/dataTables.buttons.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
  $(function () {
    
    var table = $('.users_all').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth : false,        
        ajax: "{{ route('users.list') }}",        
        columns: [             
            {
                data: 'id', name: 'id',
                "render": function ( data, type, row ) {                    
                    return '<div style="text-align:center;"><b>'+data+'</b></div>';
                }
            },
            {data: 'name', name: 'name'},
            {
                data: 'avatar',name: 'avatar',
                "render": function ( data, type, row ) {                    
                    return '<div style="text-align:center;"><img src="{{ url('storage/avatars/') }}/'+data+'" class="img-circle" alt="User Image" style="width:30px; height:30px;"></div>';
                }
            },
            {data: 'email', name: 'email'},
            {
                data: 'activo', name: 'activo',
                "render": function ( data, type, row ) {
                    if(data == 'DENY'){
                        return '<div style="text-align:center; color:red;"><b>'+data+'</b></div>';
                    }else{
                        return '<div style="text-align:center; color:green;"><b>'+data+'</b></div>';
                    }                    
                }
            },
            {
                data: 'confirmed_at', name: 'confirmed_at',
                "render": function ( data, type, row ) {
                    if(data == 'PENDIENTE'){
                        return '<div style="text-align:center; color:blue;"><b>'+data+'</b></div>';
                    }else{
                        return '<div style="text-align:center;">'+data+'</div>';
                    }                    
                }
            },
            {data: 'edit', name: 'edit', orderable: false, searchable: false},
            {data: 'view', name: 'view', orderable: false, searchable: false},
            {data: 'del', name: 'del', orderable: false, searchable: false},
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
@endsection  
