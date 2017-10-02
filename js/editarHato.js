
$(document).ready(function() {

    $('button').click(function() {

    	var cedula = $(this).val();


    	if(cedula.length>0){

            var result = cedula.split('-');

            if(result[1] == 'Ver'){

                document.getElementById('cajaHato').style='display:block';


/*  
                document.getElementById("terneros").readOnly = true; 
                document.getElementById("terneras").readOnly = true; 
                document.getElementById("novillos").readOnly = true; 
                document.getElementById("novillas").readOnly = true; 
                document.getElementById("novillaspregnadas").readOnly = true; 
                document.getElementById("torosServicio").readOnly = true; 
                document.getElementById("torosEngorde").readOnly = true; 
                document.getElementById("vacasCria").readOnly = true; 
                document.getElementById("vacasEngorde").readOnly = true;
*/
                $.post('../business/hatoAction.php',{idSocio:result[0]}, function(temporal){

                    var array = JSON.stringify(temporal);
                   // alert(JSON.stringify(temporal));
                    alert(array["socioid"]);

                /*    document.getElementById("terneros").value = array['']; 
                    document.getElementById("terneras").value = array['']; 
                    document.getElementById("novillos").value = array['']; 
                    document.getElementById("novillas").value = array['']; 
                    document.getElementById("novillaspregnadas").value = array['']; 
                    document.getElementById("torosServicio").value = array['']; 
                    document.getElementById("torosEngorde").value = array['']; 
                    document.getElementById("vacasCria").value = array['']; 
                    document.getElementById("vacasEngorde").value = array[''];
                    */

                    
                }); 

            }else if(result[1]=='Mod'){
                alert('Mod');
                
                document.getElementById('cajaRazas').style='display:block';


                document.getElementById("terneros").readOnly = false; 
                document.getElementById("terneras").readOnly = false; 
                document.getElementById("novillos").readOnly = false; 
                document.getElementById("novillas").readOnly = false; 
                document.getElementById("novillaspregnadas").readOnly = false; 
                document.getElementById("torosServicio").readOnly = false; 
                document.getElementById("torosEngorde").readOnly = false; 
                document.getElementById("vacasCria").readOnly = false; 
                document.getElementById("vacasEngorde").readOnly = false;




            }else if(result[1]=='Reg'){
                alert('Reg');
                document.getElementById('cajaRazas').style='display:block';



                document.getElementById("terneros").readOnly = false; 
                document.getElementById("terneras").readOnly = false; 
                document.getElementById("novillos").readOnly = false; 
                document.getElementById("novillas").readOnly = false; 
                document.getElementById("novillaspregnadas").readOnly = false; 
                document.getElementById("torosServicio").readOnly = false; 
                document.getElementById("torosEngorde").readOnly = false; 
                document.getElementById("vacasCria").readOnly = false; 
                document.getElementById("vacasEngorde").readOnly = false;
            }

        } 


    });
});
