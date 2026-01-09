  <div class="modal fade" id="modaltambahkelas">
  	<div class="modal-dialog">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h4 class="modal-title">Form Tambah Kelas</h4>
  				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">&times;</span>
  				</button>
  			</div>
  			<?= form_open(site_url('Kelas/tambahKelas'), ['class' => 'formSimpanKelas']) ?>
  			<div class="pesankelas" style="display: none;"></div>
  			<div class="modal-body">
  				<div class="form-group row">
  					<label for="id" class="col-sm-2 col-form-label">ID</label>
  					<div class="col-sm-10">
  						<input type="text" name="id_kelas" id="id_kelas" class="form-control">
  					</div>
  				</div>
  				<div class="form-group row">
  					<label class="col-sm-2 col-form-label" for="kelas">Kelas</label>
  					<div class="col-sm-10">
  						<input type="number" name="kelas" id="kelas" class="form-control">
  					</div>
  				</div>
  				<div class="form-group row">
  					<label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
  					<div class="col-sm-10">
  						<input type="text" name="jurusan" id="jurusan" class="form-control">
  					</div>
  				</div>
  			</div>
  			<div class="modal-footer justify-content-between">
  				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  				<button type="submit" class="btn btn-primary">Simpan</button>
  			</div>
  		</div>
  		<!-- /.modal-content -->
  		<?= form_close() ?>
  	</div>
  	<!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
  <script>
  	$(document).ready(function() {

  		$('.formSimpanKelas').on('submit', function(e) {
  			e.preventDefault();

  			$.ajax({
  				type: 'POST',
  				url: $(this).attr('action'),
  				data: $(this).serialize(),
  				dataType: 'json',

  				success: function(response) {

  					// Jika VALIDASI ERROR
  					if (response.error) {
  						$('.pesanKelas').html(response.error).fadeIn();
  					}

  					// Jika BERHASIL
  					if (response.sukses) {
  						Swal.fire({
  							icon: "success",
  							title: "Data Berhasil Disimpan",
  							text: response.sukses,
  						});
  						// reset form
  						$('.formSimpanKelas')[0].reset();

  						// tutup modal
  						$('#modaltambahkelas').modal('hide');

  						// reload datatable
  						table.ajax.reload(null, false);

  					}
  				},

  				error: function(xhr) {
  					alert('Terjadi kesalahan AJAX');
  					console.log(xhr.responseText);
  				}
  			});
  		});

  	});
  </script>