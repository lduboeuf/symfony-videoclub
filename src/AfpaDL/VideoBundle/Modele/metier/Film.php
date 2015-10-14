<?php
namespace AfpaDL\VideoBundle\Modele\metier;

class Film {
	
	
	private $idFilm;
	private $codeTypeFilm;
	private $titre;
	private $annee;
	
	
	
	
	public function __construct($idFilm, $codeTypeFilm, $titre, $annee  ){
		$this->idFilm = $idFilm;
		$this->codeTypeFilm = $codeTypeFilm;
		$this->titre = $titre;
		$this->annee = $annee;
	}
	
	
	public function getIdFilm() {
		return $this->idFilm;
	}
	public function getCodeTypeFilm() {
		return $this->codeTypeFilm;
	}
	public function getTitre() {
		return $this->titre;
	}
	public function getAnnee() {
		return $this->annee;
	}
	
	
	
	

	
}