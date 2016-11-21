        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <?php echo $this->session->flashdata('alert_msg'); ?>
<h1 class="page-header"><?=$judul?></h1>

          
<!-- <?php 
echo "<pre>";
 print_r ($data_nilai);
 echo "</pre>"; ?> -->
          <a href="<?=base_url('nilai/add_nilai')?>" class="btn btn-primary">Tambah nilai</a>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php 
              foreach ($data_nilai as $key => $value) {
               ?>
                <tr>
                  <td><?=$value->id_nilai?></td>
                  <td><?=$value->nama?></td>
                  <td><?=$value->nama_mapel?></td>
                  <td><?=$value->total_nilai?></td>
                  <td>
                  <a href="<?=site_url('nilai/edit/'.$value->id_nilai)?>" class="btn btn-info">Edit</a>
                  <a href="<?=site_url('nilai/hapus/'.$value->id_nilai)?>" class="btn btn-danger" 
                  onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?');">Hapus</a>
                  </td>
                </tr>
                <?php 
              }
              ?>
              </tbody>
            </table>
          </div>
                  </div>