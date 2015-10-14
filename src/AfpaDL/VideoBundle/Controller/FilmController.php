<?php
namespace AfpaDL\VideoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AfpaDL\VideoBundle\Modele\dao\FilmDAO;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class FilmController extends Controller
{
	public function listeFilmAction(Request $request)
	{
		//use filmdao as a service
		$films = $this->get('filmdao')->getFilms($request->query->get('codeTypeFilm'));
		//$films = FilmDAO::getFilms($_GET['codeTypeFilm']);
        
         return $this->render('AfpaDLVideoBundle:Film:listefilm.html.twig',array('films'=>$films, 'libelle_typefilm' => $_GET['codeTypeFilm']));
    }
    
    public function listeFilmNouveautesAction()
    {
    
    	$films = $this->get('filmdao')->getNewFilms();
    
    	return $this->render('AfpaDLVideoBundle:Film:listenewfilm.html.twig',array('films'=>$films));
    }
    
    public function ficheFilmAction($idfilm){
    	//TODO faire layout fiche film 
    	return new Response("kikou"+$idfilm);
    }


}
