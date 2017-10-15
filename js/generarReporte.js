$(document).ready(function() {


 	$('button').click(function() {

	 	 var cedula = $(this).val();
        if (cedula.length >0) {
            sessionStorage.setItem('socioId', cedula);
            sessionStorage.setItem('socioId', cedula);
            location.href ="reportePagoView.php";
        }
    	}
    );

});
