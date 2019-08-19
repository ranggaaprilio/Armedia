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
<script src="<?php echo base_url() . 'assets/DataTables/Buttons-1.5.4/js/buttons.bootstrap4.min.js'; ?>"></script>
<script src="<?php echo base_url() . 'assets/DataTables/Buttons-1.5.4/js/buttons.html5.js'; ?>"></script>

<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php base_url() ?>assets/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
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


	//print pdf
	$(document).ready(function() {
		$('#example').DataTable({
			paging: false,
			searching: false,
			dom: 'Bfrtip',
			buttons: [

				{
					extend: 'pdf',
					orientation: 'potrait',
					pageSize: 'A4',
					text: 'Print to PDF'
				}


			]

		});
	});

	//datepicker
	if ($("#datetimepicker44").length) {
		$("#datetimepicker44").datetimepicker({
			format: "L"
		});
	}
</script>