<!-- Modal -->
<div class="modal fade" id="modaltambah" data-backdrop="static" data-keyboard="false" tabindex="-1"
	aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-primary text-white">
				<h5 class="modal-title" id="staticBackdropLabel">Form Tambah Atau Edit</h5>
				<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open('Siswa/tambahSiswa_aksi', ['class' => 'formSimpan']) ?>
			<div class="pesan" style="display: none;"></div>
			<div class="modal-body">
				<div class="form-group row">
					<label class="col-sm-2 col-form-label" for="nama">Nama</label>
					<div class="col-sm-10">
						<input type="text" name="nama" id="nama" class="form-control">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label" for="no_telp">No Telepon</label>
					<div class="col-sm-10">
						<input type="tel" name="no_telp" id="no_telp" class="form-control">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label" for="alamat">Alamat</label>
					<div class="col-sm-10">
						<input type="tel" name="alamat" id="alamat" class="form-control">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label" for="id_kelas">Kelas</label>
					<div class="col-sm-10">
						<select name="id_kelas" id="id_kelas" class="form-control" required>
							<option value="">Pilih Kelas</option>
							<?php foreach ($kelas as $row) : ?>
								<option value="<?= $row->id_kelas ?>">
									<?= $row->kelas ?> -
									<?= $row->jurusan ?>
								</option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
		</div>
		<?= form_close() ?>
	</div>
</div>
<script>
	$(document).ready(function() {
		$('.formSimpan').submit(function(e) {
			$.ajax({
				type: "POST",
				url: $(this).attr('action'),
				data: $(this).serialize(),
				dataType: "json",
				success: function(response) {
					if (response.error) {
						$('.pesan').html(response.error).show();
					}
				}
			})

			return false;
		})
	});
</script>