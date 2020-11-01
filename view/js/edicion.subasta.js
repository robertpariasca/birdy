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

      $("#cboproductossubasta option[value='000']").prop('selected', true);

    }
  });
  $(document).on("click", ".deleteproductosSubas", function () {
    $(this).closest("tr").remove();
  });

});

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
              '</td>'+
              '<td class="observaciones">' +
              resultado.datos[i].observaciones +
              "</td>" +
              '<td><div class="widget-content-right widget-content-actions">' +
              '<button type="button" name="delete" class="border-0 btn-transition btn btn-outline-danger delete"><i class="fa fa-trash-alt"></i></button></div></td></tr>';
  
            $("#propromo tbody").append(adicion);
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
