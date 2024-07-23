<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class ChoicePokemonController extends AbstractController
{
    #[Route('/choicePokemon', name: 'choice_pokemon')]
    public function ageLegalPokemon(){
        $request = Request::createFromGlobals();
        $age = $request->query->get('age');

        if(!$request->query->has('age')){
            return $this->render('page/formulaireAge.html.twig');
        } else{
            if($age > 10){
                $pokemons = [
                    [
                        'id' => 1,
                        'title' => 'Carapuce',
                        'content' => 'Pokemon eau',
                        'image' => 'https://eternia.fr/public/media//rb/artworks/007.png',
                    ],
                    [
                        'id' => 2,
                        'title' => 'Salamèche',
                        'content' => 'Pokemon feu',
                        'image' => 'https://www.pokepedia.fr/images/0/0c/Salam%C3%A8che-RB.png',
                    ],
                    [
                        'id' => 3,
                        'title' => 'Bulbizarre',
                        'content' => 'Pokemon plante',
                        'image' => 'https://www.pokepedia.fr/images/thumb/d/de/Bulbizarre-RB.png/175px-Bulbizarre-RB.png',
                    ]
                ];
                return $this->render('page/choisePokemon.html.twig', ['pokemons' => $pokemons]);
            }else{
                return $this->render('page/getOut.html.twig', []);
            }
        }

    }

    /*#[Route('/choicePokemon', name: 'choice_pokemon')]
    public function choicePokemon(){
        $pokemons = [
            [
                'id' => 1,
                'title' => 'Carapuce',
                'content' => 'Pokemon eau',
                'image' => 'https://eternia.fr/public/media//rb/artworks/007.png',
            ],
            [
                'id' => 2,
                'title' => 'Salamèche',
                'content' => 'Pokemon feu',
                'image' => 'https://www.pokepedia.fr/images/0/0c/Salam%C3%A8che-RB.png',
            ],
            [
                'id' => 3,
                'title' => 'Bulbizarre',
                'content' => 'Pokemon plante',
                'image' => 'https://www.pokepedia.fr/images/thumb/d/de/Bulbizarre-RB.png/175px-Bulbizarre-RB.png',
            ]
        ];
        return $this->render('page/choisePokemon.html.twig', ['pokemons' => $pokemons]);
    }*/
}