$(document).ready(function () {
  $(document).on('change','#rols_id', function (e) {
    var rols_id = $('#rols_id').val();        
    $.get('/permisos/' + rols_id , function(data){
    });
    $('#nombre_rol').empty();
    $('#nombre_rol').html('TARSICIO');            
  });
});
