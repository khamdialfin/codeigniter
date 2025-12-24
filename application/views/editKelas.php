<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form Edit Kelas</title>
</head>

<body>
	<center>
		<h1>Form Edit Kelas</h1>
		<?php foreach($kelas as $row):  ?>
			<form action="<?= base_url('Kelas/update_kelas') ?>" method="POST">
				<table>
					<td><input type="hidden" name="id_kelas" value="<?= $row->id_kelas ?>"></td>
					<tr>
						<td>Kelas</td>
						<td><input type="number" name="kelas" value="<?= $row->kelas ?>"></td>
					</tr>
					<tr>
						<td>Jurusan</td>
						<td><input type="text" name="jurusan" value="<?= $row->jurusan ?>"></td>
					</tr>
					<tr>
						<td></td>
						<td><button type="submit" value="Simpan">Simpan</button></td>
					</tr>
				</table>
			</form>
		<?php endforeach; ?>
	</center>
</body>

</html>