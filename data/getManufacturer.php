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
	$list = $manufacturer->getManufacturerList($createConnection);
	$connection->closeConnection($createConnection);
	
	echo json_encode($list);
}
?>
