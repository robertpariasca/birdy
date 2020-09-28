<?php


require_once '../logic/Flota.class.php';
require_once '../util/functions/Helper.class.php';

$codpromocion          = $_POST["codpromocion"];

$objUsuario = new Flota();
session_name("Birdy");
session_start();

//$data = json_decode(file_get_contents("php://input"));

$dni = $_SESSION["cod_acceso"];
// echo $data;

if ($_FILES["fileToUpload"]["name"] != "") {

    $file_name = $_FILES["fileToUpload"]["tmp_name"];
    list($width, $height, $type, $attr) = getimagesize($file_name);

    $target_filename = $file_name;

    $new_width = 75;
    $new_height = 75;

    $src = imagecreatefromstring(file_get_contents($file_name));
    $dst = imagecreatetruecolor($new_width, $new_height);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
    imagedestroy($src);
    imagepng($dst, $target_filename); // adjust format as needed
    imagedestroy($dst);


    $direccion_subida = "../view/fotos/promocion/";

    $nombre_archivo_subir = $direccion_subida . $dni . "-" . $codpromocion . ".png";

    //$resultado_subida = move_uploaded_file( $_FILES["fileToUpload"]["tmp_name"], $nombre_archivo_subir);

    if (move_uploaded_file($target_filename, $nombre_archivo_subir)) {
        echo $nombre_archivo_subir;
    } else {
        echo 0;
    }
} else {
    echo 0;
}
