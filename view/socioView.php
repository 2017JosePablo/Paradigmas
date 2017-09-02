
<?php
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Area Administrativa de Socios</title>
	<link rel="stylesheet" href="">

    <link rel="stylesheet" type="text/css" href="../css/diseno.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script type="text/javascript">



   
        function loadSocio(socio) {
            alert(socio);

        /*
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert("Aqui estoy");
                document.getElementById("txtHint").innerHTML = this.responseText;


            }
        };
        xmlhttp.open("post", "../business/juntaAction.php?idUpdate="+idjunta, true);
        xmlhttp.send();
        */
        }



                    


     
        




            function provinciaSeleccionada(){
                var valor = document.getElementById("listaProvincias") .value ;
                if(valor != -1){
                    llenarCantones(valor);  
                    document.getElementById("provincia").value = valor;      
                }else{
                    var html = "<select class='form-control' id = 'listaProvincias' onclick='llenarCantones()'><option>Seleccione Una Provincia</option></select>";
                            $('#cajaProvincias').html(html);
                }
            
            }



             function llenarCantones(valor){
                var valor = document.getElementById("listaProvincias") .value ;
               if(valor >0){
                $.ajax({
                        dataType: "json",
                        url: "https://ubicaciones.paginasweb.cr/provincia/"+valor+"/cantones.json",
                        data: {},
                        success: function (data) {
                            var html = "<select class='form-control' id='listadoCantones' name = 'listadoCantones'  onclick=setDistrito() >";
                             for(key in data) {
                                html += "<option value='"+key+"'>"+data[key]+"</option>";
                            }
                            
                            html += "</select>";
                            $('#cajaCantones').html(html);
                        }
                    });
                
                }else{
                    var html = "<select class='form-control'  onclick=setDistrito()  ><option>Seleccione Un Canton</option></select>";
                            $('#cajaCantones').html(html);
                }
            }
            function setDistrito(){
                var valorCantones = document.getElementById("listadoCantones") .value ;
                document.getElementById("canton").value = valorCantones;
               var valor = document.getElementById("listaProvincias") .value ;
               if(valor >0){
                $.ajax({
                        dataType: "json",
                     
                        url: "https://ubicaciones.paginasweb.cr/provincia/"+valor+"/canton/"+valorCantones+"/distritos.json",

                        data: {},
                        success: function (data) {
                            var html = "<select class='form-control' id='listadoDistritos' name = 'listadoDistritos'  >";
                         
                            for(key in data) {

                                html += "<option value='"+key+"'>"+data[key]+"</option>";
                            }
                            html += "</select>";
                            $('#listaDistrito').html(html);
                        }
                    });
                }else{
                    var html = "<select class='form-control'><option value = '0' >Seleccione Un Distrito</option></select>";
                             $('#listaDistrito').html(html);        
                }
           }

            function cargarValores(){
              document.getElementById("distrito").value =document.getElementById('listadoDistritos').options[document.getElementById('listadoDistritos').selectedIndex].value;
              document.getElementById("fech").value = document.getElementById("fecha").value;

            }

            function validar(){
                var todo_correcto = true;  
                if(document.getElementById("listaProvincias").value <0){
                     todo_correcto = false;
                }

                if (!todo_correcto) {
                    alert('Seleccione una Provincia'+document.getElementById("listaProvincias").value );    
                }
                    return todo_correcto;
                
            }
            function mostrarFormularioSocio(){
                document.getElementById("cajaFormulario").style.display='block';
                document.getElementById("btnModificar").style.display='none';
                document.getElementById("btnAgregar").style.display='block';
                document.getElementById("frm").reset(); 
                $("input:radio").removeAttr("checked");
                $('#1-actividad').attr('checked',true);
                $('#1-tipo').attr('checked',true);
                $('#1-estado').attr('checked',true);
            }




        </script>

   
</head>
<body>


