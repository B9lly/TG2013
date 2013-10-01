<?php

namespace hnr\sircimBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/{name}",name="hnrsircimBundle_homepage")
     * @Template("hnrsircimBundle::plantilla.html.twig")
     */
    public function indexAction($name)
    {
        return array('name' => $name);
    }
}

