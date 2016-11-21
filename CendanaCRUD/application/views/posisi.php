
<?=$this->session->flashdata('alert_msg')?>
<div class="grid grid-info">
<div class="agile-grids">	
	<!-- tables -->
	<div class="table-heading">
		<h2><?=$judul?></h2>
	</div>
		<a data-toggle="modal" href="#tb-posisi" class="hvr-icon-grow-rotate col-14 btn pull pull-right">Tambah Posisi</a>
	<div class="agile-tables">
		<div class="w3l-table-info">
			<h3><?=$judul?></h3>
			<table id="posisi" class="table table-responsive table-striped table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nama Posisi</th>
						<th>Admin BTN</th>
					</tr>
				</thead>
				<!-- <tbody id="tbpegawai">
				
				</tbody> -->
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<a href="<?=base_url('posisi/ekspor')?>" class="btn btn-lg pull pull-left col-2"><i class="fa fa-download"></i> Ekspor</a>
		</div>
	</div>
</div>
</div>
<?=$modal_tb_posisi?>

<?=$modal_up_posisi?>