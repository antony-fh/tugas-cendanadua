
<div class="modal-dialog modal-md" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title">Edit Kota</h4>
		</div>
		<div class="modal-body">
		<form class="form-horizontal" action="<?=site_url('kota/act_edit')?>" method="post" id="form-edit-kota"> 
		<input type="hidden" name="id" value="<?=@$data_kota->id_kota?>">
				<div class="form-group"> 
					<label for="inputEmail3" class="col-sm-2 control-label">Nama</label> 
					<div class="col-sm-9"> 
						<input type="text" name="nama_kota" class="form-control" id="inputEmail3" placeholder="Nama" value="<?=@$data_kota->nama_kota?>"> 
					</div> 
				</div> 


				<div class="col-sm-offset-2"> 
					<button type="submit" class="btn hvr-icon-fade col-12">Simpan</button> 
				</div> 
			</form> 

		</div>
	</div>
</div>