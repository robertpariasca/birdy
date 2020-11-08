$(document).ready(function () {
  listarflotas();
  cargarTipo();
  listarproductos();
  cargarRutas();
  listarZonas();
  cargarPromociones();
  cargarRutasEdicion();
  cargarProductosEdi();
  listarconductor();
  listarPrecios();
  cargarPlanes();
  listarPlanes();
  $("#divagregarPromocion").hide();
  $("#divagregarAtencionEdi").hide();
  $("#divagregarAtencionProm").show();
  $("#divagregarDetalleEdi").hide();
  $("#divagregarDetalleProm").show();
  $("#divagregarPromocionNueva").show();
  
  
$("#tipopublic1").click(function () {
  if (document.getElementById("tipopublic1").checked) {
    if (
      $("#fechaInicioVigencia").val() != "" ||
      $("#fechaFinVigencia").val() != ""
    ) {
      var primfechainicio = $("#fechaInicioVigencia").val();
      var varfechainicio = primfechainicio.split("/");
      var diainicio = varfechainicio[0];
      var mesinicio = varfechainicio[1];
      var añoinicio = varfechainicio[2];

      var fechainicio1 = new Date(
        mesinicio + "/" + diainicio + "/" + añoinicio
      );

      var primfechafin = $("#fechaFinVigencia").val();
      var varfechafin = primfechafin.split("/");
      var diafin = varfechafin[0];
      var mesfin = varfechafin[1];
      var añofin = varfechafin[2];

      var fechafin1 = new Date(mesfin + "/" + diafin + "/" + añofin);

      var diff = Math.abs(fechafin1 - fechainicio1) / (1000 * 3600 * 24);

      var costo = document.getElementById("servcosto1").innerHTML;

      var monto = diff * costo;

      document.getElementById("servtotal1").innerHTML =
        "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + monto + " S/";
    } else {
      document.getElementById("servtotal1").innerHTML = "";
    }
  } else {
    document.getElementById("servtotal1").innerHTML = "";
  }
  sumaTotal();
});

$("#tipopublic2").click(function () {
  if (document.getElementById("tipopublic2").checked) {
    if (
      $("#fechaInicioVigencia").val() != "" ||
      $("#fechaFinVigencia").val() != ""
    ) {
      var primfechainicio = $("#fechaInicioVigencia").val();
      var varfechainicio = primfechainicio.split("/");
      var diainicio = varfechainicio[0];
      var mesinicio = varfechainicio[1];
      var añoinicio = varfechainicio[2];

      var fechainicio1 = new Date(
        mesinicio + "/" + diainicio + "/" + añoinicio
      );

      var primfechafin = $("#fechaFinVigencia").val();
      var varfechafin = primfechafin.split("/");
      var diafin = varfechafin[0];
      var mesfin = varfechafin[1];
      var añofin = varfechafin[2];

      var fechafin1 = new Date(mesfin + "/" + diafin + "/" + añofin);

      var diff = Math.abs(fechafin1 - fechainicio1) / (1000 * 3600 * 24);

      var costo = document.getElementById("servcosto2").innerHTML;

      var monto = diff * costo;

      document.getElementById("servtotal2").innerHTML =
        "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + monto + " S/";
    } else {
      document.getElementById("servtotal2").innerHTML = "";
    }
  } else {
    document.getElementById("servtotal2").innerHTML = "";
  }
  sumaTotal();
});

$("#tipopublic3").click(function () {
  if (document.getElementById("tipopublic3").checked) {
    if (
      $("#fechaInicioVigencia").val() != "" ||
      $("#fechaFinVigencia").val() != ""
    ) {
      var primfechainicio = $("#fechaInicioVigencia").val();
      var varfechainicio = primfechainicio.split("/");
      var diainicio = varfechainicio[0];
      var mesinicio = varfechainicio[1];
      var añoinicio = varfechainicio[2];

      var fechainicio1 = new Date(
        mesinicio + "/" + diainicio + "/" + añoinicio
      );

      var primfechafin = $("#fechaFinVigencia").val();
      var varfechafin = primfechafin.split("/");
      var diafin = varfechafin[0];
      var mesfin = varfechafin[1];
      var añofin = varfechafin[2];

      var fechafin1 = new Date(mesfin + "/" + diafin + "/" + añofin);

      var diff = Math.abs(fechafin1 - fechainicio1) / (1000 * 3600 * 24);

      var costo = document.getElementById("servcosto3").innerHTML;

      var monto = diff * costo;

      document.getElementById("servtotal3").innerHTML =
        "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + monto + " S/";
    } else {
      document.getElementById("servtotal3").innerHTML = "";
    }
  } else {
    document.getElementById("servtotal3").innerHTML = "";
  }
  sumaTotal();
});

$("#tipopublic4").click(function () {
  if (document.getElementById("tipopublic4").checked) {
    if (
      $("#fechaInicioVigencia").val() != "" ||
      $("#fechaFinVigencia").val() != ""
    ) {
      var primfechainicio = $("#fechaInicioVigencia").val();
      var varfechainicio = primfechainicio.split("/");
      var diainicio = varfechainicio[0];
      var mesinicio = varfechainicio[1];
      var añoinicio = varfechainicio[2];

      var fechainicio1 = new Date(
        mesinicio + "/" + diainicio + "/" + añoinicio
      );

      var primfechafin = $("#fechaFinVigencia").val();
      var varfechafin = primfechafin.split("/");
      var diafin = varfechafin[0];
      var mesfin = varfechafin[1];
      var añofin = varfechafin[2];

      var fechafin1 = new Date(mesfin + "/" + diafin + "/" + añofin);

      var diff = Math.abs(fechafin1 - fechainicio1) / (1000 * 3600 * 24);

      var costo = document.getElementById("servcosto4").innerHTML;

      var monto = diff * costo;

      document.getElementById("servtotal4").innerHTML =
        "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + monto + " S/";
    } else {
      document.getElementById("servtotal4").innerHTML = "";
    }
  } else {
    document.getElementById("servtotal4").innerHTML = "";
  }
  sumaTotal();
});


  $("#agregarFlota").click(function () {
    var tipovehiculo = $("#textTipoVehiculo").val();
    var capacidadkg = $("#textcapacidadkg").val();
    var placa = $("#textPlaca").val();
    var gps = $("#cbogps option:selected").val();

    //$( "#frmActualizarUsuarioProFlota" ).submit();

    //var blobFile = $('#fotoUsuario').prop('files');
    var blobFile = $("#fotoUsuario")[0].files[0];
    var formData = new FormData();
    formData.append("fileToUpload", blobFile);
    formData.append("placa", placa);
    // do the extra stuff here
    $.ajax({
      type: "POST",
      url:
        "../controller/gestionar.cliente.actualizar.flota.foto.controller.php",
      //data: $(this).serialize(),
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        if (response != 0) {
        } else {
          alert("Archivo no subido.");
        }
      },
    });

    if (
      tipovehiculo == "" ||
      capacidadkg == "" ||
      placa == "" ||
      gps == "000" ||
      document.getElementById("fotoUsuario").files.length == 0
    ) {
      alert("Por favor, completar todos los campos");
    } else {
      $.post(
        "../controller/gestionar.cliente.actualizar.flota.controller.php",
        {
          p_tipovehiculo: tipovehiculo,
          p_capacidad: capacidadkg,
          p_placa: placa,
          p_gps: gps,
        }
      )
        .done(function (resultado) {
          var datosJSON = resultado;
          if (datosJSON.estado === 200) {
            swal("Exito", datosJSON.mensaje, "success");

            $("#cliflota tbody>tr").empty();
            listarflotas();

            $("#textTipoVehiculo").val("");
            $("#textcapacidadKg").val("");
            $("#textPlaca").val("");
            $("#fotoUsuario").val(null);
          } else {
          }
        })
        .fail(function (error) {
          var datosJSON = $.parseJSON(error.responseText);
        });
    }
  });

  $("#agregarConductor").click(function () {
    var NroDocConductor = $("#textNroDocConductor").val();
    var NomConductor = $("#textnomconductor").val();
    var NroLicencia = $("#textNroLicencia").val();
    var Telefono = $("#textNroTelefono").val();

    //$( "#frmActualizarUsuarioProFlota" ).submit();

    //var blobFile = $('#fotoUsuario').prop('files');
    var blobFile = $("#fotoConductor")[0].files[0];
    var formData = new FormData();
    formData.append("fileToUpload", blobFile);
    formData.append("NroDocConductor", NroDocConductor);
    // do the extra stuff here
    $.ajax({
      type: "POST",
      url:
        "../controller/gestionar.cliente.actualizar.conductor.foto.controller.php",
      //data: $(this).serialize(),
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        if (response != 0) {
        } else {
          alert("Archivo no subido.");
        }
      },
    });

    if (
      NroDocConductor == "" ||
      NomConductor == "" ||
      NroLicencia == "" ||
      Telefono == "" ||
      document.getElementById("fotoConductor").files.length == 0
    ) {
      alert("Por favor, completar todos los campos");
    } else {
      $.post(
        "../controller/gestionar.cliente.actualizar.conductor.controller.php",
        {
          p_nrodocconductor: NroDocConductor,
          p_nomconductor: NomConductor,
          p_nrolicencia: NroLicencia,
          p_telefono: Telefono,
        }
      )
        .done(function (resultado) {
          var datosJSON = resultado;
          if (datosJSON.estado === 200) {
            swal("Exito", datosJSON.mensaje, "success");

            $("#cliconductor tbody>tr").empty();
            listarconductor();

            $("#textNroDocConductor").val("");
            $("#textnomconductor").val("");
            $("#textNroLicencia").val("");
            $("#textNroTelefono").val("");
          } else {
          }
        })
        .fail(function (error) {
          var datosJSON = $.parseJSON(error.responseText);
        });
    }
  });

  $(document).on("click", ".deletepromocion", function () {
    if (
      confirm(
        "¿Esta seguro que desea eliminar esta promocion? Se borrara toda la información relacionada"
      )
    ) {
      var codpromocion = $(this).closest("tr").find("td:eq(0)").text();
      $.post(
        "../controller/gestionar.cliente.eliminar.promocion.controller.php",
        {
          p_codpromocion: codpromocion,
        }
      )
        .done(function (resultado) {
          var datosJSON = resultado;
          if (datosJSON.estado === 200) {
            alert("Promocion eliminada");

            $("#propromo tbody>tr").empty();
            cargarPromociones();
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

  $(document).on("click", ".deleteflota", function () {
    //alert($(this).closest('tr').find('td:eq(0)').text());

    if (confirm("¿Esta seguro que desea eliminar este vehiculo?")) {
      var idflota = $(this).closest("tr").find("td:eq(0)").text();

      $.post("../controller/gestionar.cliente.eliminar.flota.controller.php", {
        p_idflota: idflota,
      })
        .done(function (resultado) {
          var datosJSON = resultado;
          if (datosJSON.estado === 200) {
            alert("Vehiculo eliminado");

            $("#cliflota tbody>tr").empty();
            listarflotas();
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

  $(document).on("click", ".deleteconductor", function () {
    //alert($(this).closest('tr').find('td:eq(0)').text());

    if (confirm("¿Esta seguro que desea eliminar este conductor?")) {
      var idconductor = $(this).closest("tr").find("td:eq(0)").text();

      $.post(
        "../controller/gestionar.cliente.eliminar.conductor.controller.php",
        {
          p_idconductor: idconductor,
        }
      )
        .done(function (resultado) {
          var datosJSON = resultado;
          if (datosJSON.estado === 200) {
            alert("Conductor eliminado");

            $("#cliconductor tbody>tr").empty();
            listarconductor();
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

  $("#agregarProducto").click(function () {
    var codplanes = $("#cboplanesprod option:selected").val();
    var nomplanes = $("#cboplanesprod option:selected").html();

    if (codplanes == "000") {
      alert("Por favor, seleccione un plan");
    } else {
      $.post(
        "../controller/gestionar.cliente.agregar.suscripcion.controller.php",
        {
          p_codplanes: codplanes,
        }
      )
        .done(function (resultado) {
          var datosJSON = resultado;
          if (datosJSON.estado === 200) {
            swal("Exito", datosJSON.mensaje, "success");

            $("#cliproducto tbody>tr").empty();
            listarproductos();

            $("#textNombreProducto").val("");
          } else {
          }
        })
        .fail(function (error) {
          var datosJSON = $.parseJSON(error.responseText);
        });
    }
  });

  $("#agregarSuscripcion").click(function () {
    var nombreproducto = $("#textNombreProducto").val();
    var tipoproducto = $("#cbotipprod option:selected").val();

    if (nombreproducto == "" || tipoproducto == "000") {
      alert("Por favor, completar todos los campos");
    } else {
      $.post(
        "../controller/gestionar.cliente.actualizar.producto.controller.php",
        {
          p_nombreproducto: nombreproducto,
          p_tipoproducto: tipoproducto,
        }
      )
        .done(function (resultado) {
          var datosJSON = resultado;
          if (datosJSON.estado === 200) {
            swal("Exito", datosJSON.mensaje, "success");

            $("#cliproducto tbody>tr").empty();
            listarproductos();

            $("#textNombreProducto").val("");
          } else {
          }
        })
        .fail(function (error) {
          var datosJSON = $.parseJSON(error.responseText);
        });
    }
  });

  $(document).on("click", ".deleteproducto", function () {
    //alert($(this).closest('tr').find('td:eq(0)').text());

    if (confirm("¿Esta seguro que desea eliminar este producto?")) {
      var codproducto = $(this).closest("tr").find("td:eq(0)").text();

      $.post(
        "../controller/gestionar.cliente.eliminar.producto.controller.php",
        {
          p_codproducto: codproducto,
        }
      )
        .done(function (resultado) {
          var datosJSON = resultado;
          if (datosJSON.estado === 200) {
            alert("Producto eliminado");

            $("#cliproducto tbody>tr").empty();
            listarproductos();
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

  $("#agregarAtencion").click(function () {
    var coddepartamento = $("#cbodepartamento option:selected").val();
    var codprovincia = $("#cboprovincia option:selected").val();
    var coddistrito = $("#cbodistrito option:selected").val();

    if (coddepartamento == "" || codprovincia == "" || coddistrito == "") {
      alert("Por favor, completar todos los campos");
    } else {
      $.post(
        "../controller/gestionar.cliente.actualizar.zonas.controller.php",
        {
          p_coddepartamento: coddepartamento,
          p_codprovincia: codprovincia,
          p_coddistrito: coddistrito,
        }
      )
        .done(function (resultado) {
          var datosJSON = resultado;
          if (datosJSON.estado === 200) {
            if (datosJSON.mensaje == "DUDoc") {
              swal("Error", "Registro Duplicado", "warning");
              //location.reload();
              $("#btncerrar").click(); //Cerrar la ventana
            } else {
              swal("Exito", datosJSON.mensaje, "success");

              $("#prozonas tbody>tr").empty();
              listarZonas();

              $("#cbodepartamento").val("00");
              $("#cboprovincia").val("00");
              $("#cbodistrito").val("00");
            }
          } else {
          }
        })
        .fail(function (error) {
          var datosJSON = $.parseJSON(error.responseText);
        });
    }
  });

  $(document).on("click", ".deletezonas", function () {
    //alert($(this).closest('tr').find('td:eq(0)').text());

    if (confirm("¿Esta seguro que desea eliminar esta zona?")) {
      var coddepartamento = $(this).closest("tr").find("td:eq(0)").text();
      var codprovincia = $(this).closest("tr").find("td:eq(2)").text();
      var coddistrito = $(this).closest("tr").find("td:eq(4)").text();

      $.post("../controller/gestionar.cliente.eliminar.zona.controller.php", {
        p_coddepartamento: coddepartamento,
        p_codprovincia: codprovincia,
        p_coddistrito: coddistrito,
      })
        .done(function (resultado) {
          var datosJSON = resultado;
          if (datosJSON.estado === 200) {
            alert("Zona eliminada");

            $("#prozonas tbody>tr").empty();
            listarZonas();
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
  $(document).on("click", ".updatepromocion", function () {
    var codpromocion = $(this).closest("tr").find("td:eq(0)").text();
    $("#textIdPromocion").val(codpromocion);
    $.post(
      "../controller/gestionarCliente.listar.promociones.edicion.controller.php",
      {
        p_codpromocion: codpromocion,
      }
    )
      .done(function (resultado) {
        var datosJSON = resultado;
        if (datosJSON.estado === 200) {
          for (i = 0; i < resultado.datos.length; i++) {
            $("#textNomPromocion").val(resultado.datos[i].nom_promocion);
            $("#textDescripcionLarga").val(
              resultado.datos[i].descripcion_larga
            );
            $("#textcostoreal").val(resultado.datos[i].costo_real);
            $("#textdescuento").val(resultado.datos[i].descuento);
            $("#textcostopromocion").val(resultado.datos[i].costo_promocion);
            $("#fechaInicioVigencia").val(
              resultado.datos[i].fecha_inicio_vigencia
            );
            $("#fechaFinVigencia").val(resultado.datos[i].fecha_fin_vigencia);
            $("#textStockPedido").val(resultado.datos[i].stock_pedido);

            if (resultado.datos[i].tipo_publicidad.indexOf("1") > -1) {
              $("#tipopublic1").prop("checked", true);
            } else {
              $("#tipopublic1").prop("checked", false);
            }
            if (resultado.datos[i].tipo_publicidad.indexOf("2") > -1) {
              $("#tipopublic2").prop("checked", true);
            } else {
              $("#tipopublic2").prop("checked", false);
            }
            if (resultado.datos[i].tipo_publicidad.indexOf("3") > -1) {
              $("#tipopublic3").prop("checked", true);
            } else {
              $("#tipopublic3").prop("checked", false);
            }
            if (resultado.datos[i].tipo_publicidad.indexOf("4") > -1) {
              $("#tipopublic4").prop("checked", true);
            } else {
              $("#tipopublic4").prop("checked", false);
            }
          }
        } else {
        }
      })
      .fail(function (error) {
        var datosJSON = $.parseJSON(error.responseText);
      });

    listarZonasEdi();
    listarDetallesEdi();
    $("#divagregarPromocion").show();
    $("#divagregarAtencionEdi").show();
    $("#divagregarAtencionProm").hide();
    $("#divagregarDetalleEdi").show();
    $("#divagregarDetalleProm").hide();
    $("#divagregarPromocionNueva").hide();

    $('.nav-pills a[href="#Edicion"]').tab("show");
  });

  $("#agregarAtencionEdi").click(function () {
    var coddepartamento = $("#cbodepartamentoEdi option:selected").val();
    var codprovincia = $("#cboprovinciaEdi option:selected").val();
    var coddistrito = $("#cbodistritoEdi option:selected").val();
    var codpromocion = $("#textIdPromocion").val();

    if (coddepartamento == "" || codprovincia == "" || coddistrito == "") {
      alert("Por favor, elegir la ubicacion correcta");
    } else {
      $.post(
        "../controller/gestionar.cliente.agregar.promocion.ubicacion.controller.php",
        {
          p_codpromocion: codpromocion,
          p_coddepartamento: coddepartamento,
          p_codprovincia: codprovincia,
          p_coddistrito: coddistrito,
        }
      )
        .done(function (resultado) {
          var datosJSON = resultado;
          if (datosJSON.estado === 200) {
            $("#clizonaEdi tbody>tr").empty();
            listarZonasEdi();

            $("#cbodepartamentoEdi").val("00");
            $("#cboprovinciaEdi").val("00");
            $("#cbodistritoEdi").val("00");
          }
        })
        .fail(function (error) {
          var datosJSON = $.parseJSON(error.responseText);
        });
    }
  });

  $(document).on("click", ".deletezonasEdi", function () {
    if (confirm("¿Esta seguro que desea eliminar esta zona?")) {
      var coddepartamento = $(this).closest("tr").find("td:eq(0)").text();
      var codprovincia = $(this).closest("tr").find("td:eq(2)").text();
      var coddistrito = $(this).closest("tr").find("td:eq(4)").text();
      var codpromocion = $("#textIdPromocion").val();

      $.post(
        "../controller/gestionar.cliente.eliminar.promocion.ubicacion.controller.php",
        {
          p_codpromocion: codpromocion,
          p_coddepartamento: coddepartamento,
          p_codprovincia: codprovincia,
          p_coddistrito: coddistrito,
        }
      )
        .done(function (resultado) {
          var datosJSON = resultado;
          if (datosJSON.estado === 200) {
            alert("Zona eliminada");

            $("#clizonaEdi tbody>tr").empty();
            listarZonasEdi();
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

  $("#agregarDetalleEdi").click(function () {
    var codpromocion = $("#textIdPromocion").val();
    var nomproducto = $("#cboproductos option:selected").html();
    var codproducto = $("#cboproductos option:selected").val();
    var cantproducto = $("#textCantProducto").val();

    if (cantproducto == "" || codproducto == "000") {
      alert("Por favor, completar todos los campos");
    } else {
      $.post(
        "../controller/gestionar.cliente.agregar.promocion.detalle.controller.php",
        {
          p_codpromocion: codpromocion,
          p_codproducto: codproducto,
          p_nomproducto: nomproducto,
          p_cantidadproducto: cantproducto,
        }
      )
        .done(function (resultado) {
          var datosJSON = resultado;
          if (datosJSON.estado === 200) {
            $("#detpromoedi tbody>tr").empty();
            listarDetallesEdi();

            $("#textCantProducto").val("");
            $("#cboproductos").val("000");
          }
        })
        .fail(function (error) {
          var datosJSON = $.parseJSON(error.responseText);
        });
    }
  });

  $(document).on("click", ".deleteproductosEdi", function () {
    if (confirm("¿Esta seguro que desea eliminar este detalle?")) {
      var codpromocion = $("#textIdPromocion").val();
      var codproducto = $(this).closest("tr").find("td:eq(0)").text();

      $.post(
        "../controller/gestionar.cliente.eliminar.promocion.detalle.controller.php",
        {
          p_codpromocion: codpromocion,
          p_codproducto: codproducto,
        }
      )
        .done(function (resultado) {
          var datosJSON = resultado;
          if (datosJSON.estado === 200) {
            alert("Detalle eliminado");

            $("#detpromoedi tbody>tr").empty();
            listarDetallesEdi();
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

  $("#agregarAtencionProm").click(function () {
    var coddepartamento = $("#cbodepartamentoEdi option:selected").val();
    var codprovincia = $("#cboprovinciaEdi option:selected").val();
    var coddistrito = $("#cbodistritoEdi option:selected").val();

    var departamento = $("#cbodepartamentoEdi option:selected").html();
    var provincia = $("#cboprovinciaEdi option:selected").html();
    var distrito = $("#cbodistritoEdi option:selected").html();

    if (coddepartamento == "" || codprovincia == "" || coddistrito == "") {
      alert("Por favor, completar todos los campos");
    } else {
      var adicion =
        '<tr><th scope="row">-</th>' +
        '<td class="coddepartamento" style="display:none;">' +
        coddepartamento +
        '</td><td class="Departamento">' +
        departamento +
        "</td>" +
        '<td class="codprovincia" style="display:none;">' +
        codprovincia +
        '</td><td class="provincia">' +
        provincia +
        "</td>" +
        '<td class="coddistrito" style="display:none;">' +
        coddistrito +
        '</td><td class="distrito">' +
        distrito +
        "</td>" +
        '<td><div class="widget-content-right widget-content-actions">' +
        '<button type="button" name="deletezonasEdiNue" class="border-0 btn-transition btn btn-outline-danger deletezonasEdiNue"><i class="fa fa-trash-alt"></i></button></div></td></tr>';

      $("#clizonaEdi tbody").append(adicion);
    }
  });
  $(document).on("click", ".deletezonasEdiNue", function () {
    $(this).closest("tr").remove();
  });

  $("#agregarDetalleProm").click(function () {
    var nombreproducto = $("#cboproductos option:selected").html();
    var codproducto = $("#cboproductos option:selected").val();
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
        '<button type="button" name="deleteproductosEdiNue" class="border-0 btn-transition btn btn-outline-danger deleteproductosEdiNue"><i class="fa fa-trash-alt"></i></button></div></td></tr>';

      $("#detpromoedi tbody").append(adicion);
    }
  });
  $(document).on("click", ".deleteproductosEdiNue", function () {
    $(this).closest("tr").remove();
  });

  $("#agregarPromocionNueva").click(function () {
    var nompromocion = $("#textNomPromocion").val();
    var descripcionlarga = $("#textDescripcionLarga").val();
    var costoreal = $("#textcostoreal").val();
    var descuento = $("#textdescuento").val();
    var costopromocion = $("#textcostopromocion").val();
    var fechainiciovigencia = $("#fechaInicioVigencia").val();
    var fechafinvigencia = $("#fechaFinVigencia").val();

    var tipopublic1 = document.getElementById("tipopublic1").checked;
    var tipopublic2 = document.getElementById("tipopublic2").checked;
    var tipopublic3 = document.getElementById("tipopublic3").checked;
    var tipopublic4 = document.getElementById("tipopublic4").checked;
    var opciones = "";
    if (tipopublic1 == true) {
      opciones = opciones + "1|";
    }
    if (tipopublic2 == true) {
      opciones = opciones + "2|";
    }
    if (tipopublic3 == true) {
      opciones = opciones + "3|";
    }
    if (tipopublic4 == true) {
      opciones = opciones + "4|";
    }

    opciones = opciones.slice(0, -1);

    var stock = $("#textStockPedido").val();
    var codpromocion = "";

    $.post("../controller/gestionar.cliente.agregar.promocion.controller.php", {
      p_nompromocion: nompromocion,
      p_descripcionlarga: descripcionlarga,
      p_costoreal: costoreal,
      p_descuento: descuento,
      p_costopromocion: costopromocion,
      p_fechainiciovigencia: fechainiciovigencia,
      p_fechafinvigencia: fechafinvigencia,
      p_tipopublicidad: opciones,
      p_stockpedido: stock,
    })
      .done(function (resultado) {
        var datosJSON = resultado;
        if (datosJSON.estado === 200) {
          codpromocion = resultado.datos[0].codpromocion;
          //swal("Exito", datosJSON.mensaje, "success");
          /*
          $("#cliflota tbody>tr").empty();
          listarflotas();

          $("#textTipoVehiculo").val("");
          $("#textcapacidadKg").val("");
          $("#textPlaca").val("");
          $("#fotoUsuario").val(null);
          */

          var blobFile = $("#fotoPromocion")[0].files[0];
          var formData = new FormData();
          formData.append("fileToUpload", blobFile);
          formData.append("codpromocion", codpromocion);

          $.ajax({
            type: "POST",
            url:
              "../controller/gestionar.cliente.agregar.promocion.foto.controller.php",
            //data: $(this).serialize(),
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
              if (response != 0) {
              } else {
              }
            },
          });

          $("#clizonaEdi tbody>tr").each(function () {
            //alert(codpromocion);
            var coddepartamento = $(this).find(".coddepartamento").html();
            var codprovincia = $(this).find(".codprovincia").html();
            var coddistrito = $(this).find(".coddistrito").html();

            $.post(
              "../controller/gestionar.cliente.agregar.promocion.ubicacion.controller.php",
              {
                p_codpromocion: codpromocion,
                p_coddepartamento: coddepartamento,
                p_codprovincia: codprovincia,
                p_coddistrito: coddistrito,
              }
            )
              .done(function (resultado) {
                var datosJSON = resultado;
              })
              .fail(function (error) {
                var datosJSON = $.parseJSON(error.responseText);
              });
          });

          $("#detpromoedi tbody>tr").each(function () {
            //alert(codpromocion);
            var codproducto = $(this).find(".codproducto").html();
            var nomproducto = $(this).find(".nomproducto").html();
            var cantidadproducto = $(this).find(".cantidadproducto").html();

            $.post(
              "../controller/gestionar.cliente.agregar.promocion.detalle.controller.php",
              {
                p_codpromocion: codpromocion,
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
          swal("Promocion Registrada", datosJSON.mensaje, "success");
        } else {
        }
      })
      .fail(function (error) {
        var datosJSON = $.parseJSON(error.responseText);
      });
  });

  $("#agregarPromocion").click(function () {
    var nompromocion = $("#textNomPromocion").val();
    var descripcionlarga = $("#textDescripcionLarga").val();
    var costoreal = $("#textcostoreal").val();
    var descuento = $("#textdescuento").val();
    var costopromocion = $("#textcostopromocion").val();
    var fechainiciovigencia = $("#fechaInicioVigencia").val();
    var fechafinvigencia = $("#fechaFinVigencia").val();
    var codpromocion = $("#textIdPromocion").val();

    var tipopublic1 = document.getElementById("tipopublic1").checked;
    var tipopublic2 = document.getElementById("tipopublic2").checked;
    var tipopublic3 = document.getElementById("tipopublic3").checked;
    var tipopublic4 = document.getElementById("tipopublic4").checked;
    var opciones = "";
    if (tipopublic1 == true) {
      opciones = opciones + "1|";
    }
    if (tipopublic2 == true) {
      opciones = opciones + "2|";
    }
    if (tipopublic3 == true) {
      opciones = opciones + "3|";
    }
    if (tipopublic4 == true) {
      opciones = opciones + "4|";
    }

    opciones = opciones.slice(0, -1);

    var stock = $("#textStockPedido").val();

    $.post(
      "../controller/gestionar.cliente.actualizar.promocion.controller.php",
      {
        p_nompromocion: nompromocion,
        p_descripcionlarga: descripcionlarga,
        p_costoreal: costoreal,
        p_descuento: descuento,
        p_costopromocion: costopromocion,
        p_fechainiciovigencia: fechainiciovigencia,
        p_fechafinvigencia: fechafinvigencia,
        p_tipopublicidad: opciones,
        p_stockpedido: stock,
        p_codpromocion: codpromocion,
      }
    )
      .done(function (resultado) {
        var datosJSON = resultado;
        if (datosJSON.estado === 200) {
          if (document.getElementById("fotoPromocion").files.length != 0) {
            var blobFile = $("#fotoPromocion")[0].files[0];
            var formData = new FormData();
            formData.append("fileToUpload", blobFile);
            formData.append("codpromocion", codpromocion);

            $.ajax({
              type: "POST",
              url:
                "../controller/gestionar.cliente.agregar.promocion.foto.controller.php",
              //data: $(this).serialize(),
              data: formData,
              processData: false,
              contentType: false,
              success: function (response) {},
            });
          }
          swal("Registros actualizados", datosJSON.mensaje, "success");
        } else {
          swal("Registros actualizados", datosJSON.mensaje, "success");
        }
      })
      .fail(function (error) {
        var datosJSON = $.parseJSON(error.responseText);
      });
  });
  $("#limpiarPromocion").click(function () {
    $("#textNomPromocion").val("");
    $("#textIdPromocion").val("");
    $("#textDescripcionLarga").val("");
    $("#textcostoreal").val("");
    $("#textdescuento").val("");
    $("#textcostopromocion").val("");
    $("#fechaInicioVigencia").val("");
    $("#fechaFinVigencia").val("");
    $("#textStockPedido").val("");

    $("#divagregarPromocion").hide();
    $("#divagregarAtencionEdi").hide();
    $("#divagregarAtencionProm").show();
    $("#divagregarDetalleEdi").hide();
    $("#divagregarDetalleProm").show();
    $("#divagregarPromocionNueva").show();

    $("#tipopublic1").prop("checked", false);
    $("#tipopublic2").prop("checked", false);
    $("#tipopublic3").prop("checked", false);
    $("#tipopublic4").prop("checked", false);

    $("#clizonaEdi tbody>tr").empty();
    $("#detpromoedi tbody>tr").empty();

    $('.nav-pills a[href="#Lista"]').tab("show");
  });
});

function listarZonasEdi() {
  var codpromocion = $("#textIdPromocion").val();

  $.post(
    "../controller/gestionarCliente.listar.promociones.zonas.controller.php",
    {
      p_codpromocion: codpromocion,
    }
  )
    .done(function (resultado) {
      var datosJSON = resultado;

      if (datosJSON.estado === 200) {
        for (i = 0; i < resultado.datos.length; i++) {
          var numeracion = i + 1;

          var adicion =
            '<tr><th scope="row">-</th>' +
            '<td class="coddepartamento" style="display:none;">' +
            resultado.datos[i].coddepartamento +
            '</td><td class="Departamento">' +
            resultado.datos[i].departamento +
            "</td>" +
            '<td class="codprovincia" style="display:none;">' +
            resultado.datos[i].codprovincia +
            '</td><td class="provincia">' +
            resultado.datos[i].provincia +
            "</td>" +
            '<td class="coddistrito" style="display:none;">' +
            resultado.datos[i].coddistrito +
            '</td><td class="distrito">' +
            resultado.datos[i].distrito +
            "</td>" +
            '<td><div class="widget-content-right widget-content-actions">' +
            '<button type="button" name="deletezonasEdi" class="border-0 btn-transition btn btn-outline-danger deletezonasEdi"><i class="fa fa-trash-alt"></i></button></div></td></tr>';

          $("#clizonaEdi tbody").append(adicion);
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

function listarDetallesEdi() {
  var codpromocion = $("#textIdPromocion").val();

  $.post(
    "../controller/gestionarCliente.listar.promociones.detalle.controller.php",
    {
      p_codpromocion: codpromocion,
    }
  )
    .done(function (resultado) {
      var datosJSON = resultado;

      if (datosJSON.estado === 200) {
        for (i = 0; i < resultado.datos.length; i++) {
          var numeracion = i + 1;

          var adicion =
            '<tr><th scope="row">-</th>' +
            '<td class="codproducto" style="display:none;">' +
            resultado.datos[i].cod_producto +
            '</td><td class="nomproducto">' +
            resultado.datos[i].nom_producto +
            "</td>" +
            '</td><td class="cantidadproducto">' +
            resultado.datos[i].cantidad_producto +
            "</td>" +
            '<td><div class="widget-content-right widget-content-actions">' +
            '<button type="button" name="deleteproductosEdi" class="border-0 btn-transition btn btn-outline-danger deleteproductosEdi"><i class="fa fa-trash-alt"></i></button></div></td></tr>';

          $("#detpromoedi tbody").append(adicion);
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

function listarflotas() {
  $.post("../controller/gestionarCliente.listar.flota.controller.php")
    .done(function (resultado) {
      var datosJSON = resultado;

      if (datosJSON.estado === 200) {
        for (i = 0; i < resultado.datos.length; i++) {
          var numeracion = i + 1;

          var adicion =
            '<tr><th scope="row">-</th>' +
            '<td class="idflota" style="display:none;">' +
            resultado.datos[i].id_flota +
            '</td><td class="tipovehiculo">' +
            resultado.datos[i].tipo_vehiculo +
            "</td>" +
            '<td class="capacidadkg">' +
            resultado.datos[i].capacidadkg +
            '</td><td class="placa">' +
            resultado.datos[i].placa +
            "</td>" +
            '<td class="gps">' +
            resultado.datos[i].gps +
            "</td>" +
            '<td class="imagen"><img src="' +
            resultado.datos[i].imagen +
            '" alt="" style="width:200px; height:auto;"></td>' +
            '<td><div class="widget-content-right widget-content-actions">' +
            '<button type="button" name="deleteflota" class="border-0 btn-transition btn btn-outline-danger deleteflota"><i class="fa fa-trash-alt"></i></button></div></td></tr>';

          $("#cliflota tbody").append(adicion);
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

function listarconductor() {
  $.post("../controller/gestionarCliente.listar.conductor.controller.php")
    .done(function (resultado) {
      var datosJSON = resultado;

      if (datosJSON.estado === 200) {
        for (i = 0; i < resultado.datos.length; i++) {
          var numeracion = i + 1;

          var adicion =
            '<tr><th scope="row">-</th>' +
            '<td class="idconductor" style="display:none;">' +
            resultado.datos[i].id_conductor +
            '</td><td class="nrodoc">' +
            resultado.datos[i].nro_doc +
            "</td>" +
            '<td class="nombre">' +
            resultado.datos[i].nombre +
            '</td><td class="nrolicencia">' +
            resultado.datos[i].nro_licencia +
            "</td>" +
            '<td class="numtelefono">' +
            resultado.datos[i].num_telefono +
            "</td>" +
            '<td class="foto"><img src="' +
            resultado.datos[i].foto +
            '" alt="" style="width:200px; height:auto;"></td>' +
            '<td><div class="widget-content-right widget-content-actions">' +
            '<button type="button" name="deleteconductor" class="border-0 btn-transition btn btn-outline-danger deleteconductor"><i class="fa fa-trash-alt"></i></button></div></td></tr>';

          $("#cliconductor tbody").append(adicion);
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

function cargarTipo() {
  $.post("../controller/gestionarCliente.listar.tipoprod.controller.php")
    .done(function (resultado) {
      var datosJSON = resultado;

      if (datosJSON.estado === 200) {
        for (i = 0; i < resultado.datos.length; i++) {
          var o = new Option(
            resultado.datos[i].nombre_tipo,
            resultado.datos[i].cod_tipo
          );
          $(o).html(resultado.datos[i].nombre_tipo);
          $("#cbotipprod").append(o);
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

function cargarPlanes() {
  $.post("../controller/gestionarCliente.listar.planes.controller.php")
    .done(function (resultado) {
      var datosJSON = resultado;

      if (datosJSON.estado === 200) {
        for (i = 0; i < resultado.datos.length; i++) {
          var o = new Option(
            resultado.datos[i].nom_detalle,
            resultado.datos[i].cod_detalle
          );
          $(o).html(resultado.datos[i].nom_detalle);
          $("#cboplanesprod").append(o);
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

function listarproductos() {
  $.post("../controller/gestionarCliente.listar.producto.controller.php")
    .done(function (resultado) {
      var datosJSON = resultado;

      if (datosJSON.estado === 200) {
        for (i = 0; i < resultado.datos.length; i++) {
          var adicion =
            '<tr><th scope="row">-</th>' +
            '<td class="codproducto" style="display:none;">' +
            resultado.datos[i].cod_producto +
            '</td><td class="nomproducto ">' +
            resultado.datos[i].nom_producto +
            "</td>" +
            '<td class="nombretipo ">' +
            resultado.datos[i].nombre_tipo +
            '</td><td><div class="widget-content-right widget-content-actions">' +
            '<button type="button" name="deleteproducto" class="border-0 btn-transition btn btn-outline-danger deleteproducto"><i class="fa fa-trash-alt"></i></button></div></td></tr>';

          $("#cliproducto tbody").append(adicion);
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

function listarPlanes() {
  $.post("../controller/gestionarCliente.listar.suscripciones.controller.php")
    .done(function (resultado) {
      var datosJSON = resultado;

      if (datosJSON.estado === 200) {
        for (i = 0; i < resultado.datos.length; i++) {
          var adicion =
            '<tr><th scope="row">-</th>' +
            '<td class="codsuscripcion" style="display:none;">' +
            resultado.datos[i].cod_suscripcion +
            '</td><td class="nom_etalle ">' +
            resultado.datos[i].nom_detalle +
            '</td><td class="fechainicio ">' +
            resultado.datos[i].fecha_inicio +
            "</td>" +
            '<td class="fechafin ">' +
            resultado.datos[i].fecha_fin +
            '</td></tr>';

          $("#cliplanes tbody").append(adicion);
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
function cargarRutas() {
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
          $("#cbodepartamento").append(o);
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

$("#cbodepartamento").change(function () {
  $("#cboprovincia").empty();
  var o = new Option(" Todas las provincias ", "00");
  $(o).html(" Todos los departamentos ");
  $("#cboprovincia").append(o);

  if ($("#cbodepartamento option:selected").val() != "00") {
    $.post("../controller/gestionarCliente.listar.provincia.controller.php", {
      p_coddepartamento: $("#cbodepartamento option:selected").val(),
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
            $("#cboprovincia").append(o);
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

$("#cboprovincia").change(function () {
  $("#cbodistrito").empty();
  var o = new Option(" Todos los distritos ", "00");
  $(o).html(" Todos los distritos ");
  $("#cbodistrito").append(o);

  if (
    $("#cbodepartamento option:selected").val() != "00" &&
    $("#cboprovincia option:selected").val() != "00"
  ) {
    $.post("../controller/gestionarCliente.listar.distrito.controller.php", {
      p_coddepartamento: $("#cbodepartamento option:selected").val(),
      p_codprovincia: $("#cboprovincia option:selected").val(),
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
            $("#cbodistrito").append(o);
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

$("#cbotipprod").change(function () {
  $("#cbotipprod option[value='000']").remove();
});

function listarZonas() {
  $.post("../controller/gestionarCliente.listar.zonas.controller.php")
    .done(function (resultado) {
      var datosJSON = resultado;

      if (datosJSON.estado === 200) {
        for (i = 0; i < resultado.datos.length; i++) {
          var numeracion = i + 1;

          var adicion =
            '<tr><th scope="row">-</th>' +
            '<td class="coddepartamento" style="display:none;">' +
            resultado.datos[i].coddepartamento +
            '</td><td class="departamento">' +
            resultado.datos[i].departamento +
            "</td>" +
            '<td class="codprovincia" style="display:none;">' +
            resultado.datos[i].codprovincia +
            '</td><td class="provincia">' +
            resultado.datos[i].provincia +
            "</td>" +
            '<td class="coddistrito" style="display:none;">' +
            resultado.datos[i].coddistrito +
            '</td><td class="distrito">' +
            resultado.datos[i].distrito +
            "</td>" +
            '<td><div class="widget-content-right widget-content-actions">' +
            '<button type="button" name="deletezonas" class="border-0 btn-transition btn btn-outline-danger deletezonas"><i class="fa fa-trash-alt"></i></button></div></td></tr>';

          $("#prozonas tbody").append(adicion);
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

function cargarPromociones() {
  $.post("../controller/gestionarCliente.listar.promociones.controller.php")
    .done(function (resultado) {
      var datosJSON = resultado;

      if (datosJSON.estado === 200) {
        for (i = 0; i < resultado.datos.length; i++) {
          var adicion =
            '<tr><th scope="row">-</th>' +
            '<td class="codpromocion">' +
            resultado.datos[i].cod_promocion +
            '</td><td class="nompromocion">' +
            resultado.datos[i].nom_promocion +
            "</td>" +
            '<td class="costoreal">' +
            resultado.datos[i].costo_real +
            '</td><td class="costopromocion">' +
            resultado.datos[i].costo_promocion +
            "</td>" +
            '<td class="fechacreacion">' +
            resultado.datos[i].fecha_creacion +
            '</td><td class="fechafinvigencia">' +
            resultado.datos[i].fecha_fin_vigencia +
            "</td>" +
            '<td class="stockpedido">' +
            resultado.datos[i].stock_pedido +
            "</td>" +
            '<td><div class="widget-content-right widget-content-actions">' +
            '<button type="button" name="updatepromocion" class="border-0 btn-transition btn btn-outline-success updatepromocion"><i class="fa fa-edit"></i></button>' +
            '<button type="button" name="deletepromocion" class="border-0 btn-transition btn btn-outline-danger deletepromocion"><i class="fa fa-trash-alt"></i></button></div></td></tr>';

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

function cargarRutasEdicion() {
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
          $("#cbodepartamentoEdi").append(o);
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

$("#cbodepartamentoEdi").change(function () {
  $("#cboprovinciaEdi").empty();
  var o = new Option(" Todas las provincias ", "00");
  $(o).html(" Todos los departamentos ");
  $("#cboprovinciaEdi").append(o);

  if ($("#cbodepartamentoEdi option:selected").val() != "00") {
    $.post("../controller/gestionarCliente.listar.provincia.controller.php", {
      p_coddepartamento: $("#cbodepartamentoEdi option:selected").val(),
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
            $("#cboprovinciaEdi").append(o);
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

$("#cboprovinciaEdi").change(function () {
  $("#cbodistritoEdi").empty();
  var o = new Option(" Todos los distritos ", "00");
  $(o).html(" Todos los distritos ");
  $("#cbodistritoEdi").append(o);

  if (
    $("#cbodepartamentoEdi option:selected").val() != "00" &&
    $("#cboprovinciaEdi option:selected").val() != "00"
  ) {
    $.post("../controller/gestionarCliente.listar.distrito.controller.php", {
      p_coddepartamento: $("#cbodepartamentoEdi option:selected").val(),
      p_codprovincia: $("#cboprovinciaEdi option:selected").val(),
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
            $("#cbodistritoEdi").append(o);
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
          $("#cboproductos").append(o);
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

function listarPrecios() {
  $.post(
    "../controller/gestionarCliente.listar.promociones.cobro.detalles.controller.php"
  )
    .done(function (resultado) {
      var datosJSON = resultado;

      if (datosJSON.estado === 200) {
        for (i = 0; i < resultado.datos.length; i++) {
          var numeracion = i + 1;

          var val = document.getElementById("servcosto" + numeracion);

          val.innerHTML = resultado.datos[i].costo_detalle;
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

function sumaTotal() {
  var total = 0;
  if (document.getElementById("tipopublic1").checked) {
    var monto = document.getElementById("servtotal1").innerHTML;
    monto = monto.replace("S/", "");
    monto = monto.replace(/\&nbsp;/g, "");
    monto = monto.trim();
    total = parseFloat(monto) + parseFloat(total);
  }
  if (document.getElementById("tipopublic2").checked) {
    monto = document.getElementById("servtotal2").innerHTML;
    monto = monto.replace("S/", "");
    monto = monto.replace(/\&nbsp;/g, "");
    monto = monto.trim();
    total = parseFloat(monto) + parseFloat(total);
  }
  if (document.getElementById("tipopublic3").checked) {
    monto = document.getElementById("servtotal3").innerHTML;
    monto = monto.replace("S/", "");
    monto = monto.replace(/\&nbsp;/g, "");
    monto = monto.trim();
    total = parseFloat(monto) + parseFloat(total);
  }
  if (document.getElementById("tipopublic4").checked) {
    monto = document.getElementById("servtotal4").innerHTML;
    monto = monto.replace("S/", "");
    monto = monto.replace(/\&nbsp;/g, "");
    monto = monto.trim();
    total = parseFloat(monto) + parseFloat(total);
  }
  $("#textmontototal").val(total + " S/");

}
