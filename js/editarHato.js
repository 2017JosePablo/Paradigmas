
$(document).ready(function() {

    $('button').click(function() {

    	var cedula = $(this).val();


    	if(cedula.length>0){

            var result = cedula.split('-');

            if(result[1] == 'Ver'){
                document.getElementById('btnSubmit').style='display:none';
                document.getElementById('cajaHato').style='display:block';
                document.getElementById('cajaRazas').style='display:none';
                
                document.getElementById('cajaListaRazas').style='display:block';

                document.getElementById("terneros").readOnly = true; 
                document.getElementById("terneras").readOnly = true; 
                document.getElementById("novillos").readOnly = true; 
                document.getElementById("novillas").readOnly = true; 
                document.getElementById("novillaspregnadas").readOnly = true; 
                document.getElementById("torosServicio").readOnly = true; 
                document.getElementById("torosEngorde").readOnly = true; 
                document.getElementById("vacasCria").readOnly = true; 
                document.getElementById("vacasEngorde").readOnly = true;

                $.post('../business/hatoAction.php',{idSocio:result[0]}, function(data){
                    //alert(data);
                    
                    var array = JSON.parse(data);
                    document.getElementById("terneros").value = array['hatoternero']; 
                    document.getElementById("terneras").value = array['hatoternera']; 
                    document.getElementById("novillos").value = array['hatono']; 
                    document.getElementById("novillas").value = array['hatonovilla']; 
                    document.getElementById("novillaspregnadas").value = array['hatonovillaprenada']; 
                    document.getElementById("torosServicio").value = array['hatotoroservicio']; 
                    document.getElementById("torosEngorde").value = array['hatotoroengorde']; 
                    document.getElementById("vacasCria").value = array['hatovacacria']; 
                    document.getElementById("vacasEngorde").value = array['hatovacaengorde'];
                    //"socioid""hatoraza"=>$row["hatoraza"]["hatotoroservicio"],"hatotoroservicio"=>$row["hatovacacria"],"hatovacaengorde"=>$row["hatovacaengorde"]];
                    
                    var tipoRazas = array['hatoraza'].split(',');

                    var lista = "<ol>";
                    for(var i = 0 ; i < tipoRazas.length-1;i++){
                        lista+="<li>"+tipoRazas[i]+"</li>";
                    }
                    lista+="</ol>";


                    document.getElementById('listadoRazas').innerHTML = lista;

                    //var checkboxes = document.getElementById("frm").checkbox;
                   // alert('Cantidad de chexbox'+checkboxes.length);
    /*
                    for (var x=0; x < checkboxes.length; x++) {
                        if (checkboxes[x].checked) {

                    //tipoCerca += $("input:checkbox[id="+(x+1)+"]").val()+'-';
                            tipoCerca+=x+'-';
                            validar = 1;
                 
                        }
                    }

*/

                }); 

            }else if(result[1]=='Mod'){

                document.getElementById('socioId').value = result[0];

                document.getElementById('cajaListaRazas').style='display:none';
                
                document.getElementById('cajaRazas').style='display:block';
                document.getElementById('cajaHato').style='display:block';
                document.getElementById('btnSubmit').style='display:block';
                document.getElementById("terneros").readOnly = false; 
                document.getElementById("terneras").readOnly = false; 
                document.getElementById("novillos").readOnly = false; 
                document.getElementById("novillas").readOnly = false; 
                document.getElementById("novillaspregnadas").readOnly = false; 
                document.getElementById("torosServicio").readOnly = false; 
                document.getElementById("torosEngorde").readOnly = false; 
                document.getElementById("vacasCria").readOnly = false; 
                document.getElementById("vacasEngorde").readOnly = false;

                $.post('../business/hatoAction.php',{idSocioModificar:result[0]}, function(data){  
                    var array = JSON.parse(data);
                    document.getElementById("terneros").value = array['hatoternero']; 
                    document.getElementById("terneras").value = array['hatoternera']; 
                    document.getElementById("novillos").value = array['hatono']; 
                    document.getElementById("novillas").value = array['hatonovilla']; 
                    document.getElementById("novillaspregnadas").value = array['hatonovillaprenada']; 
                    document.getElementById("torosServicio").value = array['hatotoroservicio']; 
                    document.getElementById("torosEngorde").value = array['hatotoroengorde']; 
                    document.getElementById("vacasCria").value = array['hatovacacria']; 
                    document.getElementById("vacasEngorde").value = array['hatovacaengorde'];
                    //"socioid""hatoraza"=>$row["hatoraza"]["hatotoroservicio"],"hatotoroservicio"=>$row["hatovacacria"],"hatovacaengorde"=>$row["hatovacaengorde"]];
                    var razas = array['hatoraza'].split(',');
                    
                    var checkboxes = document.getElementById("frm").checkbox;

                    $(document.getElementById("frm").checkbox).removeAttr('checked');
                    //$(checkboxes[0]).attr('checked',true);
                    

                    for(var i = 0 ; i < razas.length;i++){
                        //
                        $(checkboxes[razas[i]-1]).attr('checked',true);
                    }

                         
                

    
                });
                

            }else if(result[1]=='Reg'){
                document.getElementById('cajaListaRazas').style='display:none';
                document.getElementById('cajaRazas').style='display:block';

                document.getElementById('socioId').value = result[0];



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
