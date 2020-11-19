<?php
require_once 'validar.datos.sesion.view.php';
$_POST["s_usuario"] = $dniSesion;


//require_once '../controller/perfil.usuario.leer.datos.controller.php';
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="../images/birdy.png">
  <title> Birdy | Subasta </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php include_once 'estilos.view.php'; ?>
</head>

<body class="hold-transition skin-purple-light sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">

    <?php include_once './menu-arriba.admin.view.php'; ?>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <?php include_once 'menu-izquierda.admin.view.php'; ?>

    <!-- =============================================== -->
    <div class="content-wrapper">
      <div class="row justify-content-center">
        <div class="col-md-9">
          <div class="row justify-content-center">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#Lista" data-toggle="tab">Mis Subastas</a></li>
                  <li class="nav-item"><a class="nav-link" href="#Edicion" data-toggle="tab">Crear-Editar Subasta</a></li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="Lista">
                    <div class="row col-12 justify-content-center">
                      <div class="main-card mb-6 card">
                        <div class="card-body">
                          <h5 class="card-title">Subastas</h5>
                          <div class="table-responsive">
                            <table id="tbsubasta" class="mb-0 table">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Nro Propuesta</th>
                                  <th>Tipo</th>
                                  <th>Fecha Creación</th>
                                  <th>Fecha Cierre</th>
                                  <th>Observaciones</th>
                                  <th>Opciones</th>
                                </tr>
                              </thead>
                              <tbody>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="Edicion">
                    <div class="row justify-content-center">
                      <div class="box box-primary col-6">
                        <div class="box-header with-border">
                          <h3 class="box-title">Creación Subasta</h3>
                        </div>
                        <form id="frmActualizarPromocion" enctype="multipart/form-data">
                          <div class="input-group mb-3">
                            <select name="select" id="cboTipoSubasta" class="form-control">
                              <option value="0"> Seleccione Tipo </option>
                              <option value="1"> Carga </option>
                              <option value="2"> Producto </option>
                              <option value="3"> Servicio </option>
                            </select>
                          </div>
                          <div class="input-group mb-3">
                            <input type="text" class="form-control" id="fechacierre" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false" placeholder="Fecha Cierre Promocion">
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="far fa-calendar-alt"></span>
                              </div>
                            </div>
                          </div>
                          <div class="input-group mb-3">
                            <input type="text" name="textobservaciones" id="textobservaciones" class="form-control" placeholder="Observaciones">
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-map-marker-alt"></span>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                      <div id='dtCarga' class="col-12 row justify-content-center">
                        <div class="box box-primary col-6">
                          <div class="box-header with-border">
                            <h3 class="box-title">Detalles de carga</h3>
                          </div>

                          <div class="input-group mb-3">
                            <input type="text" name="textvolumen" id="textvolumen" class="form-control" placeholder="Volumen">
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-map-marker-alt"></span>
                              </div>
                            </div>
                          </div>
                          <div class="input-group mb-3">
                            <input type="text" name="textdimension" id="textdimension" class="form-control" placeholder="Dimensiones">
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-map-marker-alt"></span>
                              </div>
                            </div>
                          </div>
                          <div class="input-group mb-3">
                            <input type="text" name="textpeso" id="textpeso" class="form-control" placeholder="Peso" onkeypress="ValidaSoloNumerosYPunto();">
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-map-marker-alt"></span>
                              </div>
                            </div>
                          </div>
                          <div class="input-group mb-3">
                            <input type="text" name="textcaracteristicas" id="textcaracteristicas" class="form-control" placeholder="Caracteristicas">
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-map-marker-alt"></span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div id="dtDireccionSalida" class="col-12 row justify-content-center">
                        <div class="box box-primary col-6">
                          <div class="box-header with-border">
                            <h3 class="box-title">Datos de Salida</h3>
                          </div>

                          <div class="input-group mb-3">
                            <select name="select" id="cbodepartamentoSalida" class="form-control">
                              <option value="00"> Departamento de Salida </option>
                            </select>
                          </div>
                          <div class="input-group mb-3">
                            <select name="select" id="cboprovinciaSalida" class="form-control">
                              <option value="00"> Provincia de Salida </option>
                            </select>
                          </div>
                          <div class="input-group mb-3">
                            <select name="select" id="cbodistritoSalida" class="form-control">
                              <option value="00"> Distrito de Salida </option>
                            </select>
                          </div>
                          <div class="input-group mb-3">
                            <input type="text" name="textdireccionsalida" id="textdireccionsalida" class="form-control" placeholder="Dirección Salida">
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-map-marker-alt"></span>
                              </div>
                            </div>
                          </div>
                          <div class="input-group mb-3">
                            <input type="text" class="form-control" id="fechasalida" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false" placeholder="Fecha Salida">
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="far fa-calendar-alt"></span>
                              </div>
                            </div>
                          </div>
                          <div class="input-group mb-3">
                            <input type="text" class="form-control" id="horasalida" data-inputmask-alias="datetime" data-inputmask-inputformat="hh:ss:ss" data-mask="" im-insert="false" placeholder="Hora Salida">
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="far fa-calendar-alt"></span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div id="dtDireccionLlegada" class="col-12 row justify-content-center">
                        <div class="box box-primary col-6">
                          <div class="box-header with-border">
                            <h3 class="box-title">Datos de Llegada</h3>
                          </div>
                          <div class="input-group mb-3">
                            <select name="select" id="cbodepartamentoLlegada" class="form-control">
                              <option value="00"> Departamento de Llegada </option>
                            </select>
                          </div>
                          <div class="input-group mb-3">
                            <select name="select" id="cboprovinciaLlegada" class="form-control">
                              <option value="00"> Provincia de Llegada </option>
                            </select>
                          </div>
                          <div class="input-group mb-3">
                            <select name="select" id="cbodistritoLlegada" class="form-control">
                              <option value="00"> Distrito de Llegada </option>
                            </select>
                          </div>
                          <div class="input-group mb-3">
                            <input type="text" name="textdireccionllegada" id="textdireccionllegada" class="form-control" placeholder="Dirección Llegada">
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-map-marker-alt"></span>
                              </div>
                            </div>
                          </div>
                          <div class="input-group mb-3">
                            <input type="text" class="form-control" id="fechallegada" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" im-insert="false" placeholder="Fecha Llegada">
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="far fa-calendar-alt"></span>
                              </div>
                            </div>
                          </div>
                          <div class="input-group mb-3">
                            <input type="text" class="form-control" id="horallegada" data-inputmask-alias="datetime" data-inputmask-inputformat="hh:ss:ss" data-mask="" im-insert="false" placeholder="Hora Llegada">
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="far fa-calendar-alt"></span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div id="dtProducto" class="col-12 row justify-content-center">
                        <div class="box box-primary col-6">
                          <div class="box-header with-border">
                            <h3 class="box-title">Productos Subasta</h3>
                          </div>
                          <div class="input-group mb-3">
                            <select name="select" id="cboproductossubasta" class="form-control">
                              <option value="000"> Elegir Producto </option>
                            </select>
                          </div>
                          <div class="input-group mb-3">
                            <input type="text" name="textCantProducto" id="textCantProducto" class="form-control" placeholder="Cantidad Producto" onkeypress="ValidaSoloNumerosYPunto();">
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-user"></span>
                              </div>
                            </div>
                          </div>
                          <div class="row justify-content-center">
                            <!-- /.col -->

                            <div class="col-6" id="divagregarProductoSubasta">
                              <button class="mt-1 btn btn-primary" type="button" name="agregarProductoSubasta" id="agregarProductoSubasta" style="display: block; margin: 0 auto;">Agregar Producto</button>
                            </div>
                            <!-- /.col -->
                          </div>
                        </div>
                      </div>
                      <div id="dtDetProducto" class="col-12 row justify-content-center">
                        <div class="main-card mb-9 card">
                          <div class="card-body">
                            <h5 class="card-title">Detalles Producto Requerido</h5>
                            <div class="table-responsive">
                              <table id="detprodsubasta" class="mb-0 table">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th style="display:none;">CodProducto</th>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Opciones</th>
                                  </tr>
                                </thead>
                                <tbody>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-6" id="divagregarSubastaNueva">
                        <button class="mt-1 btn btn-primary" type="button" name="agregarSubastaNueva" id="agregarSubastaNueva" style="display: block; margin: 0 auto;">Crear Subasta</button>
                      </div>
                      <div class="col-6" id="divagregarlimpiarSubasta">
                        <button class="mt-1 btn btn-danger" type="button" name="limpiarSubasta" id="limpiarSubasta" style="display: block; margin: 0 auto;">Cancelar</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>



          <!--<?php include_once 'pie.view.php'; ?>-->

          <!-- Control Sidebar -->

          <!-- /.control-sidebar -->
          <div class="control-sidebar-bg"></div>

          <!-- ./wrapper -->
          <?php include_once 'scripts.view.php'; ?>
          <script src="js/edicion.subasta.js" type="text/javascript"></script>
          <script src="js/actualizar.cliente.js" type="text/javascript"></script>

          <!--<script src="js/gestionarTratamiento.js" type="text/javascript"></script>-->


          <!--
        <script src="js/convocatoriaVigente.js" type="text/javascript"></script>
        <script src="js/convocatoriaConcluida.js" type="text/javascript"></script>
        <script src="js/reporte.resultadoCurriculo.js" type="text/javascript"></script>
        <script src="js/reporte.resultadoPruebas.js" type="text/javascript"></script>
        <script src="js/reporte.resultadoFinal.js" type="text/javascript"></script>
    -->

</body>

</html>