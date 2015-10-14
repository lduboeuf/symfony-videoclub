<?php
namespace AfpaDL\VideoBundle\Modele\dao;

use \PDO;
use AfpaDL\VideoBundle\Modele\metier\Film;

class FilmDAO {
	
	private $pdo;
	
	//$pdo is injected by symfony @see services.yml
	public function __construct(\PDO $pdo)
	{
		$this->pdo = $pdo;
	}
	
	
	public  function getFilm($idFilm){
		
		// connection BDD
		//$pdo = Connect::getConnection();
		
		
		$sth = $this->pdo->prepare("SELECT * FROM film where id_film = :idFilm;");
		$sth->bindParam(':idFilm', $idFilm, PDO::PARAM_STR);
		$sth->execute();
		
		$sth->setFetchMode(PDO::FETCH_OBJ);
		
		$ligne =  $sth->fetch();
		
		$film = new Film($ligne->ID_FILM, $ligne->CODE_TYPE_FILM, $ligne->TITRE_FILM, $ligne->ANNEE_FILM);
		
		$sth->closeCursor();
		
		return $film;
		
	}
	
	public  function getNewFilms(){
		
		// connection BDD
		//$pdo = Connect::getConnection();
		
		
		$sth = $this->pdo->prepare("SELECT * FROM film ORDER BY annee_film DESC LIMIT 3");
		$sth->execute();
			
		//$result = $pdo->query($sql);
		
		$sth->setFetchMode(PDO::FETCH_OBJ);
		
		
		$films = array();
		
		// transformer recordset en tableau
		while( $ligne = $sth->fetch() ) // on récupère la liste
		{
			$film = new Film($ligne->ID_FILM, $ligne->CODE_TYPE_FILM, $ligne->TITRE_FILM, $ligne->ANNEE_FILM);
			array_push($films, $film);
		}
		
		$sth->closeCursor(); // on ferme le curseur des résultats
			
		
		
		return $films;
	}
	
	public function getFilms($codeTypeFilm){
	
		// connection BDD
		//$pdo = Connect::getConnection();
	

		$sth = $this->pdo->prepare("SELECT * FROM film where code_type_film = :codefilm;");
		$sth->bindParam(':codefilm', $codeTypeFilm, PDO::PARAM_STR);
		$sth->execute();
			
		//$result = $pdo->query($sql);
	
		$sth->setFetchMode(PDO::FETCH_OBJ);
	
	
		$films = array();
	
		// transformer recordset en tableau
		while( $ligne = $sth->fetch() ) // on récupère la liste
		{
			$film = new Film($ligne->ID_FILM, $ligne->CODE_TYPE_FILM, $ligne->TITRE_FILM, $ligne->ANNEE_FILM);
			array_push($films, $film);
		}
	
		$sth->closeCursor(); // on ferme le curseur des résultats
		 
	
	
		return $films;
	
	
	}
	
	
}