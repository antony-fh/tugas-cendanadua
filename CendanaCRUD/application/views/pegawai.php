<?=$this->session->flashdata('alert_msg')?>
<div class="grid grid-info">
<div class="agile-grids">	
	<!-- tables -->
	<div class="table-heading">
		<h2><?=$judul?></h2>
	</div>
		<a data-toggle="modal" href="#tb-pegawai" class="hvr-icon-grow-rotate col-25 btn pull pull-right">Tambah Pegawai</a>
	<div class="agile-tables">
		<div class="w3l-table-info">
			<h3><?=$judul?></h3>
			<table id="pegawai" class="table table-responsive table-striped table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nama</th>
						<th>Telepon</th>
						<th>Kota</th>
						<th>Kelamin</th>
						<th>Posisi</th>
						<th>Status</th>
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
			<a href="<?=site_url('pegawai/ekspor')?>" class="btn btn-lg pull pull-left col-2"><i class="fa fa-download"></i> Ekspor</a>
		</div>
	</div>
</div>
</div>
<?=$modal_tb_pegawai?>

<?=$modal_up_pegawai?>