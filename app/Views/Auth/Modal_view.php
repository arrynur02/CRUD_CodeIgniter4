<div class="modal fade" id="add-auth">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<!-- <button class="close" type="button" data-dismiss="modal">x</button> -->
				<form id="formAddAuth">
				<div class="form-group">
					<label> Nama</label>
					<input type="text" id="nama-add" class="form-control" required>
				</div>
				<div class="form-group">
					<label> Username</label>
					<input type="text" id="username-add" class="form-control" required>
				</div>
				<div class="form-group">
					<label> Telp</label>
					<input type="number" id="telp-add" class="form-control" required>
				</div>
				<div class="form-group">
					<label> Alamat</label>
					<textarea id="alamat-add" cols="20" rows="6" class="form-control" required></textarea>
				</div>
				<button class="btn btn-success" type="submit"> Simpan</button>
				<button class="btn btn-danger" data-dismiss="modal" type="button"> Batal</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Modal Edit -->
<div class="modal fade" id="edit-auth">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<!-- <button class="close" type="button" data-dismiss="modal">x</button> -->
				<form id="formEditAuth">
					<input type="hidden" id="data-userIdEdit">
				<div class="form-group">
					<label> Nama</label>
					<input type="text" id="nama-edit" class="form-control" required>
				</div>
				<div class="form-group">
					<label> Username</label>
					<input type="text" id="username-edit" class="form-control" required>
				</div>
				<div class="form-group">
					<label> Telp</label>
					<input type="number" id="telp-edit" class="form-control" required>
				</div>
				<div class="form-group">
					<label> Alamat</label>
					<textarea id="alamat-edit" cols="20" rows="6" class="form-control" required></textarea>
				</div>
				<button class="btn btn-primary" type="submit"> Update</button>
				<button class="btn btn-danger" data-dismiss="modal" type="button"> Batal</button>
				</form>
			</div>
		</div>
	</div>
</div>