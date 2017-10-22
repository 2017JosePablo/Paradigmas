$(document).ready(function() {
 	$('button').click(function() {
	 	 var id = $(this).val();
     //alert(id);
        document.getElementById('cedulaResponsableAnualidad').value = id;
    	}
    );

});
