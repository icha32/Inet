<?php 
require_once('database/Database.php');
$db = new Database();
$sql = "SELECT *
		FROM laundry_type
		ORDER BY laun_type_desc ASC";
$types = $db->getRows($sql);
$db->Disconnect();
 ?>
<div class="modal fade" id="modal-laun">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Modal title</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" role="form" id="form-new-laun">
					<input type="hidden" id="laun-type">
					<input type="hidden" id="laun-id">
				  <div class="form-group">
				    <label class="control-label col-sm-3" for=""> Name:</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" id="customer" placeholder="Enter name" required>
				    </div>
				  </div>
				      <input type="hidden" class="form-control" id="priority" placeholder="Enter priority number">				  
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Weight:</label>
				    <div class="col-sm-9">
				      <input type="number" step="any" class="form-control" id="weight" placeholder="Enter laundry weight" required>
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Type:</label>
					<div class="col-sm-9" id="types">
						<select class="btn btn-default types" id="newlaun-type">
							<?php foreach($types as $t): ?>
								<option value="<?= $t['laun_type_id']; ?>"><?= $t['laun_type_desc']; ?></option>
							<?php endforeach; ?>
						</select>
						<a class="btn btn-primary mx-auto" id="tambah_type">+</a>
						<a class="btn btn-danger mx-auto d-none" id="kurang_type">-</a>
					</div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-3" for=""> Paket </label>
				
				    <div class="col-sm-9">
					    <select class="btn btn-default" id="newlaun-paket">
					    		<option value="Kering">Cuci Kering</option>
								<option value="Setrika">Cuci Setrika</option>
								<option value="Express">Cuci Express</option>
					    </select>
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-3" for=""> Pengambilan </label>
				
				    <div class="col-sm-9">
					    <select class="btn btn-default" id="newlaun-pengambilan">
					    		<option value="diantar">Diantar(+Rp.7.000)</option>
								<option value="diambil">Diambil</option>
					    </select>
				    </div>
				  </div>
				  <div class="form-group"> 
				    <div class="col-sm-offset-3 col-sm-9">
				      <button type="submit" class="btn btn-primary">Save</button>
				    </div>
				  </div>
				</form>
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>