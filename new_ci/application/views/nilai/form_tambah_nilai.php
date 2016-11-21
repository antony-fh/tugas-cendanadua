        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <?php echo $this->session->flashdata('alert_msg'); ?>
<h1 class="page-header"><?=$judul?></h1>

<form class="form-horizontal" method="POST" action="<?=site_url('nilai/act_tambah')?>">
  <div class="form-group">
  <label for="inputPassword3" class="col-sm-2 control-label">Nama Siswa</label>
    <div class="col-sm-10">
      <select class="form-control" id="id_siswa" name="id_siswa">
        <option value="">---- PILIH SISWA ----</option>
        <?php foreach ($siswa as $key => $value):?>
        <option value="<?=$value->id?>"><?=$value->nama?></option>
        <?php endforeach ?>
      </select>
    </div>
  </div>
  <div class="form-group">
  <label for="inputPassword3" class="col-sm-2 control-label">Mata Pelajaran</label>
    <div class="col-sm-10">
      <select class="form-control" id="id_mapel" name="id_mapel">
        <option value="">---- PILIH MAPEL ----</option>
        <?php foreach ($mapel as $key => $value):?>
        <option value="<?=$value->id_mapel?>"><?=$value->nama_mapel?></option>
        <?php endforeach ?>
      </select>
    </div>
  </div>
    <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Nilai</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPassword3" placeholder="Total Nilai" name="total_nilai">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <a href="<?=site_url('siswa')?>" class="btn btn-default">Kembali</a>
      <button type="submit" class="btn btn-success">Simpan</button>
    </div>
  </div>
</form>

</div>