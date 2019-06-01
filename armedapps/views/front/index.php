<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Sistem Pelayanan Puskesmas</title>

	<!-- CSS  -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="<?php base_url() ?>assets/css/materialize/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
	<link href="<?php base_url() ?>assets/css/custom/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
	<link rel="stylesheet" href="<?php base_url() ?>assets/vendor/fontawesome-free/css/all.css">
	<link rel="stylesheet" href="<?php base_url() ?>assets/css/animate/animate.css">
</head>

<body>
	<div class="navbar-fixed">
		<nav class="teal darken-1 " role="navigation">
			<div class="nav-wrapper container">
				<a id="logo-container" href="#" class="brand-logo"><img src="<?= base_url() ?>assets/img/logo armedia.png" alt="Logo" width="200" height="65"></a>
				<ul class="right hide-on-med-and-down">
					<li><a class="white-text " href="<?php base_url() ?>"><i class="fas fa-home"></i> Home</a></li>
					<li><a class="white-text" href="#pelayanan"><i class="fas fa-info-circle"></i> Feature</a></li>
					<li><a class="white-text" href="#tentang_kami"><i class="fas fa-building"> </i> About Apps</a></li>
					<li><a class="white-text" href="<?= base_url() ?>auth"><i class="fas fa-sign-in-alt"></i> Sign in</a></li>
				</ul>

				<ul id="nav-mobile" class="sidenav white">
					<li><a href="#">Home</a></li>
					<li><a href="#">Home</a></li>
					<li><a href="#">Pelayanan</a></li>
					<li><a href="#">Tentang Kami</a></li>
					<li><a href="#">Login</a></li>
				</ul>
				<a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
			</div>
		</nav>
	</div>

	<div class="fixed-action-btn">
		<a class="btn-floating btn-large red">
			<i class="large fas fa-comments"></i>
		</a>
		<ul>
			<li><a class="btn-floating red"><i class="fas fa-phone"></i></a></li>
			<li><a class="btn-floating yellow darken-1"><i class="fas fa-map-marker-alt"></i></a></li>
			<li><a class="btn-floating green"><i class="fas fa-at"></i></a></li>
			<li><a class="btn-floating blue"><i class="fab fa-whatsapp"></i></a></li>
		</ul>
	</div>

	<div id="index-banner" class="parallax-container" id="home">
		<div class="section no-pad-bot">
			<div class="container">
				<br><br>
				<h2 class="header center white-text  wow jackInTheBox ">Selamat Datang Di Aplikasi ARMEDIA</h2>
				<div class="row center">
					<h5 class="header col s12 white-text wow zoomInUp">Rekam Medis dan Diagnosa Pasien</h5>
				</div>

				<br><br>

			</div>
		</div>
		<div class="parallax"><img src="<?= base_url() ?>assets/img/back-ori.jpg" alt="Gambar Tidak dapat dibuka"></div>
	</div>

	<div class="progress" id="pelayanan">
		<div class="indeterminate"></div>
	</div>


	<div class="container">
		<div class="section">

			<!--   Icon Section   -->
			<div class="row">
				<div class="col s12 m4">
					<div class="icon-block">

						<h2 class="center brown-text animated infinite flash delay-2s"><i class="fas fa-bolt"></i></h2>
						<h5 class="center wow fadeInUp" data-wow-delay="1s">Pelayanan Yang cepat</h5>

						<p class="light wow fadeInUp" data-wow-delay="1s">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil,
							autem. Voluptate iste, quae aliquid nam ex voluptatum illo tempore, obcaecati molestiae, iusto harum delectus
							dolorem dignissimos sapiente sit esse nesciunt.</p>

					</div>
				</div>

				<div class="col s12 m4">
					<div class="icon-block">
						<h2 class="center brown-text animated infinite flash delay-2s"><i class="fas fa-bed"></i></h2>
						<h5 class="center wow fadeInUp" data-wow-delay="2s">Riwayat Medis</h5>

						<p class="light wow fadeInUp" data-wow-delay="2s">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
							Explicabo fuga autem, dolore porro optio voluptatibus voluptate officiis suscipit? Eum sit maiores quod officia
							eius rerum possimus nulla quas earum. Perspiciatis!</p>
					</div>
				</div>

				<div class="col s12 m4">
					<div class="icon-block">
						<h2 class="center brown-text animated infinite flash delay-2s"><i class="fas fa-medkit"></i></h2>
						<h5 class="center wow fadeInUp" data-wow-delay="3s">Daftar Obat</h5>

						<p class="light wow fadeInUp" data-wow-delay="3s">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eum
							aut provident sint ipsum quia velit nostrum quis dolorem tenetur consequuntur, at harum nobis ex tempore
							accusamus? Ducimus temporibus expedita aperiam? </p>
					</div>
				</div>
			</div>

		</div>
	</div>


	<div class="parallax-container valign-wrapper">
		<div class="section no-pad-bot">
			<div class="container" id="tentang_kami">
				<div class="row center">
					<h1 class="header col s12 light">Kami Bangga Melayani Anda</h1>
				</div>
			</div>
		</div>
		<div class="parallax"><img src="<?= base_url() ?>assets/img/images1.jpg" alt="UnGambar Tidak dapat dibuka"></div>
	</div>

	<div class="container">
		<div class="section">

			<div class="row">
				<div class="col s12 center">
					<h3><i class="mdi-content-send brown-text"></i></h3>
					<h4>Tentang Aplikasi</h4>
					<p class="left-align light wow slideInUp">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam
						scelerisque id nunc
						nec volutpat. Etiam pellentesque tristique arcu, non consequat magna fermentum ac. Cras ut ultricies eros.
						Maecenas eros justo, ullamcorper a sapien id, viverra ultrices eros. Morbi sem neque, posuere et pretium eget,
						bibendum sollicitudin lacus. Aliquam eleifend sollicitudin diam, eu mattis nisl maximus sed. Nulla imperdiet
						semper molestie. Morbi massa odio, condimentum sed ipsum ac, gravida ultrices erat. Nullam eget dignissim mauris,
						non tristique erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>
				</div>
			</div>

		</div>
	</div>


	<div class="parallax-container valign-wrapper">
		<div class="section no-pad-bot">
			<div class="container">
				<div class="row center">
					<h4 class="header col s12 black-text  wow rollIn">Terimakasih,Anda Telah Menggunakan Fasilitas Ini</h4>
				</div>
			</div>
		</div>
		<div class="parallax"><img src="<?= base_url() ?>assets/img/last.jpg" alt="Gambar Tidak dapat dibuka"></div>
	</div>

	<footer class="page-footer teal">
		<div class="container">
			<div class="row">
				<div class="col l3 s12">
					<img src="<?= base_url() ?>assets/img/rangga.png" alt="" class="circle responsive-img" alt="Gambar Tidak dapat dibuka">



				</div>
				<div class="col l3 s12">

				</div>
				<div class="col l6 s13">
					<h5 class="white-text">Company Bio</h5>
					<p class="grey-text text-lighten-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat deleniti
						libero dignissimos magni nesciunt, sint, quidem, porro quod neque deserunt quae. Ratione modi et cumque molestiae
						incidunt quo ab maxime!</p>
				</div>

			</div>
		</div>
		<div class="footer-copyright">
			<div class="container">
				Developed by <b>Rangga Aprilio Utama</b>
			</div>
		</div>
	</footer>


	<!--  Scripts-->

	<script src="<?php base_url() ?>assets/js/jquery/jquery-3.2.1.min.js"></script>
	<script src="<?php base_url() ?>assets/js/materialize/materialize.js"></script>
	<script src="<?php base_url() ?>assets/js/custom/init.js"></script>
	<script src="<?php base_url() ?>assets/vendor/wow/dist/wow.min.js"></script>
	<script>
		new WOW().init();
		//  floating button inisialisasi
		$(document).ready(function() {
			$('.fixed-action-btn').floatingActionButton();
		});
		instance.open();
		instance.close();
		instance.destroy();
	</script>


</body>

</html>