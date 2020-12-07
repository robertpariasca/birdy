<?php

try {

    require_once '../logic/ContratoCabecera.class.php';
    require_once '../logic/Contacto.class.php';
    require_once '../util/functions/Helper.class.php';
    require_once '../vendor/autoload.php';

    $codcontrato        = $_POST["p_codcontrato"];

    session_name("Birdy");
    session_start();

    $objContrato = new ContratoCabecera;
    $objContacto = new Contacto;


    $objContrato->setIdcontrato($codcontrato);
    $datoscontrato = $objContrato->listarContrato();




    
    $objContacto->setCodcliente($_SESSION["cod_acceso"]);
    $datoscontacto= $objContacto->listarContacto();

    
    $TamañoDoc = "140";


    $html='

    <!DOCTYPE html>
   <html lang="en">
     <head>
       <meta charset="utf-8">
       <title>'.'Contrato N°'.'</title>
       <link rel="stylesheet" href="../view/css/style.css" media="all" />
     </head>
     <body>
       <header >
             <main>
   
   <table class="tabla_cabecera" width="100%" cellpadding="0" cellspacing="0" border="0">
     <tr >
       <td style="text-align: center; vertical-align: middle;">CONTRATO POR'.strtoupper($datoscontrato[0]["nombre_tipo"]).'</td>
     </tr>
     
   </table>
 
 ';
 $html.='
 
 <br>
 <br>
 <br>
 <table  class="info_medio" width="100%" height="50%" border="0" >
   <tr> 
     <td >Mediante la presente, se da a constatar el acuerdo por prestación de Servicio, siendo el intermediario nuestra empresa, ...., de ahora en adelante, el intermediario,
     entre el sr/sra .., identificado con el N° DNI ...., y la empresa ......, cuyo representante para este caso es ....., identificado con ....., se consta
     
     Que bajo los terminos aceptados en las condiones iniciales, ambos involucrados en un acuerdo por el cual, la empresa .... le brindará el servicio de ...... al sr/sra ......
     , teniendo en cuenta los siguientes terminos.
 
     </td>
   
 </tr>
 </table>  <br>
 
 ';
 $html.='
 </main>
     </header> 
 
   ';
 
 $html.='
 
   </body>
 </html> ';

/*Creacion Ticket*/

$mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
$mpdf->page=0;
$mpdf->state=0;
$mpdf->WriteHTML($html);
$mpdf->Output("E:/ContratoPrueba.pdf");


/*Creacion Ticket*/


    $resultado = "EXITO";

    if ($resultado == "EXITO") {
        Helper::imprimeJSON(200, "Agregado correctamente", "");
    } else {
        Helper::imprimeJSON(200, $resultado, "");
    }
} catch (Exception $exc) {
    Helper::imprimeJSON(500, $exc->getMessage(), "");
}
