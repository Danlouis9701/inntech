<?php 

foreach($_POST as $k=>$v){ 
$$k=$v; 
} 

if (!ini_get('register_globals')) { 
   $superglobales = array($_SERVER, $_ENV, 
       $_FILES, $_COOKIE, $_POST, $_GET); 
   if (isset($_SESSION)) { 
       array_unshift($superglobales, $_SESSION); 
   } 
   foreach ($superglobales as $superglobal) { 
       extract($superglobal, EXTR_SKIP); 
   } 
} 

?>

<?

$mail="gmanrique@inn-tech.mx";//mail a quien le va a llegar los correos
$mail2="guimade@hotmail.com";
$mail3="c_daniel_n@msn.com";

$origen="Inntech";//Como quieres q diga en el nombre de quien envia el correo
$correo_from="contacto@inn-tech.mx";//Este no se mueve hasta que lo subes a tu server porque debe ser un correo valido y dado de alta en elserver q envia los datos para que no se vaya al spam o sea bloqueado porel servidor de correos.
$subject="Nuevo comentario de Inntech";//Como quieres que diga en el titulo del mail
$myname="Contacto";

//aqui es donde puedo agregar mas variables...
$contenido="
Nombre: $nombre<br><br>
Apellido: $apellido<br><br>
Email: $email<br><br>
Empresa: $empresa<br><br>
Página web actual: $pagina<br><br>
Teléfono: $tel<br><br>
Comentarios: $comentarios
";

//aqui no toco nada...
$headers = "MIME-Version: 1.0 \n";
$headers.= "Content-type: text/html; charset=iso-8859-1\n";
$headers.= "From: \"".$origen."\" <$correo_from>\n";
//aqui es donde se envia todo...
mail($mail, "$subject", $contenido,$headers);
$envia2 = mail($mail2, "$subject", $contenido,$headers);
$envia3 = mail($mail3, "$subject", $contenido,$headers);

// Envia un e-mail para el remitente, agradeciendo la visita en el sitio, y diciendo que en breve el e-mail sera respondido. 

$mensaje2  = "<p>Saludos desde Interconstruc <strong>" . $nombre . "</strong>. Agradecemos su visita y la oportunidad de recibir su contacto. En breve usted recibira un e-mail para poder iniciar su proyecto con nosotros..</p>"; 

$mensaje2 .= "<p>Observación - No es necesario responder este mensaje.</p>"; 

$envia =  mail($email,"Su mensaje fué recibido!",$mensaje2,$headers); 
?>

<html>
<head>
<script type="text/javascript">
<!--
window.location = "index.html"
alert('Gracias hemos recibido sus comentarios!!');
//-->
</script>
</head>
<body></body>
</html>