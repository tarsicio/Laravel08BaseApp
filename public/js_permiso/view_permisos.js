/**
 * Autor: Tarsicio Carrizales
 * Email: telecom.com.ve@gmail.com
 */
/////////////////////////////// MOSTRAR LOS PERMISOS SOLO LECTURA ///////////////////////////////////////
function mostrar_permisos(id){    
    var rol_id = $("#nombre_rol").attr('name');
    var modulo_id = id;
    var html = '';
    var contador = 1;    
    $.get('permisos/' + modulo_id + '/' + rol_id, 
        {_token:$('meta[name="csrf-token"]').attr('content')},function(data){ 
        jQuery.each(data, function(index, value) {
            console.log(value.NAME_MODULO);        
            html = '<div>'+value.NAME_MODULO+'</div>'
            $("#mostrar_permisos_modulo_rol").empty();
            $("#mostrar_permisos_modulo_rol").html(html); 
            $("#mostrar_permisos_modulo_rol").show();
        });
    });
}