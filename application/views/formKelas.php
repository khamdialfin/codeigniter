<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form Tambah Kelas</title>
</head>

<body>
	<center>
		<h1>Form Tambah Kelas</h1>
		<form action="<?= base_url('Kelas/tambahKelas') ?>" method="POST">
			<table>
				<tr>
					<td>Kelas</td>
					<td><input type="number" name="kelas"></td>
				</tr>
				<tr>
					<td>Jurusan</td>
					<td><input type="text" name="jurusan"></td>
				</tr>
				<tr>
					<td></td>
					<td><button type="submit">Simpan</button></td>
				</tr>
			</table>
		</form>
	</center>
</body>

</html>