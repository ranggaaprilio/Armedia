	</div>
	<footer class="page-footer teal">
		<div class="container">
			<div class="row">
				<div class="col l3 s12">
					<h5>Armedia</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur nisi, id eius quisquam perferendis inventore, error fuga quibusdam officiis. Optio doloribus, et ipsam eum unde ad voluptatibus, accusamus modi sequi?</p>
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
	<script src="<?php echo base_url() ?>assets/DataTables/jquery.dataTables.js"></script>
	<script src="<?php echo base_url() . 'assets/DataTables/DataTables-1.10.18/js/dataTables.foundation.min.js'; ?>"></script>
	<script src="<?php echo base_url() . 'assets/js/sweetalert/sweetalert2.all.min.js'; ?>"></script>
	<script>
		new WOW().init();
		//datatable
		$(document).ready(function() {
			$("#table-datatable").dataTable();
		});
		// combo box
		$(document).ready(function(){
   		 $('select').formSelect();
  		});

  		// datepicker
		$(document).ready(function(){
	    $('.datepicker').datepicker({
	    	format:'yyyy-mm-dd'
	   		 });
	  	});
	  	//Sweet Control
			const flashData = $(".flash-data").data("flashdata");
			console.log(flashData);
			if (flashData) {
				Swal({
					title: "Terima kasih",
					text: "Data anda telah " + flashData,
					type: "success"
				});
			}
			
		instance.open();
		instance.close();
		instance.destroy();

		      
	</script>
	</body>
</html>