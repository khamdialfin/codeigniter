<body>
    <center>
        <h1>Daftar Kelas SMK N 1 Slawi</h1>
         <?= anchor('FormKelas', '+ Tambah Baru'); ?>
        <table class="table table-sm" id="example2">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nama Kelas</td>
                    <td>Jurusan</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($kelas as $row) : ?>
                <tr>
                    <td><?= $row->id_kelas ?></td>
                    <td><?= $row->kelas ?></td>
                    <td><?= $row->jurusan ?></td>
                    <td>
                        <?= anchor('Kelas/edit_kelas/'. $row->id_kelas, 'Edit'); ?>
                        <?= anchor('Kelas/hapus/'. $row->id_kelas, 'Hapus'); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </center>
</body>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

