/**
 * Autor: Tarsicio Carrizales
 * Email: telecom.com.ve@gmail.com
 */
  /////////////////////////      UPDATE PERMISOS ///////////////////////////////////////////////////////
  //<a href='#' id='select-all'>Select all (No implementado) / </a>';
//'<a href='#' id='deselect-all'>Deselect all (No implementado)</a>';
  function update_permisos(id){ 
    var rol_id = $("#nombre_rol").attr('name');
    var modulo_id = id;
    var html = '';
    $.get('permisos/' + modulo_id + '/' + rol_id, 
        {_token:$('meta[name="csrf-token"]').attr('content')},function(data){ 
        jQuery.each(data, function(index, value) {
            console.log(value.NAME_MODULO); 
            html = '<div style="text-align:center;"><h4>Permiso para el Rol:</h4><span style="color:blue;"><b>'+value.NAME_ROL+'</b></span><h4> Del módulo:</h4><span style="color:blue;"><b>'+value.NAME_MODULO+'</b></span></h4></div>';
            html += '<hr>';
            //////////////////////////////////// UPDATE  //////////////////////////////////////
            html += '<div>';
            html += '<select id="select-permisos" multiple="multiple">';
            html += '<option value="'+value.delete+'">DELETE</option>'
            html += '</select>'
            html += '</div>';            
            $("#mostrar_permisos_modulo_rol_update").empty();
            $("#mostrar_permisos_modulo_rol_update").html(html); 
            $("#mostrar_permisos_modulo_rol_update").show();
        });
    });
}