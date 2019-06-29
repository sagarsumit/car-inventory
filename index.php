<!doctype html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <title>Car Inventory</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="http://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

		<!-- CAR INVENTORY MAIN CSS -->
		<link rel="stylesheet" type="text/css" href="css/main.css">

    </head>
    <body>

    	<!-- Header Content -->
    	<?php include_once("pages/header.php"); ?>

    	<!-- Main Content -->
		<div class="main-page">
		  <div class="content-margin"></div>
		  <div id="load-page"></div>
		</div>

		<!-- Open Modal Content -->
		<?php include_once("pages/modals.php"); ?>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script src="js/httpRequest.js"></script>
    	<script>
    		
    		// Open Modal
    		function openModal(currentModal){
    			document.getElementById('open-modal-inventory').style.cssText='display: block;';
    			document.getElementById('add-'+currentModal+'-form').style.cssText='display: block;';

    			if(currentModal==="inventory"){
    				getRequestData("model", (requestData)=>{
    					if(requestData.length>0){
    						var options = "";
    						for(var i=0; i<requestData.length; i++){
    							options += '<option value="'+requestData[i]["model_name"]+'">'+requestData[i]["model_name"]+'</option>';
    						}
    						document.getElementById("select-model").innerHTML = options;
    					}
    					else{
    						alert("Please add model first.");
    						closeModal(currentModal);
    					}
    				});
    				getRequestData("manufacturer", (requestData)=>{
    					if(requestData.length>0){
    						var options = "";
							for(var i=0; i<requestData.length; i++){
    							options += '<option value="'+requestData[i]["mfg_name"]+'">'+requestData[i]["mfg_name"]+'</option>';
    						}
    						document.getElementById("select-mfg").innerHTML = options;
    					}
    					else{
    						alert("Please add manufacturer first.");
    						closeModal(currentModal);
    					}
    				});
    			}
    		}

    		// Close Modal
    		function closeModal(currentModal){
			    document.getElementById('open-modal-inventory').style.cssText='display: none;';
			    document.getElementById('add-'+currentModal+'-form').style.cssText='display: none;';
			}

			// Show Page Content
			function showPageContent(pageName, data){
				switch(pageName){
					case "model": 			var card = "";
											if(data.length===1&&data[0]["model_name"]===""){
												card += '<tr>';
													card += '<td>0</td>';
													card += '<td>No Data</td>';
													card += '<td>No Data</td>';
												card += '</tr>';
											}
											else{
												for(var i=0; i<data.length; i++){
													card += '<tr>';
														card += '<td>'+(i+1)+'</td>';
														card += '<td>'+data[i]["model_name"]+'</td>';
														card += '<td>'+data[i]["reg_time"]+'</td>';
													card += '</tr>';
												}
											}
											
											document.getElementById("car-model-table").getElementsByTagName("tbody")[0].innerHTML = card;
											break;

					case "manufacturer": 	var card = "";
											if(data.length===1&&data[0]["mfg_name"]===""){
												card += '<tr>';
													card += '<td>0</td>';
													card += '<td>No Data</td>';
													card += '<td>No Data</td>';
												card += '</tr>';
											}
											else{
												for(var i=0; i<data.length; i++){
													card += '<tr>';
														card += '<td>'+(i+1)+'</td>';
														card += '<td>'+data[i]["mfg_name"]+'</td>';
														card += '<td>'+data[i]["reg_time"]+'</td>';
													card += '</tr>';
												}
											}
											document.getElementById("car-manufacturer-table").getElementsByTagName("tbody")[0].innerHTML = card;
											break;

					case "inventory":
										var card = "";
										if(data.length===1&&data[0]["id"]===0){
											card += '<tr>';
												card += '<td>No Data</td>';
												card += '<td>No Data</td>';
												card += '<td>No Data</td>';
												card += '<td>No Data</td>';
												card += '<td>No Data</td>';
												card += '<td>No Data</td>';
											card += '</tr>';
										}
										else{
											for(var i=0; i<data.length; i++){
												card += '<tr>';
													card += '<td>'+(i+1)+'</td>';
													card += '<td>'+data[i]["mfg_name"]+'</td>';
													card += '<td>'+data[i]["model_name"]+'</td>';
													card += '<td>'+data[i]["counter"]+'</td>';
													card += '<td>'+data[i]["reg_time"]+'</td>';
													card += '<td><button class="btn btn-danger" onclick="soldVehicle('+data[i]["id"]+')">Sell</button></td>';
												card += '</tr>';
											}
										}										
										document.getElementById("car-inventory-table").getElementsByTagName("tbody")[0].innerHTML = card;
										break;
				}

				$(document).ready( function () {
				    $('#car-'+pageName+'-table').DataTable();
				} );
			}

			// Add New Model
			function addNewModel(){
				var addModelName = document.getElementById("add-model-text").value;
				document.getElementById("err-add-model-text").innerHTML = "";
				if(addModelName===''){
					document.getElementById("err-add-model-text").innerHTML = "Please fill the field.";
					return false;
				}
				document.getElementById("add-model-submit").value = "Please wait...";
				setNewModel(addModelName, (data) => {
					if(data[0]["count"]===0){
						loadPage('model');
						closeModal('model');
						document.getElementById("add-model-text").value = "";
						document.getElementById("add-model-submit").value = "Add";
					}
					else{
						document.getElementById("err-add-model-text").innerHTML = "The above 'Model' already exists.";
						document.getElementById("add-model-submit").value = "Add";
					}
					return false;
				});
				return false;
			}

			// Add New Manufacturer
			function addNewManufacturer(){
				var addManufacturerName = document.getElementById("add-manufacturer-text").value;
				document.getElementById("err-add-manufacturer-text").innerHTML = "";
				if(addManufacturerName===''){
					document.getElementById("err-add-manufacturer-text").innerHTML = "Please fill the field.";
					return false;
				}
				document.getElementById("add-manufacturer-submit").value = "Please wait...";
				setNewManufacturer(addManufacturerName, (data) => {
					if(data[0]["count"]===0){
						loadPage('manufacturer');
						closeModal('manufacturer');
						document.getElementById("add-manufacturer-text").value = "";
						document.getElementById("add-manufacturer-submit").value = "Add";
					}
					else{
						document.getElementById("err-add-manufacturer-text").innerHTML = "The above 'Manufacturer' already exists.";
						document.getElementById("add-manufacturer-submit").value = "Add";
					}
					return false;
				});
				return false;
			}

			// Set Inventory
			function setInventory(){
				var mfg = document.getElementById("select-mfg").value;
				var model = document.getElementById("select-model").value;
				document.getElementById("add-inventory-button").value = "Please wait...";

				updateInventory(mfg, model, (data) => {
					loadPage('inventory');
					closeModal('inventory');
					document.getElementById("add-inventory-button").value = "Map";
					return false;
				});

				return false;
			}

			// Load Page Content
    		function loadPage(pageName){
    			$("#load-page").load('pages/'+pageName+'.php',(data) => {
    				//alert(data);
    				getRequestData(pageName, (requestData)=>{
    					showPageContent(pageName, requestData);
    				});

    			});
    		}

    		// Sold Vehicle
    		function soldVehicle(invId){
    			if(confirm("Are you sure to sell this?")){
    				requestPOST("data/soldVehicle.php","id="+invId,(data)=>{
    					alert("Congratulations! the vehicle is sold it out.");
    					loadPage('inventory');
    				});
    			}
    			return false;
    		}

    		// Initial Step
    		loadPage('inventory');
    	</script>
    </body>
</html>
