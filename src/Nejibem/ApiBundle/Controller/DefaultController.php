<?php

namespace Nejibem\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('NejibemApiBundle:Default:index.html.twig');
    }
}
