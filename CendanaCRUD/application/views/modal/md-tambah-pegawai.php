<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title">Tambah Pegawai</h4>
</div>
<div class="modal-body">
	<form class="form-horizontal" action="<?=site_url('pegawai/act_tambah')?>" method="post" id="form-tb-pegawai"> 
		<div class="form-group"> 
			<label for="inputEmail3" class="col-sm-2 control-label">Nama</label> 
			<div class="col-sm-9"> 
				<input type="text" name="nama" class="form-control" id="inputEmail3" placeholder="Nama"> 
			</div> 
		</div> 
		<div class="form-group">
		<label class="col-sm-2 control-label">Telepon</label>
			<div class="col-sm-6">
				<div class="input-group">
					<span class="input-group-addon">
						<i class="fa fa-phone"></i>
					</span>
					<input type="text" class="form-control1" placeholder="Telepon" name="telepon">
				</div>
			</div>
		</div>
		<div class="form-group">
		<label for="inputPassword3" class="col-sm-2 control-label">Kota</label>
			<div class="col-sm-10">
				<select class="form-control" id="id_mapel" name="kota">
					<option value="">---- Kota ----</option>
					<?php foreach ($tkota as $key => $value):?>
						<option value="<?=$value->id_kota?>"><?=$value->nama_kota?></option>
					<?php endforeach ?>
				</select>
			</div>
		</div>
		<div class="form-group">
		<label for="radio" class="col-sm-2 control-label">Kelamin</label>
			<div class="col-sm-8">
				<div class="radio-inline"><label><input type="radio" name="Kelamin" value="1"> Laki - Laki</label></div>
				<div class="radio-inline"><label><input type="radio" name="Kelamin" value="2"> Perempuan</label></div>
				<div class="radio-inline"><label><input type="radio" name="Kelamin" value="0"> Keduanya</label></div>
			</div>
		</div>
		<div class="form-group"> 
			<label for="inputPassword3" class="col-sm-2 control-label">Posisi</label> 
			<div class="col-sm-10">
				<select class="form-control" id="id_posisi" name="id_posisi">
					<option value="">---- Posisi ----</option>
					<?php foreach ($tposisi as $key => $value):?>
						<option value="<?=$value->id?>"><?=$value->nama?></option>
					<?php endforeach ?>
				</select>
			</div>
		</div> 

		<div class="col-sm-offset-2"> 
			<button type="submit" class="btn hvr-icon-fade col-12">Simpan</button> 
		</div> 
	</form> 

</div>