<?php
require_once("../db_class/Database.php");
require_once("../db_class/Model.php");

$connection = new HostConnection;
$createConnection = $connection->getConnection();
if($createConnection->connect_error){
	return null;
}
else{
	$model = new Model;
	$list = $model->getModelList($createConnection);
	$connection->closeConnection($createConnection);
	
	echo json_encode($list);
}
?>
