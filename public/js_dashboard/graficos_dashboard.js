/**
* @author Tarsicio Carrizales
*/
var tienda_unica = $('#tiendas_id').val();
var contadorPasoEstado = 0;
var contadorPasoCiudad = 0;
var via_fecha = 0;
// CHART PARA LOS PRODUCTOS MAS VISITADOS
jQuery.ajax({
  url: "dashboard-statistics-productos/" + tienda_unica,
  type: 'GET',
  error: function() {
  },
  dataType: 'json',
  success: function(data) {
    var arrayProducto = [];
    var arrayVisitas = [];
    var arrayTiendas = [];
    jQuery.each(data, function(index, value) {
      arrayProducto.push(value.Producto);
      arrayVisitas.push(value.Visitas);
      arrayTiendas.push(value.Tienda);
    });
    var ctx = document.getElementById('productosMasVistos').getContext('2d');
    var productosMasVistos = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: arrayProducto,
        datasets: [{
          label: 'TOP 10 Posts más vistos',
          data: arrayVisitas,
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(180, 60, 132, 0.2)',
            'rgba(103, 162, 46, 0.2)',
            'rgba(175, 206, 86, 0.2)',
            'rgba(22, 40, 60, 0.2)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(180, 60, 132, 1)',
            'rgba(103, 162, 46, 1)',
            'rgba(175, 206, 86, 1)',
            'rgba(22, 40, 60, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  },
});

/*
* CHART PARA LOS CLIENTES SATISFECHOS (Valoración)
*/
jQuery.ajax({
  url: "dashboard-statistics-satisfecho/" + tienda_unica,
  type: 'GET',
  error: function() {
  },
  dataType: 'json',
  success: function(data) {
    var arrayDatos = [];
    var contTotalClientes = 0;
    jQuery.each(data, function(index, value) {
      arrayDatos.push(value.CLIENTES_INSATISFECHOS);
      contTotalClientes += parseInt(value.CLIENTES_INSATISFECHOS);
      arrayDatos.push(value.CLIENTES_SATISFECHOS);
      contTotalClientes += parseInt(value.CLIENTES_SATISFECHOS);
    });
    var ctx = document.getElementById('clientesSatisfechos').getContext('2d');
    var clientesSatisfechos = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ['Clientes insatisfechos', 'Clientes satisfechos'],
        datasets: [{
          label: 'Clientes',
            data: arrayDatos,
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)'
          ],
          borderWidth: 1
        }]
      },
      // option aquí
      options: {
        plugins: {
          datalabels: {
            formatter: function(value, context) {
              var operacion = parseFloat(value*100/contTotalClientes).toFixed(2);
              return operacion + '%';
            }
          }
        }
      }
    });
  },
});
/*
* En esta parte Inicia para los Productos más comentados
*/
jQuery.ajax({
  url: "dashboard-productos-comentados",
  type: 'GET',
  error: function() {
  },
  dataType: 'json',
  success: function(data) {
    var arrayProducto = [];
    var arrayCantidad = [];    
    jQuery.each(data, function(index, value) {
      arrayProducto.push(value.PRODUCTO);
      arrayCantidad.push(value.CANTIDAD_COMENTARIO);      
    });
    var ctx = document.getElementById('productoComentados').getContext('2d');
    var productosMasComentados = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: arrayProducto,
        datasets: [{
          label: 'TOP 20 Posts más comentados',
          data: arrayCantidad,
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(180, 60, 132, 0.2)',
            'rgba(103, 162, 46, 0.2)',
            'rgba(175, 206, 86, 0.2)',
            'rgba(22, 40, 60, 0.2)',
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(180, 60, 132, 0.2)',
            'rgba(103, 162, 46, 0.2)',
            'rgba(175, 206, 86, 0.2)',
            'rgba(22, 40, 60, 0.2)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(180, 60, 132, 1)',
            'rgba(103, 162, 46, 1)',
            'rgba(175, 206, 86, 1)',
            'rgba(22, 40, 60, 1)',
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(180, 60, 132, 1)',
            'rgba(103, 162, 46, 1)',
            'rgba(175, 206, 86, 1)',
            'rgba(22, 40, 60, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  },
});

/*
* En esta parte Inicia para los Generos por Raiting de las empresas
*/
jQuery.ajax({
  url: "dashboard-genero-empresa-estadistica/0/0/" + tienda_unica,
  type: 'GET',
  error: function() {
  },
  dataType: 'json',
  success: function(data) {
    var arrayDatosGenero = [];
    jQuery.each(data, function(index, value) {
      arrayDatosGenero.push(value.MASCULINO);
      arrayDatosGenero.push(value.FEMENINO);
      arrayDatosGenero.push(value.LGTBIQ);
    });
    var ctx = document.getElementById('genero_04').getContext('2d');
    var genero_04 = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['MASCULINO','FEMENINO','LGTBIQ'],
        datasets: [{
          label: 'Género / Gender',
          data: arrayDatosGenero,
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  },
});
/*
* En esta parte Inicia para los Generos por Comentario de las empresas
*/
// Chart estadística para Estado Civil
jQuery.ajax({
  url: "dashboard-estado-civil-empresa/0/0/" + tienda_unica,
  type: 'GET',
  error: function() {
  },
  dataType: 'json',
  success: function(data) {
    var arrayEstadoCivil = [];
    jQuery.each(data, function(index, value) {
      arrayEstadoCivil.push(value.SOLTERO);
      arrayEstadoCivil.push(value.CASADO);
      arrayEstadoCivil.push(value.DIVORCIADO);
      arrayEstadoCivil.push(value.VIUDO);
    });
    var ctx = document.getElementById('civil_05').getContext('2d');
    var civil_05 = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['SOLTERO','CASADO','DIVORCIADO','VIUDO'],
        datasets: [{
          label: 'Estado Civil / Civil Status',
          data: arrayEstadoCivil,
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(175, 206, 86, 0.2)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(103, 162, 46, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  },
});
// Chart estadística para Condición Social.
jQuery.ajax({
  url: "dashboard-condicion-Social-empresa/0/0/" + tienda_unica,
  type: 'GET',
  error: function() {
  },
  dataType: 'json',
  success: function(data) {
    var arrayCondicionSocial = [];
    jQuery.each(data, function(index, value) {
      arrayCondicionSocial.push(value.ESTUDIANTE);
      arrayCondicionSocial.push(value.EMPLEADO);
      arrayCondicionSocial.push(value.EMPRENDEDOR);
      arrayCondicionSocial.push(value.AUTONOMO);
      arrayCondicionSocial.push(value.EMPRESARIO);
      arrayCondicionSocial.push(value.JUBILADO);
      arrayCondicionSocial.push(value.BECADO);
      arrayCondicionSocial.push(value.INVERSIONISTA);
    });
    var ctx = document.getElementById('social_01').getContext('2d');
    var social_01 = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['ESTUDIANTE','EMPLEADO','EMPRENDEDOR','AUTONOMO','EMPRESARIO','JUBILADO','BECADO','INVERSIONISTA'],
        datasets: [{
          label: 'Condición Social / Social Conditions',
          data: arrayCondicionSocial,
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(103, 162, 46, 0.2)',
            'rgba(23, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(214, 206, 86, 0.2)',
            'rgba(14, 162, 46, 0.2)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(103, 162, 46, 1)',
            'rgba(23, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(214, 206, 86, 1)',
            'rgba(14, 162, 46, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  },
});

/*
* CHART PARA LOS QUE TIENEN HIJOS Y NO LOS TIENEN
*/
jQuery.ajax({
  url: "dashboard-cliente-hijos-empresa/0/0/" + tienda_unica,
  type: 'GET',
  error: function() {
  },
  dataType: 'json',
  success: function(data) {
    var arrayDatosHijos = [];
    var contTotalHijos = 0;
    jQuery.each(data, function(index, value) {
      arrayDatosHijos.push(value.SIN_HIJOS);
      contTotalHijos += parseInt(value.SIN_HIJOS);
      arrayDatosHijos.push(value.CON_HIJOS);
      contTotalHijos += parseInt(value.CON_HIJOS);
    });
    var ctx = document.getElementById('hijos_01').getContext('2d');
    var hijos_01 = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ['SIN HIJOS', 'CON HIJOS'],
        datasets: [{
          label: 'Hijos / Sons',
            data: arrayDatosHijos,
          backgroundColor: [
            'rgba(200, 20, 132, 0.2)',
            'rgba(154, 80, 235, 0.2)'
          ],
          borderColor: [
            'rgba(200, 20, 132, 1)',
            'rgba(154, 80, 235, 1)'
          ],
          borderWidth: 1
        }]
      },
      // option aquí
      options: {
      plugins: {
        datalabels: {
          formatter: function(value, context) {
            //return context.chart.data.labels[context.dataIndex];
            //return context.dataIndex + ': ' + Math.round(value*100) + '%';
            var operacion = parseFloat(value*100/contTotalHijos).toFixed(2);
            return operacion + '%';
          }
        }
      }
    }
    });
  },
});
// Chart estadística para Hobies.
jQuery.ajax({
  url: "dashboard-hobies-empresa/0/0/" + tienda_unica,
  type: 'GET',
  error: function() {
  },
  dataType: 'json',
  success: function(data) {
    var arrayHobiesNombre = [];
    var arrayHobiesTotal = [];
    var hobiesSinComillas = "";
    jQuery.each(data, function(index, value) {
      hobiesSinComillas = value.HOBIES;
      arrayHobiesNombre.push(hobiesSinComillas.replace(/['"]+/g, ''));
      arrayHobiesTotal.push(value.TOTAL_HOBIES);
    });
    var ctx = document.getElementById('hobies_01').getContext('2d');
    var hobies_01 = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: arrayHobiesNombre,
        datasets: [{
          label: 'Hobies / Hobbies',
          data: arrayHobiesTotal,
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(103, 162, 46, 0.2)',
            'rgba(23, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(214, 206, 86, 0.2)',
            'rgba(14, 162, 46, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(13, 99, 132, 0.2)',
            'rgba(54, 200, 235, 0.2)',
            'rgba(20, 206, 1, 0.2)',
            'rgba(10, 12, 200, 0.2)',
            'rgba(190, 99, 65, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(214, 206, 86, 0.2)',
            'rgba(14, 162, 46, 0.2)',
            'rgba(194, 162, 56, 0.2)',
            'rgba(43, 56, 86, 0.2)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(103, 162, 46, 1)',
            'rgba(23, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(214, 206, 86, 1)',
            'rgba(14, 162, 46, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(13, 99, 132, 1)',
            'rgba(54, 200, 235, 1)',
            'rgba(20, 206, 1, 1)',
            'rgba(10, 12, 200, 1)',
            'rgba(190, 99, 65, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(214, 206, 86, 1)',
            'rgba(14, 162, 46, 1)',
            'rgba(194, 162, 56, 1)',
            'rgba(43, 56, 86, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  },
});

/*
* CHART PARA LOS PAÍSES
*/
jQuery.ajax({
  url: "dashboard-paises-empresa/0/0/" + tienda_unica,
  type: 'GET',
  error: function() {
  },
  dataType: 'json',
  success: function(data) {
    var arrayDatosPaises = [];
    var contTotalPais = 0;
    jQuery.each(data, function(index, value) {
      arrayDatosPaises.push(value.ARGENTINA);
      contTotalPais += parseInt(value.ARGENTINA);
      arrayDatosPaises.push(value.COLOMBIA);
      contTotalPais += parseInt(value.COLOMBIA);
      arrayDatosPaises.push(value.PANAMA);
      contTotalPais += parseInt(value.PANAMA);
      arrayDatosPaises.push(value.VENEZUELA);
      contTotalPais += parseInt(value.VENEZUELA);
    });
    var ctx = document.getElementById('pais_01').getContext('2d');
    var pais_01 = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ['ARGENTINA', 'COLOMBIA','PANAMA','VENEZUELA'],
        datasets: [{
          label: 'Países / Country',
          data: arrayDatosPaises,
          backgroundColor: [
            'rgba(200, 20, 132, 0.2)',
            'rgba(154, 80, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(103, 162, 46, 0.2)'
          ],
          borderColor: [
            'rgba(200, 20, 132, 1)',
            'rgba(154, 80, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(103, 162, 46, 1)'
          ],
          borderWidth: 1
        }]
      },
      // option aquí
      options: {
        plugins: {
          datalabels: {
            formatter: function(value, context) {
              var operacion = parseFloat(value*100/contTotalPais).toFixed(2);
              return operacion + '%';
            }
          }
        },
        //Aquí el click
        onClick: function (e) {
          var activePoints = pais_01.getElementsAtEvent(e);
          var selectedIndex = activePoints[0]._index;
          var nombrePais = this.data.labels[selectedIndex];
          var idPais = 0;
          /*
          * Código de acceso a la tabla country
          * SELECT * FROM countries WHERE id IN (11,49,171,241);
          * Argentina = 11
          * Colombia = 49
          * Panama = 171
          * Venezuela = 241
          */
          if(nombrePais == "ARGENTINA"){
            idPais = 11;
          }else if(nombrePais == "COLOMBIA"){
            idPais = 49;
          }else if(nombrePais == "PANAMA"){
            idPais = 171;
          }else if(nombrePais == "VENEZUELA"){
            idPais = 241;
          }else{
            //NO HACE NADA
          }
          $('#contenedor_11').hide();
          mostrarMetricaEstadosProvincias(idPais);
        } // fin del evento click
      }
    });
  },
});
/*
* function para mostrar en el canvas los estados o provincia del país escojido
*/
function mostrarMetricaEstadosProvincias(idPais){
  /*
  * CHART PARA LOS Estados
  */
  url = "dashboard-estado-paises-empresa/0/0/" + tienda_unica + "/" + idPais    
  jQuery.ajax({
    url: url,
    type: 'GET',
    error: function() {
    },
    dataType: 'json',
    success: function(data) {
      var arrayNombreEstados = [];
      var arrayDatosEstados = [];
      var arrayIdEstado = [];
      jQuery.each(data, function(index, value) {
        // Aquí los datos de la consulta
        arrayDatosEstados.push(value.TOTAL);
        arrayNombreEstados.push([value.ESTADO]);
        arrayIdEstado.push([value.ESTADO,value.ID_ESTADO]);
      });
      // Inicio de refrescar el canvas
      if(contadorPasoEstado>0){
        document.getElementById("estados_01").remove();
        var canvas = document.createElement("canvas");
        canvas.id = "estados_01";
        canvas.class="width: 684px; height: 400px;";
        document.getElementById("contenedor_10").appendChild(canvas);
      }else{
        contadorPasoEstado += 1;
      }
      // Hasta aqui se refresca el canvas
      var ctx = document.getElementById('estados_01').getContext('2d');
      var estados_01 = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: arrayNombreEstados,
          datasets: [{
            label: '(Estados / Provincia) / (State / Province)',
            data: arrayDatosEstados,
            backgroundColor: [
              'rgba(200, 20, 132, 0.2)',
              'rgba(154, 80, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(103, 162, 46, 0.2)',
              'rgba(100, 20, 132, 0.2)',
              'rgba(45, 80, 235, 0.2)',
              'rgba(21, 206, 86, 0.2)',
              'rgba(170, 45, 46, 0.2)',
              'rgba(20, 80, 86, 0.2)',
              'rgba(103, 162, 46, 0.2)'
            ],
            borderColor: [
              'rgba(200, 20, 132, 1)',
              'rgba(154, 80, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(103, 162, 46, 1)',
              'rgba(100, 20, 132, 1)',
              'rgba(45, 80, 235, 1)',
              'rgba(21, 206, 86, 1)',
              'rgba(170, 45, 46, 1)',
              'rgba(20, 80, 86, 1)',
              'rgba(103, 162, 46, 1)'
            ],
            borderWidth: 1
          }]
        },
        // option aquí
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          },
          //Aquí el click
          onClick: function (e) {
            var activePoints = estados_01.getElementsAtEvent(e);
            var selectedIndex = activePoints[0]._index;
            var nombreEstado = this.data.labels[selectedIndex];
            var id_estado = 0;
            for(i=0;i<arrayIdEstado.length;i++){
              if(arrayIdEstado[i][0] == nombreEstado){
                id_estado = arrayIdEstado[i][1];
              }
            }
            $('#contenedor_11').show();
            mostrarMetricaCiudades(id_estado);
          } // fin del evento click
        }
      });
    },
  });
}
////////////////////////////////////////////////////////////////////////////////
/*
* function para mostrar en el canvas las ciudades del estado escojido
*/
function mostrarMetricaCiudades(idEstado){
  /*
  * CHART PARA Las Ciudades
  */
  url = "dashboard-ciudad-paises-empresa/0/0/" + tienda_unica + "/" + idEstado    
  jQuery.ajax({
    url: url,   
    type: 'GET',
    error: function() {
    },
    dataType: 'json',
    success: function(data) {
      var arrayDatosCiudades = [];
      var arrayNombreCiudades = [];
      jQuery.each(data, function(index, value) {
        // Aquí los datos de la consulta
        arrayNombreCiudades.push(value.CIUDAD);
        arrayDatosCiudades.push(value.TOTAL);
      });
      // Inicio de refrescar el canvas
      if(contadorPasoCiudad>0){
        document.getElementById("ciudades_01").remove();
        var canvas = document.createElement("canvas");
        canvas.id = "ciudades_01";
        canvas.class="width: 684px; height: 200px;";
        document.getElementById("contenedor_11").appendChild(canvas);
      }else{
        contadorPasoCiudad += 1;
      }
      // Hasta aqui se refresca el canvas
      var ctx = document.getElementById('ciudades_01').getContext('2d');
      var estados_01 = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: arrayNombreCiudades,
          datasets: [{
            label: 'Ciudades / City',
            data: arrayDatosCiudades,
            backgroundColor: [
              'rgba(45, 80, 235, 0.2)',
              'rgba(21, 206, 86, 0.2)',
              'rgba(170, 45, 46, 0.2)',
              'rgba(20, 80, 86, 0.2)',
              'rgba(103, 162, 46, 0.2)',
              'rgba(200, 20, 132, 0.2)',
              'rgba(154, 80, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(103, 162, 46, 0.2)',
              'rgba(100, 20, 132, 0.2)',
              'rgba(200, 20, 132, 0.2)',
              'rgba(154, 80, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(103, 162, 46, 0.2)',
              'rgba(100, 20, 132, 0.2)',
              'rgba(45, 80, 235, 0.2)',
              'rgba(21, 206, 86, 0.2)',
              'rgba(170, 45, 46, 0.2)',
              'rgba(20, 80, 86, 0.2)',
              'rgba(103, 162, 46, 0.2)'
            ],
            borderColor: [
              'rgba(45, 80, 235, 1)',
              'rgba(21, 206, 86, 1)',
              'rgba(170, 45, 46, 1)',
              'rgba(20, 80, 86, 1)',
              'rgba(103, 162, 46, 1)',
              'rgba(200, 20, 132, 1)',
              'rgba(154, 80, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(103, 162, 46, 1)',
              'rgba(100, 20, 132, 1)',
              'rgba(200, 20, 132, 1)',
              'rgba(154, 80, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(103, 162, 46, 1)',
              'rgba(100, 20, 132, 1)',
              'rgba(45, 80, 235, 1)',
              'rgba(21, 206, 86, 1)',
              'rgba(170, 45, 46, 1)',
              'rgba(20, 80, 86, 1)',
              'rgba(103, 162, 46, 1)'
            ],
            borderWidth: 1
          }]
        },
        // option aquí
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          }
        }
      });
    },
  });
}

///////////////    VISITAS A LA EMPRESA ///////////////////////////

$.get('dashboard-quienvio-empresa/0/0/' + tienda_unica,     function (data) {
  if (Object.keys(data).length>0) {
    var html = '';
    var contador = 1;    
    $.each(data, function(index, item) {
      //console.log(item['NOMBRE']);
      html += "<tr>";
      html += "<th scope=\"row\">" + contador + "</th>";
      html += "<td>" + item['NOMBRE'] + "</td>";
      html += "<td>" + item['CORREO'] + "</td>";
      html += "<td NOWRAP>" + item['FECHA DE ACCESO'] +"</td>";
      html += "</tr>";      
      contador += 1;
    });
    $("#vistas_a_empresa").html(html);
  } else {    
  }
});

//////////////    FIN DE LA VISITA A LA EMPRESA ///////////////////

/*
* AQUI INICIA TODO EL PROCEDIMIENTO PARA CUANDO SE ESCOJE LA FECHA INICIO Y FECHA FINAL
*/

$(document).on('click','#Filtar_Metrica', function (e) {
  var fechaInicial = '\'' + $('#fechaInicial').val() + '\'';
    var fechaFinal = '\'' + $('#fechaFinal').val() + '\'';
      var tienda_unica = $('#tiendas_id').val();  
  $('#contenedor_10').hide();
  $('#contenedor_11').hide();
  if(($('#fechaInicial').val()>$('#fechaFinal').val()) || ($('#fechaInicial').val() == '' || $('#fechaFinal').val() == '')) {
    $('#loading').hide();
    $('#msg_Error').html('<div style=\"text-align: center; background-color: red; color: #FFFFFF;\">ERROR, VERIFIQUE LAS FECHAS HAY ALGO INCORRECTO</div>');
    $('#msg_Error').show();
  }else{    
    productosClientesVisualizar(fechaInicial,fechaFinal,tienda_unica);
  }
  $('#loading').hide();
});

/*
* AL HACER CLICK EN EL SELECT, DE TODAS LAS FECHAS
*/

$(document).on('change','#metricas_id', function (e) {
  var tienda_unica = $('#tiendas_id').val();
  var metrica = $('#metricas_id').val();
  const fecha = new Date();
  const hoy = fecha.getDate();  
  const mesActual = fecha.getMonth() + 1;
  const anoActual = fecha.getFullYear();
  const diaSemana = fecha.getDay();// Posicion de arreglo en la semana 0 = Domingo, 6 = Sabado.
  var inicio_year = '\'' + anoActual + '-01-01';
  var inicio_mes = '\'' + anoActual + '-' + mesActual + '-01'; 
  if(metrica == 'Personalizado'){
    var fechaInicial = '\'' + $('#fechaInicial').val() + '\'';
    var fechaFinal = '\'' + $('#fechaFinal').val() + '\''; 
  }else{
    var fechaInicial = '\'' + anoActual + '-' + mesActual + '-' + hoy + '\'' ;
    var fechaFinal = '\'' + anoActual + '-' + mesActual + '-' + hoy + '\'' ;
  }  
  // Manejo de las fechas.
  var fecha_hoy = '';
  var fecha_anterior = '';
  contadorPasoEstado = 0;
  contadorPasoCiudad = 0;  
  $('#contenedor_10').hide();
  $('#contenedor_11').hide();
  if(metrica == 'Hoy'){
    $('#fecha_uno').hide();
    $('#fecha_dos').hide();
    $('#boton_buscar').hide();
    $('#productosMasVistos').empty();
    $('#clientesSatisfechos').empty();
    productosClientesVisualizar(fechaFinal,fechaFinal,tienda_unica);
  }else if(metrica == 'Esta Semana mes'){
    $('#fecha_uno').hide();
    $('#fecha_dos').hide();
    $('#boton_buscar').hide();
    if(diaSemana == 0){
      productosClientesVisualizar(fechaFinal,fechaFinal,tienda_unica);
    }else if(diaSemana == 1){
      fecha_hoy = fechaFinal;
      fecha_llegando = sumarDias(fecha,-1);
      var day = fecha_llegando.getDate();
      day = verificarDiaMes(day);
      var mont = fecha_llegando.getMonth() + 1;
      mont = verificarDiaMes(mont);
      var year = fecha_llegando.getFullYear();
      var fecha_completa = '\'' + year + '-' + mont + '-' + day + '\'';
      fechaInicial = fecha_completa;
      productosClientesVisualizar(fechaInicial,fechaFinal,tienda_unica);
    }else if(diaSemana == 2){
      fecha_hoy = fechaFinal;
      fecha_llegando = sumarDias(fecha,-2);
      var day = fecha_llegando.getDate();
      day = verificarDiaMes(day);
      var mont = fecha_llegando.getMonth() + 1;
      mont = verificarDiaMes(mont);
      var year = fecha_llegando.getFullYear();
      var fecha_completa = '\'' + year + '-' + mont + '-' + day + '\'';
      fechaInicial = fecha_completa;
      productosClientesVisualizar(fechaInicial,fechaFinal,tienda_unica);
    }else if(diaSemana == 3){
      fecha_hoy = fechaFinal;
      fecha_llegando = sumarDias(fecha,-3);
      var day = fecha_llegando.getDate();
      day = verificarDiaMes(day);
      var mont = fecha_llegando.getMonth() + 1;
      mont = verificarDiaMes(mont);
      var year = fecha_llegando.getFullYear();
      var fecha_completa = '\'' + year + '-' + mont + '-' + day + '\'';
      fechaInicial = fecha_completa;
      productosClientesVisualizar(fechaInicial,fechaFinal,tienda_unica);
    }else if(diaSemana == 4){
      fecha_hoy = fechaFinal;
      fecha_llegando = sumarDias(fecha,-4);
      var day = fecha_llegando.getDate();
      day = verificarDiaMes(day);
      var mont = fecha_llegando.getMonth() + 1;
      mont = verificarDiaMes(mont);
      var year = fecha_llegando.getFullYear();
      var fecha_completa = '\'' + year + '-' + mont + '-' + day + '\'';
      fechaInicial = fecha_completa;
      productosClientesVisualizar(fechaInicial,fechaFinal,tienda_unica);
    }else if(diaSemana == 5){
      fecha_hoy = fechaFinal;
      fecha_llegando = sumarDias(fecha,-5);
      var day = fecha_llegando.getDate();
      day = verificarDiaMes(day);
      var mont = fecha_llegando.getMonth() + 1;
      mont = verificarDiaMes(mont);
      var year = fecha_llegando.getFullYear();
      var fecha_completa = '\'' + year + '-' + mont + '-' + day + '\'';
      fechaInicial = fecha_completa;
      productosClientesVisualizar(fechaInicial,fechaFinal,tienda_unica);
    }else if(diaSemana == 6){
      fecha_hoy = fechaFinal;
      fecha_llegando = sumarDias(fecha,-6);
      var day = fecha_llegando.getDate();
      day = verificarDiaMes(day);
      var mont = fecha_llegando.getMonth() + 1;
      mont = verificarDiaMes(mont);
      var year = fecha_llegando.getFullYear();
      var fecha_completa = '\'' + year + '-' + mont + '-' + day + '\'';
      fechaInicial = fecha_completa;
      productosClientesVisualizar(fechaInicial,fechaFinal,tienda_unica);
    }else{
      //NO HACE NADA
    }
  }else if(metrica == 'Este Mes'){
    $('#fecha_uno').hide();
    $('#fecha_dos').hide();
    $('#boton_buscar').hide();
    var dia_ConCero = '01';
    var mes_ConCero = verificarDiaMes(mesActual);
    var fecha_completa = '\'' + anoActual + '-' + mes_ConCero + '-' + dia_ConCero + '\'';
    productosClientesVisualizar(fecha_completa,fechaFinal,tienda_unica);
  }else if(metrica == 'Este Año'){
    $('#fecha_uno').hide();
    $('#fecha_dos').hide();
    $('#boton_buscar').hide();
    var dia_ConCero = '01';
    var mes_ConCero = '01';
    var fecha_completa = '\'' + anoActual + '-' + mes_ConCero + '-' + dia_ConCero + '\'';
    productosClientesVisualizar(fecha_completa,fechaFinal,tienda_unica);
  }else if(metrica == 'Personalizado'){
    $('#fecha_uno').show();
    $('#fecha_dos').show();
    $('#boton_buscar').show();
  }else{
    $('#fecha_uno').hide();
    $('#fecha_dos').hide();
    $('#boton_buscar').hide();
    //AQUI NO SE HACE NADA....
  }
});

/*
* function que verifica que el día tenga un cero si es del 1 al 9
*/
function verificarDiaMes(dayMes){
  if(dayMes == 1){
    dayMes = '01';
  }else if(dayMes == 2){
    dayMes = '02';
  }else if(dayMes == 3){
    dayMes = '03';
  }else if(dayMes == 4){
    dayMes = '04';
  }else if(dayMes == 5){
    dayMes = '05';
  }else if(dayMes == 6){
    dayMes = '06';
  }else if(dayMes == 7){
    dayMes = '07';
  }else if(dayMes == 8){
    dayMes = '08';
  }else if(dayMes == 9){
    dayMes = '09';
  }else{
    //NO HACE NADA
  }
  return dayMes;
}

/* Función que suma o resta días a una fecha, si el parámetro
*  días es negativo restará los días
*/
function sumarDias(fecha, dias){
  fecha.setDate(fecha.getDate() + dias);
  return fecha;
}
/*
* creamos un metodo que llame a los productos y clientes satisfechos.
*/

function productosClientesVisualizar(fecha_inicio,fecha_fin,tienda_unica){
  $('#msg_Error').hide();
  $('#loading').show();
  // CHART PARA LOS PRODUCTOS MAS VISITADOS
  jQuery.ajax({
    url: "dashboard-statistics-productos/" + fecha_inicio + "/" + fecha_fin + '/' + tienda_unica,
    type: 'GET',
    error: function() {
    },
    dataType: 'json',
    success: function(data) {
      var arrayProducto = [];
      var arrayVisitas = [];
      jQuery.each(data, function(index, value) {
        arrayProducto.push(value.Producto);
        arrayVisitas.push(value.Visitas);
      });
      // Inicio de refrescar el canvas
      document.getElementById("productosMasVistos").remove();
      var canvas = document.createElement("canvas");
      canvas.id = "productosMasVistos";
      canvas.class="width: 684px; height: 400px;";
      document.getElementById("contenedor_01").appendChild(canvas);
      // Hasta aqui se refresca el canvas
      var ctx = document.getElementById('productosMasVistos').getContext('2d');
      var productosMasVistos = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: arrayProducto,
          datasets: [{
            label: 'TOP 10 Posts más vistos',
            data: arrayVisitas,
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)',
              'rgba(180, 60, 132, 0.2)',
              'rgba(103, 162, 46, 0.2)',
              'rgba(175, 206, 86, 0.2)',
              'rgba(22, 40, 60, 0.2)'
            ],
            borderColor: [
              'rgba(255, 99, 132, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)',
              'rgba(180, 60, 132, 1)',
              'rgba(103, 162, 46, 1)',
              'rgba(175, 206, 86, 1)',
              'rgba(22, 40, 60, 1)'
            ],
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          }
        }
      });
    },
  });
  // El OTRO.
  /*
  * CHART PARA LOS CLIENTES SATISFECHOS
  */
  jQuery.ajax({
    url: "dashboard-statistics-satisfecho/" + fecha_inicio + "/" + fecha_fin + '/' + tienda_unica,
    type: 'GET',
    error: function() {
      console.log('entro algún error, en el grafico usuario satisfecho.');
    },
    dataType: 'json',
    success: function(data) {
      var arrayDatos = [];
      var contTotalClientes = 0;
      jQuery.each(data, function(index, value) {
        arrayDatos.push(value.CLIENTES_INSATISFECHOS);
        contTotalClientes += parseInt(value.CLIENTES_INSATISFECHOS);
        arrayDatos.push(value.CLIENTES_SATISFECHOS);
        contTotalClientes += parseInt(value.CLIENTES_SATISFECHOS);
      });
      // Inicio de refrescar el canvas
      document.getElementById("clientesSatisfechos").remove();
      var canvas = document.createElement("canvas");
      canvas.id = "clientesSatisfechos";
      canvas.class="width: 684px; height: 400px;";
      document.getElementById("contenedor_02").appendChild(canvas);
      // Hasta aqui se refresca el canvas
      var ctx = document.getElementById('clientesSatisfechos').getContext('2d');
      var clientesSatisfechos = new Chart(ctx, {
        type: 'pie',
        data: {
          labels: ['Clienets insatisfechos', 'Clientes satisfechos'],
          datasets: [{
            label: 'Clientes',
            data: arrayDatos,
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)'
            ],
            borderColor: [
              'rgba(255, 99, 132, 1)',
              'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 1
          }]
        },
        // option aquí
        options: {
          plugins: {
            datalabels: {
              formatter: function(value, context) {
                var operacion = parseFloat(value*100/contTotalClientes).toFixed(2);
                return operacion + '%';
              }
            }
          }
        }
      });
    },
  });
  /*
  * Productos más Comentados los 20 Primeros
  */
  /*
* En esta parte Inicia para los Productos más comentados
*/
jQuery.ajax({
  url: "dashboard-productos-comentadosFecha/" + fecha_inicio + "/" + fecha_fin,
  type: 'GET',
  error: function() {
  },
  dataType: 'json',
  success: function(data) {
    var arrayProducto = [];
    var arrayCantidad = [];    
    jQuery.each(data, function(index, value) {
      arrayProducto.push(value.PRODUCTO);
      arrayCantidad.push(value.CANTIDAD_COMENTARIO);      
    });
    // Inicio de refrescar el canvas
      document.getElementById("productoComentados").remove();
      var canvas = document.createElement("canvas");
      canvas.id = "productoComentados";
      canvas.class="width: 684px; height: 400px;";
      document.getElementById("contenedor_03").appendChild(canvas);
      // Hasta aqui se refresca el canvas
    var ctx = document.getElementById('productoComentados').getContext('2d');
    var productosMasComentados = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: arrayProducto,
        datasets: [{
          label: 'TOP 20 Posts más comentados',
          data: arrayCantidad,
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(180, 60, 132, 0.2)',
            'rgba(103, 162, 46, 0.2)',
            'rgba(175, 206, 86, 0.2)',
            'rgba(22, 40, 60, 0.2)',
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(180, 60, 132, 0.2)',
            'rgba(103, 162, 46, 0.2)',
            'rgba(175, 206, 86, 0.2)',
            'rgba(22, 40, 60, 0.2)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(180, 60, 132, 1)',
            'rgba(103, 162, 46, 1)',
            'rgba(175, 206, 86, 1)',
            'rgba(22, 40, 60, 1)',
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(180, 60, 132, 1)',
            'rgba(103, 162, 46, 1)',
            'rgba(175, 206, 86, 1)',
            'rgba(22, 40, 60, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  },
});
/*
* En esta parte Inicia para los Generos por Raiting de las empresas
*/
jQuery.ajax({
  url: "dashboard-genero-empresa-estadistica/" + fecha_inicio + "/" + fecha_fin + "/" + tienda_unica,
  type: 'GET',
  error: function() {
  },
  dataType: 'json',
  success: function(data) {
    var arrayDatosGenero = [];
    jQuery.each(data, function(index, value) {
      arrayDatosGenero.push(value.MASCULINO);
      arrayDatosGenero.push(value.FEMENINO);
      arrayDatosGenero.push(value.LGTBIQ);
    });
    // Inicio de refrescar el canvas
      document.getElementById("genero_04").remove();
      var canvas = document.createElement("canvas");
      canvas.id = "genero_04";
      canvas.class="width: 684px; height: 400px;";
      document.getElementById("contenedor_04").appendChild(canvas);
      // Hasta aqui se refresca el canvas
    var ctx = document.getElementById('genero_04').getContext('2d');
    var genero_04 = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['MASCULINO','FEMENINO','LGTBIQ'],
        datasets: [{
          label: 'Género / Gender',
          data: arrayDatosGenero,
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  },
});
/*
* En esta parte Inicia para estado Cilvil
*/
// Chart estadística para Estado Civil
jQuery.ajax({
  url: "dashboard-estado-civil-empresa/" + fecha_inicio + "/" + fecha_fin + "/" + tienda_unica,
  type: 'GET',
  error: function() {
  },
  dataType: 'json',
  success: function(data) {
    var arrayEstadoCivil = [];
    jQuery.each(data, function(index, value) {
      arrayEstadoCivil.push(value.SOLTERO);
      arrayEstadoCivil.push(value.CASADO);
      arrayEstadoCivil.push(value.DIVORCIADO);
      arrayEstadoCivil.push(value.VIUDO);
    });
    // Inicio de refrescar el canvas
    document.getElementById("civil_05").remove();
    var canvas = document.createElement("canvas");
    canvas.id = "civil_05";
    canvas.class="width: 684px; height: 400px;";
    document.getElementById("contenedor_05").appendChild(canvas);
      // Hasta aqui se refresca el canvas
      var ctx = document.getElementById('civil_05').getContext('2d');
      var civil_05 = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['SOLTERO','CASADO','DIVORCIADO','VIUDO'],
          datasets: [{
            label: 'Estado Civil / Civil Status',
            data: arrayEstadoCivil,
            backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(175, 206, 86, 0.2)'
            ],
            borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(103, 162, 46, 1)'
            ],
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          }
        }
      });
    },
  });
// Chart estadística para Condición Social.
jQuery.ajax({
  url: "dashboard-condicion-Social-empresa/" + fecha_inicio + "/" + fecha_fin + "/" + tienda_unica,
  type: 'GET',
  error: function() {
  },
  dataType: 'json',
  success: function(data) {
    var arrayCondicionSocial = [];
    jQuery.each(data, function(index, value) {
      arrayCondicionSocial.push(value.ESTUDIANTE);
      arrayCondicionSocial.push(value.EMPLEADO);
      arrayCondicionSocial.push(value.EMPRENDEDOR);
      arrayCondicionSocial.push(value.AUTONOMO);
      arrayCondicionSocial.push(value.EMPRESARIO);
      arrayCondicionSocial.push(value.JUBILADO);
      arrayCondicionSocial.push(value.BECADO);
      arrayCondicionSocial.push(value.INVERSIONISTA);
    });
    // Inicio de refrescar el canvas
    document.getElementById("social_01").remove();
    var canvas = document.createElement("canvas");
    canvas.id = "social_01";
    canvas.class="width: 684px; height: 400px;";
    document.getElementById("contenedor_06").appendChild(canvas);
      // Hasta aqui se refresca el canvas
    var ctx = document.getElementById('social_01').getContext('2d');
    var social_01 = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['ESTUDIANTE','EMPLEADO','EMPRENDEDOR','AUTONOMO','EMPRESARIO','JUBILADO','BECADO','INVERSIONISTA'],
        datasets: [{
          label: 'Condición Social / Social Conditions',
          data: arrayCondicionSocial,
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(103, 162, 46, 0.2)',
            'rgba(23, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(214, 206, 86, 0.2)',
            'rgba(14, 162, 46, 0.2)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(103, 162, 46, 1)',
            'rgba(23, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(214, 206, 86, 1)',
            'rgba(14, 162, 46, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  },
});

/*
* CHART PARA LOS QUE TIENEN HIJOS Y NO LOS TIENEN
*/
jQuery.ajax({
  url: "dashboard-cliente-hijos-empresa/" + fecha_inicio + "/" + fecha_fin + "/" + tienda_unica,
  type: 'GET',
  error: function() {
  },
  dataType: 'json',
  success: function(data) {
    var arrayDatosHijos = [];
    var contTotalHijos = 0;
    jQuery.each(data, function(index, value) {
      arrayDatosHijos.push(value.SIN_HIJOS);
      contTotalHijos += parseInt(value.SIN_HIJOS);
      arrayDatosHijos.push(value.CON_HIJOS);
      contTotalHijos += parseInt(value.CON_HIJOS);
    });
    // Inicio de refrescar el canvas
    document.getElementById("hijos_01").remove();
    var canvas = document.createElement("canvas");
    canvas.id = "hijos_01";
    canvas.class="width: 684px; height: 400px;";
    document.getElementById("contenedor_07").appendChild(canvas);
      // Hasta aqui se refresca el canvas
    var ctx = document.getElementById('hijos_01').getContext('2d');
    var hijos_01 = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ['SIN HIJOS', 'CON HIJOS'],
        datasets: [{
          label: 'Hijos / Sons',
            data: arrayDatosHijos,
          backgroundColor: [
            'rgba(200, 20, 132, 0.2)',
            'rgba(154, 80, 235, 0.2)'
          ],
          borderColor: [
            'rgba(200, 20, 132, 1)',
            'rgba(154, 80, 235, 1)'
          ],
          borderWidth: 1
        }]
      },
      // option aquí
      options: {
      plugins: {
        datalabels: {
          formatter: function(value, context) {
            //return context.chart.data.labels[context.dataIndex];
            //return context.dataIndex + ': ' + Math.round(value*100) + '%';
            var operacion = parseFloat(value*100/contTotalHijos).toFixed(2);
            return operacion + '%';
          }
        }
      }
    }
    });
  },
});
// Chart estadística para Hobies.
jQuery.ajax({
  url: "dashboard-hobies-empresa/" + fecha_inicio + "/" + fecha_fin + "/" + tienda_unica,
  type: 'GET',
  error: function() {
  },
  dataType: 'json',
  success: function(data) {
    var arrayHobiesNombre = [];
    var arrayHobiesTotal = [];
    var hobiesSinComillas = "";
    jQuery.each(data, function(index, value) {
      hobiesSinComillas = value.HOBIES;
      arrayHobiesNombre.push(hobiesSinComillas.replace(/['"]+/g, ''));
      arrayHobiesTotal.push(value.TOTAL_HOBIES);
    });
    // Inicio de refrescar el canvas
    document.getElementById("hobies_01").remove();
    var canvas = document.createElement("canvas");
    canvas.id = "hobies_01";
    canvas.class="width: 684px; height: 400px;";
    document.getElementById("contenedor_08").appendChild(canvas);
      // Hasta aqui se refresca el canvas
    var ctx = document.getElementById('hobies_01').getContext('2d');
    var hobies_01 = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: arrayHobiesNombre,
        datasets: [{
          label: 'Hobies / Hobbies',
          data: arrayHobiesTotal,
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(103, 162, 46, 0.2)',
            'rgba(23, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(214, 206, 86, 0.2)',
            'rgba(14, 162, 46, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(13, 99, 132, 0.2)',
            'rgba(54, 200, 235, 0.2)',
            'rgba(20, 206, 1, 0.2)',
            'rgba(10, 12, 200, 0.2)',
            'rgba(190, 99, 65, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(214, 206, 86, 0.2)',
            'rgba(14, 162, 46, 0.2)',
            'rgba(194, 162, 56, 0.2)',
            'rgba(43, 56, 86, 0.2)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(103, 162, 46, 1)',
            'rgba(23, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(214, 206, 86, 1)',
            'rgba(14, 162, 46, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(13, 99, 132, 1)',
            'rgba(54, 200, 235, 1)',
            'rgba(20, 206, 1, 1)',
            'rgba(10, 12, 200, 1)',
            'rgba(190, 99, 65, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(214, 206, 86, 1)',
            'rgba(14, 162, 46, 1)',
            'rgba(194, 162, 56, 1)',
            'rgba(43, 56, 86, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  },
});
/*
* CHART PARA LOS PAÍSES
*/
jQuery.ajax({
  url: "dashboard-paises-empresa/" + fecha_inicio + "/" + fecha_fin + "/" + tienda_unica,
  type: 'GET',
  error: function() {
  },
  dataType: 'json',
  success: function(data) {
    var arrayDatosPaises = [];
    var contTotalPais = 0;
    jQuery.each(data, function(index, value) {
      arrayDatosPaises.push(value.ARGENTINA);
      contTotalPais += parseInt(value.ARGENTINA);
      arrayDatosPaises.push(value.COLOMBIA);
      contTotalPais += parseInt(value.COLOMBIA);
      arrayDatosPaises.push(value.PANAMA);
      contTotalPais += parseInt(value.PANAMA);
      arrayDatosPaises.push(value.VENEZUELA);
      contTotalPais += parseInt(value.VENEZUELA);
    });
    // Inicio de refrescar el canvas
    document.getElementById("pais_01").remove();
    var canvas = document.createElement("canvas");
    canvas.id = "pais_01";
    canvas.class="width: 684px; height: 400px;";
    document.getElementById("contenedor_09").appendChild(canvas);
      // Hasta aqui se refresca el canvas
    var ctx = document.getElementById('pais_01').getContext('2d');
    var pais_01 = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ['ARGENTINA', 'COLOMBIA','PANAMA','VENEZUELA'],
        datasets: [{
          label: 'Países / Country',
          data: arrayDatosPaises,
          backgroundColor: [
            'rgba(200, 20, 132, 0.2)',
            'rgba(154, 80, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(103, 162, 46, 0.2)'
          ],
          borderColor: [
            'rgba(200, 20, 132, 1)',
            'rgba(154, 80, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(103, 162, 46, 1)'
          ],
          borderWidth: 1
        }]
      },
      // option aquí
      options: {
        plugins: {
          datalabels: {
            formatter: function(value, context) {
              var operacion = parseFloat(value*100/contTotalPais).toFixed(2);
              return operacion + '%';
            }
          }
        },
        //Aquí el click
        onClick: function (e) {
          var activePoints = pais_01.getElementsAtEvent(e);
          var selectedIndex = activePoints[0]._index;
          var nombrePais = this.data.labels[selectedIndex];
          var idPais = 0;
          /*
          * Código de acceso a la tabla country
          * SELECT * FROM countries WHERE id IN (11,49,171,241);
          * Argentina = 11
          * Colombia = 49
          * Panama = 171
          * Venezuela = 241
          */
          if(nombrePais == "ARGENTINA"){
            idPais = 11;
          }else if(nombrePais == "COLOMBIA"){
            idPais = 49;
          }else if(nombrePais == "PANAMA"){
            idPais = 171;
          }else if(nombrePais == "VENEZUELA"){
            idPais = 241;
          }else{
            //NO HACE NADA
          }
          $('#contenedor_11').hide();
          $('#contenedor_10').show();
          mostrarMetricaEstadosProvincias2(idPais,fecha_inicio,fecha_fin,tienda_unica);
        } // fin del evento click
      }
    });
  },
});

///////////////    VISITAS A LA EMPRESA ///////////////////////////
$("#vistas_a_empresa").empty();
$.get('dashboard-quienvio-empresa/' + fecha_inicio + "/" + fecha_fin + "/" + tienda_unica,     function (data) {
  if (Object.keys(data).length>0) {
    var html = '';
    var contador = 1;    
    $.each(data, function(index, item) {
      //console.log(item['NOMBRE']);
      html += "<tr>";
      html += "<th scope=\"row\">" + contador + "</th>";
      html += "<td>" + item['NOMBRE'] + "</td>";
      html += "<td>" + item['CORREO'] + "</td>";
      html += "<td NOWRAP>" + item['FECHA DE ACCESO'] +"</td>";
      html += "</tr>";      
      contador += 1;
    });
    $("#vistas_a_empresa").html(html);
  } else {    
  }
});

//////////////    FIN DE LA VISITA A LA EMPRESA ///////////////////

$('#loading').hide();
return true;
} //productosClientesVisualizar este es el fin de la function....

/////////////////////// CASO ESPECIAL //////////////////////////////

/*
* function para mostrar en el canvas los estados o provincia del país escojido
*/
function mostrarMetricaEstadosProvincias2(idPais,fecha_inicio,fecha_fin,tienda_unica){
  /*
  * CHART PARA LOS Estados
  */
  url = "dashboard-estado-paises-empresa/" + fecha_inicio + "/" + fecha_fin + "/" + tienda_unica + "/" + idPais     
  jQuery.ajax({
    url: url,
    type: 'GET',
    error: function() {
    },
    dataType: 'json',
    success: function(data) {
      var arrayNombreEstados = [];
      var arrayDatosEstados = [];
      var arrayIdEstado = [];
      jQuery.each(data, function(index, value) {
        // Aquí los datos de la consulta
        arrayDatosEstados.push(value.TOTAL);
        arrayNombreEstados.push([value.ESTADO]);
        arrayIdEstado.push([value.ESTADO,value.ID_ESTADO]);
      });
      // Inicio de refrescar el canvas      
      if(contadorPasoEstado>0){
        document.getElementById("estados_01").remove();
        var canvas = document.createElement("canvas");
        canvas.id = "estados_01";
        canvas.class="width: 684px; height: 400px;";
        document.getElementById("contenedor_10").appendChild(canvas);
      }else{
        contadorPasoEstado += 1;
      }
      // Hasta aqui se refresca el canvas
      var ctx = document.getElementById('estados_01').getContext('2d');
      var estados_01 = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: arrayNombreEstados,
          datasets: [{
            label: '(Estados / Provincia) / (State / Province)',
            data: arrayDatosEstados,
            backgroundColor: [
              'rgba(200, 20, 132, 0.2)',
              'rgba(154, 80, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(103, 162, 46, 0.2)',
              'rgba(100, 20, 132, 0.2)',
              'rgba(45, 80, 235, 0.2)',
              'rgba(21, 206, 86, 0.2)',
              'rgba(170, 45, 46, 0.2)',
              'rgba(20, 80, 86, 0.2)',
              'rgba(103, 162, 46, 0.2)'
            ],
            borderColor: [
              'rgba(200, 20, 132, 1)',
              'rgba(154, 80, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(103, 162, 46, 1)',
              'rgba(100, 20, 132, 1)',
              'rgba(45, 80, 235, 1)',
              'rgba(21, 206, 86, 1)',
              'rgba(170, 45, 46, 1)',
              'rgba(20, 80, 86, 1)',
              'rgba(103, 162, 46, 1)'
            ],
            borderWidth: 1
          }]
        },
        // option aquí
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          },
          //Aquí el click
          onClick: function (e) {
            var activePoints = estados_01.getElementsAtEvent(e);
            var selectedIndex = activePoints[0]._index;
            var nombreEstado = this.data.labels[selectedIndex];
            var id_estado = 0;
            for(i=0;i<arrayIdEstado.length;i++){
              if(arrayIdEstado[i][0] == nombreEstado){
                id_estado = arrayIdEstado[i][1];
              }
            }
            $('#contenedor_11').show();
            mostrarMetricaCiudades2(id_estado,fecha_inicio,fecha_fin,tienda_unica);
          } // fin del evento click
        }
      });
    },
  });
}
////////////////////////////////////////////////////////////////////////////////
/*
* function para mostrar en el canvas las ciudades del estado escojido
*/
function mostrarMetricaCiudades2(idEstado,fecha_inicio,fecha_fin,tienda_unica){
  /*
  * CHART PARA Las Ciudades
  */
  url = "dashboard-ciudad-paises-empresa/" + fecha_inicio + "/" + fecha_fin + "/" + tienda_unica + "/" + idEstado    
  jQuery.ajax({
    url: url,   
    type: 'GET',
    error: function() {
    },
    dataType: 'json',
    success: function(data) {
      var arrayDatosCiudades = [];
      var arrayNombreCiudades = [];
      jQuery.each(data, function(index, value) {
        // Aquí los datos de la consulta
        arrayNombreCiudades.push(value.CIUDAD);
        arrayDatosCiudades.push(value.TOTAL);
      });
      // Inicio de refrescar el canvas
      if(contadorPasoCiudad>0){
        document.getElementById("ciudades_01").remove();
        var canvas = document.createElement("canvas");
        canvas.id = "ciudades_01";
        canvas.class="width: 684px; height: 200px;";
        document.getElementById("contenedor_11").appendChild(canvas);
      }else{
        contadorPasoCiudad += 1;
      }
      // Hasta aqui se refresca el canvas
      var ctx = document.getElementById('ciudades_01').getContext('2d');
      var estados_01 = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: arrayNombreCiudades,
          datasets: [{
            label: 'Ciudades / City',
            data: arrayDatosCiudades,
            backgroundColor: [
              'rgba(45, 80, 235, 0.2)',
              'rgba(21, 206, 86, 0.2)',
              'rgba(170, 45, 46, 0.2)',
              'rgba(20, 80, 86, 0.2)',
              'rgba(103, 162, 46, 0.2)',
              'rgba(200, 20, 132, 0.2)',
              'rgba(154, 80, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(103, 162, 46, 0.2)',
              'rgba(100, 20, 132, 0.2)',
              'rgba(200, 20, 132, 0.2)',
              'rgba(154, 80, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(103, 162, 46, 0.2)',
              'rgba(100, 20, 132, 0.2)',
              'rgba(45, 80, 235, 0.2)',
              'rgba(21, 206, 86, 0.2)',
              'rgba(170, 45, 46, 0.2)',
              'rgba(20, 80, 86, 0.2)',
              'rgba(103, 162, 46, 0.2)'
            ],
            borderColor: [
              'rgba(45, 80, 235, 1)',
              'rgba(21, 206, 86, 1)',
              'rgba(170, 45, 46, 1)',
              'rgba(20, 80, 86, 1)',
              'rgba(103, 162, 46, 1)',
              'rgba(200, 20, 132, 1)',
              'rgba(154, 80, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(103, 162, 46, 1)',
              'rgba(100, 20, 132, 1)',
              'rgba(200, 20, 132, 1)',
              'rgba(154, 80, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(103, 162, 46, 1)',
              'rgba(100, 20, 132, 1)',
              'rgba(45, 80, 235, 1)',
              'rgba(21, 206, 86, 1)',
              'rgba(170, 45, 46, 1)',
              'rgba(20, 80, 86, 1)',
              'rgba(103, 162, 46, 1)'
            ],
            borderWidth: 1
          }]
        },
        // option aquí
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          }
        }
      });
    },
  });
}

////////////////////// FIN CASO ESPECIAL //////////////////////////