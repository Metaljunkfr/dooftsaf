<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class AppController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render("app/home.html.twig");
    }

    /**
     * @Route("/about/", name="about")
     */
    public function about()
    {
        return $this->render("app/about.html.twig");
    }

    /**
     * @Route("/legalnotice/", name="legalnotice")
     */
    public function legalnotice()
    {
        return $this->render("app/legalnotice.html.twig");
    }


}