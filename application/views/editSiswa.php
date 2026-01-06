<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form Edit Siswa</title>
</head>

<body>
	<center>
		<h1>Form Edit Siswa</h1>
		<?php foreach ($siswa as $row): ?>
			<form action="<?= base_url('Siswa/update_siswa') ?>" method="post">
				<table>
					<td><input type="hidden" name="id" value="<?= $row->id ?>"></td>
					<tr>
						<td>Nama</td>
						<td><input type="text" name="nama" value="<?= $row->nama ?>"></td>
					</tr>
					<tr>
						<td>No Telepon</td>
						<td><input type="tel" name="no_telp" value="<?= $row->no_telp ?>"></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td><input type="text" name="alamat" value="<?= $row->alamat ?>"></td>
					</tr>
					<tr>
						<td>Kelas</td>
						<td>
							<select name="id_kelas" id="" value="<?= $row->id_kelas ?>" required>
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
		<?php endforeach; ?>
	</center>
</body>

</html>