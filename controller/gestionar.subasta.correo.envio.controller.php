
application/x-httpd-php enviar_correo_automatico.controller.php ( PHP script, UTF-8 Unicode text )
<?php
  
  require_once '../logic/Contacto.class.php';
  
  $TipoSubasta  = $_POST["p_tiposubasta"];
  $CodPropuesta = $_POST["p_codpropuesta"];
  $Observaciones= $_POST["p_observaciones"];

  $SubastaTexto = "";

  //Busqueda Proveedores

  $objContacto = new Contacto();

  $proveedores = $objContacto->listarContactoPRoveedores();


  //Busqueda Proveedores

  if ($CodPropuesta == "1") {
    $SubastaTexto = "Carga";
  }else if ($CodPropuesta == "2"){
    $SubastaTexto = "Producto";
  }else{
    $SubastaTexto = "Servicio";
  }

$body = $mail->Body = 
'<div style="font: 100%/1.4 Verdana, Arial, Helvetica, sans-serif;	background-color: #FFF;	margin: 0;	padding: 0;	color: #000;">
<div class="container" style="width: 50%; background-color: #FFF; margin: 0 auto;">
<p><img src="cid:logo" alt="LogoBirdy" name="img_portada" width="200" height="150" id="img_portada" align="left" /></p>
<p>&nbsp;</p><p>&nbsp;</p>
<h3 id="importante" style="color: #F00;"><br>
</h3>
<div><span style="color: #F00; font-weight: bold; font-size: large;"><br />¡Nueva Propuesta!</span></div>
<div id="linea" style="display: inline-block;margin-top: 2px;height: 3px;background:#0F8E28;   width: 100%;"></div>
<div align="justify">
  <strong>Se ha creado una nueva subasta </strong>
  <p>Tipo : '.$SubastaTexto.' </p>
  <p>Observaciones : '.$Observaciones.' </p>
  <p>&nbsp;</p>
  <p>Para mas información, ingrese a su cuenta.</p>
</div>
<div id="linea" style="display: inline-block;margin-top: 2px;height: 3px;background:#0F8E28;   width: 100%;"></div>
<p><br />
  
</div>
</div>';

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require '../view/PHPMailer/Exception.php';
  require '../view/PHPMailer/PHPMailer.php';
  require '../view/PHPMailer/SMTP.php';


    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer();

    try {
        //Server settings
        // accesos
        $mail->SMTPDebug = 2;   // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Debugoutput = 'html';
        $mail->Host = 'mail.lachuspita.pe';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'recovery@lachuspita.pe';                     // SMTP username
        $mail->Password   = 'Recovery2020.';                               // SMTP password
        //$mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        
        
        $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

        //$mail->SMTPAuth = true;
        
        //Recipients
        $mail->setFrom('recovery@lachuspita.pe', 'La Chuspita'); // quién lo envía
        
  foreach ($proveedores as $correo) {
    $mail->addAddress($correo['correo']); 
 }
           // quién lo recibe
        
        //$mail->addAddress('pjavaa@gmail.com');               // Name is optional
        /*
        $mail->addReplyTo('info@example.com', 'Information');
        $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');
        */
        // Attachments: para enviar archivos
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);  
        $mail->AddEmbeddedImage('../images/birdy.png','logo');
        $mail->Subject = 'Nueva Subasta - Subasta N° '.$CodPropuesta;
        $mail->Body    = $body;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo '<script>
          alert("El mensaje se envio correctamente");
          window.history.go(-1);
          </script>';

        //echo 'El mensaje se envió correctamente';
    } catch (Exception $e) {
        echo "Hubo un error al enviar el mensaje: {$mail->ErrorInfo}";
    }

?>