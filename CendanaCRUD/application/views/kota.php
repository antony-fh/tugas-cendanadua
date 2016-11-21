
<?=$this->session->flashdata('alert_msg')?>
<div class="grid grid-info">
<div class="agile-grids">	
	<!-- tables -->
	<div class="table-heading">
		<h2><?=$judul?></h2>
	</div>
		<a data-toggle="modal" href="#tb-kota" class="hvr-icon-grow-rotate col-11 btn pull pull-right">Tambah Kota</a>
	<div class="agile-tables">
		<div class="w3l-table-info">
			<h3><?=$judul?></h3>
			<table id="kota" class="table table-responsive table-striped table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nama kota</th>
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
			<a href="<?=base_url('kota/ekspor')?>" class="btn btn-lg pull pull-left col-2"><i class="fa fa-download"></i> Ekspor</a>
		</div>
	</div>
</div>
</div>
<?=$modal_tb_kota?>

<?=$modal_up_kota?>