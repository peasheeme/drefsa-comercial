<?php

//expresión letras y números: /^[a-zA-Z\s0-9]*$/
if(isset($_POST)){
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

	$error = "faltan_valores";

	if ($nombre && $apellido && $email && $telefono && $empresa && $giroEmpresarial
		&& $calle && $ext && $colonia && $municipio && $mensaje
	) {
		$error = "ok";
		if (!is_int($nombre) || !is_numeric($nombre) && !empty($nombre) && strlen($nombre) > 2 && strlen($nombre) < 100) {
			$validate_name = true;
		} else {
			$validate_name = false;
			$error = "nombre";
		}

		if (!is_int($apellido) || !is_numeric($apellido) && !empty($apellido) && strlen($apellido) > 2 && strlen($apellido) < 100) {
			$validate_name = true;
		} else {
			$validate_name = false;
			$error = "apellido";
		}

		if (filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($email) > 2 && strlen($email) < 150 && !empty($email)) {
			$validate_email = true;
		} else {
			$validate_email = false;
			$error = "email";
		}

		if($telefono != "" && preg_match("/^[0-9]+$/", $telefono)){
			$validate_phone = true;
		}else{
			$validate_phone = false;
			$error = "telefono";
		}

		if (!is_int($empresa) || !is_numeric($empresa) && !empty($empresa) && strlen($empresa) > 2 && strlen($empresa) < 100) {
			$validate_empresa = true;
		} else {
			$validate_empresa = false;
			$error = "empresa";
		}

		if (!is_int($giroEmpresarial) || !is_numeric($giroEmpresarial) && !empty($giroEmpresarial) && strlen($giroEmpresarial) > 2 && strlen($giroEmpresarial) < 100) {
			$validate_giro = true;
		} else {
			$validate_giro = false;
			$error = "giro";
		}

		if (!is_int($calle) || !is_numeric($calle) && !empty($calle) && strlen($calle) > 2 && strlen($calle) < 100) {
			$validate_calle = true;
		} else {
			$validate_calle = false;
			$error = "calle";
		}

		if($ext != "" && preg_match("/^[0-9]+$/", $ext)){
			$validate_ext = true;
		}else{
			$validate_ext = false;
			$error = "ext";
		}

		if (!is_int($colonia) || !is_numeric($colonia) && !empty($colonia) && strlen($colonia) > 2 && strlen($colonia) < 100) {
			$validate_colonia = true;
		} else {
			$validate_colonia = false;
			$error = "colonia";
		}

		if (!is_int($municipio) || !is_numeric($municipio) && !empty($municipio) && strlen($municipio) > 2 && strlen($municipio) < 100) {
			$validate_municipio= true;
		} else {
			$validate_municipio = false;
			$error = "municipio";
		}

		if (strlen($mensaje) > 2 && strlen($mensaje) < 500 && !empty($mensaje)) {
			$validate_message = true;
		} else {
			$validate_message = false;
			$error = "mensaje";
		}
	}else {
		$error = "faltan_valores";
		header("Location:../index.php?error=$error");
	}

	if ($error != "ok") {
		header("Location:../index.php?error=" . $error);
	}elseif($error == "ok"){

		//asunto
		$asunto="10% Primer servicio";

		//destinatario
		$destino="info@drenajesyfugas.com, julian.fernandez@3e-digital.com";

		//cabeceras para validar el formato HTML
		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= "Content-type: text/html; charset=UTF-8\r\n";

		//contenido del mensaje
		$contenido='
		<html>
		<head></head>
		<body>
		<h3>'.$nombre.' ha solicitado el 20% en servicio de Empresarial</h3>

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
			header("Location:../thanks.php");
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
			header("Location:../index.php?error=Inténtelo de nuevo en unos momentos");
		}
	}
}