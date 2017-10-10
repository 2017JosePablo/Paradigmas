$(document).ready(function() {
  $('select').on('change', function() {
    if(this.value>0){
      var idsocio =  this.value;
        document.getElementById('socioId').value = idsocio;

      //  alert(idsocio);
    }
  });
});
