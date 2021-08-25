@extends('adminlte::layouts.app')

@section('css_database')
    @include('adminlte::layouts.partials.link')
@endsection

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('contentheader_title')
    <h2 class="mb-4">{{ trans('message.menu_permiso') }}</h2>
@endsection

@section('main-content')
@if(!empty($roles) && !empty($permisos))
<div class="container-fluid">
<div class="row">
    <div class="col-lg-12 col-xs-12">             
        <div class="card">
            <div class="card-body">            
                {!! Form::open(['route' => 'permisos.store','method' => 'post']) !!}
                    <div class="form-group">
                        <div style="text-align:left;">
                            {!! Form::label('name', 'ROLES DISPONIBLES', ['class' => 'control-label']) !!}
                        </div>
                        {!! Form::token() !!}
                        <div style="text-align:left;">
                        {!! Form::select('name', $roles, null, ['placeholder' => 'Escoja una Opción','class' => 'form-control','id' => 'rols_id']) !!}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<div style="text-align:center">
    <label style="color:black;">PERMISOS DEL ROL&nbsp;</label><label id="nombre_rol" style="color:blue;">{{ $nombre_rol}}</label>  
</div>
<section class="content">
    <div class="row">
        <div class="col-md-12">
        </div>
        <div class="col-md-12 text-right" style="padding-bottom: 10px;">
        </div>
    </div>
            
    <div class="row">
        @php //dd($permisos); @endphp
        @foreach($permisos as $permiso)
        <div class="col-lg-3 col-md-4 col-xs-12">
            <li>
            <a data-toggle="collapse" data-parent="#{{$permiso->name}}" href="#{{$permiso->name}}">
                <i class="fa fa-square"></i>{{strtoupper($permiso->name)}}
            </a>
            <ul class="list-inline panel-collapse collapse" id="{{$permiso->name}}" style="margin-left: 25px;">         
             <div class="card">
                @switch($permiso->name)
                    @case('user')
                        <div class="small-box bg-blue card-body">
                        @break
                    @case('notification')
                        <div class="small-box bg-red card-body">
                        @break
                    @case('modulo')
                        <div class="small-box bg-green card-body">
                        @break
                    @case('permiso')
                        <div class="small-box bg-yellow card-body">
                        @break
                    @case('rol')
                        <div class="small-box bg-blue card-body">
                        @break
                @endswitch
              <!--   <div class="small-box bg-blue card-body">  -->
                     <div class="inner">
                        {!! Form::open(['route' => 'permisos.store','method' => 'post']) !!}
                          <h4>{!! Form::label('permiso', strtoupper($permiso->name), ['class' => 'control-label']) !!}</h4>
                            {!! Form::token() !!}
                            <input type="hidden" id="{{$permiso->id}}" name="permiso_delete_id" value="{{$permiso->id}}">
                            <input type="hidden" id="{{$permiso->id}}" name="permiso_delete" value="{{$permiso->id}}">
                            <div class="form-group form-inline">
                            <label for="{{$permiso->name}}" style="color:black;">DELETE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                           {!! Form::select('delete', ['ALLOW' => 'ALLOW', 'DENY' => 'DENY'], $permiso->delete,['class' => 'form-control', 'id' => 'delete_'.$permiso->name.'_'.$permiso->id]) !!}
                            </div>
                            <div class="form-group form-inline">
                            <label for="{{$permiso->name}}" style="color:black;">UPDATE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                           {!! Form::select('update', ['ALLOW' => 'ALLOW', 'DENY' => 'DENY'], $permiso->update,['class' => 'form-control', 'id' => 'update_'.$permiso->name.'_'.$permiso->id]) !!}
                            </div>                            
                            <div class="form-group form-inline">
                            <label for="{{$permiso->name}}" style="color:black;">EDIT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                           {!! Form::select('edit', ['ALLOW' => 'ALLOW', 'DENY' => 'DENY'], $permiso->edit,['class' => 'form-control', 'id' => 'edit_'.$permiso->name.'_'.$permiso->id]) !!}
                            </div>
                            <div class="form-group form-inline">
                            <label for="{{$permiso->name}}" style="color:black;">CREATE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                           {!! Form::select('add', ['ALLOW' => 'ALLOW', 'DENY' => 'DENY'], $permiso->add,['class' => 'form-control', 'id' => 'add_'.$permiso->name.'_'.$permiso->id]) !!}
                           </div>
                           <div class="form-group form-inline">
                            <label for="{{$permiso->name}}" style="color:black;">VIEW&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> 
                           {!! Form::select('view', ['ALLOW' => 'ALLOW', 'DENY' => 'DENY'], $permiso->view,['class' => 'form-control', 'id' => 'view_'.$permiso->name.'_'.$permiso->id]) !!}
                            </div>
                            <div class="form-group form-inline">
                            <label for="{{$permiso->name}}" style="color:black;">PRINT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                           {!! Form::select('print', ['ALLOW' => 'ALLOW', 'DENY' => 'DENY'], $permiso->print,['class' => 'form-control', 'id' => 'print_'.$permiso->name.'_'.$permiso->id]) !!}
                            </div>
                            <div class="form-group form-inline">
                            <label for="{{$permiso->name}}" style="color:black;">DOWNLOAD&nbsp;&nbsp;</label>
                           {!! Form::select('download', ['ALLOW' => 'ALLOW', 'DENY' => 'DENY'], $permiso->download,['class' => 'form-control', 'id' => 'download_'.$permiso->name.'_'.$permiso->id]) !!}
                            </div>
                            <div class="form-group form-inline">
                            <label for="{{$permiso->name}}" style="color:black;">UPLOAD&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                           {!! Form::select('upload', ['ALLOW' => 'ALLOW', 'DENY' => 'DENY'], $permiso->upload,['class' => 'form-control', 'id' => 'upload_'.$permiso->name.'_'.$permiso->id]) !!}
                            </div>
                           {!! Form::close() !!}
                     </div>
                     <div class="icon">
                        <i class="fa fa-folder-open fa-fw"></i>
                      </div>
                        <div class="small-box-footer">
                            {!! Form::label('permiso', strtoupper($permiso->name), ['class' => 'control-label']) !!}<i class="fa fa-arrow-circle-right"></i>
                        </div>
                </div>
            </div> 
            </ul>
            </li>  
        </div>        
        @endforeach
        <!-- ./col -->
    </div> <!-- FIN DEL ROW PERMISOS-->    
</section>
</div>
@else
  @php alert()->warning('Acceso Denegado','Debe ser ROOT, para tener acceso a los permisos'); @endphp
@endif
@endsection
@section('script_especiales')
    <script src="{{ url ('/js_permiso/permiso.js') }}" type="text/javascript"></script>
@endsection

