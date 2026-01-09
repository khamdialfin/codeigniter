<div class="card">
    <div class="p-2 d-flex justify-content-between border">
        <h4 class="h5">Daftar Kelas</h4>
        <div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary"
                id="tomboltambahkelas">
                <i class="fas fa-plus"></i>
                Tambah Kelas
            </button>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-striped table-bordered" class="display nowrap" id="example2">
            <thead>
                <tr class="text-center">
                    <th>ID</th>
                    <th>Nama Kelas</th>
                    <th>Jurusan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($kelas as $row) : ?>
                <tr class="text-center">
                    <td><?= $row->id_kelas ?></td>
                    <td><?= $row->kelas ?></td>
                    <td><?= $row->jurusan ?></td>
                    <td>
                        <a href="<?= base_url('Kelas/edit_kelas/' . $row->id_kelas); ?>"
                            class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="<?= base_url('Kelas/hapus/' . $row->id_kelas); ?>" class="btn btn-danger btn-sm"><i
                                class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="viewmodalkelas" style="display: none;"></div>
