<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<div class="card">
  <div class="card-body">
    <h1 align="center">Kartu Antrian Armedia</h1>
	<br>
	<h4>No Rawat:<?php echo $antrian->no_rawat ?></h4>
	<hr>
	<table border="2" >
		<tr>
			<td colspan="2">Data Pendaftaran</td>
		</tr>
		<tr>
			<td width="400">
				No Antrian
			</td>
			<td>
				<?php echo $antrian->no_registrasi ?>
			</td>
		</tr>
		<tr>
			<td>
				Tanggal Pemeriksaan
			</td>
			<td>
				<?php echo $antrian->tanggal_daftar ?>
			</td>
		</tr>
		<tr>
			<td>
				No Rekamedis
			</td>
			<td>
				<?php echo $antrian->no_rekamedis ?>
			</td>
		</tr>
		<tr>
			<td>
				ID Dokter
			</td>
			<td>
				<?php echo $antrian->id_dokter ?>
			</td>
		</tr>
		<tr>
			<td>
				Kategori
			</td>
			<td>
				<?php echo $antrian->kategori ?>
			</td>
		</tr>
	</table>

	<footer>
		<p align="center">Armedia Selalu Bersama Anda</p>
	</footer>
  </div>
</div>
</body>
</html>