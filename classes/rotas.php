<?php 

Class Rotas{

	static function get_raiz(){

		return "../views";
	}

	static function get_inicio(){

		return self::get_raiz().'/inicio.php';
	}
}

?>