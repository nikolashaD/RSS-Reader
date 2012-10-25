<?php

namespace My\RssBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('MyRssBundle:Default:index.html.twig', array('name' => $name));
    }
}
