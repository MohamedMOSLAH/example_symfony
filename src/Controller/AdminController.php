<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
  *@Route("/admin")
  * @IsGranted("ROLE_ADMIN")
*/
class AdminController extends AbstractController {

    /**
     *@Route("/", name="app_admin_index")
     */
    public function index(): Response 
    {
        return $this->render('admin/index.html.twig');
    }

    /**
     *@Route("/pins", name="app_admin_pins_index")
     */
    public function pinsIndex(): Response 
    {
        return $this->render('admin/pin_index.html.twig');
    }
    
}