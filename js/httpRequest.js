function getRequestData(dataParam, callback){
	switch(dataParam){
		case "model": 			requestGET("data/getModels.php", (data) => {
									callback(data);
								});
						break;

		case "manufacturer": 	requestGET("data/getManufacturer.php", (data) => {
									callback(data);
								});
						break;


		case "inventory": 		requestGET("data/getInventory.php", (data) => {
									callback(data);
								});
						break;

	}
}


// Add New Model if not exists
function setNewModel(modelValue, callback){
	requestPOST("data/setModel.php","model="+modelValue, (data) => {
		callback(data);
	});
}

// Add New Manufacturer if not exists
function setNewManufacturer(manufacturerValue, callback){
	requestPOST("data/setManufacturer.php","manufacturer="+manufacturerValue, (data) => {
		callback(data);
	});
}


//Set Inventory
function updateInventory(manufacturer, model, callback){
	requestPOST("data/setInventory.php","manufacturer="+manufacturer+"&model="+model, (data) => {
		callback(data);
	});
}

// Common GET Request Method
function requestGET(URL, callback){
	var xmlhttp;
	try{
		xmlhttp = new XMLHttpRequest();
	} catch (e){
		// Internet Explorer Browsers
		try{
			xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				//Browser doesn't support ajax	
				alert("Your browser is unsupported");
			}
		}
	}
	if(xmlhttp){
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState===4 && xmlhttp.status===200) {
				callback(JSON.parse(xmlhttp.responseText));
			}
			if(xmlhttp.status === 404){
                alert("It couldn't connect to the server.");
            }
            if(xmlhttp.status === 504){
                alert("Connection timeout or slow internet");
            }			
		}
        xmlhttp.open("GET",URL,true);
        xmlhttp.setRequestHeader("Access-Control-Allow-Origin","*");
		xmlhttp.send();
    }
}


// Common POST Request Method
function requestPOST(URL, data, callback){
	var xmlhttp;
	try{
		xmlhttp = new XMLHttpRequest();
	} catch (e){
		// Internet Explorer Browsers
		try{
			xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				//Browser doesn't support ajax	
				alert("Your browser is unsupported");
			}
		}
	}		
	if(xmlhttp){
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState===4 && xmlhttp.status===200) {
				callback(JSON.parse(xmlhttp.responseText));
			}
			if(xmlhttp.status === 404){
                alert("It couldn't connect to the server.");
            }
            if(xmlhttp.status === 504){
                alert("Connection timeout or slow internet");
            }			
		}
        xmlhttp.open("POST",URL,true);
        xmlhttp.setRequestHeader("Access-Control-Allow-Origin","*");
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send(data);
    }
}