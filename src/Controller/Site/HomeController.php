<?php


namespace App\Controller\Site;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{

    public function index()
    {
        return $this->render('index.html.twig');
    }
}