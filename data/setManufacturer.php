<?php
require_once("../db_class/Database.php");
require_once("../db_class/Manufacturer.php");

$connection = new HostConnection;
$createConnection = $connection->getConnection();
if($createConnection->connect_error){
	return null;
}
else{
	$manufacturer = new Manufacturer;
	$exist = $manufacturer->setManufacturerList($createConnection, $_POST["manufacturer"]);
	$connection->closeConnection($createConnection);
	
	echo json_encode($exist);
}
?>
