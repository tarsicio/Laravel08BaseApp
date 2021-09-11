function delete_confirm(){
    console.log('AQUI ESTOY');    
    const url = $(this).attr('href');
    swal({
        title: 'Esta usted seguro?',
        text: 'Este registro y sus detalle se borraran permanentemente!',
        icon: 'warning',
        buttons: ["Cancel", "Yes!"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
}    