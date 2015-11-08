<?php 
	include_once 'functions.php';
	$metodo = isset($_POST['method'])?$_POST['method']:'none';
	switch ($metodo) {
		case 'contact':
			contact($_POST['name'], $_POST['email'], $_POST['subject'], $_POST['phone'], $_POST['message']);
			break;
		case 'suscribe':
			break;
		case 'none':
			echo json_encode(array('error' => true, 'message' => 'No se específico ningún método'));
			break;
		default :
			echo json_encode(array('error' => true, 'message' => 'Método inválido.'));
			break;
	}
?>