/**
 * Autor: Tarsicio Carrizales
 * Email: telecom.com.ve@gmail.com
 * Por cada módulo nuevo que desee agregar al sistema debe duplicar este archivo
 * y realizar los ajustes necesarios para que funcione correctamente
 * Ejemplo. si su nuevo modulo tiene por nombre ventas debe cambiar lo siguiete,
 * en donde esta '.delete_allow_user', debe de cambiar por '.delete_allow_ventas'
 * y repetir en cada terminación por el valor ventas, tamién debe cambiar lo referente a los mensaje
 * en donde esta $('#mensaje_user').empty(); y $('#mensaje_user').html('<b>UPLOAD ALLOW</b>');
 * debe colocar por $('#mensaje_ventas').empty(); y $('#mensaje_ventas').html('<b>UPLOAD ALLOW</b>');            
 * de requerir aistencia técnica no dude en contactarme. 
 * No debe modificar más nada.
 * recuerde de agregar en la vista view(Permiso.permisos.blade.php) el correspondiente archivo
 * JavaScript <script src="{{ url ('/js_permiso/permiso_ventas.js') }}" type="text/javascript"></script>
 * en la sección @section('script_especiales')
 */
$(document).ready(function () {
  ////////////////////////////////////////////// 01 DELETE ///////////////////////////////////////////////////////
  $('body').on('click', '.delete_allow_permiso', function(){ 
    let filtrado = $(".delete_allow_permiso").attr('id');    
    let [accion,cambio,id,modulos_id,rols_id] = filtrado.split("_");
    $.post('permisos/' + accion + '/' + cambio + '/' + id + '/' + modulos_id + '/' + rols_id, 
        {_token:$('meta[name="csrf-token"]').attr('content')},function(data){      
        console.log(data);
        $('#mensaje_permiso').empty();
        $('#mensaje_permiso').html('<b>DELETE ALLOW</b>');
    });
  }); //FIN DE '.delete_allow_user'

  $('body').on('click', '.delete_deny_permiso', function(){
    let filtrado = $(".delete_deny_permiso").attr('id');    
    let [accion,cambio,id,modulos_id,rols_id] = filtrado.split("_");
    $.post('permisos/' + accion + '/' + cambio + '/' + id + '/' + modulos_id + '/' + rols_id, 
        {_token:$('meta[name="csrf-token"]').attr('content')}, function(data){      
        console.log(data);
        $('#mensaje_permiso').empty();
        $('#mensaje_permiso').html('<b>DELETE DENY</b>');
    });
  }); // FIN DE '.delete_deny_user'
////////////////////////////////////////////////  02 UPDATE /////////////////////////////////////////////////////
  $('body').on('click', '.update_allow_permiso', function(){
    let filtrado = $(".update_allow_permiso").attr('id');    
    let [accion,cambio,id,modulos_id,rols_id] = filtrado.split("_");    
    $.post('permisos/' + accion + '/' + cambio + '/' + id + '/' + modulos_id + '/' + rols_id, 
        {_token:$('meta[name="csrf-token"]').attr('content')}, function(data){      
        console.log(data);        
        $('#mensaje_permiso').empty();
        $('#mensaje_permiso').html('<b>UPDATE ALLOW</b>');
    });
  });// FIN DE '.update_allow_user'

  $('body').on('click', '.update_deny_permiso', function(){      
    let filtrado = $(".update_deny_permiso").attr('id');    
    let [accion,cambio,id,modulos_id,rols_id] = filtrado.split("_");    
    $.post('permisos/' + accion + '/' + cambio + '/' + id + '/' + modulos_id + '/' + rols_id, 
        {_token:$('meta[name="csrf-token"]').attr('content')}, function(data){      
        console.log(data);        
        $('#mensaje_permiso').empty();
        $('#mensaje_permiso').html('<b>UPDATE DENY</b>');      
    });
  });// FIN DE '.update_deny_user'
/////////////////////////////////////////////  03 EDIT ////////////////////////////////////////////////////////
$('body').on('click', '.edit_allow_permiso', function(){    
    let filtrado = $(".edit_allow_permiso").attr('id');    
    let [accion,cambio,id,modulos_id,rols_id] = filtrado.split("_");    
    $.post('permisos/' + accion + '/' + cambio + '/' + id + '/' + modulos_id + '/' + rols_id, 
        {_token:$('meta[name="csrf-token"]').attr('content')}, function(data){      
        console.log(data);        
        $('#mensaje_permiso').empty();
        $('#mensaje_permiso').html('<b>EDIT ALLOW</b>');      
    });
  });// FIN DE '.update_allow_user'

  $('body').on('click', '.edit_deny_permiso', function(){      
    let filtrado = $(".edit_deny_permiso").attr('id');
    let [accion,cambio,id,modulos_id,rols_id] = filtrado.split("_");    
    $.post('permisos/' + accion + '/' + cambio + '/' + id + '/' + modulos_id + '/' + rols_id, 
        {_token:$('meta[name="csrf-token"]').attr('content')}, function(data){      
        console.log(data);        
        $('#mensaje_permiso').empty();
        $('#mensaje_permiso').html('<b>EDIT DENY</b>');     
    });
  });// FIN DE '.edit_deny_user'
/////////////////////////////////////////////  04 ADD  ////////////////////////////////////////////////////////
$('body').on('click', '.add_allow_permiso', function(){
    let filtrado = $(".add_allow_permiso").attr('id');    
    let [accion,cambio,id,modulos_id,rols_id] = filtrado.split("_");    
    $.post('permisos/' + accion + '/' + cambio + '/' + id + '/' + modulos_id + '/' + rols_id, 
        {_token:$('meta[name="csrf-token"]').attr('content')}, function(data){      
        console.log(data);        
        $('#mensaje_permiso').empty();
        $('#mensaje_permiso').html('<b>CREATE ALLOW</b>');      
    });
  });// FIN DE '.add_allow_user'

  $('body').on('click', '.add_deny_permiso', function(){  
    let filtrado = $(".add_deny_permiso").attr('id');    
    let [accion,cambio,id,modulos_id,rols_id] = filtrado.split("_");
    $.post('permisos/' + accion + '/' + cambio + '/' + id + '/' + modulos_id + '/' + rols_id, 
        {_token:$('meta[name="csrf-token"]').attr('content')}, function(data){      
        console.log(data);
        $('#mensaje_permiso').empty();
        $('#mensaje_permiso').html('<b>CREATE DENY</b>');     
    });
  });// FIN DE '.add_deny_user'
/////////////////////////////////////////////   05 VIEW  ////////////////////////////////////////////////////////
$('body').on('click', '.view_allow_permiso', function(){    
    let filtrado = $(".view_allow_permiso").attr('id');    
    let [accion,cambio,id,modulos_id,rols_id] = filtrado.split("_");    
    $.post('permisos/' + accion + '/' + cambio + '/' + id + '/' + modulos_id + '/' + rols_id, 
        {_token:$('meta[name="csrf-token"]').attr('content')}, function(data){      
        console.log(data);        
        $('#mensaje_permiso').empty();
        $('#mensaje_permiso').html('<b>VIEW ALLOW</b>');      
    });
  });// FIN DE '.view_allow_user'

  $('body').on('click', '.view_deny_permiso', function(){      
    let filtrado = $(".view_deny_permiso").attr('id');    
    let [accion,cambio,id,modulos_id,rols_id] = filtrado.split("_");
    $.post('permisos/' + accion + '/' + cambio + '/' + id + '/' + modulos_id + '/' + rols_id, 
        {_token:$('meta[name="csrf-token"]').attr('content')}, function(data){      
        console.log(data);        
        $('#mensaje_permiso').empty();
        $('#mensaje_permiso').html('<b>VIEW DENY</b>');     
    });
  });// FIN DE '.view_deny_user'
//////////////////////////////////////////  06 PRINT ///////////////////////////////////////////////////////////
$('body').on('click', '.print_allow_permiso', function(){
    let filtrado = $(".print_allow_permiso").attr('id');
    let [accion,cambio,id,modulos_id,rols_id] = filtrado.split("_");    
    $.post('permisos/' + accion + '/' + cambio + '/' + id + '/' + modulos_id + '/' + rols_id, 
        {_token:$('meta[name="csrf-token"]').attr('content')}, function(data){      
        console.log(data);        
        $('#mensaje_permiso').empty();
        $('#mensaje_permiso').html('<b>PRINT ALLOW</b>');     
    });
  });// FIN DE '.print_allow_user'

  $('body').on('click', '.print_deny_permiso', function(){  
    let filtrado = $(".print_deny_permiso").attr('id');
    let [accion,cambio,id,modulos_id,rols_id] = filtrado.split("_");    
    $.post('permisos/' + accion + '/' + cambio + '/' + id + '/' + modulos_id + '/' + rols_id, 
        {_token:$('meta[name="csrf-token"]').attr('content')}, function(data){      
        console.log(data);
        $('#mensaje_permiso').empty();
        $('#mensaje_permiso').html('<b>PRINT DENY</b>');      
    });
  });// FIN DE '.print_deny_user'
/////////////////////////////////////////  07 DOWNLOAD  ////////////////////////////////////////////////////////////
$('body').on('click', '.download_allow_permiso', function(){
    let filtrado = $(".download_allow_permiso").attr('id');    
    let [accion,cambio,id,modulos_id,rols_id] = filtrado.split("_");
    $.post('permisos/' + accion + '/' + cambio + '/' + id + '/' + modulos_id + '/' + rols_id, 
        {_token:$('meta[name="csrf-token"]').attr('content')}, function(data){      
        console.log(data);
        $('#mensaje_permiso').empty();
        $('#mensaje_permiso').html('<b>DOWNLOAD ALLOW</b>');      
    });
  });// FIN DE '.download_allow_user'

  $('body').on('click', '.download_deny_permiso', function(){      
    let filtrado = $(".download_deny_permiso").attr('id');    
    let [accion,cambio,id,modulos_id,rols_id] = filtrado.split("_");    
    $.post('permisos/' + accion + '/' + cambio + '/' + id + '/' + modulos_id + '/' + rols_id, 
        {_token:$('meta[name="csrf-token"]').attr('content')}, function(data){      
        console.log(data);        
        $('#mensaje_permiso').empty();
        $('#mensaje_permiso').html('<b>DOWNLOAD DENY</b>');     
    });
  });// FIN DE '.download_deny_user'
////////////////////////////////////////////////  08 UPLOAD /////////////////////////////////////////////////////
$('body').on('click', '.upload_allow_permiso', function(){
    let filtrado = $(".upload_allow_permiso").attr('id');    
    let [accion,cambio,id,modulos_id,rols_id] = filtrado.split("_");
    $.post('permisos/' + accion + '/' + cambio + '/' + id + '/' + modulos_id + '/' + rols_id, 
        {_token:$('meta[name="csrf-token"]').attr('content')}, function(data){      
        console.log(data);        
        $('#mensaje_permiso').empty();
        $('#mensaje_permiso').html('<b>UPLOAD ALLOW</b>');      
    });
  });// FIN DE '.upload_allow_user'

  $('body').on('click', '.upload_deny_permiso', function(){  
    let filtrado = $(".upload_deny_permiso").attr('id');
    let [accion,cambio,id,modulos_id,rols_id] = filtrado.split("_");
    $.post('permisos/' + accion + '/' + cambio + '/' + id + '/' + modulos_id + '/' + rols_id, 
        {_token:$('meta[name="csrf-token"]').attr('content')}, function(data){      
        console.log(data);
        $('#mensaje_permiso').empty();
        $('#mensaje_permiso').html('<b>UPLOAD DENY</b>');     
    });
  });// FIN DE '.upload_deny_user'
/////////////////////////////////////////////////////////////////////////////////////////////////////
}); // FIN DE $(document).ready(function () {