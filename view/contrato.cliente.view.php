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

    #ruta {
      width: 100%;
      height: 300px;
      background: #f2f2f2;
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
            <div id="ruta"></div>
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

                          <div class="modal fade" id="ModalVer" tabindex="-1" role="dialog" aria-labelledby="ModalVer" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLongTitle">Calificación</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <div class="container-fluid">
                                    <div class="row justify-content-center">
                                      <div class="col-sm-12 justify-content-center">
                                        <div class="row col-sm-12">
                                        <div class="row col-sm-12">Por favor, califique su experiencia</div>
                                          <div id="rateit1" class="row col-sm-8 justify-content-center">
                                          </div>
                                          <div class="row col-sm-12">Deja un comentario del servicio</div>
                                          <div id="coment" class="row col-sm-8 ">
                                          <input type="text" id="valorcomentario" name="valorcomentario">
                                          </div>
                                          <div id="calif" class="row col-sm-8 ">
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                <button type="submit" class="btn btn-outline-info registrarcoment"><ion-icon name="star"></ion-icon>  Calificar</button>
                               <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
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