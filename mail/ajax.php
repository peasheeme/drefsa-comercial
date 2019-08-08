<?php

error_reporting(0);

$msjStatus = null;
//expresión letras y números: /^[a-zA-Z\s0-9]*$/
if(isset($_POST['ajax'])){
	$nombre=htmlspecialchars($_POST['nombre']);
	$apellido=htmlspecialchars($_POST['apellido']);
	$email=htmlspecialchars($_POST['email']);
	(int)$telefono=htmlspecialchars($_POST['telefono']);
	$empresa = htmlspecialchars($_POST['empresa']);
	$giroEmpresarial = htmlspecialchars($_POST['giro']);
	$calle=htmlspecialchars($_POST['calle']);
	(int)$ext=htmlspecialchars($_POST['ext']);
	(int)$int=htmlspecialchars($_POST['int']);
	$colonia=htmlspecialchars($_POST['colonia']);
	$municipio=htmlspecialchars($_POST['municipio']);
	$mensaje=htmlspecialchars($_POST['mensaje']);

	//validar campo nombre
	if($nombre == ""){
		$msjStatus = "<script>document.getElementById('nombre-status').innerHTML = 'El campo est&aacute; vac&iacute;o';</script>";
	}

	elseif(!preg_match('/^[a-záéóóúàèìòùäëïöüñ\s]+$/i', $nombre)){
		$msjStatus = "<script>document.getElementById('nombre-status').innerHTML = 'No se admiten n&uacute;meros en este campo';</script>";
	}

	elseif(!is_string($nombre)){
		$msjStatus = "<script>document.getElementById('nombre-status').innerHTML = 'Ingrese solo texto';</script>";
	}

	elseif(strlen($nombre)<2){
		$msjStatus = "<script>document.getElementById('nombre-status').innerHTML = 'M&iacute;nimo permitido 2 caracteres';</script>";
	}

	elseif(strlen($nombre)>60){
		$msjStatus = "<script>document.getElementById('nombre-status').innerHTML = 'M&aacute;ximo permitido 60 caracteres';</script>";
	}
	//validar campo apellido
	elseif($apellido == ""){
		$msjStatus = "<script>document.getElementById('apellido-status').innerHTML = 'El campo est&aacute; vac&iacute;o';</script>";
	}

	elseif(!preg_match('/^[a-záéóóúàèìòùäëïöüñ\s]+$/i', $apellido)){
		$msjStatus = "<script>document.getElementById('apellido-status').innerHTML = 'No se admiten n&uacute;meros en este campo';</script>";
	}

	elseif(!is_string($apellido)){
		$msjStatus = "<script>document.getElementById('apellido-status').innerHTML = 'Ingrese solo texto';</script>";
	}

	elseif(strlen($apellido)<2){
		$msjStatus = "<script>document.getElementById('apellido-status').innerHTML = 'M&iacute;nimo permitido 2 caracteres';</script>";
	}

	elseif(strlen($apellido)>100){
		$msjStatus = "<script>document.getElementById('apellido-status').innerHTML = 'M&aacute;ximo permitido 100 caracteres';</script>";
	}

	//validar campo email
	elseif($email == ""){
		$msjStatus = "<script>document.getElementById('email-status').innerHTML = 'El campo est&aacute; vac&iacute;o';</script>";
	}

	elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$msjStatus = "<script>document.getElementById('email-status').innerHTML = 'Introduce un correo v&aacute;lido';</script>";
	}

	/*elseif(!preg_match('/^[a-zA-Z0-9\._-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,4}$/', $email)){
		$msjStatus = "<script>document.getElementById('email-status').innerHTML = 'Introduce un correo v&aacute;lido';</script>";
	}*/

	//validar campo teléfono
	elseif($telefono == ""){
		$msjStatus = "<script>document.getElementById('telefono-status').innerHTML = 'El campo est&aacute; vac&iacute;o';</script>";
	}

	elseif(!preg_match("/^[0-9]+$/", $telefono)){
		$msjStatus = "<script>document.getElementById('telefono-status').innerHTML = 'No se admiten letras en este campo';</script>";
	}

	//validar campo empresa
	elseif($empresa == ""){
		$msjStatus = "<script>document.getElementById('empresa-status').innerHTML = 'El campo est&aacute; vac&iacute;o';</script>";
	}

	elseif(strlen($empresa)<2){
		$msjStatus = "<script>document.getElementById('empresa-status').innerHTML = 'M&iacute;nimo permitido 2 caracteres';</script>";
	}

	elseif(strlen($empresa)>100){
		$msjStatus = "<script>document.getElementById('empresa-status').innerHTML = 'M&aacute;ximo permitido 100 caracteres';</script>";
	}

	//validar campo giro Empresarial
	elseif($giroEmpresarial == ""){
		$msjStatus = "<script>document.getElementById('giro-status').innerHTML = 'El campo est&aacute; vac&iacute;o';</script>";
	}

	elseif(strlen($giroEmpresarial)<2){
		$msjStatus = "<script>document.getElementById('giro-status').innerHTML = 'M&iacute;nimo permitido 2 caracteres';</script>";
	}

	elseif(strlen($giroEmpresarial)>100){
		$msjStatus = "<script>document.getElementById('giro-status').innerHTML = 'M&aacute;ximo permitido 100 caracteres';</script>";
	}

	//validar campo calle
	elseif($calle == ""){
		$msjStatus = "<script>document.getElementById('calle-status').innerHTML = 'El campo est&aacute; vac&iacute;o';</script>";
	}
	elseif(!is_string($calle)){
		$msjStatus = "<script>document.getElementById('calle-status').innerHTML = 'Solo se admiten letras';</script>";
	}

	//validar campo numero Exterior
	elseif($ext == ""){
		$msjStatus = "<script>document.getElementById('ext-status').innerHTML = 'El campo est&aacute; vac&iacute;o';</script>";
	}

	
	//validar campo numero interior
	elseif($int == ""){
		$msjStatus = "<script>document.getElementById('int-status').innerHTML = 'El campo est&aacute; vac&iacute;o';</script>";
	}

	//validar campo colonia
	elseif($colonia == ""){
		$msjStatus = "<script>document.getElementById('colonia-status').innerHTML = 'El campo est&aacute; vac&iacute;o';</script>";
	}
	
	//validar las opciones del select Municipio
	elseif($municipio==""){
		$msjStatus = "<script>document.getElementById('municipio-status').innerHTML = 'Debe seleccionar una opci&oacute;n';</script>";
	}
	
	//validar mensaje
	elseif($mensaje == ""){
		$msjStatus = "<script>document.getElementById('mensaje-status').innerHTML = 'El campo est&aacute; vac&iacute;o';</script>";
	}

	/*elseif(!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚ\s]*$/", $mensaje)){
		$msjStatus = "<script>document.getElementById('mensaje-status').innerHTML = 'No se admiten caracteres especiales';</script>";
	}*/

	else{
		//asunto
		$asunto="10% Control de plaga Residencial";

		//destinatario
		$destino="juan_27angel@hotmail.com";

		//cabeceras para validar el formato HTML
		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= "Content-type: text/html; charset=UTF-8\r\n";

		//contenido del mensaje
		$contenido='
		<html>
		<head></head>
		<body>
		<h3>'.$nombre.' ha solicitado el 20% en servicio de Residencial</h3>

		<hr style="border:2px solid #A6060E;"/>
		
		
		<p>'.$mensaje.' </p>
		
		<h3>Datos del cliente.</h3>
		<ul>
			<li><strong>Nombre: </strong> '.$nombre.'</li>
			<li><strong>Apellido: </strong> '.$apellido.'</li>
			<li><strong>E-mail: </strong> '.$email.'</li>
			<li><strong>Teléfono: </strong> '.$telefono.'</li>
			<li><strong>Empresa: </strong> '.$empresa.'</li>
			<li><strong>Giro empresarial: </strong> '.$giroEmpresarial.'</li>
			<li><strong>Calle: </strong> '.$calle.'</li>
			<li><strong>No Exterior: </strong> '.$ext.'</li>
			<li><strong>No Interior: </strong> '.$int.'</li>
			<li><strong>Colonia: </strong> '.$colonia.'</li>
			<li><strong>Municipio: </strong> '.$municipio.'</li>
			
		</ul>

		<br/>
		<br/>
		

		<hr style="border:2px solid #A6060E;"/>
		</body>
		</html>
		';

		//enviar correo
		$envio = mail($destino, $asunto, $contenido, $headers);

		if($envio){
			echo "Enviado exitosamente";
			//Enviando autorespuesta
			$pwf_header = "info@drenajesyfugas.com\n"
			."Reply-to: info@drenajesyfugas.com \n";
			$pwf_asunto = "Drefsa Confirmación";
			$pwf_dirigido_a = "$email";
			$pwf_mensaje = "$nombre Gracias por dejarnos su mensaje desde nuestro sitio web \n"
			."Su mensaje ha sido recibido satisfactoriamente \n"
			."Nos pondremos en contacto lo antes posible a su e-mail: $email o su telefono $telefono \n"
			."\n"
			."\n"
			."-----------------------------------------------------------------"
			."Favor de NO responder este e-mail ya que es generado Automaticamente.\n"
			."Atte: DREFSA Mtto. de Drenaje Industrial \n";
			@mail($pwf_dirigido_a, $pwf_asunto, $pwf_mensaje, $pwf_header);
		}else{
			echo "Falló el envío";
		}
	}
}

