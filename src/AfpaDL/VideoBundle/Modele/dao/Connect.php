<?php

//namespace Video\dao;
namespace AfpaDL\VideoBundle\Modele\dao;
use \PDO;
class Connect  {



	
	public static function getConnection() {
	
			$pdo;
			
			try {
				
				$dsn = 'mysql:dbname=video;host=localhost;charset=utf8';
				
				$pdo = new PDO($dsn, 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
			
			} catch (PDOException $e) {
			
				die($e);
			}

		return $pdo; 
	}
	
}


