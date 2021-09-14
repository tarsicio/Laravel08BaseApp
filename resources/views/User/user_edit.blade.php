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
                <table style="float: right;">
                    <tr>
                        <td>
                            <div id="preview"><img src="{{ url('/storage/avatars/'.$user_edit->avatar) }}" style="width:150px; height:200px; border-radius:50%; margin-right:25px;"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                            {!! Form::label('avatar',trans('message.users_action.avatar_user'), ['class' => 'control-label']) !!}
                            {!! Form::file('avatar',['class' => 'form-control','id' => 'avatar_user','name' => 'avatar']) !!}
                            </div>
                        </td>
                    </tr>
                </table> 
                <div class="col-lg-6 col-xs-6">                    
                        <div style="text-align:left;">
                            {!! Form::label('name',trans('message.users_action.nombre'), ['class' => 'control-label']) !!}
                             {!! Form::text('name',$user_edit->name,['placeholder' => trans('message.users_action.nombre'),'class' => 'form-control','id' => 'name_user']) !!}
                        </div>                        
                        <div style="text-align:left;">
                            {!! Form::label('email',trans('message.users_action.email_user'), ['class' => 'control-label']) !!}
                            {!! Form::email('email',$user_edit->email,['placeholder' => trans('message.users_action.mail_ejemplo'),'class' => 'form-control','id' => 'email_user']) !!}
                        </div>
                        <div style="text-align:left;">
                            {!! Form::label('password',trans('message.users_action.password'), ['class' => 'control-label']) !!}
                            {!! Form::password('password',['placeholder' => trans('message.users_action.password_ejemplo'),'class' => 'form-control','id' => 'password_user','value' => $user_edit->password]) !!}
                            <span class="fa fa-fw fa-eye password-icon show-password" style="float: right; position: relative; margin: -25px 10px 0 0; cursor: pointer;"></span>
                        </div>
                        <div style="text-align:left;">
                            {!! Form::label('activo',trans('message.users_action.activo'), ['class' => 'control-label']) !!}
                            {!! Form::select('activo',['DENY' => 'DENY','ALLOW' => 'ALLOW'],$user_edit->activo,['class' => 'form-control','id' => 'activo_user']) !!}
                        </div>
                        <div style="text-align:left;">
                            {!! Form::label('rols_id',trans('message.permisos_rol.roles'), ['class' => 'control-label']) !!}
                            {!! Form::select('rols_id', $roles, $user_edit->rols_id, ['placeholder' => trans('message.permisos_rol.opcion'),'class' => 'form-control','id' => 'rols_id']) !!}
                        </div>
                        <div style="text-align:left;">
                            {!! Form::label('init_day',trans('message.users_action.fecha_inicio'), ['class' => 'control-label']) !!}
                            {!! Form::date('init_day',$user_edit->init_day,['class' => 'form-control','id' => 'init_day']) !!}
                        </div>
                        <div style="text-align:left;">
                            {!! Form::label('end_day',trans('message.users_action.fecha_fin'), ['class' => 'control-label']) !!}
                            {!! Form::date('end_day',$user_edit->end_day,['class' => 'form-control','id' => 'end_day']) !!}
                        </div>                        
                </div>        
                <hr>
                        {!! Form::submit(trans('message.users_action.update_user'),['class'=> 'form-control btn btn-primary','title' => trans('message.users_action.update_user'),'data-toggle' => 'tooltip']) !!}                     
                </div>      
                {!!  Form::close() !!}
            </div>             
        </div>
    </div>
</div>
@endsection
@section('script_datatable')
<script type="text/javascript">
  $(function () {
    document.getElementById("avatar_user").onchange = function(e) {
      // Creamos el objeto de la clase FileReader
      let reader = new FileReader();
      // Leemos el archivo subido y se lo pasamos a nuestro fileReader
      reader.readAsDataURL(e.target.files[0]);
      // Le decimos que cuando este listo ejecute el código interno
      reader.onload = function(){
        let preview = document.getElementById('preview');
        image = document.createElement('img');
        image.src = reader.result;
        image.style = "width:150px; height:200px; border-radius:50%; margin-right:25px;";
        preview.innerHTML = '';
        preview.append(image);        
      };
    }

    // icono para mostrar contraseña
            showPassword = document.querySelector('.show-password');
            showPassword.addEventListener('click', () => {
                // elementos input de tipo clave
                password1 = document.querySelector('#password_user');                
                if ( password1.type === "text" ) {
                    password1.type = "password"                    
                    showPassword.classList.remove('fa-eye-slash');
                } else {
                    password1.type = "text"                    
                    showPassword.classList.toggle("fa-eye-slash");
                }
            });
  });
</script>
@endsection  