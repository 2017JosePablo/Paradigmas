$(document).ready(function() {
  $('select').on('change', function() {
        $.post('../business/registroAnualidadBusiness.php',{idSocio:this.value}, function(data){
          alert( data);      
        });
    //alert( this.value );
  });
});
