<?php

// on créer le chemin vers le fichier grâce au namespace
namespace App\Controller;


// on appelle les namespaces dont on à besoin: c'est l'équivalent du require_once de PHP
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


// on étant la classe AbstractController, qui nous permet de pouvoir nous servir
// de plusieurs outils
class indexController extends AbstractController{

    // #[Route('...', ...)] permet de créer une route pour l'url
    // '...' : se qui apparait dans l'url
    // lorsque l'on écrit '/', cela signifie que se sera la page d'accueil
    #[Route('/', name: 'home')]
    public function testHome()
    {
        var_dump('hello world');die;
    }
}