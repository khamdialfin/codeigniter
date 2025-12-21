<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Siswa</title>
</head>

<body>
    <center>
        <h1>Form Tambah Siswa</h1>
        <form action="<?= base_url('Kelas/tambahSiswa_aksi') ?>" method="post">
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
                    <td></td>
                    <td><button type="submit">Simpan</button></td>
                </tr>
            </table>
        </form>
    </center>
</body>

</html>
