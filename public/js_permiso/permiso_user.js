/**
 * Autor: Tarsicio Carrizales
 * Email: telecom.com.ve@gmail.com
 * Por cada módulo que desee agregar al sistema debe duplicar este archivo
 * y realizar los ajustes necesarios por el nombre de cada módulo nuevo
 */
$(document).ready(function () {
  
  ////////////////////////////////////////////// 01 DELETE ///////////////////////////////////////////////////////
  $('body').on('click', '.delete_allow_user', function(){    
    let filtrado = $(".delete_allow_user").attr('id');    
    let [accion,cambio,id,modulos_id,rols_id] = filtrado.split("_");    
    $.post('permisos/' + accion + '/' + cambio + '/' + id + '/' + modulos_id + '/' + rols_id , function(data){      
        console.log(data);
        $('#mensaje_user').empty();
        $('#mensaje_user').html('<b>DELETE ALLOW</b>');
    });
  }); //FIN DE '.delete_allow_user'

  $('body').on('click', '.delete_deny_user', function(){
    let filtrado = $(".delete_deny_user").attr('id');    
    let [accion,cambio,id,modulos_id,rols_id] = filtrado.split("_");
    $.post('permisos/' + accion + '/' + cambio + '/' + id + '/' + modulos_id + '/' + rols_id , function(data){      
        console.log(data);
        $('#mensaje_user').empty();
        $('#mensaje_user').html('<b>DELETE DENY</b>');
    });
  }); // FIN DE '.delete_deny_user'
////////////////////////////////////////////////  02 UPDATE /////////////////////////////////////////////////////
  $('body').on('click', '.update_allow_user', function(){
    let filtrado = $(".update_allow_user").attr('id');    
    let [accion,cambio,id,modulos_id,rols_id] = filtrado.split("_");    
    $.post('permisos/' + accion + '/' + cambio + '/' + id + '/' + modulos_id + '/' + rols_id , function(data){      
        console.log(data);        
        $('#mensaje_user').empty();
        $('#mensaje_user').html('<b>UPDATE ALLOW</b>');
    });
  });// FIN DE '.update_allow_user'

  $('body').on('click', '.update_deny_user', function(){      
    let filtrado = $(".update_deny_user").attr('id');    
    let [accion,cambio,id,modulos_id,rols_id] = filtrado.split("_");    
    $.post('permisos/' + accion + '/' + cambio + '/' + id + '/' + modulos_id + '/' + rols_id , function(data){      
        console.log(data);        
        $('#mensaje_user').empty();
        $('#mensaje_user').html('<b>UPDATE DENY</b>');      
    });
  });// FIN DE '.update_deny_user'
/////////////////////////////////////////////  03 EDIT ////////////////////////////////////////////////////////
$('body').on('click', '.edit_allow_user', function(){    
    let filtrado = $(".edit_allow_user").attr('id');    
    let [accion,cambio,id,modulos_id,rols_id] = filtrado.split("_");    
    $.post('permisos/' + accion + '/' + cambio + '/' + id + '/' + modulos_id + '/' + rols_id , function(data){      
        console.log(data);        
        $('#mensaje_user').empty();
        $('#mensaje_user').html('<b>EDIT ALLOW</b>');      
    });
  });// FIN DE '.update_allow_user'

  $('body').on('click', '.edit_deny_user', function(){      
    let filtrado = $(".edit_deny_user").attr('id');
    let [accion,cambio,id,modulos_id,rols_id] = filtrado.split("_");    
    $.post('permisos/' + accion + '/' + cambio + '/' + id + '/' + modulos_id + '/' + rols_id , function(data){      
        console.log(data);        
        $('#mensaje_user').empty();
        $('#mensaje_user').html('<b>EDIT DENY</b>');     
    });
  });// FIN DE '.edit_deny_user'
/////////////////////////////////////////////  04 ADD  ////////////////////////////////////////////////////////
$('body').on('click', '.add_allow_user', function(){
    let filtrado = $(".add_allow_user").attr('id');    
    let [accion,cambio,id,modulos_id,rols_id] = filtrado.split("_");    
    $.post('permisos/' + accion + '/' + cambio + '/' + id + '/' + modulos_id + '/' + rols_id , function(data){      
        console.log(data);        
        $('#mensaje_user').empty();
        $('#mensaje_user').html('<b>CREATE ALLOW</b>');      
    });
  });// FIN DE '.add_allow_user'

  $('body').on('click', '.add_deny_user', function(){  
    let filtrado = $(".add_deny_user").attr('id');    
    let [accion,cambio,id,modulos_id,rols_id] = filtrado.split("_");
    $.post('permisos/' + accion + '/' + cambio + '/' + id + '/' + modulos_id + '/' + rols_id , function(data){      
        console.log(data);
        $('#mensaje_user').empty();
        $('#mensaje_user').html('<b>CREATE DENY</b>');     
    });
  });// FIN DE '.add_deny_user'
/////////////////////////////////////////////   05 VIEW  ////////////////////////////////////////////////////////
$('body').on('click', '.view_allow_user', function(){    
    let filtrado = $(".view_allow_user").attr('id');    
    let [accion,cambio,id,modulos_id,rols_id] = filtrado.split("_");    
    $.post('permisos/' + accion + '/' + cambio + '/' + id + '/' + modulos_id + '/' + rols_id , function(data){      
        console.log(data);        
        $('#mensaje_user').empty();
        $('#mensaje_user').html('<b>VIEW ALLOW</b>');      
    });
  });// FIN DE '.view_allow_user'

  $('body').on('click', '.view_deny_user', function(){      
    let filtrado = $(".view_deny_user").attr('id');    
    let [accion,cambio,id,modulos_id,rols_id] = filtrado.split("_");
    $.post('permisos/' + accion + '/' + cambio + '/' + id + '/' + modulos_id + '/' + rols_id , function(data){      
        console.log(data);        
        $('#mensaje_user').empty();
        $('#mensaje_user').html('<b>VIEW DENY</b>');     
    });
  });// FIN DE '.view_deny_user'
//////////////////////////////////////////  06 PRINT ///////////////////////////////////////////////////////////
$('body').on('click', '.print_allow_user', function(){
    let filtrado = $(".print_allow_user").attr('id');
    let [accion,cambio,id,modulos_id,rols_id] = filtrado.split("_");    
    $.post('permisos/' + accion + '/' + cambio + '/' + id + '/' + modulos_id + '/' + rols_id , function(data){      
        console.log(data);        
        $('#mensaje_user').empty();
        $('#mensaje_user').html('<b>PRINT ALLOW</b>');     
    });
  });// FIN DE '.print_allow_user'

  $('body').on('click', '.print_deny_user', function(){  
    let filtrado = $(".print_deny_user").attr('id');
    let [accion,cambio,id,modulos_id,rols_id] = filtrado.split("_");    
    $.post('permisos/' + accion + '/' + cambio + '/' + id + '/' + modulos_id + '/' + rols_id , function(data){      
        console.log(data);
        $('#mensaje_user').empty();
        $('#mensaje_user').html('<b>PRINT DENY</b>');      
    });
  });// FIN DE '.print_deny_user'
/////////////////////////////////////////  07 DOWNLOAD  ////////////////////////////////////////////////////////////
$('body').on('click', '.download_allow_user', function(){
    let filtrado = $(".download_allow_user").attr('id');    
    let [accion,cambio,id,modulos_id,rols_id] = filtrado.split("_");
    $.post('permisos/' + accion + '/' + cambio + '/' + id + '/' + modulos_id + '/' + rols_id , function(data){      
        console.log(data);
        $('#mensaje_user').empty();
        $('#mensaje_user').html('<b>DOWNLOAD ALLOW</b>');      
    });
  });// FIN DE '.download_allow_user'

  $('body').on('click', '.download_deny_user', function(){      
    let filtrado = $(".download_deny_user").attr('id');    
    let [accion,cambio,id,modulos_id,rols_id] = filtrado.split("_");    
    $.post('permisos/' + accion + '/' + cambio + '/' + id + '/' + modulos_id + '/' + rols_id , function(data){      
        console.log(data);        
        $('#mensaje_user').empty();
        $('#mensaje_user').html('<b>DOWNLOAD DENY</b>');     
    });
  });// FIN DE '.download_deny_user'
////////////////////////////////////////////////  08 UPLOAD /////////////////////////////////////////////////////
$('body').on('click', '.upload_allow_user', function(){
    let filtrado = $(".upload_allow_user").attr('id');    
    let [accion,cambio,id,modulos_id,rols_id] = filtrado.split("_");
    $.post('permisos/' + accion + '/' + cambio + '/' + id + '/' + modulos_id + '/' + rols_id , function(data){      
        console.log(data);        
        $('#mensaje_user').empty();
        $('#mensaje_user').html('<b>UPLOAD ALLOW</b>');      
    });
  });// FIN DE '.upload_allow_user'

  $('body').on('click', '.upload_deny_user', function(){  
    let filtrado = $(".upload_deny_user").attr('id');
    let [accion,cambio,id,modulos_id,rols_id] = filtrado.split("_");
    $.post('permisos/' + accion + '/' + cambio + '/' + id + '/' + modulos_id + '/' + rols_id , function(data){      
        console.log(data);
        $('#mensaje_user').empty();
        $('#mensaje_user').html('<b>UPLOAD DENY</b>');     
    });
  });// FIN DE '.upload_deny_user'
/////////////////////////////////////////////////////////////////////////////////////////////////////
}); // FIN DE $(document).ready(function () {