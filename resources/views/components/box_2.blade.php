<!-- Default box -->
<div class="card box">
    <div class="box-header card-header with-border">
        <h5 class="box-title card-title ">CAJA</h5>

        <div class="box-tools pull-right">
            AQUI TEXTO
        </div>
    </div>
    <div class="box-body card-body">
        TEXTO EN EL BODY
    </div>
    <!-- /.box-body -->
    <div class="box-footer card-footer ">EL PIE</div>
    <!-- /.box-footer-->
</div>
<!-- /.box -->
 <div class="form-group">
            <h2>Radios</h2>
            @foreach($categories as $category)
            <label class="radio-inline">
                <input type="radio" name="{{$category->name}}" id="{{$category->id}}" value="{{$category->id}}"> {{$category->name}}
            </label>
            @endforeach
        </div>

        {{ Form::label('m', 'M')}} {{Form::radio('sexo', 'M', ($cliente->cli_sexo == 'M') ? true : false )}}
{{ Form::label('f', 'F')}} {{Form::radio('sexo', 'F', ($cliente->cli_sexo == 'F') ? true : false )}}

<div class="radio">
    <label>
        {!! Form::radio('name', 'value') !!}
    </label>
</div>