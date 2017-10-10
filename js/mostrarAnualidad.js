$(document).ready(function() {
  $('select').on('change', function() {
    if(this.value>0){
      var idsocio =  this.value;
      $.post('../business/registroAnualidadBusiness.php',{idSocio:idsocio}, function(data){
        var anualidad =  JSON.parse(data);
        document.getElementById('socioId').value = idsocio;
        document.getElementById('fechaPagoAnterior').value = anualidad["pagoanualidadanterior"];

      });
    }
  });
});
