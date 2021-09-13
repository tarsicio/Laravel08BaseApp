@extends('adminlte::layouts.app')

@section('css_database')
    @include('adminlte::layouts.partials.link')
@endsection

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('contentheader_title')
<div>
    <h2 class="mb-4">{{ $titulo_modulo}}</h2>
</div>
    
@endsection

    
@section('main-content')

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="col-lg-12 col-xs-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                    <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                    </ul>
                    </div>
                @endif
                {!! Form::open(array('route' => array('users.store'),
                'method'=>'POST','id' => 'form_users_id','enctype' =>'multipart/form-data')) !!}
                <div class="form-group">
                <div style="float: right;">
                    {!! Form::label('avatar',trans('message.users_action.avatar_user'), ['class' => 'control-label']) !!}
                    {!! Form::file('avatar',['class' => 'form-control','id' => 'avatar_user','name' => 'avatar']) !!}
                </div>
                <div class="col-lg-6 col-xs-6">                    
                        <div style="text-align:left;">
                            {!! Form::label('name',trans('message.users_action.nombre'), ['class' => 'control-label']) !!}
                             {!! Form::text('name',old('name'),['placeholder' => trans('message.users_action.nombre'),'class' => 'form-control','id' => 'name_user']) !!}
                        </div>                        
                        <div style="text-align:left;">
                            {!! Form::label('email',trans('message.users_action.email_user'), ['class' => 'control-label']) !!}
                            {!! Form::email('email',old('email'),['placeholder' => trans('message.users_action.mail_ejemplo'),'class' => 'form-control','id' => 'email_user']) !!}
                        </div>
                        <div style="text-align:left;">
                            {!! Form::label('password',trans('message.users_action.password'), ['class' => 'control-label']) !!}
                            {!! Form::password('password',['placeholder' => trans('message.users_action.password_ejemplo'),'class' => 'form-control','id' => 'password_user']) !!}
                        </div>
                        <div style="text-align:left;">
                            {!! Form::label('activo',trans('message.users_action.activo'), ['class' => 'control-label']) !!}
                            {!! Form::select('activo',['DENY' => 'DENY'],'DENY',['class' => 'form-control','id' => 'activo_user']) !!}
                        </div>
                        <div style="text-align:left;">
                            {!! Form::label('rols_id',trans('message.permisos_rol.roles'), ['class' => 'control-label']) !!}
                            {!! Form::select('rols_id', $roles, old('rols_id'), ['placeholder' => trans('message.permisos_rol.opcion'),'class' => 'form-control','id' => 'rols_id']) !!}
                        </div>
                        <div style="text-align:left;">
                            {!! Form::label('init_day',trans('message.users_action.fecha_inicio'), ['class' => 'control-label']) !!}
                            {!! Form::date('init_day',null,['class' => 'form-control','id' => 'init_day']) !!}
                        </div>
                        <div style="text-align:left;">
                            {!! Form::label('end_day',trans('message.users_action.fecha_fin'), ['class' => 'control-label']) !!}
                            {!! Form::date('end_day',null,['class' => 'form-control','id' => 'end_day']) !!}
                        </div>                        
                </div>        
                <hr>
                        {!! Form::submit(trans('message.users_action.new_user'),['class'=> 'form-control btn btn-primary','title' => trans('message.users_action.new_user'),'data-toggle' => 'tooltip']) !!} 
                </div>      
                {!!  Form::close() !!}
            </div>             
        </div>
    </div>
</div>
@endsection