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
                <?php

                require_once '../controller/gestionarSubasta.listar.tiposervicio.controller.php';


                for ($i = 0; $i < count($resultado); $i++) {
                  if ($i == 0) {
                    echo '<li class="nav-item"><a class="nav-link active" href="#' . $resultado[$i]["nombre_tipo"] . '" data-toggle="tab"> ' . $resultado[$i]["nombre_tipo"] . '</a></li>';
                  } else {
                    echo '<li class="nav-item"><a class="nav-link" href="#' . $resultado[$i]["nombre_tipo"] . '" data-toggle="tab"> ' . $resultado[$i]["nombre_tipo"] . '</a></li>';
                  }
                }
                ?>

              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">

                <?php

                for ($i = 0; $i < count($resultado); $i++) {

                ?>
                  <div class="tab-pane <?php if ($i == 0) {
                                          echo 'active';
                                        }; ?>" id="<?php echo  $resultado[$i]["nombre_tipo"] ?>">

                    <div class="row justify-content-center">
                      <div class="box box-primary">
                        <div class="box-header with-border">
                          <h3 class="box-title">Lista de subastas: <?php echo  $resultado[$i]["nombre_tipo"] ?> </h3>
                        </div>

                        <table class="table table-borderless">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Nro Propuesta</th>
                              <th style="display:none;">Tipo</th>
                              <th style="display:none;">Cod. Solicitante</th>
                              <th>Fecha Creación</th>
                              <th>Fecha Cierre</th>
                              <th>Observaciones</th>
                              <th>Opciones</th>
                            </tr>
                          </thead>
                          <tbody>

                            <?php

                            $_POST["codigo_tipo"] = $resultado[$i]["cod_tipo"];


                            require '../controller/gestionarSubasta.listar.servicios.vista.controller.php';

                            $salto = 1;
                            for ($j = 0; $j < count($resultadoSubasta); $j++) {
                            ?>

                              <tr>
                                <th scope="row">-</th>
                                <td class="nropropuesta"><?php echo $resultadoSubasta[$j]["nro_propuesta"] ?></td>
                                <td class="codsolicitante" style="display:none;"><?php echo $resultadoSubasta[$j]["cod_solicitante"] ?></td>
                                <td class="tiposubasta" style="display:none;"><?php echo $resultadoSubasta[$j]["tipo_subasta"] ?></td>
                                <td class="fechacreacion"><?php echo $resultadoSubasta[$j]["fecha_creacion"] ?></td>
                                <td class="fechacierre"><?php echo $resultadoSubasta[$j]["fecha_cierre"] ?></td>
                                <td class="observaciones"><?php echo $resultadoSubasta[$j]["observaciones"] ?></td>
                                <td>
                                  <div class="widget-content-right widget-content-actions">
                                    <button type="button" name="take" class="border-0 btn-transition btn btn-outline-success update"><i class="fas fa-check"></i></button></div>
                                </td>
                              </tr>

                            <?php
                            }
                            ?>

                          </tbody>
                        </table>

                      </div>
                    </div>
                  </div>
                <?php
                }
                ?>
                <!-- /.tab-content -->

              </div>
            </div>
          </div>


          <!--<?php include_once 'pie.view.php'; ?>-->

          <!-- Control Sidebar -->

          <!-- /.control-sidebar -->
          <div class="control-sidebar-bg"></div>

          <!-- ./wrapper -->
          <?php include_once 'scripts.view.php'; ?>
          <script src="js/edicion.usuarios.js" type="text/javascript"></script>
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