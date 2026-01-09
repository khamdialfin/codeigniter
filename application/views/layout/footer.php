  </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
  </div>
  <footer class="main-footer">
  	<div class="float-right d-none d-sm-block">
  		<b>Version</b> 3.2.0
  	</div>
  	<strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
  	<!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="<?= base_url('adminlte') ?>/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('adminlte') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="<?= base_url('adminlte') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('adminlte') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url('adminlte') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url('adminlte') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?= base_url('adminlte') ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?= base_url('adminlte') ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="<?= base_url('adminlte') ?>/plugins/jszip/jszip.min.js"></script>
  <script src="<?= base_url('adminlte') ?>/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="<?= base_url('adminlte') ?>/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="<?= base_url('adminlte') ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="<?= base_url('adminlte') ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="<?= base_url('adminlte') ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('adminlte') ?>/dist/js/adminlte.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/3.0.7/js/dataTables.responsive.js"></script>
  <script src="https://cdn.datatables.net/responsive/3.0.7/js/responsive.dataTables.js"></script>
  <script src="<?= base_url('adminlte') ?>/plugins/sweetalert2/sweetalert2.min.js"></script>

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
  		$('#tomboltambah').click(function(e) {
  			$.ajax({
  				url: "<?= base_url('Siswa/tambah_siswa') ?>",
  				dataType: "json",
  				success: function(response) {
  					if (response.sukses) {
  						$('.viewmodal').html(response.sukses).show();
  						$('#modaltambah').modal('show');
  					}
  				}
  			});
  		});
  	})
  	$(document).ready(function() {
  		$('#tomboltambahkelas').click(function(e) {
  			$.ajax({
  				url: "<?= base_url('Kelas/tambah') ?>",
  				dataType: "json",
  				success: function(response) {
  					if (response.sukses) {
  						$('.viewmodalkelas').html(response.sukses).show();
  						$('#modaltambahkelas').modal('show');
  					}
  				}
  			});
  		});
  	})
  </script>
  </body>

  </html>