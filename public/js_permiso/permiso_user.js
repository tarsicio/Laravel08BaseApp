/**
 * Autor: Tarsicio Carrizales
 * Email: telecom.com.ve@gmail.com
 * Por cada módulo que desee agregar al sistema debe duplicar este archivo
 * y realizar los ajustes necesarios por el nombre de cada módulo nuevo
 */
$(document).ready(function () {
  ////////////////////////////////////////////// 01 ///////////////////////////////////////////////////////
  $('body').on('click', '.delete_allow_user', function(){    
    let filtrado = $(".delete_allow_user").attr('id');
    console.log(filtrado);
    let [accion,cambio,id,modulos_id,rols_id] = filtrado.split("_");
    $.post('/permisos/' + accion + '/' + cambio + '/' + id + '/' + modulos_id + '/' + rols_id , function(data){
      //
    });
    console.log(accion);
    console.log(cambio);
    console.log(id);
    console.log(modulos_id);
    console.log(rols_id);

    $('#nombre_rol').empty();
    $('#nombre_rol').html('HACIENDO CLICK EN ALLOW');            
  }); //FIN DE '.delete_allow_user'

  $('body').on('click', '.delete_deny_user', function(){
    //$.post('/permisos/' + rols_id , function(data){
    //});
    let filtrado = $(".delete_deny_user").attr('id');
    console.log(filtrado);
    let [accion,allow,id,modulos_id,rols_id] = filtrado.split("_");
    console.log(accion);
    console.log(allow);
    console.log(id);
    console.log(modulos_id);
    console.log(rols_id);
    $('#nombre_rol').empty();
    $('#nombre_rol').html('HACIENDO CLICK EN DENY');            
  }); // FIN DE '.delete_deny_user'
////////////////////////////////////////////////  02  /////////////////////////////////////////////////////
  $('body').on('click', '.update_allow_user', function(){
    //$.post('/permisos/' + rols_id , function(data){
    //});    
    let filtrado = $(".update_allow_user").attr('id');
    console.log(filtrado);
    let [accion,allow,id,modulos_id,rols_id] = filtrado.split("_");
    console.log(accion);
    console.log(allow);
    console.log(id);
    console.log(modulos_id);
    console.log(rols_id);

    $('#nombre_rol').empty();
    $('#nombre_rol').html('HACIENDO CLICK EN ALLOW');            
  });// FIN DE '.update_allow_user'

  $('body').on('click', '.update_deny_user', function(){  
    //$.post('/permisos/' + rols_id , function(data){
    //});
    let filtrado = $(".update_deny_user").attr('id');
    console.log(filtrado);
    let [accion,allow,id,modulos_id,rols_id] = filtrado.split("_");
    console.log(accion);
    console.log(allow);
    console.log(id);
    console.log(modulos_id);
    console.log(rols_id);
    $('#nombre_rol').empty();
    $('#nombre_rol').html('HACIENDO CLICK EN DENY');            
  });// FIN DE '.update_deny_user'
/////////////////////////////////////////////  03 ////////////////////////////////////////////////////////
$('body').on('click', '.edit_allow_user', function(){
    //$.post('/permisos/' + rols_id , function(data){
    //});    
    let filtrado = $(".edit_allow_user").attr('id');
    console.log(filtrado);
    let [accion,allow,id,modulos_id,rols_id] = filtrado.split("_");
    console.log(accion);
    console.log(allow);
    console.log(id);
    console.log(modulos_id);
    console.log(rols_id);

    $('#nombre_rol').empty();
    $('#nombre_rol').html('HACIENDO CLICK EN ALLOW');            
  });// FIN DE '.update_allow_user'

  $('body').on('click', '.edit_deny_user', function(){  
    //$.post('/permisos/' + rols_id , function(data){
    //});
    let filtrado = $(".edit_deny_user").attr('id');
    console.log(filtrado);
    let [accion,allow,id,modulos_id,rols_id] = filtrado.split("_");
    console.log(accion);
    console.log(allow);
    console.log(id);
    console.log(modulos_id);
    console.log(rols_id);
    $('#nombre_rol').empty();
    $('#nombre_rol').html('HACIENDO CLICK EN DENY');            
  });// FIN DE '.edit_deny_user'
/////////////////////////////////////////////  04  ////////////////////////////////////////////////////////
$('body').on('click', '.add_allow_user', function(){
    //$.post('/permisos/' + rols_id , function(data){
    //});    
    let filtrado = $(".add_allow_user").attr('id');
    console.log(filtrado);
    let [accion,allow,id,modulos_id,rols_id] = filtrado.split("_");
    console.log(accion);
    console.log(allow);
    console.log(id);
    console.log(modulos_id);
    console.log(rols_id);

    $('#nombre_rol').empty();
    $('#nombre_rol').html('HACIENDO CLICK EN ALLOW');            
  });// FIN DE '.add_allow_user'

  $('body').on('click', '.add_deny_user', function(){  
    //$.post('/permisos/' + rols_id , function(data){
    //});
    let filtrado = $(".add_deny_user").attr('id');
    console.log(filtrado);
    let [accion,allow,id,modulos_id,rols_id] = filtrado.split("_");
    console.log(accion);
    console.log(allow);
    console.log(id);
    console.log(modulos_id);
    console.log(rols_id);
    $('#nombre_rol').empty();
    $('#nombre_rol').html('HACIENDO CLICK EN DENY');            
  });// FIN DE '.add_deny_user'
/////////////////////////////////////////////   05  ////////////////////////////////////////////////////////
$('body').on('click', '.view_allow_user', function(){
    //$.post('/permisos/' + rols_id , function(data){
    //});    
    let filtrado = $(".view_allow_user").attr('id');
    console.log(filtrado);
    let [accion,allow,id,modulos_id,rols_id] = filtrado.split("_");
    console.log(accion);
    console.log(allow);
    console.log(id);
    console.log(modulos_id);
    console.log(rols_id);

    $('#nombre_rol').empty();
    $('#nombre_rol').html('HACIENDO CLICK EN ALLOW');            
  });// FIN DE '.view_allow_user'

  $('body').on('click', '.view_deny_user', function(){  
    //$.post('/permisos/' + rols_id , function(data){
    //});
    let filtrado = $(".view_deny_user").attr('id');
    console.log(filtrado);
    let [accion,allow,id,modulos_id,rols_id] = filtrado.split("_");
    console.log(accion);
    console.log(allow);
    console.log(id);
    console.log(modulos_id);
    console.log(rols_id);
    $('#nombre_rol').empty();
    $('#nombre_rol').html('HACIENDO CLICK EN DENY');            
  });// FIN DE '.view_deny_user'
//////////////////////////////////////////  06  ///////////////////////////////////////////////////////////
$('body').on('click', '.print_allow_user', function(){
    //$.post('/permisos/' + rols_id , function(data){
    //});    
    let filtrado = $(".print_allow_user").attr('id');
    console.log(filtrado);
    let [accion,allow,id,modulos_id,rols_id] = filtrado.split("_");
    console.log(accion);
    console.log(allow);
    console.log(id);
    console.log(modulos_id);
    console.log(rols_id);

    $('#nombre_rol').empty();
    $('#nombre_rol').html('HACIENDO CLICK EN ALLOW');            
  });// FIN DE '.print_allow_user'

  $('body').on('click', '.print_deny_user', function(){  
    //$.post('/permisos/' + rols_id , function(data){
    //});
    let filtrado = $(".print_deny_user").attr('id');
    console.log(filtrado);
    let [accion,allow,id,modulos_id,rols_id] = filtrado.split("_");
    console.log(accion);
    console.log(allow);
    console.log(id);
    console.log(modulos_id);
    console.log(rols_id);
    $('#nombre_rol').empty();
    $('#nombre_rol').html('HACIENDO CLICK EN DENY');            
  });// FIN DE '.print_deny_user'
/////////////////////////////////////////  07  ////////////////////////////////////////////////////////////
$('body').on('click', '.download_allow_user', function(){
    //$.post('/permisos/' + rols_id , function(data){
    //});    
    let filtrado = $(".download_allow_user").attr('id');
    console.log(filtrado);
    let [accion,allow,id,modulos_id,rols_id] = filtrado.split("_");
    console.log(accion);
    console.log(allow);
    console.log(id);
    console.log(modulos_id);
    console.log(rols_id);

    $('#nombre_rol').empty();
    $('#nombre_rol').html('HACIENDO CLICK EN ALLOW');            
  });// FIN DE '.download_allow_user'

  $('body').on('click', '.download_deny_user', function(){  
    //$.post('/permisos/' + rols_id , function(data){
    //});
    let filtrado = $(".download_deny_user").attr('id');
    console.log(filtrado);
    let [accion,allow,id,modulos_id,rols_id] = filtrado.split("_");
    console.log(accion);
    console.log(allow);
    console.log(id);
    console.log(modulos_id);
    console.log(rols_id);
    $('#nombre_rol').empty();
    $('#nombre_rol').html('HACIENDO CLICK EN DENY');            
  });// FIN DE '.download_deny_user'
////////////////////////////////////////////////  08  /////////////////////////////////////////////////////
$('body').on('click', '.upload_allow_user', function(){
    //$.post('/permisos/' + rols_id , function(data){
    //});    
    let filtrado = $(".upload_allow_user").attr('id');
    console.log(filtrado);
    let [accion,allow,id,modulos_id,rols_id] = filtrado.split("_");
    console.log(accion);
    console.log(allow);
    console.log(id);
    console.log(modulos_id);
    console.log(rols_id);

    $('#nombre_rol').empty();
    $('#nombre_rol').html('HACIENDO CLICK EN ALLOW');            
  });// FIN DE '.upload_allow_user'

  $('body').on('click', '.upload_deny_user', function(){  
    //$.post('/permisos/' + rols_id , function(data){
    //});
    let filtrado = $(".upload_deny_user").attr('id');
    console.log(filtrado);
    let [accion,allow,id,modulos_id,rols_id] = filtrado.split("_");
    console.log(accion);
    console.log(allow);
    console.log(id);
    console.log(modulos_id);
    console.log(rols_id);
    $('#nombre_rol').empty();
    $('#nombre_rol').html('HACIENDO CLICK EN DENY');            
  });// FIN DE '.upload_deny_user'
/////////////////////////////////////////////////////////////////////////////////////////////////////
}); // FIN DE $(document).ready(function () {