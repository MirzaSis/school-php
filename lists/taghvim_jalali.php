	<link type="text/css" rel="stylesheet" href="../node_modules/vazir-font/dist/font-face.css" />
	<link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css" />
	<link type="text/css" rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css" />

	<link type="text/css" rel="stylesheet" href="../dist/kamadatepicker.min.css" />

	<script src="../node_modules/jquery/dist/jquery.min.js"></script>
	<script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

	<script src="../dist/kamadatepicker.min.js"></script>
	<script src="../dist/kamadatepicker.holidays.js"></script>

	<style>
		body {
			font-family: Vazir;
		}

		.rtl-col {
			float: right;
		}

		#bd-next-date2,
		#bd-prev-date2 {
			font-size: 20px;
		}

		.tooltip>.tooltip-inner {
			font-family: Vazir;
			font-size: 12px;
			padding: 4px;
			white-space: pre;
			max-width: none;
		}

		#options-table {
			border-collapse: collapse;
			width: 100%;
		}

		#options-table td,
		#options-table th {
			border: 1px solid #777;
			text-align: left;
			padding: 8px;
		}

		#options-table tr:nth-child(even) {
			background-color: #dddddd;
		}

		#options-table td:nth-child(1) {
			text-align: right;
		}
	</style>

	
			<input hidden="" type="text" id="date2">
			
<div class="row m-0">
<div class="col-sm-7">
		<div dir="ltr" class="input-group">
			<input name="day_date" class="form-control" type="text" id="date3">
			<label class="input-group-text">تاریخ</label>
	    </div>

</div></div>

	

	


	

	<script>
		kamaDatepicker('date1', { buttonsColor: "red" });

		var customOptions = {
			placeholder: "روز / ماه / سال"
			, twodigit: false
			, closeAfterSelect: false
			, nextButtonIcon: "fa fa-arrow-circle-right"
			, previousButtonIcon: "fa fa-arrow-circle-left"
			, buttonsColor: "blue"
			, forceFarsiDigits: true
			, markToday: true
			, markHolidays: true
			, highlightSelectedDay: true
			, sync: true
			, gotoToday: true
		}

		kamaDatepicker('date3', {
			nextButtonIcon: "assets/timeir_prev.png"
			, previousButtonIcon: "assets/timeir_next.png"
			, forceFarsiDigits: true
			, markToday: true
			, markHolidays: true
			, highlightSelectedDay: true
			, sync: true
			, pastYearsCount: 1
			, futureYearsCount: 10
			, swapNextPrev: true
			, holidays: HOLIDAYS // from kamadatepicker.holidays.js
			, disableHolidays: true
			, gotoToday: true
		});



		// for testing sync functionallity
		$("#date3");

		// init without ids inputs
		document.querySelectorAll('#without-ids input').forEach(input => { kamaDatepicker(input); });
	</script>
