<?php

namespace hnr\sircimBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/{name}",name="hnrsircimBundle_homepage")
     * @Template("hnrsircimBundle::layout.html.twig")
     */
    public function indexAction($name)
    {
        return array('name' => $name);
    }
}

