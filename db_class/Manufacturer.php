<?php
	
	class Manufacturer{
		
		// Get Manufacturer List
		function getManufacturerList($connection){			
			$manufacturerList = array();
			$result = $connection->query("SELECT * FROM `manufacturer` ORDER BY `reg_time` DESC");
			
			if($result->num_rows>0){
				
				while($row = $result->fetch_assoc()){					
					$obj = array(
								"mfg_name" => $row["mfg_name"],
								"reg_time" => $row["reg_time"]
							);					
					array_push($manufacturerList, $obj);					
				}				
			}
			else{				
				$obj = array(
							"mfg_name" => "",
							"reg_time" => ""
						);				
				array_push($manufacturerList, $obj);				
			}
			
			return $manufacturerList;			
		}

		// Set Model List
		function setManufacturerList($connection, $manufacturerName){
			$num = $this->countManufacturerName($connection, $manufacturerName);
			$returnArray = array();
			if($num>0){
				array_push($returnArray, array('count' => $num ));
			}
			else{
				$this->addNewManufacturer($connection, $manufacturerName);
				array_push($returnArray, array('count' => 0 ) );
			}
			return $returnArray;
		}

		// Check Manufacturer Count
		function countManufacturerName($connection, $manufacturerName){
			$result = $connection->query("SELECT * FROM `manufacturer` WHERE mfg_name='".$manufacturerName."'");
			return $result->num_rows;
		}

		// Add New Manufacturer
		function addNewManufacturer($connection, $manufacturerName){
			$connection->query("INSERT INTO manufacturer(`mfg_name`) VALUES('".$manufacturerName."')");
		}
		
	}
?>