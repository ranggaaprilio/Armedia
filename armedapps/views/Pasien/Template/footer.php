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
	<script src="<?php echo base_url() ?>assets/js/jquery/jquery-3.2.1.min.js"></script>
	<script src="<?php echo base_url() ?>assets/DataTables/jquery.dataTables.js"></script>
	<script src="<?php echo base_url() . 'assets/Datatables/datatables.js'; ?>"></script>
	<script src="<?php echo base_url() . 'assets/js/sweetalert/sweetalert2.all.min.js'; ?>"></script>
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