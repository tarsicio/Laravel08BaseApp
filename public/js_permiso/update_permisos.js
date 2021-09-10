/**
 * Autor: Tarsicio Carrizales
 * Email: telecom.com.ve@gmail.com
 */
  /////////////////////////      UPDATE PERMISOS ///////////////////////////////////////////////////////
  function update_permisos(id){ 
    var rol_id = $("#nombre_rol").attr('name');
    var modulo_id = id;
    var html = '';
    $.get('permisos/' + modulo_id + '/' + rol_id, 
        {_token:$('meta[name="csrf-token"]').attr('content')},function(data){ 
        jQuery.each(data, function(index, value) {
            html = '<div style="text-align:center;">';
            html += 'Permiso para el Rol: <b style="color:blue;"> '+value.NAME_ROL+'</b> Del módulo: <b style="color:blue;">'+value.NAME_MODULO+'</b>';            
            html += '</div>';
            html += '<hr>';
            /**
             * Inicio proceso para marca todos en ALLOW o marcar todos en DENY
             */
            html += '<div class="col-md-12">';
            html += '<div class="col-md-3">';            
            html += '</div>';
            html += '<div class="col-md-3" style="text-align:center; color:green; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-left-style: solid;">';
            html += 'ALL ALLOW&nbsp;';
            html += '<input type="radio" onclick="update_all('+value.id+',\'ALLOW\')" name="ALL_01" class="form-group" id="mark_all_allow"/>';
            html += '</div>';
            html += '<div class="col-md-3" style="text-align:center; color:red;  border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-left-style: solid;">';
            html += 'ALL DENY&nbsp;';
            html += '<input type="radio" onclick="update_all('+value.id+',\'DENY\')" name="ALL_01" class="form-group" id="mark_all_deny"/>';
            html += '</div>';
            html += '<div class="col-md-3">';            
            html += '</div>';
            html += '</div>';
            /**
             * Fin proceso para marca todos en ALLOW o marcar todos en DENY
             */
           //////////////////////////////////// INICIO DELETE UPDATE  //////////////////////////////////////
            html += '<div class="col-md-12">';
            html += '<div class="col-md-3">';            
            html += '</div>';
            html += '<div class="col-md-6 form-group form-inline" style="text-align:left; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-left-style: solid;">';
            html += '<dl>';
            html += '<li style="color:black;"><b>DELETE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>';            
            if(value.delete == 'ALLOW'){
              html += '<label style="color:green;">ALLOW&nbsp;';
              html += '<input type="radio" onclick="update_permiso_individual('+value.id+',\'delete\',\'ALLOW\')" name="ALLOW_DENY_01" checked="checked" class="form-group delete_allow_'+value.NAME_MODULO+'" id="delete_allow_'+value.id+'"/>';
              html += '&nbsp;&nbsp;<label style="color:red;">DENY&nbsp;</label>&nbsp;';
              html += '<input type="radio" onclick="update_permiso_individual('+value.id+',\'delete\',\'DENY\')" name="ALLOW_DENY_01" class="form-group delete_deny_'+value.NAME_MODULO+'" id="delete_deny_'+value.id+'"/>';
            }else{
              html += '<label style="color:green;">ALLOW&nbsp;';
              html += '<input type="radio" onclick="update_permiso_individual('+value.id+',\'delete\',\'ALLOW\')" name="ALLOW_DENY_01" class="form-group delete_allow_'+value.NAME_MODULO+'" id="delete_allow_'+value.id+'"/>';
              html += '&nbsp;&nbsp;<label style="color:red;">DENY&nbsp;</label>&nbsp;';
              html += '<input type="radio" onclick="update_permiso_individual('+value.id+',\'delete\',\'DENY\')" name="ALLOW_DENY_01" checked="checked" class=" form-group delete_deny_'+value.NAME_MODULO+'" id="delete_deny_'+value.id+'"/>';
            }            
            html += '</li>';
            html += '</dl>';            
            html += '</div>';
            html += '<div class="col-md-3">';            
            html += '</div>';
            html += '</div>';
            //////////////////////////////////// FIN DELETE UPDATE  //////////////////////////////////////
            //////////////////////////////////// INICIO UPDATE UPDATE  //////////////////////////////////////
            html += '<div class="col-md-12">';
            html += '<div class="col-md-3">';            
            html += '</div>';
            html += '<div class="col-md-6 form-group form-inline" style="text-align:left; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-left-style: solid;">';            
            html += '<dl>';
            html += '<li style="color:black;"><b>UPDATE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>';            
            if(value.update == 'ALLOW'){
              html += '<label style="color:green;">ALLOW&nbsp;';
              html += '<input type="radio" onclick="update_permiso_individual('+value.id+',\'update\',\'ALLOW\')" name="ALLOW_DENY_02" checked="checked" class="form-group update_allow_'+value.NAME_MODULO+'" id="update_allow_'+value.id+'"/>';
              html += '&nbsp;&nbsp;<label style="color:red;">DENY&nbsp;</label>&nbsp;';
              html += '<input type="radio" onclick="update_permiso_individual('+value.id+',\'update\',\'DENY\')" name="ALLOW_DENY_02" class="form-group update_deny_'+value.NAME_MODULO+'" id="update_deny_'+value.id+'"/>';
            }else{
              html += '<label style="color:green;">ALLOW&nbsp;';
              html += '<input type="radio" onclick="update_permiso_individual('+value.id+',\'update\',\'ALLOW\')" name="ALLOW_DENY_02" class="form-group update_allow_'+value.NAME_MODULO+'" id="update_allow_'+value.id+'"/>';
              html += '&nbsp;&nbsp;<label style="color:red;">DENY&nbsp;</label>&nbsp;';
              html += '<input type="radio" onclick="update_permiso_individual('+value.id+',\'update\',\'DENY\')" name="ALLOW_DENY_02" checked="checked" class=" form-group update_deny_'+value.NAME_MODULO+'" id="update_deny_'+value.id+'"/>';
            }            
            html += '</li>';
            html += '</dl>';            
            html += '</div>';
            html += '<div class="col-md-3">';            
            html += '</div>';
            html += '</div>';
            //////////////////////////////////// FIN UPDATE UPDATE  //////////////////////////////////////
            //////////////////////////////////// INICIO EDIT UPDATE  //////////////////////////////////////
            html += '<div class="col-md-12">';
            html += '<div class="col-md-3">';            
            html += '</div>';
            html += '<div class="col-md-6 form-group form-inline" style="text-align:left; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-left-style: solid;">';            
            html += '<dl>';
            html += '<li style="color:black;"><b>EDIT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>';            
            if(value.edit == 'ALLOW'){
              html += '<label style="color:green;">ALLOW&nbsp;';
              html += '<input type="radio" onclick="update_permiso_individual('+value.id+',\'edit\',\'ALLOW\')" name="ALLOW_DENY_03" checked="checked" class="form-group edit_allow_'+value.NAME_MODULO+'" id="edit_allow_'+value.id+'"/>';
              html += '&nbsp;&nbsp;<label style="color:red;">DENY&nbsp;</label>&nbsp;';
              html += '<input type="radio" onclick="update_permiso_individual('+value.id+',\'edit\',\'DENY\')" name="ALLOW_DENY_03" class="form-group edit_deny_'+value.NAME_MODULO+'" id="edit_deny_'+value.id+'"/>';
            }else{
              html += '<label style="color:green;">ALLOW&nbsp;';
              html += '<input type="radio" onclick="update_permiso_individual('+value.id+',\'edit\',\'ALLOW\')" name="ALLOW_DENY_03" class="form-group edit_allow_'+value.NAME_MODULO+'" id="edit_allow_'+value.id+'"/>';
              html += '&nbsp;&nbsp;<label style="color:red;">DENY&nbsp;</label>&nbsp;';
              html += '<input type="radio" onclick="update_permiso_individual('+value.id+',\'edit\',\'DENY\')" name="ALLOW_DENY_03" checked="checked" class=" form-group edit_deny_'+value.NAME_MODULO+'" id="edit_deny_'+value.id+'"/>';
            }            
            html += '</li>';
            html += '</dl>';
            html += '</div>';            
            html += '<div class="col-md-3">';            
            html += '</div>';
            html += '</div>';
            //////////////////////////////////// FIN EDIT UPDATE  //////////////////////////////////////
            //////////////////////////////////// INICIO ADD UPDATE  //////////////////////////////////////
            html += '<div class="col-md-12">';
            html += '<div class="col-md-3">';            
            html += '</div>';
            html += '<div class="col-md-6 form-group form-inline" style="text-align:left; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-left-style: solid;">';            
            html += '<dl>';
            html += '<li style="color:black;"><b>CRAETE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>';            
            if(value.add == 'ALLOW'){
              html += '<label style="color:green;">ALLOW&nbsp;';
              html += '<input type="radio" onclick="update_permiso_individual('+value.id+',\'add\',\'ALLOW\')" name="ALLOW_DENY_04" checked="checked" class="form-group add_allow_'+value.NAME_MODULO+'" id="add_allow_'+value.id+'"/>';
              html += '&nbsp;&nbsp;<label style="color:red;">DENY&nbsp;</label>&nbsp;';
              html += '<input type="radio" onclick="update_permiso_individual('+value.id+',\'add\',\'DENY\')" name="ALLOW_DENY_04" class="form-group add_deny_'+value.NAME_MODULO+'" id="add_deny_'+value.id+'"/>';
            }else{
              html += '<label style="color:green;">ALLOW&nbsp;';
              html += '<input type="radio" onclick="update_permiso_individual('+value.id+',\'add\',\'ALLOW\')" name="ALLOW_DENY_04" class="form-group add_allow_'+value.NAME_MODULO+'" id="add_allow_'+value.id+'"/>';
              html += '&nbsp;&nbsp;<label style="color:red;">DENY&nbsp;</label>&nbsp;';
              html += '<input type="radio" onclick="update_permiso_individual('+value.id+',\'add\',\'DENY\')" name="ALLOW_DENY_04" checked="checked" class=" form-group add_deny_'+value.NAME_MODULO+'" id="add_deny_'+value.id+'"/>';
            }            
            html += '</li>';
            html += '</dl>';
            html += '</div>';            
            html += '<div class="col-md-3">';            
            html += '</div>';
            html += '</div>';
            //////////////////////////////////// FIN ADD UPDATE  //////////////////////////////////////
            //////////////////////////////////// INICIO VIEW UPDATE  //////////////////////////////////////
            html += '<div class="col-md-12">';
            html += '<div class="col-md-3">';            
            html += '</div>';
            html += '<div class="col-md-6 form-group form-inline" style="text-align:left; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-left-style: solid;">';            
            html += '<dl>';
            html += '<li style="color:black;"><b>VIEW&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>';
            if(value.view == 'ALLOW'){
              html += '<label style="color:green;">ALLOW&nbsp;';
              html += '<input type="radio" onclick="update_permiso_individual('+value.id+',\'view\',\'ALLOW\')" name="ALLOW_DENY_05" checked="checked" class="form-group view_allow_'+value.NAME_MODULO+'" id="view_allow_'+value.id+'"/>';
              html += '&nbsp;&nbsp;<label style="color:red;">DENY&nbsp;</label>&nbsp;';
              html += '<input type="radio" onclick="update_permiso_individual('+value.id+',\'view\',\'DENY\')" name="ALLOW_DENY_05" class="form-group view_deny_'+value.NAME_MODULO+'" id="view_deny_'+value.id+'"/>';
            }else{
              html += '<label style="color:green;">ALLOW&nbsp;';
              html += '<input type="radio" onclick="update_permiso_individual('+value.id+',\'view\',\'ALLOW\')" name="ALLOW_DENY_05" class="form-group view_allow_'+value.NAME_MODULO+'" id="view_allow_'+value.id+'"/>';
              html += '&nbsp;&nbsp;<label style="color:red;">DENY&nbsp;</label>&nbsp;';
              html += '<input type="radio" onclick="update_permiso_individual('+value.id+',\'view\',\'DENY\')" name="ALLOW_DENY_05" checked="checked" class=" form-group view_deny_'+value.NAME_MODULO+'" id="view_deny_'+value.id+'"/>';
            }            
            html += '</li>';
            html += '</dl>';
            html += '</div>';            
            html += '<div class="col-md-3">';            
            html += '</div>';
            html += '</div>';
            //////////////////////////////////// FIN VIEW UPDATE  //////////////////////////////////////
            //////////////////////////////////// INICIO PRINT UPDATE  //////////////////////////////////////
            html += '<div class="col-md-12">';
            html += '<div class="col-md-3">';            
            html += '</div>';
            html += '<div class="col-md-6 form-group form-inline" style="text-align:left; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-left-style: solid;">';            
            html += '<dl>';
            html += '<li style="color:black;"><b>PRINT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>';            
            if(value.print == 'ALLOW'){
              html += '<label style="color:green;">ALLOW&nbsp;';
              html += '<input type="radio" onclick="update_permiso_individual('+value.id+',\'print\',\'ALLOW\')" name="ALLOW_DENY_06" checked="checked" class="form-group print_allow_'+value.NAME_MODULO+'" id="print_allow_'+value.id+'"/>';
              html += '&nbsp;&nbsp;<label style="color:red;">DENY&nbsp;</label>&nbsp;';
              html += '<input type="radio" onclick="update_permiso_individual('+value.id+',\'print\',\'DENY\')" name="ALLOW_DENY_06" class="form-group print_deny_'+value.NAME_MODULO+'" id="print_deny_'+value.id+'"/>';
            }else{
              html += '<label style="color:green;">ALLOW&nbsp;';
              html += '<input type="radio" onclick="update_permiso_individual('+value.id+',\'print\',\'ALLOW\')" name="ALLOW_DENY_06" class="form-group print_allow_'+value.NAME_MODULO+'" id="print_allow_'+value.id+'"/>';
              html += '&nbsp;&nbsp;<label style="color:red;">DENY&nbsp;</label>&nbsp;';
              html += '<input type="radio" onclick="update_permiso_individual('+value.id+',\'print\',\'DENY\')" name="ALLOW_DENY_06" checked="checked" class=" form-group print_deny_'+value.NAME_MODULO+'" id="print_deny_'+value.id+'"/>';
            }            
            html += '</li>';
            html += '</dl>';
            html += '</div>';            
            html += '<div class="col-md-3">';            
            html += '</div>';
            html += '</div>';
            //////////////////////////////////// FIN PRINT UPDATE  //////////////////////////////////////
            //////////////////////////////////// INICIO DOWNLOAD UPDATE  //////////////////////////////////////
            html += '<div class="col-md-12">';
            html += '<div class="col-md-3">';            
            html += '</div>';
            html += '<div class="col-md-6 form-group form-inline" style="text-align:left; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-left-style: solid;">';            
            html += '<dl>';
            html += '<li style="color:black;"><b>DOWNLOAD&nbsp;</b>';            
            if(value.download == 'ALLOW'){
              html += '<label style="color:green;">ALLOW&nbsp;';
              html += '<input type="radio" onclick="update_permiso_individual('+value.id+',\'download\',\'ALLOW\')" name="ALLOW_DENY_07" checked="checked" class="form-group download_allow_'+value.NAME_MODULO+'" id="download_allow_'+value.id+'"/>';
              html += '&nbsp;&nbsp;<label style="color:red;">DENY&nbsp;</label>&nbsp;';
              html += '<input type="radio" onclick="update_permiso_individual('+value.id+',\'download\',\'DENY\')" name="ALLOW_DENY_07" class="form-group download_deny_'+value.NAME_MODULO+'" id="download_deny_'+value.id+'"/>';
            }else{
              html += '<label style="color:green;">ALLOW&nbsp;&nbsp;';
              html += '<input type="radio" onclick="update_permiso_individual('+value.id+',\'download\',\'ALLOW\')" name="ALLOW_DENY_07" class="form-group download_allow_'+value.NAME_MODULO+'" id="download_allow_'+value.id+'"/>';
              html += '&nbsp;&nbsp;<label style="color:red;">DENY&nbsp;</label>&nbsp;';
              html += '<input type="radio" onclick="update_permiso_individual('+value.id+',\'download\',\'DENY\')" name="ALLOW_DENY_07" checked="checked" class=" form-group download_deny_'+value.NAME_MODULO+'" id="download_deny_'+value.id+'"/>';
            }            
            html += '</li>';
            html += '</dl>';
            html += '</div>';            
            html += '<div class="col-md-3">';            
            html += '</div>';
            html += '</div>';
            //////////////////////////////////// FIN DOWNLOAD UPDATE  //////////////////////////////////////
            //////////////////////////////////// INICIO UPLOAD UPDATE  //////////////////////////////////////
            html += '<div class="col-md-12">';
            html += '<div class="col-md-3">';            
            html += '</div>';
            html += '<div class="col-md-6 form-group form-inline" style="text-align:left; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-left-style: solid;">';            
            html += '<dl>';
            html += '<li style="color:black;"><b>UPLOAD&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>';            
            if(value.upload == 'ALLOW'){
              html += '<label style="color:green;">ALLOW&nbsp;';
              html += '<input type="radio" onclick="update_permiso_individual('+value.id+',\'upload\',\'ALLOW\')" name="ALLOW_DENY_08" checked="checked" class="form-group upload_allow_'+value.NAME_MODULO+'" id="upload_allow_'+value.id+'"/>';
              html += '&nbsp;&nbsp;<label style="color:red;">DENY&nbsp;</label>&nbsp;';
              html += '<input type="radio" onclick="update_permiso_individual('+value.id+',\'upload\',\'DENY\')" name="ALLOW_DENY_08" class="form-group upload_deny_'+value.NAME_MODULO+'" id="upload_deny_'+value.id+'"/>';
            }else{
              html += '<label style="color:green;">ALLOW&nbsp;';
              html += '<input type="radio" onclick="update_permiso_individual('+value.id+',\'upload\',\'ALLOW\')" name="ALLOW_DENY_08" class="form-group upload_allow_'+value.NAME_MODULO+'" id="upload_allow_'+value.id+'"/>';
              html += '&nbsp;&nbsp;<label style="color:red;">DENY&nbsp;</label>&nbsp;';
              html += '<input type="radio" onclick="update_permiso_individual('+value.id+',\'upload\',\'DENY\')" name="ALLOW_DENY_08" checked="checked" class=" form-group upload_deny_'+value.NAME_MODULO+'" id="upload_deny_'+value.id+'"/>';
            }            
            html += '</li>';
            html += '</dl>';
            html += '</div>';            
            html += '<div class="col-md-3">';            
            html += '</div>';
            html += '</div>';
            //////////////////////////////////// FIN UPLOAD UPDATE  //////////////////////////////////////
            $("#mostrar_permisos_modulo_rol_update").empty();
            $("#mostrar_permisos_modulo_rol_update").html(html); 
            $("#mostrar_permisos_modulo_rol_update").show();
        });
    });
}

