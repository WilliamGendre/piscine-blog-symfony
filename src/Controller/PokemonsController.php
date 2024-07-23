<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PokemonsController extends AbstractController{


    #[Route('/pokemons', name: 'liste_pokemons')]
    public function listePokemon()
    {
        $pokemons = [
            [
                'id' => 1,
                'title' => 'Carapuce',
                'content' => 'Pokemon eau',
                'image' => 'https://eternia.fr/public/media//rb/artworks/007.png',
                'isPublished' => true
            ],
            [
                'id' => 2,
                'title' => 'Salamèche',
                'content' => 'Pokemon feu',
                'image' => 'https://www.pokepedia.fr/images/0/0c/Salam%C3%A8che-RB.png',
                'isPublished' => true
            ],
            [
                'id' => 3,
                'title' => 'Bulbizarre',
                'content' => 'Pokemon plante',
                'image' => 'https://www.pokepedia.fr/images/thumb/d/de/Bulbizarre-RB.png/175px-Bulbizarre-RB.png',
                'isPublished' => true
            ],
            [
                'id' => 4,
                'title' => 'Pikachu',
                'content' => 'Pokemon electrique',
                'image' => 'https://www.pokepedia.fr/images/thumb/b/be/Pikachu-RB.png/175px-Pikachu-RB.png',
                'isPublished' => true
            ],
            [
                'id' => 5,
                'title' => 'Rattata',
                'content' => 'Pokemon normal',
                'image' => 'https://www.media.pokekalos.fr/img/pokemon/sugimori/1G/019.png',
                'isPublished' => false
            ],
            [
                'id' => 6,
                'title' => 'Roucool',
                'content' => 'Pokemon vol',
                'image' => 'https://www.media.pokekalos.fr/img/pokemon/sugimori/1G/016.png',
                'isPublished' => true
            ],
            [
                'id' => 7,
                'title' => 'Aspicot',
                'content' => 'Pokemon insecte',
                'image' => 'https://www.media.pokekalos.fr/img/pokemon/sugimori/1G/013.png',
                'isPublished' => false
            ],
            [
                'id' => 8,
                'title' => 'Nosferapti',
                'content' => 'Pokemon poison',
                'image' => 'https://www.pokepedia.fr/images/thumb/3/3c/Nosferapti-RB.png/175px-Nosferapti-RB.png',
                'isPublished' => false
            ],
            [
                'id' => 9,
                'title' => 'Mewtwo',
                'content' => 'Pokemon psy',
                'image' => 'https://www.pokepedia.fr/images/thumb/6/61/Mewtwo-RB.png/175px-Mewtwo-RB.png',
                'isPublished' => true
            ],
            [
                'id' => 10,
                'title' => 'Ronflex',
                'content' => 'Pokemon normal',
                'image' => 'https://www.pokepedia.fr/images/thumb/a/ac/Ronflex-RB.png/175px-Ronflex-RB.png',
                'isPublished' => false
            ]

        ];
        return $this->render('page/articles.html.twig', ['pokemons' => $pokemons]);
    }

    #[Route('/categorie', 'categorie_version')]
    public function version()
    {
        $categories = [
            ['title' => 'Red', 'image' => 'https://www.cdiscount.com/pdt2/9/4/8/1/700x700/seb3701519702948/rw/pokemon-rouge-pour-gameboy-vf.jpg'],
            ['title' => 'Green', 'image' => 'https://image.jeuxvideo.com/images-sm/jaquettes/00045091/jaquette-pokemon-version-verte-gameboy-g-boy-cover-avant-g-1338208078.jpg'],
            ['title' => 'Blue', 'image' => 'https://www.historiquedesjeuxvideo.com/bdd/jeu/img/Gameboy/17.jpg'],
            ['title' => 'Yellow', 'image' => 'https://i.jeuxactus.com/datas/jeux/p/o/pokemon-version-jaune/xl/pokemon-version-jaune-ja-56963223890b0.jpg'],
            ['title' => 'Gold', 'image' => 'https://static.wixstatic.com/media/e4a832_91f6c10f6f0445ae983326c8083d6dd0~mv2.webp'],
            ['title' => 'Silver', 'image' => 'https://media.senscritique.com/media/000017577785/0/pokemon_argent.png'],
            ['title' => 'Crystal', 'image' => 'https://i.pinimg.com/originals/ea/d3/53/ead35393bff6a99319f4559fcdd34b3a.png']
        ];

        // ses 2 lignes sont raccourcie en une seule avec $this->>render
        $html = $this->renderView('page/categorie.html.twig', ['categories' => $categories]);

        return new Response($html, 200);
    }

}