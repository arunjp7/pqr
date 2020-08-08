// Save pqr form step by step jquery 

// create file by N.S.Arujayaprakash

$(document).ready(function(){

	$('#btnCompanyDetails').on('click', function(){

		alert('Company Details block');
		var pqr_no = $('#pqr_no').val();
		var inspection_date = $('#inspection_date').val();
		var wps_no = $('#wps_no').val();
		var process1 = $('#process1').val();
		var process2 = $('#process2').val();
		var process3 = $('#process3').val();
		var type_id = $('#type_id').val();
		var code_id = $('#code_id').val();
		var pqr_other = $('#pqr_other').val();
		var valid = 1;


		
		pqr_no == ''?$('#pqr_no').addClass('invalid'):$('#pqr_no').removeClass('invalid');
		inspection_date == ''?$('#inspection_date').addClass('invalid'):$('#inspection_date').removeClass('invalid');
		wps_no == ''?$('#wps_no').addClass('invalid'):$('#wps_no').removeClass('invalid');
		process1 == ''?$('#process1').addClass('invalid'):$('#process1').removeClass('invalid');
		type_id == ''?$('#type_id').addClass('invalid'):$('#type_id').removeClass('invalid');
		code_id == ''?$('#code_id').addClass('invalid'):$('#code_id').removeClass('invalid');
		
	});
});