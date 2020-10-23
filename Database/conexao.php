<?php 

class Conexao {

	private static $instance;

	public function getConnect() {

		if(!isset(self::$instance)):
			self::$instance = new \PDO('mysql:host=localhost;dbname=Crudkainan;charset=utf8','root','root');

		endif;

		return self::$instance;
	}
}




?>