function update_permiso_individual(id,accion,allow_deny){   
  $.post('permisos/' + id + '/' + accion + '/' + allow_deny, 
        {_token:$('meta[name="csrf-token"]').attr('content')},function(data){ 
        //Datos Actualizado ALLOW OR DENY 
         if(allow_deny == 'ALLOW'){
            //DESACTIVANDO DENY
            $('#'+accion+'_deny_'+id).removeAttr('checked');
            //Activando ALLOW
            $('#'+accion+'_allow_'+id).attr('checked','checked');          
          }else{
            //DESACTIVANDO ALLOW
            $('#'+accion+'_allow_'+id).removeAttr('checked');
            //Activando DENY
            $('#'+accion+'_deny_'+id).attr('checked','checked');
          }         
      });
}

function update_all(id,allow_deny){  
  $.post('permisos/' + id + '/' + allow_deny, 
        {_token:$('meta[name="csrf-token"]').attr('content')},function(data){ 
        //aquí la data
        if(allow_deny == 'ALLOW'){
          //DESACTIVANDO DENY
          if($("#delete_deny_"+id).attr("checked")){
            $("#delete_deny_"+id).removeAttr("checked");
            $("#delete_allow_"+id).attr("checked","checked");            
          }
          if($("#update_deny_"+id).attr("checked")){
            $("#update_deny_"+id).removeAttr("checked");
            $("#update_allow_"+id).attr("checked","checked");
          }
          if($("#edit_deny_"+id).attr("checked")){
            $("#edit_deny_"+id).removeAttr("checked");
            $("#edit_allow_"+id).attr("checked","checked");
          }
          if($("#add_deny_"+id).attr("checked")){
            $("#add_deny_"+id).removeAttr("checked");
            $("#add_allow_"+id).attr("checked","checked");
          }
          if($("#view_deny_"+id).attr("checked")){
            $("#view_deny_"+id).removeAttr("checked");
            $("#view_allow_"+id).attr("checked","checked");
          }
          if($("#print_deny_"+id).attr("checked")){
            $("#print_deny_"+id).removeAttr("checked");
            $("#print_allow_"+id).attr("checked","checked");
          }
          if($("#download_deny_"+id).attr("checked")){
            $("#download_deny_"+id).removeAttr("checked");
            $("#download_allow_"+id).attr("checked","checked");
          }
          if($("#upload_deny_"+id).attr("checked")){
            $("#upload_deny_"+id).removeAttr("checked");
            $("#upload_allow_"+id).attr("checked","checked");
          }          
        }else{
          //DESACTIVANDO ALLOW
          if($("#delete_allow_"+id).attr("checked")){
            $("#delete_allow_"+id).removeAttr("checked");
            $("#delete_deny_"+id).attr("checked","checked");
          }
          if($("#update_allow_"+id).attr("checked")){
            $("#update_allow_"+id).removeAttr("checked");
            $("#update_deny_"+id).attr("checked","checked");
          }
          if($("#edit_allow_"+id).attr("checked")){
            $("#edit_allow_"+id).removeAttr("checked");
            $("#edit_deny_"+id).attr("checked","checked");
          }
          if($("#add_allow_"+id).attr("checked")){
            $("#add_allow_"+id).removeAttr("checked");
            $("#add_deny_"+id).attr("checked","checked");
          }
          if($("#view_allow_"+id).attr("checked")){
            $("#view_allow_"+id).removeAttr("checked");
            $("#view_deny_"+id).attr("checked","checked");
          }
          if($("#print_allow_"+id).attr("checked")){
            $("#print_allow_"+id).removeAttr("checked");
            $("#print_deny_"+id).attr("checked","checked");
          }
          if($("#download_allow_"+id).attr("checked")){
            $("#download_allow_"+id).removeAttr("checked");
            $("#download_deny_"+id).attr("checked","checked");
          }
          if($("#upload_allow_"+id).attr("checked")){
            $("#upload_allow_"+id).removeAttr("checked");
            $("#upload_deny_"+id).attr("checked","checked");
          }
        }        
      });
}