$(document).ready(function () {
  listar();
  cargarcontactos();
  cargarRutasUsu();

  $("#agregarContacto").click(function () {
    var nombre = $("#textNombreCompletoCliContacto").val();
    var cargo = $("#textCargoCliContacto").val();
    var direccion = $("#textDireccionCliContacto").val();
    var celular = $("#telCliContacto").val();
    var correo = $("#textEmailCliContacto").val();
    var coddepartamento = $("#cbodepartamentousu option:selected").val();
    var codprovincia = $("#cboprovinciausu option:selected").val();
    var coddistrito = $("#cbodistritousu option:selected").val();

    // Checking for blank fields.
    if (
      nombre == "" ||
      cargo == "" ||
      direccion == "" ||
      celular == "" ||
      correo == "" ||
      coddepartamento == "000" ||
      codprovincia == "000" ||
      coddistrito == "000"
    ) {
      alert("Por favor, completar todos los campos");
    } else {
      $.post(
        "../controller/gestionar.cliente.actualizar.contacto.controller.php",
        {
          p_nombre: nombre,
          p_cargo: cargo,
          p_direccion: direccion,
          p_celular: celular,
          p_correo: correo,
          p_coddepartamento: coddepartamento,
          p_codprovincia: codprovincia,
          p_coddistrito: coddistrito,
        }
      )
        .done(function (resultado) {
          var datosJSON = resultado;
          if (datosJSON.estado === 200) {
            alert("Contacto cargado");
            /*
             var adicion = '<tr><th scope="row">-</th>' + 
             '<td class="nomcontacto">' + nombre + '</td><td class="cargocontacto">' + cargo +'</td>' + 
             '<td class="direccion">' + direccion + '</td><td class="celular">' + celular +'</td>' + 
             '<td class="cargo">' + correo + '</td>' + 
             '<td><div class="widget-content-right widget-content-actions">' + 
             '<button type="button" name="delete" class="border-0 btn-transition btn btn-outline-danger delete"><i class="fa fa-trash-alt"></i></button></div></td></tr>';

             $('#clicontacto tbody').append(adicion);
*/
            $("#clicontacto tbody>tr").empty();
            cargarcontactos();

            $("#textNombreCompletoCliContacto").val("");
            $("#textCargoCliContacto").val("");
            $("#textDireccionCliContacto").val("");
            $("#telCliContacto").val("");
            $("#textEmailCliContacto").val("");
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

  $(document).on("click", ".delete", function () {
    //alert($(this).closest('tr').find('td:eq(0)').text());

    if (confirm("¿Esta seguro que desea eliminar este contacto?")) {
      var nomcontacto = $(this).closest("tr").find("td:eq(0)").text();
      var cargocontacto = $(this).closest("tr").find("td:eq(1)").text();
      var direccion = $(this).closest("tr").find("td:eq(2)").text();
      var celular = $(this).closest("tr").find("td:eq(3)").text();
      var correo = $(this).closest("tr").find("td:eq(4)").text();
      //$(this).closest('tr').remove();
      $.post(
        "../controller/gestionar.cliente.eliminar.contacto.controller.php",
        {
          p_nombre: nomcontacto,
          p_cargo: cargocontacto,
          p_direccion: direccion,
          p_celular: celular,
          p_correo: correo,
        }
      )
        .done(function (resultado) {
          var datosJSON = resultado;
          if (datosJSON.estado === 200) {
            alert("Contacto eliminado");

            $("#clicontacto tbody>tr").empty();
            cargarcontactos();
          } else {
            //swal("Mensaje del sistema", resultado , "warning");
          }
        })
        .fail(function (error) {
          var datosJSON = $.parseJSON(error.responseText);
          //swal("Error", datosJSON.mensaje , "error");
        });
    } else {
      return;
    }
  });
});

function listar() {
  $.post("../controller/gestionarCliente.listar.controller.php")
    .done(function (resultado) {
      var datosJSON = resultado;

      if (datosJSON.estado === 200) {
        var tipodoccliente = resultado.datos[0].tipo_doc_cliente;
        var doccliente = resultado.datos[0].doc_cliente;
        var nom_cliente = resultado.datos[0].nom_cliente;
        //alert(prueba);
        $("#opcdoccli").val(tipodoccliente);
        $("#textdoccli").val(doccliente);
        $("#textNombreCompletoCli").val(nom_cliente);
      } else {
        //swal("Mensaje del sistema", resultado , "warning");
      }
    })
    .fail(function (error) {
      var datosJSON = $.parseJSON(error.responseText);
      //swal("Error", datosJSON.mensaje , "error");
    });
}

function cargarcontactos() {
  $.post("../controller/gestionarCliente.listar.contacto.controller.php")
    .done(function (resultado) {
      var datosJSON = resultado;

      if (datosJSON.estado === 200) {
        for (i = 0; i < resultado.datos.length; i++) {
          var numeracion = i + 1;

          var adicion =
            '<tr><th scope="row">-</th>' +
            '<td class="nomcontacto">' +
            resultado.datos[i].nom_contacto +
            '</td><td class="cargocontacto">' +
            resultado.datos[i].cargo_contacto +
            "</td>" +
            '<td class="direccion">' +
            resultado.datos[i].direccion +
            '</td><td class="celular">' +
            resultado.datos[i].celular +
            "</td>" +
            '<td class="cargo">' +
            resultado.datos[i].correo +
            "</td>" +
            '<td><div class="widget-content-right widget-content-actions">' +
            '<button type="button" name="delete" class="border-0 btn-transition btn btn-outline-danger delete"><i class="fa fa-trash-alt"></i></button></div></td></tr>';

          $("#clicontacto tbody").append(adicion);
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

function cargarRutasUsu() {
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
          $("#cbodepartamentousu").append(o);
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

$("#cbodepartamentousu").change(function () {
  $("#cbodepartamentousu option[value='000']").remove();
  $("#cboprovinciausu").empty();
  var o = new Option("", "000");
  $(o).html("");
  $("#cboprovinciausu").append(o);

  $.post("../controller/gestionarCliente.listar.provincia.controller.php", {
    p_coddepartamento: $("#cbodepartamentousu option:selected").val(),
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
          $("#cboprovinciausu").append(o);
        }
      } else {
        //swal("Mensaje del sistema", resultado , "warning");
      }
    })
    .fail(function (error) {
      var datosJSON = $.parseJSON(error.responseText);
      //swal("Error", datosJSON.mensaje , "error");
    });
});

$("#cboprovinciausu").change(function () {
  $("#cboprovinciausu option[value='000']").remove();
  $("#cbodistritousu").empty();
  var o = new Option("", "000");
  $(o).html("");
  $("#cbodistritousu").append(o);

  $.post("../controller/gestionarCliente.listar.distrito.controller.php", {
    p_coddepartamento: $("#cbodepartamentousu option:selected").val(),
    p_codprovincia: $("#cboprovinciausu option:selected").val(),
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
          $("#cbodistritousu").append(o);
        }
      } else {
        //swal("Mensaje del sistema", resultado , "warning");
      }
    })
    .fail(function (error) {
      var datosJSON = $.parseJSON(error.responseText);
      //swal("Error", datosJSON.mensaje , "error");
    });
});

$("#cbodistritousu").change(function () {
  $("#cbodistritousu option[value='000']").remove();
});
