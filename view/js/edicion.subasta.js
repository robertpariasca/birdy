$(document).ready(function () {
  listar();
  cargarRutasSalida();
  cargarRutasLlegada();
  cargarProductosEdi();

  $("#agregarProductoSubasta").click(function () {
    var nombreproducto = $("#cboproductossubasta option:selected").html();
    var codproducto = $("#cboproductossubasta option:selected").val();
    var cantproducto = $("#textCantProducto").val();

    if (cantproducto == "" || codproducto == "000") {
      alert("Por favor, completar todos los campos");
    } else {
      var adicion =
        '<tr><th scope="row">-</th>' +
        '<td class="codproducto" style="display:none;">' +
        codproducto +
        '</td><td class="nomproducto">' +
        nombreproducto +
        "</td>" +
        '</td><td class="cantidadproducto">' +
        cantproducto +
        "</td>" +
        '<td><div class="widget-content-right widget-content-actions">' +
        '<button type="button" name="deleteproductosSubas" class="border-0 btn-transition btn btn-outline-danger deleteproductosSubas"><i class="fa fa-trash-alt"></i></button></div></td></tr>';

      $("#detprodsubasta tbody").append(adicion);

      $("#textCantProducto").val("0");

      $("#cboproductossubasta option[value='000']").prop("selected", true);
    }
  });
  $(document).on("click", ".deleteproductosSubas", function () {
    $(this).closest("tr").remove();
  });

  $("#agregarSubastaNueva").click(function () {
    var tiposubasta = $("#cboTipoSubasta option:selected").val();
    var fechacierre = $("#fechacierre").val();
    var observaciones = $("#textobservaciones").val();
    var volumen = $("#textvolumen").val();
    var dimension = $("#textdimension").val();
    var peso = $("#textpeso").val();
    var caracteristicas = $("#textcaracteristicas").val();

    var departamentoSalida = $("#cbodepartamentoSalida option:selected").val();
    var provinciaSalida = $("#cboprovinciaSalida option:selected").val();
    var distritoSalida = $("#cbodistritoSalida option:selected").val();
    var direccionSalida = $("#textdireccionsalida").val();
    var fechaSalida = $("#fechasalida").val();
    var horaSalida = $("#horasalida").val();

    var departamentoLlegada = $("#cbodepartamentoLlegada option:selected").val();
    var provinciaLlegada = $("#cboprovinciaLlegada option:selected").val();
    var distritoLlegada = $("#cbodistritoLlegada option:selected").val();
    var direccionLlegada = $("#textdireccionllegada").val();
    var fechaLlegada = $("#fechallegada").val();
    var horaLlegada = $("#horallegada").val();


    $.post("../controller/gestionarSubasta.agregar.propuesta.controller.php", {
      p_tiposubasta: tiposubasta,
      p_fechacierre: fechacierre,
      p_observaciones: observaciones,
      p_volumen: volumen,
      p_dimension: dimension,
      p_peso: peso,
      p_caracteristicas: caracteristicas,
      p_departamentoSalida: departamentoSalida,
      p_provinciaSalida: provinciaSalida,
      p_distritoSalida: distritoSalida,
      p_direccionSalida: direccionSalida,
      p_fechaSalida: fechaSalida,
      p_horaSalida: horaSalida,
      p_departamentoLlegada: departamentoLlegada,
      p_provinciaLlegada: provinciaLlegada,
      p_distritoLlegada: distritoLlegada,
      p_direccionLlegada: direccionLlegada,
      p_fechaLlegada: fechaLlegada,
      p_horaLlegada: horaLlegada,
    })
      .done(function (resultado) {
        var datosJSON = resultado;
        if (datosJSON.estado === 200) {
          codpropuesta = resultado.datos[0].codpropuesta;

          $("#detprodsubasta tbody>tr").each(function () {
            //alert(codpromocion);
            var codproducto = $(this).find(".codproducto").html();
            var nomproducto = $(this).find(".nomproducto").html();
            var cantidadproducto = $(this).find(".cantidadproducto").html();

            $.post(
              "../controller/gestionarSubasta.agregar.propuesta.productos.controller.php",
              {
                p_codpropuesta: codpropuesta,
                p_codproducto: codproducto,
                p_nomproducto: nomproducto,
                p_cantidadproducto: cantidadproducto,
              }
            )
              .done(function (resultado) {
                var datosJSON = resultado;
              })
              .fail(function (error) {
                var datosJSON = $.parseJSON(error.responseText);
              });
          });

          EnvioCorreo(tiposubasta,codpropuesta,observaciones);

          swal("Propuesta Registrada", datosJSON.mensaje, "success");

        } else {
        }
      })
      .fail(function (error) {
        var datosJSON = $.parseJSON(error.responseText);
      });

  });
});

