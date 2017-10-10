$.post('../business/registroAnualidadBusiness.php', {socioId:result[0]}, function(data){
      
       document.getElementById("cedula").value = result[0];
   }
});
