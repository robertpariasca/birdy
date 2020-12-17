$(document).ready(function () {
  var codTipo;
  var nroPropuesta;
  var costo;
  var detalles;
  cargarVehiculo();
  cargarChofer();

  $(".envioPropuesta").click(function (e) {
    e.preventDefault();

    var nomModal = $(this)
    .parent()
    .parent()
    .parent()
    .parent()
    .parent()
    .parent()
    .parent()
    .parent()
    .parent()

    .attr('id');

    $(this)
      .siblings()
      .each(function () {
        if ($(this).hasClass("txtcodtipo")) {
          codTipo = $(this).val();
        }
        if ($(this).hasClass("txtnropropuesta")) {
          nroPropuesta = $(this).val();
        }
        if ($(this).hasClass("txtcosto")) {
          costo = $(this).val();
        }
        if ($(this).hasClass("txtdetalles")) {
          detalles = $(this).val();
        }
      });

    $.post(
      "../controller/gestionarSubasta.agregar.propuesta.postulante.controller.php",
      {
        p_codtipo: codTipo,
        p_nropropuesta: nroPropuesta,
        p_costo: costo,
        p_detalles: detalles,
      }
    )
      .done(function (resultado) {
        var datosJSON = resultado;
        if (datosJSON.estado === 200) {
          codpropuesta = resultado.datos[0].codpropuesta;

          EnvioCorreo(codTipo, nroPropuesta, costo, detalles);

          swal("Propuesta Aceptada", datosJSON.mensaje, "success");

          $('#'+ nomModal).modal('hide');
          location.reload();
        } else {
        }
      })
      .fail(function (error) {
        var datosJSON = $.parseJSON(error.responseText);
      });
  });

  $(".procesarprod").click(function (e) {
    e.preventDefault();
    var codvehiculo = "";
    var vehiculo = "";
    var codchofer = "";
    var chofer = "";

    $(this)
      .parent()
      .siblings()
      .each(function () {
        if ($(this).hasClass("vehiculo")) {
          codvehiculo = $("option:selected", this).val();
          vehiculo = $("option:selected", this).text();
          $("option[value='000']", this).prop("selected", true);
        }
        if ($(this).hasClass("chofer")) {
          codchofer = $("option:selected", this).val();
          chofer = $("option:selected", this).text();
          $("option[value='000']", this).prop("selected", true);
        }

        var adicion =
          '<tr><th scope="row">-</th>' +
          '<td class="codvehiculo" style="display:none;">' +
          codvehiculo +
          '</td><td class="vehiculo">' +
          vehiculo +
          "</td>" +
          '<td class="codchofer" style="display:none;">' +
          codchofer +
          '</td><td class="chofer">' +
          chofer +
          "</td>" +
          '<td><div class="widget-content-right widget-content-actions">' +
          '<button type="button" name="deletevehiculos" class="border-0 btn-transition btn btn-outline-danger deletevehiculos"><i class="fa fa-trash-alt"></i></button></div></td></tr>';

        if ($(this).hasClass("datostransporte")) {
          $("tbody", this).append(adicion);
        }
      });
  });
  $(document).on("click", ".deletevehiculos", function () {
    $(this).closest("tr").remove();
  });
  $(".envioPropuestaRutas").click(function (e) {
    e.preventDefault();
    var arcodvehiculo = new Array();
    var arvehiculo = new Array();
    var arcodchofer = new Array();
    var archofer = new Array();
    var sum = 0;

    var nomModal = $(this)
          .parent()
          .parent()
          .parent()
          .parent()
          .parent()
          .parent()
          .parent()
          .parent()
          .parent()
          .parent()
          .attr('id');

    
    $(this)
      .parent()
      .siblings()
      .each(function () {
        if ($(this).hasClass("txtcodtipo")) {
          codTipo = $(this).children().val();
        }
        if ($(this).hasClass("txtnropropuesta")) {
          nroPropuesta = $(this).children().val();
        }
        if ($(this).hasClass("txtcosto")) {
          costo = $(this).children().val();
          $(this).children().val("");
        }
        if ($(this).hasClass("txtdetalles")) {
          detalles = $(this).children().val();
          $(this).children().val("");
        }
        if ($(this).hasClass("datostransporte")) {

          $("tbody>tr", this).each(function () {
            var codvehiculo = $(this).find(".codvehiculo").html();
            var vehiculo = $(this).find(".vehiculo").html();
            var codchofer = $(this).find(".codchofer").html();
            var chofer = $(this).find(".chofer").html();

            arcodvehiculo[sum] = codvehiculo;
            arvehiculo[sum] = vehiculo;
            arcodchofer[sum] = codchofer;
            archofer[sum] = chofer;

            sum = sum + 1;
          });
        }
      });
    var codpropuesta = "";
    $.post(
      "../controller/gestionarSubasta.agregar.propuesta.postulante.controller.php",
      {
        p_codtipo: codTipo,
        p_nropropuesta: nroPropuesta,
        p_costo: costo,
        p_detalles: detalles,
      }
    )
      .done(function (resultado) {
        var datosJSON = resultado;
        if (datosJSON.estado === 200) {
          nropropuesta = resultado.datos[0].nropropuesta;

          for (i = 0; i < sum; i++) {
            var codvehiculo = arcodvehiculo[i];
            var vehiculo = arvehiculo[i];
            var codchofer = arcodchofer[i];
            var chofer = archofer[i];

            $.post(
              "../controller/gestionarSubasta.agregar.propuesta.choferauto.controller.php",
              {
                p_idpostulantepropuesta: nropropuesta,
                p_idconductor: codchofer,
                p_nomchofer: chofer,
                p_idauto: codvehiculo,
                p_placaauto: vehiculo,
              }
            )
              .done(function (resultado) {
                var datosJSON = resultado;
              })
              .fail(function (error) {
                var datosJSON = $.parseJSON(error.responseText);
              });
          }

          codpropuesta = resultado.datos[0].codpropuesta;

          EnvioCorreo(codTipo, nroPropuesta, costo, detalles);

          swal("Propuesta Aceptada", datosJSON.mensaje, "success");

          $('#'+ nomModal).modal('hide');
          location.reload();

        } else {
        }
      })
      .fail(function (error) {
        var datosJSON = $.parseJSON(error.responseText);
      });
  });

  function EnvioCorreo(codTipo, nroPropuesta, costo, detalles) {
    $.post(
      "../controller/gestionar.subasta.correo.envio.respuesta.controller.php",
      {
        p_codtipo: codTipo,
        p_nroPropuesta: nroPropuesta,
        p_costo: costo,
        p_detalles: detalles,
      }
    )
      .done(function (resultado) {
        var datosJSON = resultado;
      })
      .fail(function (error) {
        var datosJSON = $.parseJSON(error.responseText);
      });
  }
});

function cargarVehiculo() {
  $.post("../controller/gestionarCliente.listar.flota.controller.php")
    .done(function (resultado) {
      var datosJSON = resultado;

      if (datosJSON.estado === 200) {
        for (i = 0; i < resultado.datos.length; i++) {
          var o = new Option(
            resultado.datos[i].placa,
            resultado.datos[i].id_flota
          );
          $(o).html(resultado.datos[i].placa);
          $("[id=cbovehiculo]").append(o);
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

function cargarChofer() {
  $.post("../controller/gestionarCliente.listar.conductor.controller.php")
    .done(function (resultado) {
      var datosJSON = resultado;

      if (datosJSON.estado === 200) {
        for (i = 0; i < resultado.datos.length; i++) {
          var o = new Option(
            resultado.datos[i].nombre,
            resultado.datos[i].id_conductor
          );
          $(o).html(resultado.datos[i].nombre);
          $("[id=cbochofer]").append(o);
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
