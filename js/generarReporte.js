$(document).ready(function() {
 	$('button').click(function() {

	 	 var cedula = $(this).val();
        if (cedula.length >0) {
            sessionStorage.setItem('socioId', cedula);
            location.href ="reportePagoView.php";
        }
    	}
    );

});

$(document).ready(function() {
  $('select').on('change', function() {
    if(this.value>0){
      alert("Click");
        //document.getElementById('socioId').value = idsocio;
    }
  });
});


function reporteMorosidad() {
  document.getElementById('reporteMorosidad').style="display:block";
  document.getElementById('reporteMorosidadFechas').style="display:none";
  document.getElementById('reporteCanton').style="display:none";
  document.getElementById('reporteRaza').style="display:none";
  document.getElementById('reporteFinca').style="display:none";
  document.getElementById('reporteCerca').style="display:none";
  document.getElementById('reporteHato').style="display:none";
  document.getElementById('reporteExamen').style="display:none";
  document.getElementById('reporteBovinosDistrito').style="display:none";

}
function reporteMorosidadFechas() {
  document.getElementById('reporteMorosidad').style="display:none";
  document.getElementById('reporteMorosidadFechas').style="display:block";
  document.getElementById('reporteCanton').style="display:none";
  document.getElementById('reporteRaza').style="display:none";
  document.getElementById('reporteFinca').style="display:none";
  document.getElementById('reporteCerca').style="display:none";
  document.getElementById('reporteHato').style="display:none";
  document.getElementById('reporteExamen').style="display:none";
  document.getElementById('reporteBovinosDistrito').style="display:none";
}

function reporteRaza() {
  document.getElementById('reporteMorosidad').style="display:none";
  document.getElementById('reporteMorosidadFechas').style="display:none";
  document.getElementById('reporteCanton').style="display:none";
  document.getElementById('reporteRaza').style="display:block";
  document.getElementById('reporteFinca').style="display:none";
  document.getElementById('reporteCerca').style="display:none";
  document.getElementById('reporteHato').style="display:none";
  document.getElementById('reporteExamen').style="display:none";
  document.getElementById('reporteBovinosDistrito').style="display:none";
}
function reporteFinca() {
  document.getElementById('reporteMorosidad').style="display:none";
  document.getElementById('reporteMorosidadFechas').style="display:none";
  document.getElementById('reporteCanton').style="display:none";
  document.getElementById('reporteRaza').style="display:none";
  document.getElementById('reporteFinca').style="display:block";
  document.getElementById('reporteCerca').style="display:none";
  document.getElementById('reporteHato').style="display:none";
  document.getElementById('reporteExamen').style="display:none";
  document.getElementById('reporteBovinosDistrito').style="display:none";
}

function reporteCanton() {
  document.getElementById('reporteMorosidad').style="display:none";
  document.getElementById('reporteMorosidadFechas').style="display:none";
  document.getElementById('reporteCanton').style="display:block";
  document.getElementById('reporteRaza').style="display:none";
  document.getElementById('reporteFinca').style="display:none";
  document.getElementById('reporteCerca').style="display:none";
  document.getElementById('reporteHato').style="display:none";
  document.getElementById('reporteExamen').style="display:none";
  document.getElementById('reporteBovinosDistrito').style="display:none";
}

function reporteCerca() {
  document.getElementById('reporteMorosidad').style="display:none";
  document.getElementById('reporteMorosidadFechas').style="display:none";
  document.getElementById('reporteCanton').style="display:none";
  document.getElementById('reporteRaza').style="display:none";
  document.getElementById('reporteFinca').style="display:none";
  document.getElementById('reporteCerca').style="display:block";
  document.getElementById('reporteHato').style="display:none";
  document.getElementById('reporteExamen').style="display:none";
  document.getElementById('reporteBovinosDistrito').style="display:none";
}

function reporteHato() {
  document.getElementById('reporteMorosidad').style="display:none";
  document.getElementById('reporteMorosidadFechas').style="display:none";
  document.getElementById('reporteCanton').style="display:none";
  document.getElementById('reporteRaza').style="display:none";
  document.getElementById('reporteFinca').style="display:none";
  document.getElementById('reporteCerca').style="display:none";
  document.getElementById('reporteHato').style="display:block";
  document.getElementById('reporteExamen').style="display:none";
  document.getElementById('reporteBovinosDistrito').style="display:none";
}


function reporteExamen() {
  document.getElementById('reporteMorosidad').style="display:none";
  document.getElementById('reporteMorosidadFechas').style="display:none";
  document.getElementById('reporteCanton').style="display:none";
  document.getElementById('reporteRaza').style="display:none";
  document.getElementById('reporteFinca').style="display:none";
  document.getElementById('reporteCerca').style="display:none";
  document.getElementById('reporteHato').style="display:none";
  document.getElementById('reporteExamen').style="display:block";
  document.getElementById('reporteBovinosDistrito').style="display:none";
}
function reporteBovinosDistrito() {
  document.getElementById('reporteMorosidad').style="display:none";
  document.getElementById('reporteMorosidadFechas').style="display:none";
  document.getElementById('reporteCanton').style="display:none";
  document.getElementById('reporteRaza').style="display:none";
  document.getElementById('reporteFinca').style="display:none";
  document.getElementById('reporteCerca').style="display:none";
  document.getElementById('reporteHato').style="display:none";
  document.getElementById('reporteExamen').style="display:none";
  document.getElementById('reporteBovinosDistrito').style="display:block";
}
