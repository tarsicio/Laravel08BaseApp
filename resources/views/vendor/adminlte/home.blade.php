@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection

@section('contentheader_title')
    <h2 class="mb-4">{{ trans('message.dashboard') }}</h2> 
@endsection

@section('main-content')

<div class="row">        
    <div class="col-lg-4 col-md-6 col-xs-12">            
		<x-box titulo="Total Usuarios" cantidad="3" name="usuarios" color="bg-yellow"></x-box>		
	</div>
	<div class="col-lg-4 col-md-6 col-xs-12">            		
		<x-box titulo="Total Roles" cantidad="8" name="roles" ></x-box>
	</div>
	<div class="col-lg-4 col-md-6 col-xs-12">            		
		<x-box titulo="Total Bloqueados" cantidad="4" name="bloqueados" color="bg-red"></x-box>
	</div>
</div>
	<!--  CANVAS de las Metricas Para User, Rol y Notificaciones, para View-->
        <div class="row justify-content-center">
          <div class="col-sm-12 align-self-center">
            <div class="row">
              <div class="col-lg-6">
                <div class="panel panel-default">
                  <div class="panel-heading"><b>@lang('message.count_users_rol')</b></div>
                  <div class="panel-body" id="contenedor_01">
                    <canvas style="width: 684px; height: 400px;" id="countUserRol"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="panel panel-default">
                  <div class="panel-heading"><b>@lang('message.countUsersNotifications')</b></div>
                  <div class="panel-body" id="contenedor_02">
                    <canvas style="width: 684px; height: 400px;" id="notificationsUser"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr/>
@endsection

@section('script_Chart')
<script src="{{ url ('/js_Chart/Chart.min.js') }}" type="text/javascript"></script>
<script src="{{ url ('/js_dashboard/graficos_dashboard.js') }}" type="text/javascript"></script>
@endsection
