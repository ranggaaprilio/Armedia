<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Sistem Pelayanan Armedia</title>

	<!-- CSS  -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="<?= base_url() ?>assets/css/materialize/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
	<link href="<?= base_url() ?>assets/css/custom/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/animate/animate.css">
</head>

<body>
	<div class="navbar-fixed">
		<nav class="teal darken-1 " role="navigation">
			<div class="nav-wrapper container">
				<a id="logo-container" href="#" class="brand-logo"><img src="<?= base_url() ?>assets/img/logo armedia.png" alt="Logo" width="200" height="65"></a>
				<ul class="right hide-on-med-and-down">
					<li><a class="white-text " href="<?= base_url() ?>"><i class="fas fa-home"></i> Home</a></li>
					<li><a class="white-text" href="#pelayanan"><i class="fas fa-info-circle"></i> Feature</a></li>
					<li><a class="white-text" href="#tentang_kami"><i class="fas fa-building"> </i> About Apps</a></li>
					<li><a class="white-text" href="<?= base_url() ?>application/regist"><i class="fas fa-clipboard-list"></i> Register</a></li>
					<li><a class="white-text" href="<?= base_url() ?>auth"><i class="fas fa-sign-in-alt"></i> Sign in</a></li>
				</ul>

				<ul id="nav-mobile" class="sidenav white">
					<li><a href="#">Home</a></li>
					<li><a href="#">Pelayanan</a></li>
					<li><a href="#">Tentang Kami</a></li>
					<li><a href="#">Login</a></li>
				</ul>
				<a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
			</div>
		</nav>
	</div>
<div class="container">
	<div class="row">
    <div class="col s12 m12">
      <div class="card white darken-1">
        <div class="card-content black-text">
          <span class="card-title">Registrasi</span>
         <div class="row">
		    <form class="col s12">
		      <div class="row">
		        <div class="input-field col s6">
		          <i class="material-icons prefix">account_circle</i>
		          <input id="icon_prefix" type="text" class="validate">
		          <label for="icon_prefix">Nama Lengkap</label>
		        </div>
		        <div class="input-field col s6">
		          <i class="material-icons prefix">card_membership</i>
		          <input id="icon_telephone" type="tel" class="validate">
		          <label for="icon_telephone">Nomor KTP</label>
		        </div>
		         <div class="input-field col s6">
		          <i class="material-icons prefix">location_city</i>
		          <input id="icon_telephone" type="tel" class="validate">
		          <label for="icon_telephone">Tempat Lahir</label>
		        </div>
		         <div class="input-field col s6">
		         <input type="text" class="datepicker">
		          <label>Tanggal Lahir</label>
		        </div>
		         <div class="input-field col s6">
		          <i class="material-icons prefix">contact_phone</i>
		          <input id="icon_telephone" type="tel" class="validate">
		          <label for="icon_telephone">Telepon</label>
		        </div>
		         <div class="input-field col s6">
		          <i class="material-icons prefix">location_on</i>
		          <input id="icon_telephone" type="tel" class="validate">
		          <label for="icon_telephone">Alamat</label>
		        </div>
		         <div class="input-field col s6">
		          <i class="material-icons prefix">person_pin</i>
		          <input id="icon_telephone" type="tel" class="validate">
		          <label for="icon_telephone">Penanggung Jawab</label>
		        </div>
		         <div class="input-field col s6">
		          <i class="material-icons prefix">email</i>
		          <input id="icon_telephone" type="tel" class="validate">
		          <label for="icon_telephone">Email</label>
		        </div>
		         <div class="input-field col s6">
		          <i class="material-icons prefix">edit</i>
		          <input id="icon_telephone" type="password" class="validate">
		          <label for="icon_telephone">Password</label>
		        </div>
		         <div class="input-field col s6">
		          <i class="material-icons prefix">edit</i>
		          <input id="icon_telephone" type="password" class="validate">
		          <label for="icon_telephone">Re-type Password</label>
		        </div>
		      </div>
		    </form>
		  </div>
        
        </div>
        <div class="card-action">
          <a href="#">This is a link</a>
          <a href="#">This is a link</a>
        </div>
      </div>
    </div>
  </div>

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

	<script src="<?= base_url() ?>assets/js/jquery/jquery-3.2.1.min.js"></script>
	<script src="<?= base_url() ?>assets/js/materialize/materialize.js"></script>
	<script src="<?= base_url() ?>assets/js/custom/init.js"></script>
	<script src="<?= base_url() ?>assets/vendor/wow/dist/wow.min.js"></script>
	<script>
		new WOW().init();
		//  floating button inisialisasi
		$(document).ready(function() {
			$('.fixed-action-btn').floatingActionButton();
		});

		// datepicker
		$(document).ready(function(){
	    $('.datepicker').datepicker({
	    	format:'yyyy-mm-dd'
	   		 });
	  	});
		instance.open();
		instance.close();
		instance.destroy();
	</script>


</body>

</html>