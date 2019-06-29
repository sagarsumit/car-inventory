<?php
	
	class Inventory{
		
		// Get Inventory List
		function getInventoryList($connection){
			$inventoryList = array();
			$result = $connection->query("SELECT * FROM `inventory` ORDER BY `reg_time` DESC");
			if($result->num_rows>0){
				while($row = $result->fetch_assoc()){
					$obj = array(
								"id" => $row["id"],
								"mfg_name" => $row["mfg_name"],
								"model_name" => $row["model_name"],
								"counter" => $row["counter"],
								"reg_time" => $row["reg_time"]
							);
					array_push($inventoryList, $obj);
				}
			}
			else{
				$obj = array(
							"id" => 0,
							"mfg_name" => "",
							"model_name" => "",
							"counter" => 0,
							"reg_time" => ""
						);
				array_push($inventoryList, $obj);
			}
			return $inventoryList;
		}

		// Set Inventory
		function setInventoryList($connection, $manufacturer, $model){
			$inventoryCount = $this->getInventoryCount($connection,$manufacturer,$model);
			$returnArray = array();
			if($inventoryCount>=1){
				$this->updateInventory($connection, $manufacturer, $model, ($inventoryCount+1) );
				array_push($returnArray, array('count' => ($inventoryCount+1) ) );
			}
			else{
				$this->addInventory($connection,$manufacturer,$model);
				array_push($returnArray, array('count' => 1 ) );
			}
			return $returnArray;
		}

		// Get Inventory Count
		function getInventoryCount($connection, $manufacturer, $model){
			$result = $connection->query("SELECT counter FROM `inventory` WHERE mfg_name='".$manufacturer."' and model_name='".$model."'");

			if($result->num_rows>0){
				$row = $result->fetch_assoc();
				return $row["counter"];
			}
			else{
				return 0;
			}
		}

		// Add New Inventory
		function addInventory($connection, $manufacturer, $model){
			$connection->query("INSERT INTO inventory(`mfg_name`,`model_name`) VALUES('".$manufacturer."','".$model."')");
		}

		// Update Inventory
		function updateInventory($connection, $manufacturer, $model, $counter){
			$connection->query("UPDATE inventory SET counter=".$counter." WHERE mfg_name='".$manufacturer."' and model_name='".$model."'");
		}

		// Sell Vehicle
		function sellVehicle($connection, $id){
			$getJSON = $this->findInvById($connection, $id);
			$returnArray = array();
			if($getJSON["counter"]<2){
				$connection->query("DELETE FROM inventory WHERE id=".$id);
				array_push($returnArray, array("count" => 0 ));
			}
			else{
				$connection->query("UPDATE inventory SET counter=".($getJSON["counter"]-1)." WHERE id=".$id);
				array_push($returnArray, array('count' => ($getJSON["counter"]-1)) );
			}
			return $returnArray;
		}

		// Find Inventory By Id
		function findInvById($connection, $id){
			$returnJSON = array(
								"id" => 0,
								"mfg_name" => "",
								"model_name" => "",
								"counter" => 0,
								"reg_time" => ""
							);
			$result = $connection->query("SELECT * FROM `inventory` WHERE id=".$id);
			if($result->num_rows>0){
				$row = $result->fetch_assoc();
				return array(
							"id" => $row["id"],
							"mfg_name" => $row["mfg_name"],
							"model_name" => $row["model_name"],
							"counter" => $row["counter"],
							"reg_time" => $row["reg_time"]
						);
			}
			return $returnJSON;
		}
		
	}
?>