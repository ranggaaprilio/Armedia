</div>
<!-- ============================================================== -->
<!-- end wrapper  -->
<!-- ============================================================== -->
</div>

<script src="<?php echo base_url() ?>assets/js/jquery/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url() ?>assets/DataTables/jquery.dataTables.js"></script>
<script src="<?php echo base_url() ?>assets/js/popper/popper.min.js"></script>
<script src="<?php echo base_url() . 'assets/Datatables/datatables.js'; ?>"></script>
<script src="<?php echo base_url() . 'assets/vendor/datepicker/datepicker.js'; ?>"></script>
<script src="<?php echo base_url() . 'assets/vendor/datepicker/moment.js'; ?>"></script>
<script src="<?php echo base_url() . 'assets/vendor/datepicker/tempusdominus-bootstrap-4.js'; ?>"></script>
<script src="<?php echo base_url() . 'assets/js/sweetalert/sweetalert2.all.min.js'; ?>"></script>


<script type="text/javascript">
	//datatable
	$(document).ready(function() {
		$("#table-datatable").dataTable();
	});

	//datepicker
	if ($("#datetimepicker33").length) {
		$("#datetimepicker33").datetimepicker({
			format: "LT"
		});
	}
	//Sweet Control
	const flashData = $(".flash-data").data("flashdata");

	if (flashData) {
		Swal({
			title: "Good Job!",
			text: "Data Berhasil " + flashData,
			type: "success"
		});
	}

	const flashError = $(".flash-error").data("flasherror");


	if (flashError) {
		Swal({
			title: "Oops...! Ada Yang Salah",
			text: "Sepertinya " + flashError,
			type: "error"

		});
	}
</script>
<!-- slimscroll js -->
<!--  <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script> -->
<!-- main js -->
<!--  <script src="assets/libs/js/main-js.js"></script>
    
    <script src="assets/libs/js/dashboard-ecommerce.js"></script> -->