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
	$exist = $model->setModelList($createConnection, $_POST["model"]);
	$connection->closeConnection($createConnection);
	
	echo json_encode($exist);
}
?>
