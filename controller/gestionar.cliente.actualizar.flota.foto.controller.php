<?php


    require_once '../logic/Flota.class.php';
    require_once '../util/functions/Helper.class.php';

    $placa          = $_POST["placa"];
    //$placa          = "";

    $objUsuario = new Flota();
    session_name("Birdy");
    session_start();

    //$data = json_decode(file_get_contents("php://input"));

    $dni = $_SESSION["cod_acceso"];
      // echo $data;

       if ($_FILES["fileToUpload"]["name"] != "" ){
        $tipo_archivo = $_FILES["fileToUpload"]["type"];
        $direccion_subida = "../view/fotos/flota/";
        
        $nombre_archivo_subir = $direccion_subida . $dni . "-" . $placa .".png";
        
        //$resultado_subida = move_uploaded_file( $_FILES["fileToUpload"]["tmp_name"], $nombre_archivo_subir);
        
        if(move_uploaded_file( $_FILES["fileToUpload"]["tmp_name"], $nombre_archivo_subir)){
            echo $nombre_archivo_subir;
         }else{
            echo 0;
         }

    }else{
        echo 0;
        /*
        $tipo_archivo = "PNG";
        $direccion_subida = "../view/fotos/flota/";
        
        $nombre_archivo_subir = $direccion_subida . $dni . "-" . $placa .".png";
        
        $resultado_subida = move_uploaded_file( $data->fileToUpload, $nombre_archivo_subir);
        */
    }

