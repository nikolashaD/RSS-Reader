<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace My\RssBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class AdminController extends Controller
{
    public function indexAction()
    {
        return $this->render('MyRssBundle:Admin:index.html.twig');
    }
}
?>
