<div>
    <h2 class="mb-4">{{ $titulo_modulo}}</h2>
</div>    
    <div>
        <a href="{{ $router_modulo_create }}" id="{{$id_new_modulo}}" class="btn btn-sm btn-primary glyphicon glyphicon-plus" style="color:black;" data-toggle="tooltip" title="{{$tooltip}}"><b>{{ $boton_crear }}</b></a>
    </div>
    <div style="text-align:center;">
        <a href="{{ $route_print }}" class="btn btn-primary btn-sm glyphicon glyphicon-print" role="button" aria-disabled="true" style="color:black;"><b> {{ trans('message.botones.print') }}</b></a>
        <a href="{{ $route_download }}" class="btn btn-primary btn-sm glyphicon glyphicon-cloud-download disabled" role="button" aria-disabled="true" style="color:black;"><b> {{ trans('message.botones.download') }}</b></a>
        <a href="{{ $route_upload }}" class="btn btn-primary btn-sm glyphicon glyphicon-cloud-upload disabled" role="button" aria-disabled="true" style="color:black;"><b> {{ trans('message.botones.upload') }}</b></a>
    </div>