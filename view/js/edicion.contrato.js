$(document).ready(function () {
  listar();
  
$('#ModalVer').on('shown.bs.modal', function(){ 
  autoupdate(); 
  }); 
});

function listar() {
  $.post("../controller/gestionarSubasta.listar.contrato.controller.php")
    .done(function (resultado) {
      var datosJSON = resultado;

      if (datosJSON.estado === 200) {
        for (i = 0; i < resultado.datos.length; i++) {
          var numeracion = i + 1;

          var adicion =
            '<tr><th scope="row">-</th>' +
            '<td class="idcontrato">' +
            resultado.datos[i].id_contrato +
            '</td><td class="idpropuesta" style="display:none;">' +
            resultado.datos[i].id_propuesta +
            "</td>" +
            '<td class="codproveedor">' +
            resultado.datos[i].cod_proveedor +
            "</td>" +
            '<td class="Fechacontrato">' +
            resultado.datos[i].Fecha_contrato +
            "</td>" +
            '<td class="Costo">' +
            resultado.datos[i].Costo +
            "</td>" +
            '<td><div class="widget-content-right widget-content-actions">' +
            '<button type="button" name="checksubasta" onclick="VistaModal(' +
            resultado.datos[i].id_contrato +
            ');MostrarModal();" class="border-0 btn-transition btn btn-outline-success checksubasta"><i class="fa fa-check"></i></button>' +
            '<button type="button" name="deletesubasta" class="border-0 btn-transition btn btn-outline-danger deletesubasta"><i class="fa fa-trash-alt"></i></button>' +
            "</div></td></tr>";

          $("#tbsubasta tbody").append(adicion);
        }
      } else {
        //swal("Mensaje del sistema", resultado , "warning");
      }
    })
    .fail(function (error) {
      var datosJSON = $.parseJSON(error.responseText);
      //swal("Error", datosJSON.mensaje , "error");
    });
}

function VistaModal (nropropuesta) {

  /*
  $("#tbdetalles tbody>tr").empty();
    $.post('../controller/gestionarSubasta.mostrar.detalles.postulantes.datos.controller.php', 
    { 
      p_nropropuesta: nropropuesta
    }).done(function (resultado) {

        var datosJSON = resultado;

        if (datosJSON.estado === 200) {
          
          for (i = 0; i < resultado.datos.length; i++) {
            var numeracion = i + 1;
  
            var adicion =
              '<tr><th scope="row">-</th>' +
              '<td class="idconductor" style="display:none;">' +
              resultado.datos[i].id_conductor +
              '</td><td class="nomchofer">' +
              resultado.datos[i].nom_chofer +
              "</td>" +
              '<td class="idauto" style="display:none;">' +
              resultado.datos[i].id_auto +
              "</td>" +
              '<td class="placaauto">' +
              resultado.datos[i].placa_auto +
              "</td>";

            adicion +=
              "</tr>";
  
            $("#tbdetalles tbody").append(adicion);
           
          }
         
        } else {
          //swal("Mensaje del sistema", resultado , "warning");
        }
     });
*/
}


function autoupdate(){
 //alert("Prueba");
 map = new Microsoft.Maps.Map(document.getElementById('ruta'), {credentials: 'AleP1oT0vi110v8l1H1_vhdPrRR9Vh0wrBzXiOPl7EqGQtscKU2m9lvVKsFGrdwv'});
 map.setView({ zoom: 18, center: new Microsoft.Maps.Location(-11.9876429, -77.0909696) });  

var center = map.getCenter();


var pin = new Microsoft.Maps.Pushpin(center, {
         title: 'Localizacion',
         subTitle: 'Central',
         text: '1'
     });

     //Add the pushpin to the map
     map.entities.push(pin);

     setTimeout(autoupdate, 5000);

}
function MostrarModal(){
  $('#ModalVer').modal('show');
}
