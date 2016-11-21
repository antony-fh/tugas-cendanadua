<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title">Tambah Kota</h4>
</div>
<div class="modal-body">
	<form class="form-horizontal" action="<?=site_url('kota/act_tambah')?>" method="post" id="form-tb-kota"> 
		<div class="form-group"> 
			<label for="inputEmail3" class="col-sm-2 control-label">Nama</label> 
			<div class="col-sm-9"> 
				<input type="text" name="nama_kota" class="form-control" id="inputEmail3" placeholder="Nama"> 
			</div> 
		</div> 
		

		<div class="col-sm-offset-2"> 
			<button type="submit" class="btn hvr-icon-fade col-12">Simpan</button> 
		</div> 
	</form> 

</div>