<?php
require_once("../db_class/Database.php");
require_once("../db_class/Inventory.php");

$connection = new HostConnection;
$createConnection = $connection->getConnection();
if($createConnection->connect_error){
	return null;
}
else{
	$inventory = new Inventory;
	$exist = $inventory->sellVehicle($createConnection, $_POST["id"]);
	$connection->closeConnection($createConnection);
	
	echo json_encode($exist);
}
?>
