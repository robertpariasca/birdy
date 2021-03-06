<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-info elevation-4">
    <!-- Brand Logo -->
    <a href="menu.principal.view.php" class="brand-link">
      <img src="../images/birdy.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="text-info text-bold">Birdy</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="fotos/<?php echo $fotoUsuario; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><p><?php echo $nombreUsuario; ?></p></a>
          <?php
          if ($s_idrol=="1"){
            echo '<a href="cliente.editar.view.php" class="d-block" style="font-size:11px;color:blue;font-family:Georgia"><p>Editar Datos Personales</p></a>';
          }else if($s_idrol=="2"){
            echo '<a href="proveedor.editar.view.php" class="d-block" style="font-size:11px;color:blue;font-family:Georgia"><p>Editar Datos</p></a>';
          }
          ?>
          
        </div>
      </div>
      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <div class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Menú Principal
              </p>
            </div>
          </li>
          
          <?php

          if ($s_idrol=="1"){
            echo '<li class="nav-item has-treeview">';
            echo '<a href="#" class="nav-link">';
            echo '<ion-icon name="desktop-outline"></ion-icon>';
            echo '<p>';
            echo '<span class="text-info text-bold">Inicio</span>';
            echo '<i class="fas fa-angle-left right"></i>';
            echo '</p>';
            echo '</a>';
            echo '<ul class="nav nav-treeview">';
            echo '<li class="nav-item"><a href="proveedor.editar.view.php" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Inicio</p></a></li>';
            echo '</ul>';
            echo '</li>';
            
            echo '<li class="nav-item has-treeview">';
            echo '<a href="#" class="nav-link">';
            echo '<ion-icon name="desktop-outline"></ion-icon>';
            echo '<p>';
            echo '<span class="text-info text-bold">Promociones</span>';
            echo '<i class="fas fa-angle-left right"></i>';
            echo '</p>';
            echo '</a>';
            echo '<ul class="nav nav-treeview">';
            echo '<li class="nav-item"><a href="promociones.visualizar.php" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Ver Promociones</p></a></li>';
            echo '</ul>';
            echo '</li>';

            echo '<li class="nav-item has-treeview">';
            echo '<a href="#" class="nav-link">';
            echo '<ion-icon name="desktop-outline"></ion-icon>';
            echo '<p>';
            echo '<span class="text-info text-bold">Subastas</span>';
            echo '<i class="fas fa-angle-left right"></i>';
            echo '</p>';
            echo '</a>';
            echo '<ul class="nav nav-treeview">';
            echo '<li class="nav-item"><a href="subasta.editar.view.php" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Crear Subasta</p></a></li>';
            echo '</ul>';
            echo '</li>';

            echo '<li class="nav-item has-treeview">';
            echo '<a href="#" class="nav-link">';
            echo '<ion-icon name="desktop-outline"></ion-icon>';
            echo '<p>';
            echo '<span class="text-info text-bold">Contrato</span>';
            echo '<i class="fas fa-angle-left right"></i>';
            echo '</p>';
            echo '</a>';
            echo '<ul class="nav nav-treeview">';
            echo '<li class="nav-item"><a href="contrato.cliente.view.php" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Ver Contratos</p></a></li>';
            echo '</ul>';
            echo '</li>';
          }else if ($s_idrol=="2"){
            echo '<li class="nav-item has-treeview">';
            echo '<a href="#" class="nav-link">';
            echo '<ion-icon name="desktop-outline"></ion-icon>';
            echo '<p>';
            echo '<span class="text-info text-bold">Inicio</span>';
            echo '<i class="fas fa-angle-left right"></i>';
            echo '</p>';
            echo '</a>';
            echo '<ul class="nav nav-treeview">';
            echo '<li class="nav-item"><a href="proveedor.editar.view.php" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Inicio</p></a></li>';            
            echo '</ul>';
            echo '</li>';


            echo '<li class="nav-item has-treeview">';
            echo '<a href="#" class="nav-link">';
            echo '<ion-icon name="desktop-outline"></ion-icon>';
            echo '<p>';
            echo '<span class="text-info text-bold">Promociones</span>';
            echo '<i class="fas fa-angle-left right"></i>';
            echo '</p>';
            echo '</a>';
            echo '<ul class="nav nav-treeview">';
            echo '<li class="nav-item"><a href="promociones.visualizar.php" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Ver Promociones</p></a></li>';
            echo '</ul>';
            echo '</li>';

            echo '<li class="nav-item has-treeview">';
            echo '<a href="#" class="nav-link">';
            echo '<ion-icon name="desktop-outline"></ion-icon>';
            echo '<p>';
            echo '<span class="text-info text-bold">Subastas</span>';
            echo '<i class="fas fa-angle-left right"></i>';
            echo '</p>';
            echo '</a>';
            echo '<ul class="nav nav-treeview">';
            echo '<li class="nav-item"><a href="subasta.listar.view.php" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Ver Subastas</p></a></li>';
            echo '</ul>';
            echo '</li>';
          }

          /*
                $_POST["codigo_cargo_usuario"] = $s_codigoCargo; // $s_codigoCargo = 1 o 2

                require_once '../controller/obtener.opciones.menu.controller.php';


                for ($i = 0; $i < count($resultadoOpcionesMenuBD); $i++) {
                    echo '<li class="nav-item has-treeview">';
                    echo '<a href="#" class="nav-link">';
                    echo '<ion-icon name="desktop-outline"></ion-icon>';
                    echo '<p>';
                    echo '<span class="text-info text-bold">&nbsp;&nbsp;' . $resultadoOpcionesMenuBD[$i]["nombre"] . '</span>';
                    echo '<i class="fas fa-angle-left right"></i>';
                    echo '</p>';
                    echo '</a>';
                    

                    echo '<ul class="nav nav-treeview">';
                    $_POST["codigo_menu"] = $resultadoOpcionesMenuBD[$i]["codigo_menu"];

                    require '../controller/obtener.opciones.menu.item.controller.php';

                    for ($j = 0; $j < count($resultadoOpcionesMenuItemBD); $j++) {
                        echo '<li class="nav-item"><a href="' . $resultadoOpcionesMenuItemBD[$j]["archivo"] . ' " class="nav-link"><i class="far fa-circle nav-icon"></i><p> ' . $resultadoOpcionesMenuItemBD[$j]["nombre"] . '</p></a></li>';
                    }
                    echo '</ul>';

                    echo '</li>';
                }
                */
                ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>