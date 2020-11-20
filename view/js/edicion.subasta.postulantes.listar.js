$(document).ready(function () {
  cargarPostulantes();
  

});

function cargarPostulantes() {
  $.post(
    "../controller/gestionarSubasta.mostrar.detalles.postulantes.controller.php"
  )
    .done(function (resultado) {
      var datosJSON = resultado;

      if (datosJSON.estado === 200) {
        for (i = 0; i < resultado.datos.length; i++) {
          var numeracion = i + 1;

          var adicion =
            '<tr><th scope="row">-</th>' +
            '<td class="idpostulantepropuesta" style="display:none;">' +
            resultado.datos[i].id_postulante_propuesta +
            '</td><td class="costocobrado">' +
            resultado.datos[i].costo_cobrado +
            "</td>" +
            '<td class="detallespropuesta">' +
            resultado.datos[i].detalles_propuesta +
            "</td>" +
            '<td><div class="widget-content-right widget-content-actions">';

          if (resultado.datos[i].tipo_subasta == "1") {
            adicion +=
              '<button type="button" name="verdetalles" id="verdetalles" onclick="VistaModal(' +
              resultado.datos[i].id_postulante_propuesta +
              ');MostrarModal();" class="border-0 btn-transition btn btn-outline-primary checksubasta"><i class="fas fa-eye"></i></button>';
          }

          adicion +=
            '<button type="button" class="border-0 btn-transition btn btn-outline-success aceptarPropuesta1" onclick="aceptarPropuesta(' +
            resultado.datos[i].id_postulante_propuesta +
            ');"name="aceptarPropuesta1" id="aceptarPropuesta1"><i class="fa fa-check"></i></button>' +
            "</div></td></tr>";

          $("#tblista tbody").append(adicion);
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

}

function MostrarModal(){
  $('#ModalVer').modal('show');
}

function aceptarPropuesta(nropropuesta) {
  swal({
    title: "Confirme",
    text: "¿Esta seguro de generar este contrato? Se rechazarán las otras propuestas automáticamente.",
    showCancelButton: true,
    confirmButtonColor: '#3d9205',
    confirmButtonText: 'Si',
    cancelButtonText: "No",
    closeOnConfirm: false,
    closeOnCancel: true,
    imageUrl: "../images/pregunta.png"
},
        function (isConfirm) {

            if (isConfirm) { //el usuario hizo clic en el boton SI     
/*
              var idpostulantepropuesta = $(this).closest("tr").find("td:eq(0)").text();
              var costocobrado = $(this).closest("tr").find("td:eq(1)").text();
              var detallespropuesta = $(this).closest("tr").find("td:eq(2)").text();
*/
                $.post(
                        "../controller/gestionarSubasta.agregar.contrato.controller.php",
                        {
                           
                            p_nropostulantepropuesta:  nropropuesta,
                        }
                ).done(function (resultado) {
                    var datosJSON = resultado;

                    if (datosJSON.estado === 200) {
                        swal("Exito", datosJSON.mensaje, "success");
                        $("#btncerrar").click(); //Cerrar la ventana 
                        listar(); //actualizar la lista
                    } else {
                        swal("Mensaje del sistema", resultado, "warning");
                    }
                    $('#ModalVer').modal('hide');
                }).fail(function (error) {
                    var datosJSON = $.parseJSON(error.responseText);
                    swal("Error", datosJSON.mensaje, "error");
                });

            }
        });

};