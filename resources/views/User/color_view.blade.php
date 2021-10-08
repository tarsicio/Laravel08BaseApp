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
    @component('components.boton_back',['ruta' => route('dashboard.dashboard'),'color' => $array_color['back_button_color']])
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
                            {!! Form::label('inicio','COLORS DEFAULT / COLORES PREDETERMINADO', ['class' => 'control-label']) !!}
                            {!! Form::radio('dafault_color_01','YES') !!} YES
                            {!! Form::radio('dafault_color_01','NO',true) !!} NO
                        </div>
                        <div style="text-align:left;">
                            {!! Form::label('menu',trans('message.users_action.color_menu'), ['class' => 'control-label']) !!}
                            {!! Form::color('menu_user',$array_color['menu_color'],['class' => 'form-control','id' => 'menu_user', 'value' => $array_color['menu_color']]) !!}
                        </div>                        
                        <div style="text-align:left;">
                            {!! Form::label('encabezado',trans('message.users_action.color_encabezado'), ['class' => 'control-label']) !!}
                            {!! Form::color('encabezado_user',$array_color['encabezado_color'],['class' => 'form-control','id' => 'encabezado_user', 'value' => $array_color['encabezado_color']]) !!}
                        </div>
                        <div style="text-align:left;">
                            {!! Form::label('group','GROUP BUTTON / GRUPO DE BOTONES', ['class' => 'control-label']) !!}
                            {!! Form::color('group_button',$array_color['group_button_color'],['class' => 'form-control','id' => 'group_button', 'value' => $array_color['group_button_color']]) !!}
                        </div>
                        <div style="text-align:left;">
                            {!! Form::label('back','BACK / RETORNAR', ['class' => 'control-label']) !!}
                            {!! Form::color('back_button',$array_color['back_button_color'],['class' => 'form-control','id' => 'back_button', 'value' => $array_color['back_button_color']]) !!}
                        </div>                        
                </div>        
                <hr>
                        {!! Form::submit(trans('message.users_action.cambiar_colores'),['class'=> 'form-control btn btn-primary','title' => trans('message.users_action.cambiar_colores'),'data-toggle' => 'tooltip','style' => 'background-color:'.$array_color['group_button_color'].';']) !!}                     
                </div>                
                {!!  Form::close() !!}
            </div>             
        </div>
    </div>
</div>
@endsection