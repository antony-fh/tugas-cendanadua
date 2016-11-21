
<div class="modal-dialog modal-md" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title">Edit Pegawai</h4>
		</div>
		<div class="modal-body">
		<form class="form-horizontal" action="<?=site_url('pegawai/act_edit')?>" method="post" id="form-update"> 
		<input type="hidden" name="id" value="<?=@$data_pegawai->id_pegawai?>">
				<div class="form-group"> 
					<label for="inputEmail3" class="col-sm-2 control-label">Nama</label> 
					<div class="col-sm-9"> 
						<input type="text" name="nama" class="form-control" id="inputEmail3" placeholder="Nama" value="<?=@$data_pegawai->nama?>"> 
					</div> 
				</div> 
				<div class="form-group">
					<label class="col-sm-2 control-label">Telepon</label>
					<div class="col-sm-6">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-phone"></i>
							</span>
							<input type="text" class="form-control1" placeholder="Telepon" name="telepon" value="<?=@$data_pegawai->telepon?>">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-10">
						<select class="form-control" id="id_kota" name="id_kota">
							<option value="">---- PILIH KOTA ----</option>
							<?php foreach ($tkota as $key => $value):?>
								<?php 
								if($value->id_kota == @$data_pegawai->kota){
									$selected='selected';
								}else{
									$selected="";
								}
								?>
								<option value="<?=$value->id_kota?>" <?=$selected?>><?=$value->nama_kota?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="radio" class="col-sm-2 control-label">Kelamin</label>
					<div class="col-sm-8">

						<div class="radio-inline"><label><input type="radio" name="Kelamin" <?php if((@$data_pegawai->kelamin) == 1){ ?> checked="checked"<?php } ?> value="1"> Laki - Laki</label></div>
						<div class="radio-inline"><label><input type="radio" name="Kelamin" <?php if((@$data_pegawai->kelamin) == 2){ ?> checked="checked"<?php } ?>  value="2"> Perempuan</label></div>
						<div class="radio-inline"><label><input type="radio" name="Kelamin" <?php if((@$data_pegawai->kelamin) == 0){ ?> checked="checked"<?php } ?>  value="0"> Keduanya</label></div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-10">
						<select class="form-control" id="id_posisi" name="id_posisi">
							<option value="">---- PILIH POSISI ----</option>
							<?php foreach ($tposisi as $key => $value):?>
								<?php 
								if($value->id == @$data_pegawai->id_posisi){
									$selected='selected';
								}else{
									$selected="";
								}
								?>
								<option value="<?=$value->id?>" <?=$selected?>><?=$value->nama?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div> 

				<div class="col-sm-offset-2"> 
					<button type="submit" class="btn hvr-icon-fade col-12">Simpan</button> 
				</div> 
			</form> 

		</div>
	</div>
</div>