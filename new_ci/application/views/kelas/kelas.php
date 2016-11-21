        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <?php echo $this->session->flashdata('alert_msg'); ?>
<h1 class="page-header"><?=$judul?></h1>

          

          <a href="<?=base_url('kelas/add_kelas')?>" class="btn btn-primary">Tambah kelas</a>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php 
              foreach ($data_kelas as $key => $value) {
               ?>
                <tr>
                  <td><?=$value->id_kelas?></td>
                  <td><?=$value->nama_kelas?></td>
                  <td>
                  <a href="<?=site_url('kelas/edit/'.$value->id_kelas)?>" class="btn btn-info">Edit</a>
                  <a href="<?=site_url('kelas/hapus/'.$value->id_kelas)?>" class="btn btn-danger" 
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