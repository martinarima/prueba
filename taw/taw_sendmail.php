<?php

//$recipient = $_POST["recipient"];
$recipient = "martinarima@alagua.com.ar";
$subject = $_POST["subject"];
$mail = $_POST["email"];
$nombre = $_POST["name"]; 
$telefono = $_POST["phone"]; 
$mensaje = $_POST["message"];


// Gets the date and time from your server
$date = date("m/d/Y H:i:s");

// Gets the IP Address
if ($REMOTE_ADDR == "") $ip = "no ip";
else $ip = getHostByAddr($REMOTE_ADDR);


$codigohtml = "
<html>
<head>
<title>$subject</title>
</head>
<body bgcolor='#E2E2E2' topmargin='0' leftmargin='0'>
<div align='center'>
  <center>
  <br>
    <table border='0' cellpadding='10' cellspacing='0' width='400' style='border: 5px solid #999999'>
		<tr>
			<td bgcolor='#FFFFFF'><b>
			
			<img border='0' src='http://www.alagua.com.ar/images/logo_alagua.png' alt='alagua.com.ar'></b></td>
		</tr>
		<tr>
			<td bgcolor='#FFFFFF' style='border-left-width: 1px; border-right-width: 1px; border-top: 1px solid #C0C0C0; border-bottom: 1px solid #C0C0C0'>
			
			<b>Nombre:</b> $nombre<br>
			<b>Teléfono:</b> $telefono<br>
			<b>e-mail:</b> $mail<br>
			<br>
			<b>Mensaje:</b><br>
			$mensaje<br>
			<br>
			<br>
			</td>
		</tr>
		<tr>
			<td bgcolor='#FFFFFF'><b><font size='1' color='#333333'>Logged Info</font></b><br>
			<font size='1' color='#666666'>Using:</font><font size='1' color='#999999'> 
			$HTTP_USER_AGENT<br>
			</font><font size='1' color='#666666'>Hostname:</font><font size='1' color='#999999'> 
			$ip<br>
			</font><font size='1' color='#666666'>IP address:</font><font size='1' color='#999999'> 
			$REMOTE_ADDR<br>
			</font><font size='1' color='#666666'>Date/Time:</font><font size='1' color='#999999'> 
			$date</font></td>
		</tr>
	</table>
    </center>
</div>

</body>

</html>



";

$codigohtml2 = "
<html>
<body>
<table width='100%' border='0' cellpadding='20'>
  <tr>
    <td>
    
    <br><br>
	<font face='Verdana' size='2' color='#333333'>$nombre,<br>
	<br>
	<b>Gracias por contactarnos.<br>
	</font></b><font face='Verdana' size='2' color='#999999'>Nos comunicaremos a 
	la brevedad.</font><font face='Verdana' size='2' color='#333333'><b><br>
	<br>
	Thank you for your inquiry.</b><br>
	</font><font face='Verdana' size='2' color='#999999'>We will contact you asap.</font><br><br>
	<b>
			<font color='#999999' face='Verdana' size='4'>
			<a href='http://www.alagua.com.ar'>
			<img border='0' src='http://www.alagua.com.ar/images/logo_alagua.png' alt='alagua.com.ar'></a></font></b><br>
	<br>
	<br>
	<br>
    
    </td>
  </tr>
</table>
</body>
</html>
";

$cabeceras = "From: $mail \n";
$cabeceras .= "Content-type: text/html\r\n";
$cabeceras2 = "From: $recipient \n";
$cabeceras2 .= "Content-type: text/html\r\n";

mail($recipient,$subject,$codigohtml,$cabeceras);

//This sends a confirmation to your visitor
mail ($mail,"Auto-Respuesta alagua", $codigohtml2, $cabeceras2) ; 



header("Location: gracias.php");

?>