<?php
    if (isset('error')) {
        if ($GET_['userexits']) {
            echo "<p style='color:blue'> El Socio a ingresar ya esta registrado!</p>";
        }
    }
    
?>





<div id="mostrarInformacion" style="background: red">

</div>

<input type="hidden" id="provincia" name="socioprovincia" value="">
<input type="hidden" id="canton" name="sociocanton" value="">
<input type="hidden" id="distrito" name="sociodistrito" value="">



  <!-- <form method="post" enctype="multipart/form-data" action="../business/socioAction.php"> -->
    <?php
 
    include '../business/socioBusiness.php';


    $socioBusiness = new socioBusiness();
    $socios = $socioBusiness->obtenerTodosTBSocio();


    echo '<table> <tr><td>Cedula</td>  <td>Nombre</td><td>Primer Apellido</td><td>Segundo Apellido</td><td>Telefono</td><td>Correo</td> <td>Fecha de ingreso</td> <td colspan="2">Acciones</td> </tr>';

    foreach ($socios as $current) {     
        echo '<tr>';
        echo '<td> '.$current->getCedula() . ' </td>';
        echo '<td> '.$current->getNombre().'</td>';
        echo '<td> '.$current->getPrimerApellido() .' </td>';
        echo '<td> '.$current->getSegundoApellido().' </td>';
        echo '<td> '.$current->getTelMovil().'</td>';
        echo '<td> '.$current->getCorreo().'</td>';
        echo '<td> '.$current->getFechaIngreso().'</td>';


        //echo '<td> <a href="../business/socioAction.php?ideliminar='.$current->getCedula().'"> Eliminar</a> </td>';
        echo "<td> <button type='submit' id='modificar-submit' value='".$current->getCedula()."'>Modificar</button></td>";
        //echo '<td> <a href=""> Eliminar</a> </td>';
        //echo '<td> <a href=""> Modificar</a> </td>';
        echo '</tr>';
    }
    echo '</table>';

             //name='.$current->getIdTBJunta().'
    ?>

            
    <!--  </form> -->

    <button type = "reset" onclick="mostrarFormularioSocio()"> Agregar Nuevo Socio</button>


  
    <div id="cajaFormulario"  style='display:none;'>

    <form id= "frm" method="post" onsubmit="return validar()" action="../business/socioAction.php">



        
         <p>Datos personales:</p>

             <table>
                <tr>
                    <td>
                        Cedula
                    </td>


                    <td>
                        Nombre
                    </td>

                    <td>
                        Primer Apellido
                    </td>

                    <td>
                        Segundo Apellido
                    </td>


                    <td>
                        Telefono Movil
                    </td>

                    <td>
                        Correo
                    </td>
                </tr>
               

                <tr>
                    <td>
                        <input type="text" name="sociocedula" id="sociocedula"  required>
                    </td>
                    <td>
                        <input type="text" name="socionombre" id="socionombre"  required>
                    </td>
                    <td>
                        <input type="text" name="socioprimerapellido" id="socioprimerapellido"  required>
                    </td>       
                    <td>
                        <input type="text" name="sociosegundoapellido" id="sociosegundoapellido"  required>
                    </td>
                    
                    <td>
                        <input type="text" name="sociotelmovil" id="sociotelmovil">
                    </td>
                    <td>
                        <input type="email"  required="" name="sociocorreo" id="sociocorreo">
                    </td>
                   
                </tr>

     
           
                 <tr>
                    <td>
                        <br> Fecha Ingreso <br>
                    </td>
                </tr>

                <tr>
                    <td>
                      <input type="text" name="fecha" id="datepicker"></td>
                    </td>
                </tr>

                <tr><td><br><p>Datos de Dirección</p></td></tr>
            <tr>
                <td>
                     <div class="form-group">
                      <label class="col-md-4 control-label" for="listaProvincias">Provincia</label>
                      <div class="col-md-4">
                        <select id="listaProvincias" name="listaProvincias" class="form-control" onclick="provinciaSeleccionada()">
                          <option value="-1">Seleccione Una Provincia</option>
                          <option value="1">San Jose</option>
                          <option value="2">Alajuela</option>
                          <option value="3">Cartago</option>
                          <option value="4">Heredia</option>
                          <option value="5">Guanacaste</option>
                          <option value="6">Puntarenas</option>
                          <option value="7">Limon</option>
                        </select>
                      </div>
                    </div>  
                </td>
                <td>    
                    <!-- Select Canton -->
                    <div class="form-group" >
                      <label class="col-md-4 control-label" for="listadeCantones">Canton</label>
                      <div class="col-md-4" id="cajaCantones">
                      </div>
                    </div>
                </td>
                <td>
                    <!-- Select Distrito-->
                    <div class="form-group" id="cajaDistrito" >
                      <label class="col-md-4 control-label" for="cajaDistrito">Distrito</label>
                      <div class="col-md-4" id="listaDistrito" >
                     
                      </div>
                    </div>
                 </td>
                 <td>Pueblo:<input type="text" id="sociopueblo" name="sociopueblo"> </td>

            </tr>
            </table>
            <br>
            <p>Tipo de Actividad</p>

            <?php
         
             include '../business/actividadBusiness.php';
                    $actividadBusiness = new actividadBusiness();
                    $actividades = $actividadBusiness->obtenerTodosTBActividad();
                     echo '<table>';
                    foreach ($actividades as $current) {     
                        echo '<tr>';
                        if($current->getId()==1){
                             echo "<td> <input id ='".$current->getId()."-actividad' type='radio' name='tipoactividad' checked='' value='".$current->getId()."'> ".$current->getNombreActividad()."<br> </td>";
                        }else{
                              echo "<td> <input id ='".$current->getId()."-actividad' type='radio' name='tipoactividad'  value='".$current->getId()."'> ".$current->getNombreActividad()."<br> </td>";
                        }            
                        echo '</tr>';
                    }
                 
       echo '</table>';

            ?>

            <br><br>
            <p>Tipo de Finca</p>
                <?php
             
             
                require '../data/tipoFincaData.php';
                $temp = new tipoFincaData();
                $tipoFinca = $temp->getAllTBTiposFincas();

            
                        echo '<table>';
                        foreach ($tipoFinca as $curren) {

                            echo '<tr>';

                            echo "<td> <input id='".$curren->getId()."-tipo' type='radio' name='tipofinca' value='".$curren->getId()."'</td>"; 

                            echo '<td>'.$curren->getFincaTipoActividad().'</td>'; 
                            
                                      
                            echo '</tr>';
                        }
                        echo '</table>';

                            

                ?>
           
             <br><br>
             Estado Socio Detalle: 
             <?php
         
         
                //require '../business/socioBusiness.php';
                $temp = new socioBusiness();
                $estados = $temp->obtenerSocioEstado();

                    echo '<table>';
                        foreach ($estados as $curren) {     
                            echo '<tr>';

                            
                             echo "<td> <input id='".$curren->getSocioEstadoId()."-estado'type='radio' name='socioestado' value='".$curren->getSocioEstadoId()."'</td>"; 

                            echo '<td>'.$curren->getSocioEstadoDetalle().'</td>'; 
                            

                            echo '</tr>';
                        }
                    echo '</table>';

                        

            ?>
            
            <br><br>

            <div id="btnAgregar">
                <button type="submit" name="agregarsocio" id="agregarsocio"/>Agregar Socio</button>
            </div>
             <div id="btnModificar">
                <button type="submit" name="modificarsocio" id="agregarsocio"/>Modificar Socio</button>
            </div>


        
    </form>

    </div>
 

    <a href="../index.php">Regresar</a>
    <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="../js/editarSocio.js"></script>
</body>
</html>
