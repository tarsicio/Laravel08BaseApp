@extends('adminlte::layouts.app')

@section('css_database')
    @include('adminlte::layouts.partials.link')
@endsection

@section('htmlheader_title')
    {{ trans('message.home_1') }}
@endsection

@section('contentheader_title')
    <h2 class="mb-4">{{ trans('message.menu_permiso') }}</h2>
@endsection

@section('link_css_datatable')
    <link href="{{ url ('/css_datatable/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url ('/css_datatable/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url ('/css_datatable/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url ('/css_datatable/buttons.dataTables.min.css') }}" rel="stylesheet">
@endsection
    
@section('main-content')
@if(Auth::user()->rols_id == 1)
<div class="container-fluid">
<div class="row">
    <div class="col-lg-12 col-xs-12">             
        <div class="card">
            <div class="card-body">                
                {!! Form::open(array('url'=>'/permisos/'.$rols_id,'method'=>'POST','id' => 'form_permiso_id')) !!}
                {!! Form::token(); !!}
                    <div class="form-group">
                        <div style="text-align:left;">
                            {!! Form::label('name',trans('message.permisos_rol.roles'), ['class' => 'control-label']) !!}
                        </div>                        
                        <div style="text-align:left;">
                        {!! Form::select('name', $roles, $rols_id, ['placeholder' => trans('message.permisos_rol.opcion'),'class' => 'form-control','id' => 'rols_id']) !!}                                            
                        </div>
                        <hr>
                        {!! Form::submit(trans('message.mensajes_alert.submit_01'),['class'=> 'form-control btn btn-primary']) !!}
                    </div>                
                {!!  Form::close() !!}                
            </div>
        </div>
    </div>
</div>
<div style="text-align:center">
    <label style="color:black;">{{ trans('message.permisos_rol.msg_rol') }}&nbsp;</label>
    <label id="nombre_rol" style="color:blue;">{{ $nombre_rol}}</label>  
</div>
<div class="card" id="mostar_ocultar_permisos">
    <div class="card-body">            
        <table class="table table-bordered permiso_all">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>{{ trans('message.datadatable_user.nombre') }}</th>                    
                    <th>{{ trans('message.datadatable_user.condicion') }}</th>                    
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
</div>
@else
  @php alert()->warning(trans('message.mensajes_alert.denegado'),trans('message.mensajes_alert.mensaje')); @endphp
@endif
@endsection

@section('script_datatable')
<script src="{{ url ('/js_permiso/control_roles.js') }}" type="text/javascript"></script>   
<script src="{{ url ('/js_datatable/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ url ('/js_datatable/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ url ('/js_datatable/dataTables.responsive.min.js') }}" type="text/javascript"></script>
<script src="{{ url ('/js_datatable/responsive.bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ url ('/js_datatable/dataTables.buttons.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
  $(function () {
    
    var table = $('.permiso_all').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth : false,        
        ajax: "{{ route('permisos.list') }}",        
        columns: [             
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},            
            {data: 'activo', name: 'activo'},
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

