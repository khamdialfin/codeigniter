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
		<table border="1">
			<thead>
				<tr>
					<td>ID</td>
					<td>Nama Kelas</td>
					<td>Jurusan</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($kelas as $row) : ?>
					<tr>
						<td><?= $row->id_kelas ?></td>
						<td><?= $row->kelas ?></td>
						<td><?= $row->jurusan ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</center>
</body>

</html>