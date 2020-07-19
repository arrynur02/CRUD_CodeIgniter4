<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CodeIgniter 4 CRUD & Jquery</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css">
</head>
<body>
	<h3 class="jumbotron"><img src="<?php echo base_url(); ?>/favicon.ico" alt="icon"> CodeIgniter 4</h3>
	<div class="container">
		<button class="btn btn-success btn-sm mb-3 float-right" id="btn-add-auth"> Tambah</button>
		<table id="mytable" class="table table-bordered w-100">
			<thead>
				<tr>
					<th>#</th>
					<th>Nama</th>
					<th>Username</th>
					<th>Alamat</th>
					<th>telp</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody></tbody>
		</table>
	</div>
	<?php echo view('Auth/Modal_view'); ?>
	<script src="<?php echo base_url(); ?>/assets/js/jquery-3.5.1.min.js"></script>
	<script src="<?php echo base_url(); ?>/assets/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(function() {
			tampilContent();
			function tampilContent(){
				$.get({
					type:"POST",
					url:"../Auth/tampilalldata",
					cache:false,
				})
				.done((result) =>{
					let records = JSON.parse(result);
					let tbody = ''
					for (var i = 0; i < records.length; i++) {
						tbody += `
						<tr class="myrecords-`+records[i].userId+`">
						<td>`+i+`</td>
						<td>`+records[i].nama+`</td>
						<td>`+records[i].username+`</td>
						<td>`+records[i].alamat+`</td>
						<td>`+records[i].telp+`</td>
						<td>
						<a userId="`+records[i].userId+`" class="btn btn-primary btn-sm text-white btn-edit-auth"> Edit</a>
						<a userId="`+records[i].userId+`" class="btn btn-danger btn-sm text-white btn-delete-auth"> Delete</a>
						</td>
						</tr>`;
					}
					$('tbody').html(tbody);	
				});
			}
			$('#btn-add-auth').on('click',function() {
				$('#add-auth').modal('show');
			});
			$('#formAddAuth').on('submit',function(a) {
				a.preventDefault();
				let nama = $('#nama-add').val();
				let username = $('#username-add').val();
				let telp = $('#telp-add').val();
				let alamat = $('#alamat-add').val();
				$.ajax({
					type:"POST",
					url:"../Auth/ProcessInsert",
					cache:false,
					data:{
						nama:nama,
						username:username,
						telp:telp,
						alamat:alamat}
					,beforeSend : function() {
						$('#add-auth').modal('hide');
					},success : function() {
						tampilContent();
						alert('Berhasil Tambah Data !!');
						$('#formAddAuth').trigger('reset');
					},error : function(response) {
						console.log(response);
					}
				});
			});
			$(document).on('click','.btn-delete-auth',function() {
				let userId = $(this).attr('userId');
				let cnfirm = confirm('Are You Sure ?');
				if (cnfirm == true) {
					$.get({url:"../Auth/DeleteAuth/"+userId})
					.done((response) => {
						tampilContent();
						if (response == 'success') {
							$('.myrecords-'+userId+'').remove();
							alert('Berhasil Delete Data ..');
						}
						if (response == 'error') {
							alert('Gagal Delete Data ..');
						}
					});
				}
			});
			$(document).on('click','.btn-edit-auth',function() {
				let userId = $(this).attr('userId');
				$.get({
					type:"POST",
					url:"../Auth/GetByUserId/"+userId,
					cache:false,
					dataType:"json",
				})
				.done((result) => {
					$('#edit-auth').modal('show');
					$('#data-userIdEdit').val(userId);
					$('#nama-edit').val(result.nama);
					$('#username-edit').val(result.username);
					$('#telp-edit').val(result.telp);
					$('#alamat-edit').val(result.alamat);
				});
			});
			$('#formEditAuth').on('submit',function(a) {
				a.preventDefault();
				let nama = $('#nama-edit').val();
				let username = $('#username-edit').val();
				let telp = $('#telp-edit').val();
				let alamat = $('#alamat-edit').val();
				$.ajax({
					type:"POST",
					url:"../Auth/ProcessUpdate/"+$('#data-userIdEdit').val(),
					cache:false,
					data:{
						nama:nama,
						username:username,
						telp:telp,
						alamat:alamat}
					,beforeSend : function() {
						$('#edit-auth').modal('hide');
					},success : function(response) {
						tampilContent();
						if (response == 'success') {
						alert('Berhasil Update Data !!');
						}
						if (response == 'error') {
						alert('Gagal Update Data !!');
						}
					},error : function(response) {
						console.log(response);
					}
				});
			});
		});
	</script>
</body>
</html>