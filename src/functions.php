<?php
	include_once 'database-manager.php';
	include_once 'mail.php';
	function contact($name, $email, $subject, $phone, $message) {
		$database_manager = new DatabaseManager();
		$json = array();
		$body = '<p>
					Celular: ' . $phone . '.<br>
					Mensaje: ' . $message . '<br><br>
					Enviado desde: ' . $_SERVER['SERVER_NAME'] . '
				</p>';
		try {
			if (Send($email, $name, $subject, EMAIL_INFO, $body, $email, $name)) {
				$database_manager->Connect();
				if ($database_manager->ExecuteProcedure(SP_INSERTA_CONTACTO, '\'' . $name . '\',
					\'' . $email . '\',\'' . $subject . '\',\'' .$phone . '\',\'' . $message . '\', \'' .  EMAIL_INFO . '\''))
					$json[] = array('error' => 'false', 'message' => 'Mensaje enviado con éxito.');
				else {
					$json[] = array('error' => 'false', 'message' => 'Mensaje enviado con éxito, pero hubo un error al momento de almacenar la información 
					en la base de datos.');
				}
				$database_manager->CloseConnection();
			}
		}
		catch (Exception $e){
			$json[]  = array('error' => 'true', 'message' => 'Hubo un error, por favor, intente nuevamente. Definición del error: ' . $e->getMessage());
		}
		echo json_encode($json);
	}
?>