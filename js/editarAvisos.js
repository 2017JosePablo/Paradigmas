$(document).ready(function() {
 	$('button').click(function() {
    var id = $(this).val();
    if(id.length>0){
      alert(id);
    }
  }
  );
});
