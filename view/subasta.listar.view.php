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
    body{
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


                        <?php

                        $_POST["codigo_tipo"] = $resultado[$i]["cod_tipo"];


                        require '../controller/gestionarSubasta.listar.servicios.vista.controller.php';

                        $salto = 1;
                        ?>

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
                              <th colspan="2">Opciones</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
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
                                    <button type="button" style='margin-bottom:16px' class="btn btn-success" data-toggle="modal" data-target="#<?php echo  $_SESSION["cod_acceso"] ?>-<?php echo  $resultadoSubasta[$j]["nro_propuesta"] ?>-Ver"><i class="fas fa-eye"></i></button></div>
                                  <div class="widget-content-right widget-content-actions">
                                    <button type="button" style='margin-bottom:16px' class="btn btn-success" data-toggle="modal" data-target="#<?php echo  $_SESSION["cod_acceso"] ?>-<?php echo  $resultadoSubasta[$j]["nro_propuesta"] ?>-Aceptar"><i class="fas fa-check"></i></button></div>
                                </td>


                              </tr>

                            <?php
                            }
                            ?>

                          </tbody>
                        </table>
                        <?php
                        for ($k = 0; $k < count($resultadoSubasta); $k++) {
                        ?>
                          <div class="modal fade" id="<?php echo  $_SESSION["cod_acceso"] ?>-<?php echo  $resultadoSubasta[$k]["nro_propuesta"] ?>-Ver" tabindex="-1" role="dialog" aria-labelledby="<?php echo  $_SESSION["cod_acceso"] ?>-<?php echo  $resultadoSubasta[$k]["nro_propuesta"] ?>" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLongTitle">Prupuesta N. <?php echo  $resultadoSubasta[$k]["nro_propuesta"] ?></h5>
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

                                            <div>Detalles de Solicitud:</div>

                                            <?php
                                            $_POST["nro_propuesta"] = $resultadoSubasta[$k]["nro_propuesta"];

                                            require '../controller/gestionarSubasta.listar.servicios.detalle.controller.php';

                                            if ($resultado[$i]["cod_tipo"] == 1) {

                                            ?>
                                              <div><b>Datos de Carga</b></div>
                                              <div>Volumen: <?php echo  $resultadoSubastaDetalle[0]["volumen"] ?></div>
                                              <div>Dimensiones: <?php echo  $resultadoSubastaDetalle[0]["dimensiones"] ?></div>
                                              <div>Peso: <?php echo  $resultadoSubastaDetalle[0]["peso"] ?></div>
                                              <div>Características: <?php echo  $resultadoSubastaDetalle[0]["caracteristicas"] ?></div>
                                              <div><b>Datos de Salida</b></div>
                                              <div>Departamento Salida: <?php echo  $resultadoSubastaDetalle[0]["DepartamentoSalida"] ?></div>
                                              <div>Provincia Salida: <?php echo  $resultadoSubastaDetalle[0]["ProvinciaSalida"] ?></div>
                                              <div>Distrito Salida: <?php echo  $resultadoSubastaDetalle[0]["DistritoSalida"] ?></div>
                                              <div>Dirección Salida: <?php echo  $resultadoSubastaDetalle[0]["direccion_salida"] ?></div>
                                              <div>Fecha Salida: <?php echo  $resultadoSubastaDetalle[0]["fecha_salida"] ?></div>
                                              <div>Hora Salida: <?php echo  $resultadoSubastaDetalle[0]["hora_salida"] ?></div>
                                              <div><b>Datos de Llegada</b></div>
                                              <div>Departamento Llegada: <?php echo  $resultadoSubastaDetalle[0]["DepartamentoLlegada"] ?></div>
                                              <div>Provincia Llegada: <?php echo  $resultadoSubastaDetalle[0]["ProvinciaLlegada"] ?></div>
                                              <div>Distrito Llegada: <?php echo  $resultadoSubastaDetalle[0]["DistritoLlegada"] ?></div>
                                              <div>Dirección Llegada: <?php echo  $resultadoSubastaDetalle[0]["direccion_llegada"] ?></div>
                                              <div>Fecha Llegada: <?php echo  $resultadoSubastaDetalle[0]["fecha_llegada"] ?></div>
                                              <div>Hora Llegada: <?php echo  $resultadoSubastaDetalle[0]["hora_llegada"] ?></div>
                                            <?php
                                            } else if ($resultado[$i]["cod_tipo"] == 2) {
                                            ?>
                                              <div><b>Datos de Llegada</b></div>
                                              <div>Departamento Llegada: <?php echo  $resultadoSubastaDetalle[0]["DepartamentoLlegada"] ?></div>
                                              <div>Provincia Llegada: <?php echo  $resultadoSubastaDetalle[0]["ProvinciaLlegada"] ?></div>
                                              <div>Distrito Llegada: <?php echo  $resultadoSubastaDetalle[0]["DistritoLlegada"] ?></div>
                                              <div>Dirección Llegada: <?php echo  $resultadoSubastaDetalle[0]["direccion_llegada"] ?></div>
                                              <div>Fecha Llegada: <?php echo  $resultadoSubastaDetalle[0]["fecha_llegada"] ?></div>
                                              <div>Hora Llegada: <?php echo  $resultadoSubastaDetalle[0]["hora_llegada"] ?></div>
                                              <div><b>Datos de Productos</b></div>
                                              <?php
                                              $_POST["nro_propuesta"] = $resultadoSubasta[$k]["nro_propuesta"];

                                              require '../controller/gestionarSubasta.listar.servicios.detalle.producto.controller.php';

                                              foreach ($resultadoSubastaDetalleProducto as $valor) {
                                              ?>
                                                <div>Producto: <?php echo  $valor["nom_producto"] ?> -- Cantidad: <?php echo  $valor["cantidad_producto"] ?> </div>
                                              <?php
                                              }
                                              ?>

                                            <?php
                                            } else {
                                            ?>
                                              <div><b>Datos de Llegada</b></div>
                                              <div>Departamento Llegada: <?php echo  $resultadoSubastaDetalle[0]["DepartamentoLlegada"] ?></div>
                                              <div>Provincia Llegada: <?php echo  $resultadoSubastaDetalle[0]["ProvinciaLlegada"] ?></div>
                                              <div>Distrito Llegada: <?php echo  $resultadoSubastaDetalle[0]["DistritoLlegada"] ?></div>
                                              <div>Dirección Llegada: <?php echo  $resultadoSubastaDetalle[0]["direccion_llegada"] ?></div>
                                              <div>Fecha Llegada: <?php echo  $resultadoSubastaDetalle[0]["fecha_llegada"] ?></div>
                                              <div>Hora Llegada: <?php echo  $resultadoSubastaDetalle[0]["hora_llegada"] ?></div>

                                            <?php
                                            }
                                            ?>
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
                          <div class="modal fade" id="<?php echo  $_SESSION["cod_acceso"] ?>-<?php echo  $resultadoSubasta[$k]["nro_propuesta"] ?>-Aceptar" tabindex="-1" role="dialog" aria-labelledby="<?php echo  $_SESSION["cod_acceso"] ?>-<?php echo  $resultadoSubasta[$k]["nro_propuesta"] ?>" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLongTitle">Prupuesta N. <?php echo  $resultadoSubasta[$k]["nro_propuesta"] ?></h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <div class="container-fluid">
                                    <div class="row">
                                      <div class="col-sm-12">
                                        <div class="row">
                                          <div class="col-12">

                                            <?php

                                            if ($resultado[$i]["cod_tipo"] == 2 || $resultado[$i]["cod_tipo"] == 3) {

                                            ?>
                                              <div><b>Ingreso Datos</b></div>
                                              <input style='margin-bottom:16px' type="hidden" name="txtcodtipo" id="txtcodtipo" class="form-control txtcodtipo" value="<?php echo $resultado[$i]["cod_tipo"] ?>">
                                              <input style='margin-bottom:16px' type="hidden" name="txtnropropuesta" id="txtnropropuesta" class="form-control txtnropropuesta" value="<?php echo $resultadoSubasta[$k]["nro_propuesta"] ?>">
                                              <input style='margin-bottom:16px' type="text" name="txtcosto" id="txtcosto" class="form-control txtcosto" placeholder="Costo" onkeypress="ValidaSoloNumerosYPunto();">
                                              <input style='margin-bottom:16px' type="text" name="txtdetalles" id="txtdetalles" class="form-control txtdetalles" placeholder="Detalles">
                                              <input type="submit" class="btn btn-primary btn-xs envioPropuesta">
                                          </div>
                                        <?php
                                            } else if ($resultado[$i]["cod_tipo"] == 1) {
                                        ?>
                                          <div><b>Ingreso Datos</b></div>
                                          <div class="input-group mb-3 txtcodtipo">
                                          <input style='margin-bottom:16px' type="hidden"  name="txtcodtipo" id="txtcodtipo" class="form-control txtcodtipo" value="<?php echo $resultado[$i]["cod_tipo"] ?>">
                                          </div>
                                          <div class="input-group mb-3 txtnropropuesta">
                                          <input style='margin-bottom:16px' type="hidden"  name="txtnropropuesta" id="txtnropropuesta" class="form-control txtnropropuesta" value="<?php echo $resultadoSubasta[$k]["nro_propuesta"] ?>">
                                          </div>
                                          <div class="input-group mb-3 txtcosto">
                                          <input style='margin-bottom:16px' type="text" name="txtcosto" id="txtcosto" class="form-control txtcosto" placeholder="Costo" onkeypress="ValidaSoloNumerosYPunto();">
                                          </div>
                                          <div class="input-group mb-3 txtdetalles">
                                          <input style='margin-bottom:16px' type="text" name="txtdetalles" id="txtdetalles" class="form-control txtdetalles" placeholder="Detalles">
                                          </div>
                                          
                                          <div><b>Datos del Transporte</b></div>
                                            <div class="input-group mb-3 vehiculo">
                                              <select name="select" id="cbovehiculo" class="form-control cbovehiculo">
                                                <option value="000"> Elegir Vehículo </option>
                                              </select>
                                            </div>
                                            <div class="input-group mb-3 chofer">
                                              <select name="select" id="cbochofer" class="form-control cbochofer">
                                                <option value="000"> Elegir Chofer </option>
                                              </select>
                                            </div>
                                            <div class="input-group mb-3 justify-content-center">
                                              <button type="button" style='margin-bottom:16px' class="btn btn-success procesarprod">Procesar</button></div>
                                          
                                          <table class="mb-0 table datostransporte">
                                            <thead>
                                              <tr>
                                                <th>#</th>
                                                <th style="display:none;">Cod Vehiculo</th>
                                                <th>Vehículo</th>
                                                <th style="display:none;">Cod Chofer</th>
                                                <th>Chofer</th>
                                                <th>Opciones</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                          </table>
                                          <div class="input-group mb-3 justify-content-center">
                                            <!--<input type="submit" class="btn btn-primary envioPropuestaRutas"></div>-->
                                            <button type="button" style='margin-bottom:16px' class="btn btn-primary envioPropuestaRutas">Grabar</button></div>
                                        </div>



                                      <?php

                                            }
                                      ?>
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
                    <?php
                        }
                    ?>
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