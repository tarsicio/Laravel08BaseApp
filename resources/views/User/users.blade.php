@extends('adminlte::layouts.app')

@section('css_database')
    @include('adminlte::layouts.partials.link')
@endsection

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('contentheader_title')
    <h2 class="mb-4">{{ trans('message.users') }}</h2>
@endsection

@section('main-content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">            
                <table class="table table-bordered users_all">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Avatar</th>
                                <th>Correo</th>
                                <th>Condición</th>
                                <th>Confirmo</th>
                            </tr>
                        </thead>
                    <tbody>
                    </tbody>
                </table>
        </div>
    </div>
</div>
@endsection
