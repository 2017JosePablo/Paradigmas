<?php

/*
Autor: Olivier Blanco.
Fecha: 18/11/2014.
Descripción: Clase dedicada a interfaz
*/

class UI{

	private $title;

	function UI($title=""){
		$this->title = $title;
	}

	function get_header(){
		$title = $this->title;
		include_once('header.php');
	}

	function get_title(){
		echo '<h1>'.$this->title.'</h1>';
	}

	function get_menu(){
		include_once('menu.php');
	}

	function get_content($page){
		include_once($page);
	}

	function get_footer(){
		include_once('footer.php');
	}

	function create_menu_interno($items,$title=""){

		if($items){

			echo '<ul class="menu">';

			if($title){
				echo '<h1>'.$title.'</h1>';
			}

			foreach($items as $item){
				echo '<li><a url="'.$item[1].'">'.$item[0].'</a></li>';
			}

			echo '</ul>';

		}

	}

	function get_path(){

		/*
		CAMBIAR POR LA RUTA DONDE SE ENCONTRARA LA CARPETA LECHERIA...
		PARA ESTE EJEMPLO, LA CARPETA LECHERIA ESTA EN LA CARPETA LABS,
		LA CUAL ESTA EN LA RAIZ DEL SERVIDOR FENIX-G.COM
		*/
		$server_folder = '';
		$path = 'http://'.$_SERVER['HTTP_HOST'].dirname($server_folder."/Paradigmas/content/").'/';

		return $path;

	}

}

?>