echo $msjStatus;


$msjStatus = null;
//expresión letras y números: /^[a-zA-Z\s0-9]*$/
if(isset($_POST['ajax2'])){
	$nombre=htmlspecialchars($_POST['nombre2']);
	$apellido=htmlspecialchars($_POST['apellido2']);
	$email=htmlspecialchars($_POST['email2']);
	(int)$telefono=htmlspecialchars($_POST['telefono2']);
	$calle=htmlspecialchars($_POST['calle2']);
	(int)$ext=htmlspecialchars($_POST['ext2']);
	(int)$int=htmlspecialchars($_POST['int2']);
	$colonia=htmlspecialchars($_POST['colonia2']);
	$municipio=htmlspecialchars($_POST['municipio2']);
	$mensaje=htmlspecialchars($_POST['mensaje2']);

	//validar campo nombre
	if($nombre == ""){
		$msjStatus = "<script>document.getElementById('nombre2-status').innerHTML = 'El campo est&aacute; vac&iacute;o';</script>";
	}

	elseif(!preg_match('/^[a-záéóóúàèìòùäëïöüñ\s]+$/i', $nombre)){
		$msjStatus = "<script>document.getElementById('nombre2-status').innerHTML = 'No se admiten n&uacute;meros en este campo';</script>";
	}

	elseif(!is_string($nombre)){
		$msjStatus = "<script>document.getElementById('nombre2-status').innerHTML = 'Ingrese solo texto';</script>";
	}

	elseif(strlen($nombre)<2){
		$msjStatus = "<script>document.getElementById('nombre2-status').innerHTML = 'M&iacute;nimo permitido 2 caracteres';</script>";
	}

	elseif(strlen($nombre)>60){
		$msjStatus = "<script>document.getElementById('nombre2-status').innerHTML = 'M&aacute;ximo permitido 60 caracteres';</script>";
	}
	//validar campo apellido
	elseif($apellido == ""){
		$msjStatus = "<script>document.getElementById('apellido2-status').innerHTML = 'El campo est&aacute; vac&iacute;o';</script>";
	}

	elseif(!preg_match('/^[a-záéóóúàèìòùäëïöüñ\s]+$/i', $apellido)){
		$msjStatus = "<script>document.getElementById('apellido2-status').innerHTML = 'No se admiten n&uacute;meros en este campo';</script>";
	}

	elseif(!is_string($apellido)){
		$msjStatus = "<script>document.getElementById('apellido2-status').innerHTML = 'Ingrese solo texto';</script>";
	}

	elseif(strlen($apellido)<2){
		$msjStatus = "<script>document.getElementById('apellido2-status').innerHTML = 'M&iacute;nimo permitido 2 caracteres';</script>";
	}

	elseif(strlen($apellido)>100){
		$msjStatus = "<script>document.getElementById('apellido2-status').innerHTML = 'M&aacute;ximo permitido 100 caracteres';</script>";
	}

	//validar campo email
	elseif($email == ""){
		$msjStatus = "<script>document.getElementById('email2-status').innerHTML = 'El campo est&aacute; vac&iacute;o';</script>";
	}

	elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$msjStatus = "<script>document.getElementById('email2-status').innerHTML = 'Introduce un correo v&aacute;lido';</script>";
	}

	/*elseif(!preg_match('/^[a-zA-Z0-9\._-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,4}$/', $email)){
		$msjStatus = "<script>document.getElementById('email-status').innerHTML = 'Introduce un correo v&aacute;lido';</script>";
	}*/

	//validar campo teléfono
	elseif($telefono == ""){
		$msjStatus = "<script>document.getElementById('telefono2-status').innerHTML = 'El campo est&aacute; vac&iacute;o';</script>";
	}

	elseif(!preg_match("/^[0-9]+$/", $telefono)){
		$msjStatus = "<script>document.getElementById('telefono2-status').innerHTML = 'No se admiten letras en este campo';</script>";
	}

	//validar campo calle
	elseif($calle == ""){
		$msjStatus = "<script>document.getElementById('calle2-status').innerHTML = 'El campo est&aacute; vac&iacute;o';</script>";
	}
	elseif(!is_string($calle)){
		$msjStatus = "<script>document.getElementById('calle2-status').innerHTML = 'Solo se admiten letras';</script>";
	}

	//validar campo numero Exterior
	elseif($ext == ""){
		$msjStatus = "<script>document.getElementById('ext2-status').innerHTML = 'El campo est&aacute; vac&iacute;o';</script>";
	}

	//validar campo numero interior
	elseif($int == ""){
		$msjStatus = "<script>document.getElementById('int2-status').innerHTML = 'El campo est&aacute; vac&iacute;o';</script>";
	}

	//validar campo colonia
	elseif($colonia == ""){
		$msjStatus = "<script>document.getElementById('colonia2-status').innerHTML = 'El campo est&aacute; vac&iacute;o';</script>";
	}
	
	//validar las opciones del select Municipio
	elseif($municipio==""){
		$msjStatus = "<script>document.getElementById('municipio2-status').innerHTML = 'Debe seleccionar una opci&oacute;n';</script>";
	}
	
	//validar mensaje
	elseif($mensaje == ""){
		$msjStatus = "<script>document.getElementById('mensaje2-status').innerHTML = 'El campo est&aacute; vac&iacute;o';</script>";
	}

	/*elseif(!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚ\s]*$/", $mensaje)){
		$msjStatus = "<script>document.getElementById('mensaje-status').innerHTML = 'No se admiten caracteres especiales';</script>";
	}*/

	else{
		//asunto
		$asunto="10% Control de plaga Residencial";

		//destinatario
		$destino="juan_27angel@hotmail.com";

		//cabeceras para validar el formato HTML
		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= "Content-type: text/html; charset=UTF-8\r\n";

		//contenido del mensaje
		$contenido='
		<html>
		<head></head>
		<body>
		<h3>'.$nombre.' ha solicitado el 20% en servicio de Residencial</h3>

		<hr style="border:2px solid #A6060E;"/>
		
		
		<p>'.$mensaje.' </p>
		
		<h3>Datos del cliente.</h3>
		<ul>
			<li><strong>Nombre: </strong> '.$nombre.'</li>
			<li><strong>Apellido: </strong> '.$apellido.'</li>
			<li><strong>E-mail: </strong> '.$email.'</li>
			<li><strong>Telefono: </strong> '.$telefono.'</li>
			<li><strong>Empresa: </strong> '.$empresa.'</li>
			<li><strong>Giro empresarial: </strong> '.$giroEmpresarial.'</li>
			<li><strong>Calle: </strong> '.$calle.'</li>
			<li><strong>No Exterior: </strong> '.$ext.'</li>
			<li><strong>No Interior: </strong> '.$int.'</li>
			<li><strong>Colonia: </strong> '.$colonia.'</li>
			<li><strong>Municipio: </strong> '.$municipio.'</li>
			
		</ul>

		<br/>
		<br/>
		

		<hr style="border:2px solid #A6060E;"/>
		</body>
		</html>
		';

		//enviar correo
		$envio = mail($destino, $asunto, $contenido, $headers);

		if($envio){
			echo "Enviado exitosamente";
			//Enviando autorespuesta
			$pwf_header = "info@drenajesyfugas.com\n"
			."Reply-to: info@drenajesyfugas.com \n";
			$pwf_asunto = "Drefsa Confirmación";
			$pwf_dirigido_a = "$email";
			$pwf_mensaje = "$nombre Gracias por dejarnos su mensaje desde nuestro sitio web \n"
			."Su mensaje ha sido recibido satisfactoriamente \n"
			."Nos pondremos en contacto lo antes posible a su e-mail: $email o su teléfono $telefono \n"
			."\n"
			."\n"
			."-----------------------------------------------------------------"
			."Favor de NO responder este e-mail ya que es generado Automaticamente.\n"
			."Atte: DREFSA Mtto. de Drenaje Industrial. \n";
			@mail($pwf_dirigido_a, $pwf_asunto, $pwf_mensaje, $pwf_header);
		}else{
			echo "Falló el envío";
		}
	}
}

echo $msjStatus;


?>