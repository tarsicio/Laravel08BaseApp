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
                            {!! Form::label('name',trans('message.permisos_rol.roles'), ['class' => 'control-label']) !!}
                        </div>
                        {!! Form::token() !!}
                        <div style="text-align:left;">
                        {!! Form::select('name', $roles, null, ['placeholder' => trans('message.permisos_rol.opcion'),'class' => 'form-control','id' => 'rols_id']) !!}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<div style="text-align:center">
    <label style="color:black;">{{ trans('message.permisos_rol.msg_rol') }}&nbsp;</label><label id="nombre_rol" style="color:blue;">{{ $nombre_rol}}</label>  
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
        <div class="col-lg-4 col-md-4 col-xs-12">
            <li>
            <a data-toggle="collapse" data-parent="#{{$permiso->name}}" href="#{{$permiso->name}}">
                <i class="fa fa-square"></i>{{strtoupper($permiso->name)}}
            </a>
            <ul class="list-inline panel-collapse collapse" id="{{$permiso->name}}" style="margin-left: 25px;">         
             <div class="card">
                @switch($permiso->name)
                    @case('user')
                        <div class="small-box bg-yellow card-body">
                        @break
                    @case('notification')
                        <div class="small-box bg-blue card-body">
                        @break
                    @case('modulo')
                        <div class="small-box bg-red card-body">
                        @break
                    @case('permiso')
                        <div class="small-box bg-green card-body">
                        @break
                    @case('rol')
                        <div class="small-box bg-blue card-body">
                        @break
                @endswitch
              <!--   <div class="small-box bg-blue card-body">  -->
                     <div class="inner">
                          <h4>{!! Form::label('permiso', strtoupper($permiso->name), ['class' => 'control-label']) !!}</h4>
                          {!! Form::open(['route' => 'permisos.store','method' => 'post']) !!}
                            <input type="hidden" id="{{$permiso->id}}" name="permiso_delete_id" value="{{$permiso->id}}">
                            <input type="hidden" id="{{$permiso->id}}" name="permiso_delete" value="{{$permiso->id}}">
                            
                            <div class="form-group form-inline" style="text-align:center; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-left-style: solid;">
                                <ul>
                                    <li style="color:black;"><b>DELETE</b></li>
                                        <li style="color:black;">{{ Form::label('ALLOW', 'ALLOW')}}&nbsp;{{Form::radio('delete', 'ALLOW', ($permiso->delete == 'ALLOW') ? true : false,['class' => 'delete_allow_'.$permiso->name, 'id' => 'delete_allow_'.$permiso->id.'_'.$permiso->modulos_id.'_'.$permiso->rols_id] )}}&nbsp;
                                        {{ Form::label('DENY', 'DENY')}}&nbsp;{{Form::radio('delete', 'DENY', ($permiso->delete == 'DENY') ? true : false,['class' => 'delete_deny_'.$permiso->name, 'id' => 'delete_deny_'.$permiso->id.'_'.$permiso->modulos_id.'_'.$permiso->rols_id] )}}
                                    </li>
                                </ul>
                            </div>
                            {!! Form::close() !!}
                            {!! Form::open(['route' => 'permisos.store','method' => 'post']) !!}
                            <div class="form-group form-inline" style="text-align:center; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-left-style: solid;">
                                <ul>
                                    <li style="color:black;"><b>UPDATE</b></li>
                                        <li style="color:black;">{{ Form::label('ALLOW', 'ALLOW')}}&nbsp;{{Form::radio('update', 'ALLOW', ($permiso->update == 'ALLOW') ? true : false,['class' => 'update_allow_'.$permiso->name, 'id' => 'update_allow_'.$permiso->id.'_'.$permiso->modulos_id.'_'.$permiso->rols_id] )}}&nbsp;
                                        {{ Form::label('DENY', 'DENY')}}&nbsp;{{Form::radio('update', 'DENY', ($permiso->update == 'DENY') ? true : false,['class' => 'update_deny_'.$permiso->name, 'id' => 'update_deny_'.$permiso->id.'_'.$permiso->modulos_id.'_'.$permiso->rols_id] )}}
                                    </li>
                                </ul>
                            </div>
                            {!! Form::close() !!}
                            {!! Form::open(['route' => 'permisos.store','method' => 'post']) !!}
                            
                            <div class="form-group form-inline" style="text-align:center; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-left-style: solid;">
                                <ul>
                                    <li style="color:black;"><b>EDIT</b></li>
                                        <li style="color:black;">{{ Form::label('ALLOW', 'ALLOW')}}&nbsp;{{Form::radio('edit', 'ALLOW', ($permiso->edit == 'ALLOW') ? true : false,['class' => 'edit_allow_'.$permiso->name, 'id' => 'edit_allow_'.$permiso->id.'_'.$permiso->modulos_id.'_'.$permiso->rols_id] )}}&nbsp;
                                        {{ Form::label('DENY', 'DENY')}}&nbsp;{{Form::radio('edit', 'DENY', ($permiso->edit == 'DENY') ? true : false,['class' => 'edit_deny_'.$permiso->name, 'id' => 'edit_deny_'.$permiso->id.'_'.$permiso->modulos_id.'_'.$permiso->rols_id] )}}
                                    </li>
                                </ul>
                            </div>
                           {!! Form::close() !!}
                            {!! Form::open(['route' => 'permisos.store','method' => 'post']) !!}
                           <div class="form-group form-inline" style="text-align:center; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-left-style: solid;">
                                <ul>
                                    <li style="color:black;"><b>CREATE</b></li>
                                        <li style="color:black;">{{ Form::label('ALLOW', 'ALLOW')}}&nbsp;{{Form::radio('add', 'ALLOW', ($permiso->add == 'ALLOW') ? true : false,['class' => 'add_allow_'.$permiso->name, 'id' => 'add_allow_'.$permiso->id.'_'.$permiso->modulos_id.'_'.$permiso->rols_id] )}}&nbsp;
                                        {{ Form::label('DENY', 'DENY')}}&nbsp;{{Form::radio('add', 'DENY', ($permiso->add == 'DENY') ? true : false,['class' => 'add_deny_'.$permiso->name, 'id' => 'add_deny_'.$permiso->id.'_'.$permiso->modulos_id.'_'.$permiso->rols_id] )}}
                                    </li>
                                </ul>
                            </div>
                            {!! Form::close() !!}
                            {!! Form::open(['route' => 'permisos.store','method' => 'post']) !!}
                            <div class="form-group form-inline" style="text-align:center; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-left-style: solid;">
                                <ul>
                                    <li style="color:black;"><b>VIEW</b></li>
                                        <li style="color:black;">{{ Form::label('ALLOW', 'ALLOW')}}&nbsp;{{Form::radio('view', 'ALLOW', ($permiso->view == 'ALLOW') ? true : false,['class' => 'view_allow_'.$permiso->name, 'id' => 'view_allow_'.$permiso->id.'_'.$permiso->modulos_id.'_'.$permiso->rols_id] )}}&nbsp;
                                        {{ Form::label('DENY', 'DENY')}}&nbsp;{{Form::radio('view', 'DENY', ($permiso->view == 'DENY') ? true : false,['class' => 'view_deny_'.$permiso->name, 'id' => 'view_deny_'.$permiso->id.'_'.$permiso->modulos_id.'_'.$permiso->rols_id] )}}
                                    </li>
                                </ul>
                            </div>
                            {!! Form::close() !!}
                            {!! Form::open(['route' => 'permisos.store','method' => 'post']) !!}
                            <div class="form-group form-inline" style="text-align:center; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-left-style: solid;">
                                <ul>
                                    <li style="color:black;"><b>PRINT</b></li>
                                        <li style="color:black;">{{ Form::label('ALLOW', 'ALLOW')}}&nbsp;{{Form::radio('print', 'ALLOW', ($permiso->print == 'ALLOW') ? true : false,['class' => 'print_allow_'.$permiso->name, 'id' => 'print_allow_'.$permiso->id.'_'.$permiso->modulos_id.'_'.$permiso->rols_id] )}}&nbsp;
                                        {{ Form::label('DENY', 'DENY')}}&nbsp;{{Form::radio('print', 'DENY', ($permiso->print == 'DENY') ? true : false,['class' => 'print_deny_'.$permiso->name, 'id' => 'print_deny_'.$permiso->id.'_'.$permiso->modulos_id.'_'.$permiso->rols_id] )}}
                                    </li>
                                </ul>
                            </div>
                            {!! Form::close() !!}
                            {!! Form::open(['route' => 'permisos.store','method' => 'post']) !!}
                            <div class="form-group form-inline" style="text-align:center; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-left-style: solid;">
                                <ul>
                                    <li style="color:black;"><b>DOWNLOAD</b></li>
                                        <li style="color:black;">{{ Form::label('ALLOW', 'ALLOW')}}&nbsp;{{Form::radio('download', 'ALLOW', ($permiso->download == 'ALLOW') ? true : false,['class' => 'download_allow_'.$permiso->name, 'id' => 'download_allow_'.$permiso->id.'_'.$permiso->modulos_id.'_'.$permiso->rols_id] )}}&nbsp;
                                        {{ Form::label('DENY', 'DENY')}}&nbsp;{{Form::radio('download', 'DENY', ($permiso->download == 'DENY') ? true : false,['class' => 'download_deny_'.$permiso->name, 'id' => 'download_deny_'.$permiso->id.'_'.$permiso->modulos_id.'_'.$permiso->rols_id] )}}
                                    </li>
                                </ul>
                            </div>
                            {!! Form::close() !!}
                            {!! Form::open(['route' => 'permisos.store','method' => 'post']) !!}

                            <div class="form-group form-inline" style="text-align:center; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-left-style: solid;">
                                <ul>
                                    <li style="color:black;"><b>UPLOAD</b></li>
                                        <li style="color:black;">{{ Form::label('ALLOW', 'ALLOW')}}&nbsp;{{Form::radio('upload', 'ALLOW', ($permiso->upload == 'ALLOW') ? true : false,['class' => 'upload_allow_'.$permiso->name, 'id' => 'upload_allow_'.$permiso->id.'_'.$permiso->modulos_id.'_'.$permiso->rols_id] )}}&nbsp;
                                        {{ Form::label('DENY', 'DENY')}}&nbsp;{{Form::radio('upload', 'DENY', ($permiso->upload == 'DENY') ? true : false,['class' => 'upload_deny_'.$permiso->name, 'id' => 'upload_deny_'.$permiso->id.'_'.$permiso->modulos_id.'_'.$permiso->rols_id] )}}
                                    </li>
                                </ul>
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
    <script src="{{ url ('/js_permiso/permiso_user.js') }}" type="text/javascript"></script>
@endsection

