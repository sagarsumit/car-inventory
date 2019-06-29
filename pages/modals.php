<div id="open-modal-inventory">
	<div class="main-page">

		<form id="add-inventory-form" onsubmit="return setInventory();">
		    <div class="form-group">
		        <label class="form-label">SET INVENTORY</label>
		    </div>
		    <div class="form-group">
		        <label>Select Manufacturer</label>
		        <select class="form-control" id="select-mfg"></select>
		    </div>
		          
		    <div class="form-group">
		        <label>Select Model</label>
		        <select class="form-control" id="select-model"></select>
		    </div>
		     
		    <div class="form-group">
		        <input type="submit" id="add-inventory-button" class="btn btn-danger" value="Map"/>&nbsp;&nbsp;
		        <input type="button" class="btn btn-primary" onclick="closeModal('inventory')" value="Close"/>
		    </div>
		</form>

		<form id="add-manufacturer-form" onsubmit="return addNewManufacturer();">
		    <div class="form-group">
		        <label class="form-label">ADD NEW MANUFACTURER</label>
		    </div>
		    <div class="form-group">
		        <input type="text" class="form-control" id="add-manufacturer-text" placeholder="enter manufacturer here" /><br>
		        <span id="err-add-manufacturer-text" class="error-show"></span>
		    </div>
		    <div class="form-group">
		        <input type="submit" class="btn btn-danger" id="add-manufacturer-submit" value="Add"/>&nbsp;&nbsp;
		        <input type="button" class="btn btn-primary" onclick="closeModal('manufacturer')" value="Close"/>
		    </div>
		</form>

		<form id="add-model-form" onsubmit="return addNewModel();">
		    <div class="form-group">
		        <label class="form-label">ADD NEW MODEL</label>
		    </div>
		    <div class="form-group">
		        <input type="text" class="form-control" id="add-model-text" placeholder="enter model here" /><br>
		        <span id="err-add-model-text" class="error-show"></span>
		    </div>
		          
		     <div class="form-group">
		        <input type="submit" class="btn btn-danger" id="add-model-submit" value="Add"/>&nbsp;&nbsp;
		        <input type="button" class="btn btn-primary" onclick="closeModal('model')" value="Close" />
		    </div>
		</form>

	</div>
</div>