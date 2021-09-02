@extends('adminlte::layouts.app')

@section('css_database')
    @include('adminlte::layouts.partials.link')
@endsection

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection

@section('contentheader_title')
    <h2 class="mb-4">{{ trans('message.perfil_user') }}</h2> 
@endsection

@section('main-content')
<div class="container-fluid"> 
    <div class="card">
        <div class="card-body">               
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <img src="{{ url('/storage/avatars/'.$user->avatar) }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                        <h2>{{ $user->name }}'{{ trans('message.profile') }}</h2>
                        <form enctype="multipart/form-data" action="{{ url('/users/profile/'.$user->id) }}" method="POST">
                            <label>{{ trans('message.update_profile') }}</label>
                            <input type="file" name="avatar">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="pull-right btn btn-sm btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
