<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
</head>

<body>
    <center>
        <h1>Data Siswa SMKN 1 Slawi</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Nomer Telepon</th>
                    <th>Alamat</th>
                    <th>Kelas</th>
                    <th>Jurusan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($siswa as $row) : ?>
                <tr>
                    <td><?= $row->nama ?></td>
                    <td><?= $row->no_telp ?></td>
                    <td><?= $row->alamat ?></td>
                    <td><?= $row->kelas ?></td>
                    <td><?= $row->jurusan ?></td>
                    <td>
                        <?= anchor('Kelas/editSiswa' . $row->id, 'Edit'); ?>
                        <?= anchor('Kelas/hapus_siswa' . $row->id, 'Hapus'); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </center>
</body>

</html>
