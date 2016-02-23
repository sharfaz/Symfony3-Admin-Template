<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }
    
    /**
     * @Route("lucky/number")
     */
    public function numberAction()
    {
    	$number = rand(0,100);
    	
    	return new Response(
    		'<html><body>Lucky Number: '.$number .'</html>'
    	);
    }

    /**
     * @Route("/dashboard", name="show_dashboard")
     * @return [type] [description]
     */
    public function dashboardAction()
    {
        return $this->render('default/dashboard.html.twig');
    }
    
    
}
