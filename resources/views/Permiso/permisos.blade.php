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
                        {!! Form::select('name', $roles, null, ['placeholder' => 'Escoja una Opción','class' => 'form-control']) !!}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="row">
        <div class="col-md-12">
        </div>
        <div class="col-md-12 text-right" style="padding-bottom: 10px;">
        </div>
    </div>
            
    <div class="row">
        @foreach($permisos as $permiso)
        <div class="col-lg-12 col-xs-12">         
             <div class="card">
                <div class="small-box bg-green card-body">
                     <div class="inner">
                        {!! Form::open(['route' => 'permisos.store','method' => 'post']) !!}
                          <h3>{!! Form::label('permiso', strtoupper($permiso->name), ['class' => 'control-label']) !!}</h3>
                            {!! Form::token() !!}
                            <input type="hidden" id="{{$permiso->id}}" name="permiso_delete_id" value="{{$permiso->id}}">
                            <input type="hidden" id="{{$permiso->id}}" name="permiso_delete" value="{{$permiso->id}}">
                           <p style="color:black;">DELETE: {!! Form::select('delete', ['ALLOW' => 'ALLOW', 'DENY' => 'DENY'], $permiso->delete) !!}</p>
                           <p style="color:black;">UPDATE: {!! Form::select('update', ['ALLOW' => 'ALLOW', 'DENY' => 'DENY'], $permiso->update) !!}</p>
                           <p style="color:black;">EDIT: {!! Form::select('edit', ['ALLOW' => 'ALLOW', 'DENY' => 'DENY'], $permiso->edit) !!}</p>
                           <p style="color:black;">CREATE: {!! Form::select('add', ['ALLOW' => 'ALLOW', 'DENY' => 'DENY'], $permiso->add) !!}</p>
                           <p style="color:black;">VIEW: {!! Form::select('view', ['ALLOW' => 'ALLOW', 'DENY' => 'DENY'], $permiso->view) !!}</p>
                           <p style="color:black;">PRINT: {!! Form::select('print', ['ALLOW' => 'ALLOW', 'DENY' => 'DENY'], $permiso->print) !!}</p>
                           <p style="color:black;">DOWNLOAD: {!! Form::select('download', ['ALLOW' => 'ALLOW', 'DENY' => 'DENY'], $permiso->download) !!}</p>
                           <p style="color:black;">UPLOAD: {!! Form::select('upload', ['ALLOW' => 'ALLOW', 'DENY' => 'DENY'], $permiso->upload) !!}</p>
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

