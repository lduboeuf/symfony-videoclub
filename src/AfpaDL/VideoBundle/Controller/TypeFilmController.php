<?php
namespace AfpaDL\VideoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AfpaDL\VideoBundle\Modele\dao\TypeFilmDAO;

class TypeFilmController extends Controller
{
	public function listeTypeFilmAction()
	{
	 	$listTypeFilm = $this->get('typefilmdao')->getListTypeFilm();
        
        $view = 'AfpaDLVideoBundle:TypeFilm:listetypefilm.html.twig';
        return $this->render($view,array('typefilms'=>$listTypeFilm));
    }


}
