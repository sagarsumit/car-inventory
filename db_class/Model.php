<?php
	
	class Model{
		
		// Get Model List
		function getModelList($connection){
			$manufacturerList = array();

			$result = $connection->query("SELECT * FROM `model` ORDER BY `reg_time` DESC");
			if($result->num_rows>0){
				
				while($row = $result->fetch_assoc()){					
					$obj = array(
								"model_name" => $row["model_name"],
								"reg_time" => $row["reg_time"]
							);					
					array_push($manufacturerList, $obj);					
				}
				
			}
			else{
				
				$obj = array(
							"model_name" => "",
							"reg_time" => ""
						);				
				array_push($manufacturerList, $obj);
				
			}			
			return $manufacturerList;
			
		}

		// Set Model List
		function setModelList($connection, $modelName){
			$num = $this->countModelName($connection, $modelName);
			$returnArray = array();
			if($num>0){
				array_push($returnArray, array('count' => $num ));
			}
			else{
				$this->addNewModel($connection, $modelName);
				array_push($returnArray, array('count' => 0 ) );
			}
			return $returnArray;
		}

		// Check Model Count
		function countModelName($connection, $modelName){
			$result = $connection->query("SELECT * FROM `model` WHERE model_name='".$modelName."'");
			return $result->num_rows;
		}

		// Add New Model
		function addNewModel($connection, $modelName){
			$connection->query("INSERT INTO model(`model_name`) VALUES('".$modelName."')");
		}
		
	}
?>