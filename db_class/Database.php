
<?php
	class HostConnection{
		private $host = "localhost";
		private $dbname = "car_inventory";
		private $username = "root";
		private $pass = "root";
		
		
		function getConnection(){
			$sendConnection = new mysqli($this->host, $this->username, $this->pass, $this->dbname);
			return $sendConnection;
		}
		
		function closeConnection($connection){
			return $connection->close();
		}
		
	}
?>