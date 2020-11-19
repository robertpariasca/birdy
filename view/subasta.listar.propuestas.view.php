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
  <title> Birdy | Edicion</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php include_once 'estilos.view.php'; ?>
  <style>
    table {
      table-layout: fixed;
      width: 100%;
    }
  </style>
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

      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Subasta</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <div class="row justify-content-center">
        <div>
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">

              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="row justify-content-center">
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Propuesta N°: <?php echo  $_SESSION["nro_propuesta"] ?> </h3>
                    
                  </div>

                  <table id= "tblista" name= "tblista" class="table table-borderless">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th style="display:none;">Nro Propuesta</th>
                        <th>Costo a Pagar</th>
                        <th>Detalles</th>
                        <th colspan="2">Opciones</th>
                      </tr>
                    </thead>
                    <tbody>

                    </tbody>
                  </table>
                  <div class="modal fade" id="ModalVer" tabindex="-1" role="dialog" aria-labelledby="ModalVer" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Prupuesta</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="container-fluid">
                            <div class="row">
                              <div class="col-sm-12">
                                <div class="row">
                                  <div class="col-8">
                                    <table id="tbdetalles" name="tbdetalles" class="table table-borderless">
                                      <thead>
                                        <tr>
                                          <th>#</th>
                                          <th style="display:none;">Id Conductor</th>
                                          <th>Conductor</th>
                                          <th style="display:none;">Id Auto</th>
                                          <th>Placa</th>
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
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>

                        </div>
                      </div>
                    </div>
                  </div>

                </div>

              </div>

              <!-- /.tab-content -->

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
  <script src="js/edicion.subasta.listar.js" type="text/javascript"></script>
  <script src="js/edicion.subasta.postulantes.listar.js" type="text/javascript"></script>
  <!--<script src="js/actualizar.cliente.js" type="text/javascript"></script>-->
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