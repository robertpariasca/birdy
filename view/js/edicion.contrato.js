$(document).ready(function () {
    listar();
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
              '<button type="button" name="checksubasta" onclick="Acceder('+ resultado.datos[i].nro_propuesta +');" class="border-0 btn-transition btn btn-outline-success checksubasta"><i class="fa fa-check"></i></button>' +
              '<button type="button" name="deletesubasta" class="border-0 btn-transition btn btn-outline-danger deletesubasta"><i class="fa fa-trash-alt"></i></button>' +
              '</div></td></tr>';
  
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
  