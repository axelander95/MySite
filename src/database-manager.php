<?php 
	include_once 'config.php';
	class DatabaseManager {
		private $connection;
		public function _construct() {
			$this->connection = null;
		}
		public function Connect() {
			$this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			if (!$this->connection)
				die(mysqli_error($this->connection));
		}
		public function GetConnection() {
			return $this->connection;
		}
		public function ExecuteProcedure($sp_name, $sp_params){
			$result = mysqli_query($this->connection, 'CALL ' . $sp_name . '(' . $sp_params . ');') or die(mysqli_error($this->connection));
			return $result;
		}
		public function CloseConnection () {
			mysqli_close($this->connection);
		}
	}
?>