function EnvioCorreo(tiposubasta,codpropuesta,observaciones){
  $.post(
    "../controller/gestionar.subasta.correo.envio.controller.php",
    {
      p_tiposubasta: tiposubasta,
      p_codpropuesta: codpropuesta,
      p_observaciones: observaciones
    }
  )
    .done(function (resultado) {
      var datosJSON = resultado;
    })
    .fail(function (error) {
      var datosJSON = $.parseJSON(error.responseText);
    });
}

function listar() {
  $.post("../controller/gestionarSubasta.listar.controller.php")
    .done(function (resultado) {
      var datosJSON = resultado;

      if (datosJSON.estado === 200) {
        for (i = 0; i < resultado.datos.length; i++) {
          var numeracion = i + 1;

          var adicion =
            '<tr><th scope="row">-</th>' +
            '<td class="nropropuesta">' +
            resultado.datos[i].nro_propuesta +
            '</td><td class="codsolicitante" style="display:none;">' +
            resultado.datos[i].cod_solicitante +
            "</td>" +
            '<td class="tiposubasta">' +
            resultado.datos[i].tipo_subasta +
            "</td>" +
            '<td class="fechacreacion">' +
            resultado.datos[i].fecha_creacion +
            "</td>" +
            '<td class="fechacierre">' +
            resultado.datos[i].fecha_cierre +
            "</td>" +
            '<td class="observaciones">' +
            resultado.datos[i].observaciones +
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

function Acceder (elt) {
      $.post('../controller/gestionarSubasta.listar.postulantes.controller.php', 
      { 
        p_nropropuesta: elt
      }).done(function (resultado) {

                  location.href = "../view/subasta.listar.propuestas.view.php";



       });

  }

/*
$(document).on("click", ".checksubasta", function () {
  var codpropuesta = $(this).closest("tr").find("td:eq(0)").text();
  $.post(
    "subasta.listar.propuestas.view.php",
    {
      p_codpropuesta: codpropuesta,
    }
  )
    .done(function (resultado) {
      window.open("subasta.listar.propuestas.view.php")
    })
    .fail(function (error) {
    });

});
*/

function cargarRutasSalida() {
  $.post("../controller/gestionarCliente.listar.departamento.controller.php")
    .done(function (resultado) {
      var datosJSON = resultado;

      if (datosJSON.estado === 200) {
        for (i = 0; i < resultado.datos.length; i++) {
          var o = new Option(
            resultado.datos[i].departamento,
            resultado.datos[i].coddepartamento
          );
          $(o).html(resultado.datos[i].departamento);
          $("#cbodepartamentoSalida").append(o);
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

$("#cbodepartamentoSalida").change(function () {
  $("#cbodepartamentoSalida option[value='00']").remove();
  $("#cboprovinciaSalida").empty();
  var o = new Option("Provincia de Salida", "00");
  $(o).html("Provincia de Salida");
  $("#cboprovinciaSalida").append(o);

  $("#cbodistritoSalida").empty();
  var o = new Option("Distrito de Salida", "00");
  $(o).html("Distrito de Salida");
  $("#cbodistritoSalida").append(o);

  if ($("#cbodepartamentoSalida option:selected").val() != "00") {
    $.post("../controller/gestionarCliente.listar.provincia.controller.php", {
      p_coddepartamento: $("#cbodepartamentoSalida option:selected").val(),
    })
      .done(function (resultado) {
        var datosJSON = resultado;

        if (datosJSON.estado === 200) {
          for (i = 0; i < resultado.datos.length; i++) {
            var o = new Option(
              resultado.datos[i].provincia,
              resultado.datos[i].codprovincia
            );
            $(o).html(resultado.datos[i].provincia);
            $("#cboprovinciaSalida").append(o);
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
});

$("#cboprovinciaSalida").change(function () {
  $("#cboprovinciaSalida option[value='00']").remove();
  $("#cbodistritoSalida").empty();
  var o = new Option("Distrito de Salida", "00");
  $(o).html("Distrito de Salida");
  $("#cbodistritoSalida").append(o);

  if (
    $("#cbodepartamentoSalida option:selected").val() != "00" &&
    $("#cboprovinciaSalida option:selected").val() != "00"
  ) {
    $.post("../controller/gestionarCliente.listar.distrito.controller.php", {
      p_coddepartamento: $("#cbodepartamentoSalida option:selected").val(),
      p_codprovincia: $("#cboprovinciaSalida option:selected").val(),
    })
      .done(function (resultado) {
        var datosJSON = resultado;

        if (datosJSON.estado === 200) {
          for (i = 0; i < resultado.datos.length; i++) {
            var o = new Option(
              resultado.datos[i].distrito,
              resultado.datos[i].coddistrito
            );
            $(o).html(resultado.datos[i].distrito);
            $("#cbodistritoSalida").append(o);
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
});

$("#cbodistritoSalida").change(function () {
  $("#cbodistritoSalida option[value='00']").remove();
});

function cargarRutasLlegada() {
  $.post("../controller/gestionarCliente.listar.departamento.controller.php")
    .done(function (resultado) {
      var datosJSON = resultado;

      if (datosJSON.estado === 200) {
        for (i = 0; i < resultado.datos.length; i++) {
          var o = new Option(
            resultado.datos[i].departamento,
            resultado.datos[i].coddepartamento
          );
          $(o).html(resultado.datos[i].departamento);
          $("#cbodepartamentoLlegada").append(o);
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

$("#cbodepartamentoLlegada").change(function () {
  $("#cbodepartamentoLlegada option[value='00']").remove();
  $("#cboprovinciaLlegada").empty();
  var o = new Option("Provincia de Llegada", "00");
  $(o).html("Provincia de Llegada");
  $("#cboprovinciaLlegada").append(o);

  $("#cbodistritoLlegada").empty();
  var o = new Option("Distrito de Llegada", "00");
  $(o).html("Distrito de Llegada");
  $("#cbodistritoLlegada").append(o);

  if ($("#cbodepartamentoLlegada option:selected").val() != "00") {
    $.post("../controller/gestionarCliente.listar.provincia.controller.php", {
      p_coddepartamento: $("#cbodepartamentoLlegada option:selected").val(),
    })
      .done(function (resultado) {
        var datosJSON = resultado;

        if (datosJSON.estado === 200) {
          for (i = 0; i < resultado.datos.length; i++) {
            var o = new Option(
              resultado.datos[i].provincia,
              resultado.datos[i].codprovincia
            );
            $(o).html(resultado.datos[i].provincia);
            $("#cboprovinciaLlegada").append(o);
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
});

$("#cboprovinciaLlegada").change(function () {
  $("#cboprovinciaLlegada option[value='00']").remove();
  $("#cbodistritoLlegada").empty();
  var o = new Option("Distrito de Llegada", "00");
  $(o).html("Distrito de Llegada");
  $("#cbodistritoLlegada").append(o);

  if (
    $("#cbodepartamentoLlegada option:selected").val() != "00" &&
    $("#cboprovinciaLlegada option:selected").val() != "00"
  ) {
    $.post("../controller/gestionarCliente.listar.distrito.controller.php", {
      p_coddepartamento: $("#cbodepartamentoLlegada option:selected").val(),
      p_codprovincia: $("#cboprovinciaLlegada option:selected").val(),
    })
      .done(function (resultado) {
        var datosJSON = resultado;

        if (datosJSON.estado === 200) {
          for (i = 0; i < resultado.datos.length; i++) {
            var o = new Option(
              resultado.datos[i].distrito,
              resultado.datos[i].coddistrito
            );
            $(o).html(resultado.datos[i].distrito);
            $("#cbodistritoLlegada").append(o);
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
});

$("#cbodistritoLlegada").change(function () {
  $("#cbodistritoLlegada option[value='00']").remove();
});

function cargarProductosEdi() {
  $.post("../controller/gestionarCliente.listar.producto.controller.php")
    .done(function (resultado) {
      var datosJSON = resultado;

      if (datosJSON.estado === 200) {
        for (i = 0; i < resultado.datos.length; i++) {
          var o = new Option(
            resultado.datos[i].nom_producto,
            resultado.datos[i].cod_producto
          );
          $(o).html(resultado.datos[i].nom_producto);
          $("#cboproductossubasta").append(o);
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

//Seleccionar Opciones de Carga

$("#cboTipoSubasta").change(function () {
  $("#cboTipoSubasta option[value='0']").remove();
  var sel = $("#cboTipoSubasta option:selected").val();

  if (sel == "1") {
    $("#dtCarga").show();
    $("#dtDireccionSalida").show();
    $("#dtProducto").hide();
    $("#dtDetProducto").hide();
  } else if (sel == "2") {
    $("#dtCarga").hide();
    $("#dtDireccionSalida").hide();
    $("#dtProducto").show();
    $("#dtDetProducto").show();
  } else if (sel == "3") {
    $("#dtCarga").hide();
    $("#dtDireccionSalida").hide();
    $("#dtProducto").hide();
    $("#dtDetProducto").hide();
  }
  /*
    $("#cboprovinciaSalida option[value='00']").remove();
    $("#cbodistritoSalida").empty();
    var o = new Option("Distrito de Salida", "00");
    $(o).html("Distrito de Salida");
    $("#cbodistritoSalida").append(o);
  
    if (
      $("#cbodepartamentoSalida option:selected").val() != "00" &&
      $("#cboprovinciaSalida option:selected").val() != "00"
    ) {
      $.post("../controller/gestionarCliente.listar.distrito.controller.php", {
        p_coddepartamento: $("#cbodepartamentoSalida option:selected").val(),
        p_codprovincia: $("#cboprovinciaSalida option:selected").val(),
      })
        .done(function (resultado) {
          var datosJSON = resultado;
  
          if (datosJSON.estado === 200) {
            for (i = 0; i < resultado.datos.length; i++) {
              var o = new Option(
                resultado.datos[i].distrito,
                resultado.datos[i].coddistrito
              );
              $(o).html(resultado.datos[i].distrito);
              $("#cbodistritoSalida").append(o);
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
    */
});
