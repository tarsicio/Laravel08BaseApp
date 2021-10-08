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
    @component('components.boton_back',['ruta' => route('dashboard.dashboard') ])
        Botón de retorno
    @endcomponent   
</div>
    
@endsection

    
@section('main-content')

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="col-lg-12 col-xs-12">                
                {!! Form::open(array('route' => array('users.colorChange'),
                'method'=>'GET','id' => 'form_users_id','enctype' =>'multipart/form-data')) !!}
                <div class="form-group">
                <div class="col-lg-6 col-xs-6">                    
                        <div style="text-align:left;">
                            {!! Form::label('menu',trans('message.users_action.color_menu'), ['class' => 'control-label']) !!}
                            
                            {!! Form::color('menu_user',$colores['menu'],['class' => 'form-control','id' => 'menu_user', 'value' => $colores['menu']]) !!}
                        </div>                        
                        <div style="text-align:left;">
                            {!! Form::label('encabezado',trans('message.users_action.color_encabezado'), ['class' => 'control-label']) !!}
                            {!! Form::color('encabezado_user',$colores['encabezado'],['class' => 'form-control','id' => 'encabezado_user', 'value' => $colores['encabezado']]) !!}
                        </div>
                </div>        
                <hr>
                        {!! Form::submit(trans('message.users_action.cambiar_colores'),['class'=> 'form-control btn btn-primary','title' => trans('message.users_action.cambiar_colores'),'data-toggle' => 'tooltip','style' => 'background-color: #5333ed']) !!}                     
                </div>                
                {!!  Form::close() !!}
            </div>             
        </div>
    </div>
</div>
@endsection