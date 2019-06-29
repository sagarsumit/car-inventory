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
	$list = $inventory->getInventoryList($createConnection);	
	$connection->closeConnection($createConnection);
	
	echo json_encode($list);
}
?>