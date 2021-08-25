<br> "columns": [
            { "data": "id" }, //Estas son las colunas del json
            { "data": "name" },
            { "data": "dsc" },
            { "data": "proyecto_name" },
            { "data": "prsp_def" },
            { "data": "prsp_ctb" },
            {"defaultContent": "<button type='button' class='form btn btn-primary btn-xs '> <span class='glyphicon glyphicon-search'></span></button>"}
            ]
 
$('#tbl_entidad tbody').on('click', 'button.form', function () //Al hacer click sobre el boton button.form de la linea de arriba
        {
           var data_form = tabla.row($(this).parents("tr")).data();
            prueba="2"; //Pongo la variable a dos para saber que he pasado por aqui
            //Oculto las dos tablas, cargo y muestro el div
            $('#tbl_Historias').hide(400);//Oculto las dos tablas
            $('#tbl_Tareas').hide(400);
             
                $('#formulario').load('formulario.html'); //Cargo la web en el div
                $('#formulario').show(100);//Muesto el div formulario
 
    } );