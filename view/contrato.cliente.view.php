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
  <title> Birdy | Contrato </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php include_once 'estilos.view.php'; ?>
  <style>
    body {
      font-family: Verdana, sans-serif;
      font-size: 18px
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
      <div class="row justify-content-center">
        <div class="col-md-9">
          <div class="row justify-content-center">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#Lista" data-toggle="tab">Mis Contratos</a></li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="Lista">
                    <div class="row col-12 justify-content-center">
                      <div class="main-card mb-6 card">
                        <div class="card-body">
                          <h5 class="card-title">Contratos</h5>
                          <div class="table-responsive">
                            <table id="tbsubasta" class="mb-0 table">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Nro Contrato</th>
                                  <th style="display:none;">Id Propuesta</th>
                                  <th>Cod Proveedor</th>
                                  <th>Fecha Contrato</th>
                                  <th>Costo</th>
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
                </div>
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
  <script src="js/edicion.contrato.js" type="text/javascript"></script>
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