<div class="card">
	<div class="p-2 d-flex justify-content-between border">
		<h4 class="h5">Data Siswa</h4>
		<div>
			<a href="<?= base_url('FormSiswa'); ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>Tambah
				Siswa</a>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default" id="tombolTambah">
               <i class="fas fa-plus"></i> Tambah Siswa
            </button>	
		</div>
	</div>
	<div class="card-body">
		<table class="table table-striped table-bordered" class="display nowrap" id="example2">
			<thead>
				<tr class="text-center">
					<th>Nama</th>
					<th>Nomer Telepon</th>
					<th>Alamat</th>
					<th>Kelas</th>
					<th>Jurusan</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($siswa as $row) : ?>
					<tr class="text-center">
						<td><?= $row->nama ?></td>
						<td><?= $row->no_telp ?></td>
						<td><?= $row->alamat ?></td>
						<td><?= $row->kelas ?></td>
						<td><?= $row->jurusan ?></td>
						<td>
							<a href="<?= base_url('Siswa/edit_siswa/' . $row->id); ?>" class="btn btn-warning btn-sm"><i
									class="fas fa-edit"></i></a>
							<a href="<?= base_url('Siswa/hapus_siswa/' . $row->id); ?>" class="btn btn-danger btn-sm"><i
									class="fas fa-trash"></i></a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
<div class="viewmodal" style="display: none;"></div>
<script>
	$(function() {
		$("#example1").DataTable({
			"responsive": true,
			"lengthChange": false,
			"autoWidth": false,
			"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
		}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
		$('#example2').DataTable({
			"paging": true,
			"lengthChange": true,
			"searching": true,
			"ordering": true,
			"info": true,
			"autoWidth": true,
			"responsive": true,
		});
	});
</script>
<script>
$(document).ready(function() {
	$('#tombolTambah').click(function(e) {
		$.ajax({
			dataType: "json",
			url: "<?= site_url('Siswa/tambah_siswa'); ?>",
			success: function (response) {
				if(respon.sukses) {
					$('.viewmodal').html(respon.sukses).show();
				}
			}
		});
	});
});	
</script>