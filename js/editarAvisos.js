$(document).ready(function() {
 	$('button').click(function() {
    var id = $(this).val();
    var cajaTitulo = "tema~"+id;
    var cajaDetalle = "detalle~"+id;
    var cajaGuardar = 'guardar~'+id;
    if(id.length>0){
      document.getElementById('idAviso').value = id;
      document.getElementById(cajaGuardar).style='block';
      document.getElementById(cajaTitulo).disabled = false;
      document.getElementById(cajaDetalle).disabled = false;
    }
  }
  );
});
