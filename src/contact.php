<?php 
	include_once 'config.php';
	include_once 'http-response.php';
	$name = isset($_POST['name'])?$_POST['name']:null;
	$email = isset($_POST['email'])?$_POST['email']:null;
	$subject = isset($_POST['subject'])?$_POST['subject']:'Formulario de contacto';
	$phone = isset($_POST['phone'])?$_POST['phone']:'N';
	$message = isset($_POST['message'])?$_POST['message']:null;
	$method = isset($_POST['method'])?$_POST['method']:null;
	$document = isset($_POST['document'])?$_POST['document']:null;
	if ($name != null && $email != null && $message != null && $method != null){
		$response = getResponse(array('method' => $method, 'name' => $name, 'email' => $email, 'subject' => $subject, 'phone' => $phone, 'message' => $message));
		$json = json_decode($response);
		$error = $json[0]->error;
		$wsmessage = $json[0]->message;
		if ($document != null){
			$get = '?error=' . $error . '&message=' . $wsmessage;
			$url = $_SERVER['HTTP_HOST'] . '/' . $document . $get;
			header('Location: http://' . $url);
		}
	}
	else {
		if ($document != null){
			$get = '?error=true&message=Hay campos requeridos que se encuentran vacíos, no se pudo continuar.';
			$url = $_SERVER['HTTP_HOST'] . '/' . $document . $get;
			header('Location: http://' . $url);
		}
	}
?>