<?php

if(isset($_POST)){
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

	$error2 = "faltan_valores2";

	if ($nombre && $apellido && $email && $telefono && 
		$calle && $ext && $colonia && $municipio && $mensaje
	) {
		$error2 = "ok2";
		if (!is_int($nombre) || !is_numeric($nombre) && !empty($nombre) && strlen($nombre) > 2 && strlen($nombre) < 100) {
			$validate_name = true;
		} else {
			$validate_name = false;
			$error2 = "nombre2";
		}

		if (!is_int($apellido) || !is_numeric($apellido) && !empty($apellido) && strlen($apellido) > 2 && strlen($apellido) < 100) {
			$validate_name = true;
		} else {
			$validate_name = false;
			$error2 = "apellido2";
		}

		if (filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($email) > 2 && strlen($email) < 150 && !empty($email)) {
			$validate_email = true;
		} else {
			$validate_email = false;
			$error2 = "email2";
		}

		if($telefono != "" && preg_match("/^[0-9]+$/", $telefono)){
			$validate_phone = true;
		}else{
			$validate_phone = false;
			$error2 = "telefono2";
		}

		if (!is_int($calle) || !is_numeric($calle) && !empty($calle) && strlen($calle) > 2 && strlen($calle) < 100) {
			$validate_calle = true;
		} else {
			$validate_calle = false;
			$error2 = "calle2";
		}

		if($ext != "" && preg_match("/^[0-9]+$/", $ext)){
			$validate_ext = true;
		}else{
			$validate_ext = false;
			$error2 = "ext2";
		}

		if (!is_int($colonia) || !is_numeric($colonia) && !empty($colonia) && strlen($colonia) > 2 && strlen($colonia) < 100) {
			$validate_colonia = true;
		} else {
			$validate_colonia = false;
			$error2 = "colonia2";
		}

		if (!empty($municipio)) {
			$validate_municipio= true;
		} else {
			$validate_municipio = false;
			$error2 = "municipio2";
		}

		if (strlen($mensaje) > 2 && strlen($mensaje) < 500 && !empty($mensaje)) {
			$validate_message = true;
		} else {
			$validate_message = false;
			$error2 = "mensaje2";
		}
	}

	else {
		$error2 = "faltan_valores2";
		header("Location:../index.php?error2=$error2");
	}

	if ($error2 != "ok2") {
		header("Location:../index.php?error2=" . $error2);
	}elseif($error2 == "ok2"){

		//asunto
		$asunto="10% Primer servicio";

		//destinatario
		$destino="info@drenajesyfugas.com";

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
			header("Location:../gracias-residencial.php");
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
			header("Location:../index.php?error2=Inténtelo de nuevo en unos momentos");
		}
	}
}