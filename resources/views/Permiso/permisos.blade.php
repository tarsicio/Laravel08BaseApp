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
<div class="container-fluid">    
    <div class="card">
        <div class="card-body">            
            {!! Form::open(['route' => 'permisos.store','method' => 'post']) !!}
                <div class="form-group" style="width:300px;">
                    <div style="text-align:left;">
                        {!! Form::label('name', 'Roles Disponible', ['class' => 'control-label']) !!}
                    </div>
                    {!! Form::token() !!}
                    <div style="text-align:left;">
                    {!! Form::select('name', $roles, null, ['placeholder' => 'Escoja una Opción','class' => 'form-control']) !!}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
        <div class="row justify-content-center" style="text-align:center;">
            <div class="row">
                @foreach($permisos as $permiso)  
                @php //dd($permiso);  @endphp               
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">                             
                        <!-- INICIO DEL PERMISO DELETE -->                        
                            {!! Form::open(['route' => 'permisos.store','method' => 'post']) !!}
                            <div class="form-group" style="width:300px;">
                                <div style="text-align:center;">
                                {!! Form::label('permiso', 'Permisos de '.strtoupper($permiso->name), ['class' => 'control-label']) !!}
                                </div>
                                    {!! Form::token() !!}
                                    <input type="hidden" id="{{$permiso->id}}" name="permiso_delete_id" value="{{$permiso->id}}">
                                    <input type="hidden" id="{{$permiso->id}}" name="permiso_delete" value="{{$permiso->id}}">                                                                    
                                    @if($permiso->delete == 'ALLOW')
                                        @php $letra = 'A'; @endphp
                                    @else 
                                        @php $letra = 'D'; @endphp
                                    @endif    
                                <div style="float:left; width:150px;">
                                    DELETE
                                </div>
                                <div style="float:left; width:150px; height: 25px;">
                                    {!! Form::select('delete', ['A' => 'ALLOW', 'D' => 'DENY'], $letra) !!}
                                </div>                                
                            </div>
                            {!! Form::close() !!}                        
                            <!-- FIN DEL PERMISO DELETE --> 
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- INICIO DEL PERMISO UPDATE -->
                            {!! Form::open(['route' => 'permisos.store','method' => 'post']) !!}
                            <div class="form-group" style="width:300px;">                                
                                    {!! Form::token() !!}
                                    <input type="hidden" id="{{$permiso->id}}" name="permiso_update_id" value="{{$permiso->id}}">
                                    <input type="hidden" id="{{$permiso->id}}" name="permiso_update" value="{{$permiso->id}}">                                                                    
                                    @if($permiso->update == 'ALLOW')
                                        @php $letra = 'A'; @endphp
                                    @else 
                                        @php $letra = 'D'; @endphp
                                    @endif
                                    <div style="float:left; width:150px;">
                                        UPDATE
                                    </div>
                                    <div style="float:left; width:150px; height: 25px;">
                                        {!! Form::select('update', ['A' => 'ALLOW', 'D' => 'DENY'], $letra) !!}
                                    </div>                                
                            </div>
                            {!! Form::close() !!}
                            <!-- FIN DEL PERMISO UPDATE -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- INICIO DEL PERMISO EDIT -->
                            {!! Form::open(['route' => 'permisos.store','method' => 'post']) !!}
                            <div class="form-group" style="width:300px;">                                
                                    {!! Form::token() !!}
                                    <input type="hidden" id="{{$permiso->id}}" name="permiso_edit_id" value="{{$permiso->id}}">
                                    <input type="hidden" id="{{$permiso->id}}" name="permiso_edit" value="{{$permiso->id}}">
                                    @if($permiso->edit == 'ALLOW')
                                        @php $letra = 'A'; @endphp
                                    @else 
                                        @php $letra = 'D'; @endphp
                                    @endif
                                    <div style="float:left; width:150px;">    
                                        EDIT
                                    </div>
                                    <div style="float:left; width:150px; height: 25px;">
                                        {!! Form::select('edit', ['A' => 'ALLOW', 'D' => 'DENY'], $letra) !!}
                                    </div>
                            </div>
                            {!! Form::close() !!}
                            <!-- FIN DEL PERMISO EDIT -->    
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- INICIO DEL PERMISO ADD -->
                            {!! Form::open(['route' => 'permisos.store','method' => 'post']) !!}
                            <div class="form-group" style="width:300px;">                                
                                    {!! Form::token() !!}
                                    <input type="hidden" id="{{$permiso->id}}" name="permiso_add_id" value="{{$permiso->id}}">
                                    <input type="hidden" id="{{$permiso->id}}" name="permiso_add" value="{{$permiso->id}}">
                                    @if($permiso->add == 'ALLOW')
                                        @php $letra = 'A'; @endphp
                                    @else 
                                        @php $letra = 'D'; @endphp
                                    @endif
                                    <div style="float:left; width:150px;">   
                                        CREATE
                                    </div>
                                    <div style="float:left; width:150px; height: 25px;">
                                         {!! Form::select('add', ['A' => 'ALLOW', 'D' => 'DENY'], $letra) !!}
                                     </div>
                            </div>
                            {!! Form::close() !!}
                            <!-- FIN DEL PERMISO ADD -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- INICIO DEL PERMISO VIEW -->
                            {!! Form::open(['route' => 'permisos.store','method' => 'post']) !!}
                            <div class="form-group" style="width:300px;">                                
                                    {!! Form::token() !!}
                                    <input type="hidden" id="{{$permiso->id}}" name="permiso_view_id" value="{{$permiso->id}}">
                                    <input type="hidden" id="{{$permiso->id}}" name="permiso_view" value="{{$permiso->id}}">
                                    @if($permiso->view == 'ALLOW')
                                        @php $letra = 'A'; @endphp
                                    @else 
                                        @php $letra = 'D'; @endphp
                                    @endif
                                    <div style="float:left; width:150px;">
                                        VIEW
                                    </div>
                                    <div style="float:left; width:150px; height: 25px;">
                                        {!! Form::select('view', ['A' => 'ALLOW', 'D' => 'DENY'], $letra) !!}
                                    </div>
                            </div>
                            {!! Form::close() !!}
                            <!-- FIN DEL PERMISO VIEW -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- INICIO DEL PERMISO PRINT -->
                            {!! Form::open(['route' => 'permisos.store','method' => 'post']) !!}
                            <div class="form-group" style="width:300px;">                                
                                    {!! Form::token() !!}
                                    <input type="hidden" id="{{$permiso->id}}" name="permiso_print_id" value="{{$permiso->id}}">
                                    <input type="hidden" id="{{$permiso->id}}" name="permiso_print" value="{{$permiso->id}}">
                                    @if($permiso->print == 'ALLOW')
                                        @php $letra = 'A'; @endphp
                                    @else 
                                        @php $letra = 'D'; @endphp
                                    @endif
                                    <div style="float:left; width:150px;">    
                                        PRINT 
                                    </div>
                                    <div style="float:left; width:150px; height: 25px;">
                                        {!! Form::select('print', ['A' => 'ALLOW', 'D' => 'DENY'], $letra) !!}
                                    </div>
                            </div>
                            {!! Form::close() !!}
                            <!-- FIN DEL PERMISO PRINT -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- INICIO DEL PERMISO DOWNLOAD -->
                            {!! Form::open(['route' => 'permisos.store','method' => 'post']) !!}
                            <div class="form-group" style="width:300px;">                                
                                    {!! Form::token() !!}
                                    <input type="hidden" id="{{$permiso->id}}" name="permiso_download_id" value="{{$permiso->id}}">
                                    <input type="hidden" id="{{$permiso->id}}" name="permiso_download" value="{{$permiso->id}}">                                    
                                    @if($permiso->download == 'ALLOW')
                                        @php $letra = 'A'; @endphp
                                    @else 
                                        @php $letra = 'D'; @endphp
                                    @endif
                                    <div style="float:left; width:150px;">
                                        DOWNLOAD 
                                    </div>
                                    <div style="float:left; width:150px; height: 25px;">
                                        {!! Form::select('download', ['A' => 'ALLOW', 'D' => 'DENY'], $letra) !!}
                                    </div>
                            </div>
                            {!! Form::close() !!}
                            <!-- FIN DEL PERMISO DOWNLOAD -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                            <!-- INICIO DEL PERMISO UPLOAD -->
                            {!! Form::open(['route' => 'permisos.store','method' => 'post']) !!}
                            <div class="form-group" style="width:300px;">                                
                                    {!! Form::token() !!}
                                    <input type="hidden" id="{{$permiso->id}}" name="permiso_upload_id" value="{{$permiso->id}}">
                                    <input type="hidden" id="{{$permiso->id}}" name="permiso_upload" value="{{$permiso->id}}">                                                                    
                                    @if($permiso->upload == 'ALLOW')
                                        @php $letra = 'A'; @endphp
                                    @else 
                                        @php $letra = 'D'; @endphp
                                    @endif
                                    <div style="float:left; width:150px;">    
                                        UPLOAD 
                                    </div>
                                    <div style="float:left; width:150px; height: 25px;">
                                        {!! Form::select('upload', ['A' => 'ALLOW', 'D' => 'DENY'], $letra) !!}
                                    </div>
                            </div>
                            {!! Form::close() !!}
                            <!-- FIN DEL PERMISO UPLOAD -->
                            <!-- ///////////////////////////////////////////////////////////////////////////// -->
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

