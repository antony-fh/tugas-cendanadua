        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <?php echo $this->session->flashdata('alert_msg'); ?>
<h1 class="page-header"><?=$judul?></h1>

<form class="form-horizontal" method="POST" action="<?=site_url('nilai/act_edit')?>">
  <input type="hidden" name="id" value="<?=$data_nilai->id_nilai?>">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Nama Siswa</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="Nama" readonly="readonly" value="<?=$data_nilai->nama?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Mata Pelajaran</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="Nama" readonly="readonly" value="<?=$data_nilai->nama_mapel?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Total Nilai</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="Nama" name="total_nilai" value="<?=$data_nilai->total_nilai?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <a href="<?=site_url('nilai')?>" class="btn btn-default">Kembali</a>
      <button type="submit" class="btn btn-success">Simpan</button>
    </div>
  </div>
</form>

</div>