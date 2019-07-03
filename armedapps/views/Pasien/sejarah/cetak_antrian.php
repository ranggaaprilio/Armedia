<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
		<!-- CSS  -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap/bootstrap.css') ?>">
	<link href="<?= base_url() ?>assets/css/custom/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/DataTables/DataTables-1.10.18/css/">
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