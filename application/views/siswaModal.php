<!-- Modal -->
<div class="modal fade" id="modaltambah" data-backdrop="static" data-keyboard="false" tabindex="-1"
	aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Form Tambah Atau Edit</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('Siswa/tambahSiswa_aksi') ?>" method="post">
					<table>
						<tr>
							<td>Nama</td>
							<td><input type="text" name="nama"></td>
						</tr>
						<tr>
							<td>No Telepon</td>
							<td><input type="tel" name="no_telp"></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td><input type="text" name="alamat"></td>
						</tr>
						<tr>
							<td>Kelas</td>
							<td>
								<select name="id_kelas" id="" required>
									<option value="">Pilih Kelas</option>
									<?php foreach ($kelas as $row) : ?>
										<option value="<?= $row->id_kelas ?>">
											<?= $row->kelas ?> -
											<?= $row->jurusan ?>
										</option>
									<?php endforeach; ?>
								</select>
							</td>
						</tr>
					</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
			</form>
		</div>
	</div>
</div>