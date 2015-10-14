<?php
namespace AfpaDL\VideoBundle\Modele\dao;

use \PDO;
use AfpaDL\VideoBundle\Modele\metier\TypeFilm;

class TypeFilmDAO {
	
	private $pdo;
	
	//$pdo is injected by symfony @see services.yml
	public function __construct(\PDO $pdo)
	{
		$this->pdo = $pdo;
	}


	public  function getListTypeFilm(){
	
		// connection BDD
		//$pdo = Connect::getConnection();
		
		$sql = "SELECT * FROM typefilm;";
				
		$result = $this->pdo->query($sql);
	
		$result->setFetchMode(PDO::FETCH_OBJ);
		
		
		$tfilms = array();
			
		// transformer recordset en tableau
		while( $ligne = $result->fetch() ) // on récupère la liste 
		{
				$tFilm = new TypeFilm($ligne->CODE_TYPE_FILM, $ligne->LIB_TYPE_FILM);
				array_push($tfilms, $tFilm);
		}
		
		$result->closeCursor(); // on ferme le curseur des résultats
			   
		
	
		return $tfilms;
	
	
	}
	
	
}