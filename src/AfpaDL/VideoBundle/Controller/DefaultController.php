<?php

namespace AfpaDL\VideoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AfpaDLVideoBundle:Default:index.html.twig', array('name' => $name));
    }
}
