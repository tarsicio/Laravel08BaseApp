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
                        {!! Form::submit(trans('message.mensajes_alert.submit_01'),['class'=> 'form-control btn btn-primary','title' => trans('message.tooltip.procesa_rol'),'data-toggle' => 'tooltip']) !!}
                    </div>                
                {!!  Form::close() !!}                
            </div>
        </div>
    </div>
</div>
<div style="text-align:center">    
    <label style="color:black;">{{ trans('message.permisos_rol.msg_rol') }}&nbsp;</label>
    <label id="nombre_rol" name="{{$rols_id}}" style="color:blue;">{{ $nombre_rol}}</label>  
</div>
<div class="card" id="mostar_ocultar_permisos">
    <div class="card-body">            
        <table class="table table-bordered permiso_all">
            <thead>
                <tr>
                    <th style="text-align:center;">ID</th>
                    <th>{{ trans('message.datadatable_user.nombre') }}</th>                    
                    <th style="text-align:center;">{{ trans('message.description') }}</th>
                    <th style="text-align:center;">{{ trans('message.botones.edit') }}</th>
                    <th style="text-align:center;">{{ trans('message.botones.view') }}</th>                    
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

<!-- VENTANA MODAL PARA VER LOS PERMISOS ASIGNADO A UN ROL - MODULO (SOLO LECTURA) -->

<div class="modal fade" id="view_permisos">
  <div class="modal-dialog modal-lg modal-dialog-centered" style="width: 70% !important;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span>[x]</span>
        </button>
        <div class="row">
          <div class="col-md-12">
            
          </div>
        </div>
      </div>
      <div>
        <h4 style="text-align:center;" id="title_permiso">Visualizar permisos del Rol ROOT</h4>
        
      </div>
      <div class="modal-body">
        <div class="row">
          <div id="mostrar_permisos_modulo_rol" class="col-md-12">
            <!-- NO BORRAR AQU SE PRESENTAN LOS DATOS DE LOS PERMISO SOLICITADOS -->
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="close" data-dismiss="modal">
          <span>CLOSE</span>
        </button>
      </div>
    </div>
  </div>
</div>

<!-- VENTANA MODAL PARA EDITAR LOS PERMISOS ASIGNADO A UN ROL - MODULO (UPDATE PERMISOS DENY OR ALLOW) -->

<div class="modal fade" id="edit_permisos">
  <div class="modal-dialog modal-lg modal-dialog-centered" style="width: 70% !important;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span>[x]</span>
        </button>
        <div class="row">
          <div class="col-md-12">
            
          </div>
        </div>
      </div>
      <div>
        <h4 style="text-align:center;" id="title_permiso">EDITAR permisos del Rol ROOT</h4>        
      </div>
      <div class="modal-body">
        <div class="row">
          <div id="mostrar_permisos_modulo_rol_update" class="col-md-12">
            <!-- NO BORRAR AQU SE PRESENTAN LOS DATOS DE LOS PERMISO SOLICITADOS A MODIFICAR -->
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="close" data-dismiss="modal">
          <span>CLOSE</span>
        </button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script_datatable')
<script src="{{ url ('/js_permiso/control_roles.js') }}" type="text/javascript"></script>
<script src="{{ url ('/js_datatable/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ url ('/js_datatable/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ url ('/js_datatable/dataTables.responsive.min.js') }}" type="text/javascript"></script>
<script src="{{ url ('/js_datatable/responsive.bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ url ('/js_datatable/dataTables.buttons.min.js') }}" type="text/javascript"></script>
<script src="{{ url ('/js_permiso/view_permisos.js') }}" type="text/javascript"></script>   
<script src="{{ url ('/js_permiso/update_permisos.js') }}" type="text/javascript"></script>   
<script type="text/javascript">
  $(function () {
    
    var table = $('.permiso_all').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth : false,        
        ajax: "{{ route('permisos.list') }}",        
        columns: [             
            {
                data: 'id', name: 'id',
                "render": function ( data, type, row ) {                    
                    return '<div style="text-align:center;"><b>'+data+'</b></div>';
                }
            },
            {data: 'name', name: 'name'},            
            {data: 'description', name: 'description'},
            {
                data: 'edit', name: 'edit', orderable: false, searchable: false,
                "render": function ( data, type, row ) {                    
                    return '<div style="text-align:center;">'+data+'</div>';
                }
            },
            {
                data: 'view', name: 'view', orderable: false, searchable: false,                
                "render": function ( data, type, row ) {                    
                    return '<div style="text-align:center;">'+data+'</div>';
                }
            },
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

