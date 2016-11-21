<?php foreach ($pgw as $key => $value):?>
	<tr>
		<td><?=$value->id_pegawai?></td>
		<td><?=$value->nama?></td>
		<td><?=$value->telepon?></td>
		<td><?=$value->nama_kota?></td>
		<td><?=$value->nama_kelamin?></td>
		<td><?=$value->nama_posisi?></td>
		<td><?=$value->status?></td>
		<td>
			<a class="btn btn-info update-dataPegawai" data-id="<?=$value->id_pegawai?>">Edit</a>
			<a class="btn btn-danger hapus-dataPegawai" data-id="<?=$value->id_pegawai?>" 
				onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?');">Hapus</a>
			</td>
		</tr>
	<?php endforeach; ?>