<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kelas</title>
</head>

<body>
    <center>
        <h1>Daftar Kelas SMK N 1 Slawi</h1>
        <table style="margin:20px auto" border="1">
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
                        <?= anchor('Kelas/edit_kelas/' . $row->id_kelas, 'Edit'); ?>
                        <?= anchor('Kelas/hapus/' . $row->id_kelas, 'Hapus'); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </center>
</body>

</html>
