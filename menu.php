<?php
include_once('UI.php');
$ui = new UI();
$path = $ui->get_path();
?>

<button id="show_menu" class="menu_view"></button>
<div class="overlay"></div>
<aside>
    <div class="container">
        <button id="hide_menu" class="menu_view"></button>
        <nav>
            <ul>
                <li><a href="<?=$path?>index.php">Inicio</a></li>
            </ul>
             <ul>
               <li><a>Acceder</a>
                 <ul>
                    <li><a href="content/view/loginView.php">Login</a></li>
                    <li><a href="content/view/salirView.php">Salir </a></li>
                </ul>
              </ul>

             <ul>
               	 <li><a>Socio</a>
                   <ul>
                  <li><a href="content/view/actividadView.php">Actividad</a></li>
                  <li><a href="content/view/recuperarPassView.php">Claves</a></li>
               		<li><a href="content/view/pagoPrimeroAnualidadView.php">Pago socio primera vez</a></li>
                  <li><a href="content/view/renovarAnualidadView.php">Renovar Anualidad</a></li>
               		<li><a href="content/view/socioView.php">Socio</a></li>
                  </ul>
              </ul>

             <ul>
               		<li><a href="content/view/fincaView.php">Finca</a></li>
              </ul>

              <ul>
                  <li><a>Mantenimiento</a>
                    <ul>
                      <li><a href="content/view/actividadView.php">Actividad</a></li>
                      <li><a href="content/view/hatoView.php">Hato</a></li>
                      <li><a href="content/view/pastoView.php">Pasto</a></li>
                      <li><a href="content/view/razaView.php">Raza</a> </li>
                      <li><a href="content/view/fincaTipoView.php">Tipo Finca</a></li>

                   </ul>
               </ul>

                 <ul>
                     <li><a>Administrativa</a>
                       <ul>
                      <li><a href="content/view/anualidadView.php">Anualidad</a></li>
                      <li><a href="content/view/aprovacionSocioView.php">Aprovacion de Socio</a></li>
                      <li><a href="content/view/juntaView.php">Junta</a></li>
                      <li><a href="content/view/reporteView.php">Reportes</a></li>
                       <li><a href="content/view/recuperarPassView.php">Ver Claves</a></li>
                      </ul>
                  </ul>

                <ul>
                    <li><a>Avisos</a>
                      <ul>
                        <li><a href="content/view/agregarNoticia.php">Agregar un Aviso </a><br></li>
                        <li><a href="content/view/avisosView.php">Avisos </a></li>
                        <li><a href="content/view/misAvisosView.php">Mis Avisos </a><br></li>
                     </ul>
                 </ul>
        </nav>
    </div>
</aside>
