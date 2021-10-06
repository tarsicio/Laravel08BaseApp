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
    @component('components.boton_back',['ruta' => route('modulos.index') ])
        Botón de retorno
    @endcomponent   
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
                {!! Form::open(array('route' => array('modulos.store'),
                'method'=>'POST','id' => 'form_rols_id','enctype' =>'multipart/form-data')) !!}
                <div class="form-group">                
                <div class="col-lg-6 col-xs-6">                    
                    <div style="text-align:left;">
                        {!! Form::label('name',trans('message.modulo_action.nombre'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                        {!! Form::text('name',old('name'),['placeholder' => trans('message.modulo_action.nombre'),'class' => 'form-control','id' => 'name_rol']) !!}
                    </div>
                    <div style="text-align:left;">
                        {!! Form::label('description',trans('message.modulo_action.description'), ['class' => 'control-label']) !!}<span class="required" style="color:red;">*</span>
                        {!! Form::text('description',old('description'),['placeholder' => trans('message.modulo_action.description'),'class' => 'form-control','id' => 'name_description']) !!}
                    </div>                            
                </div>        
                <hr>
                        {!! Form::submit(trans('message.modulo_action.new_modulo'),['class'=> 'form-control btn btn-primary','title' => trans('message.modulo_action.new_modulo'),'data-toggle' => 'tooltip','style' => 'background-color: #5333ed']) !!}                     
                </div>      
                {!!  Form::close() !!}
            </div>             
        </div>
    </div>
</div>
@endsection