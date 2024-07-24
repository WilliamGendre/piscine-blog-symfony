<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PokemonsController extends AbstractController{


    private array $pokemons;

    private array $categories;

    private array $products;

    function __construct()
    {
        $this->pokemons = [
            [
                'id' => 1,
                'title' => 'Carapuce',
                'content' => 'Pokemon eau',
                'pokedex' => "Son dos durcit avec l'âge et devient une super carapace. Il peut cracher des jets d'écume.",
                'image' => 'https://eternia.fr/public/media//rb/artworks/007.png',
                'isPublished' => true
            ],
            [
                'id' => 2,
                'title' => 'Salamèche',
                'content' => 'Pokemon feu',
                'pokedex' => 'Il préfère les endroits chauds. En cas de pluie, de la vapeur se forme autour de sa queue.',
                'image' => 'https://www.pokepedia.fr/images/0/0c/Salam%C3%A8che-RB.png',
                'isPublished' => true
            ],
            [
                'id' => 3,
                'title' => 'Bulbizarre',
                'content' => 'Pokemon plante',
                'pokedex' => 'Il a une étrange graine plantée sur son dos. Elle grandit avec lui depuis la naissance.',
                'image' => 'https://www.pokepedia.fr/images/thumb/d/de/Bulbizarre-RB.png/175px-Bulbizarre-RB.png',
                'isPublished' => true
            ],
            [
                'id' => 4,
                'title' => 'Pikachu',
                'content' => 'Pokemon electrique',
                'pokedex' => 'Quand plusieurs de ces POKéMON se réunissent, ils provoquent de gigantesques orages.',
                'image' => 'https://www.pokepedia.fr/images/thumb/b/be/Pikachu-RB.png/175px-Pikachu-RB.png',
                'isPublished' => true
            ],
            [
                'id' => 5,
                'title' => 'Rattata',
                'content' => 'Pokemon normal',
                'pokedex' => 'Sa morsure est très puissante. Petit et rapide, on en voit un peu partout.',
                'image' => 'https://www.media.pokekalos.fr/img/pokemon/sugimori/1G/019.png',
                'isPublished' => false
            ],
            [
                'id' => 6,
                'title' => 'Roucool',
                'content' => 'Pokemon vol',
                'pokedex' => "Il est souvent vu dans les forêts. Il brasse l'air de ses ailes près du sol pour projeter du sable.",
                'image' => 'https://www.media.pokekalos.fr/img/pokemon/sugimori/1G/016.png',
                'isPublished' => true
            ],
            [
                'id' => 7,
                'title' => 'Aspicot',
                'content' => 'Pokemon insecte',
                'pokedex' => "Il se nourrit de feuilles dans les forêts. L'aiguillon sur son front est empoisonné.",
                'image' => 'https://www.media.pokekalos.fr/img/pokemon/sugimori/1G/013.png',
                'isPublished' => false
            ],
            [
                'id' => 8,
                'title' => 'Nosferapti',
                'content' => 'Pokemon poison',
                'pokedex' => "Se déplace en colonie dans les endroits sombres. Il s'oriente grâce aux ultrasons.",
                'image' => 'https://www.pokepedia.fr/images/thumb/3/3c/Nosferapti-RB.png/175px-Nosferapti-RB.png',
                'isPublished' => false
            ],
            [
                'id' => 9,
                'title' => 'Mewtwo',
                'content' => 'Pokemon psy',
                'pokedex' => 'Il est le fruit de nombreuses expériences génétiques horribles et malsaines.',
                'image' => 'https://www.pokepedia.fr/images/thumb/6/61/Mewtwo-RB.png/175px-Mewtwo-RB.png',
                'isPublished' => true
            ],
            [
                'id' => 10,
                'title' => 'Ronflex',
                'content' => 'Pokemon normal',
                'pokedex' => 'Très paresseux, il ne fait que manger et dormir. Plus il est gros, plus il devient fainéant.',
                'image' => 'https://www.pokepedia.fr/images/thumb/a/ac/Ronflex-RB.png/175px-Ronflex-RB.png',
                'isPublished' => false
            ]

        ];

        $this->categories = [
            ['title' => 'Red', 'image' => 'https://www.cdiscount.com/pdt2/9/4/8/1/700x700/seb3701519702948/rw/pokemon-rouge-pour-gameboy-vf.jpg'],
            ['title' => 'Green', 'image' => 'https://image.jeuxvideo.com/images-sm/jaquettes/00045091/jaquette-pokemon-version-verte-gameboy-g-boy-cover-avant-g-1338208078.jpg'],
            ['title' => 'Blue', 'image' => 'https://www.historiquedesjeuxvideo.com/bdd/jeu/img/Gameboy/17.jpg'],
            ['title' => 'Yellow', 'image' => 'https://i.jeuxactus.com/datas/jeux/p/o/pokemon-version-jaune/xl/pokemon-version-jaune-ja-56963223890b0.jpg'],
            ['title' => 'Gold', 'image' => 'https://static.wixstatic.com/media/e4a832_91f6c10f6f0445ae983326c8083d6dd0~mv2.webp'],
            ['title' => 'Silver', 'image' => 'https://media.senscritique.com/media/000017577785/0/pokemon_argent.png'],
            ['title' => 'Crystal', 'image' => 'https://i.pinimg.com/originals/ea/d3/53/ead35393bff6a99319f4559fcdd34b3a.png']
        ];

        $this->products = [
            [
                'id' => 1,
                'title' => 'Pokéball',
                'price' => 200,
                'price_reduction' => 0,
                'image' => 'https://www.pokepedia.fr/images/e/e2/Pok%C3%A9_Ball-RS.png',
                'categories' => ['objet', 'capture']
            ],
            [
                'id' => 2,
                'title' => 'Potion',
                'price' => 300,
                'price_reduction' => 0,
                'image' => 'https://static.wikia.nocookie.net/pokemon-prisme/images/7/7a/Potion.png/revision/latest/thumbnail/width/360/height/360?cb=20220815092317&path-prefix=fr',
                'categories' => ['objet', 'soin']
            ],
            [
                'id' => 3,
                'title' => 'Corde sortie',
                'price' => 550,
                'price_reduction' => 0,
                'image' => 'https://www.media.pokekalos.fr/img/pokemon/objets/big/corde-sortie.png',
                'categories' => ['objet', 'autre']
            ],
            [
                'id' => 4,
                'title' => 'Repousse',
                'price' => 350,
                'price_reduction' => 300,
                'image' => 'https://static.wikia.nocookie.net/pokemon-prisme/images/d/d3/Repousse.png/revision/latest/thumbnail/width/360/height/360?cb=20220815092318&path-prefix=fr',
                'categories' => ['objet', 'autre']
            ],
            [
                'id' => 5,
                'title' => 'Total soin',
                'price' => 600,
                'price_reduction' => 500,
                'image' => 'https://www.media.pokekalos.fr/img/pokemon/objets/big/total-soin.png',
                'categories' => ['objet', 'soin']
            ],
        ];
    }

    #[Route('/pokemons', name: 'liste_pokemons')]
    public function listePokemon(): Response
    {
        return $this->render('page/articles.html.twig', ['pokemons' => $this->pokemons]);
    }

    #[Route('/categorie', 'categorie_version')]
    public function version(): Response
    {

        // ses 2 lignes sont raccourcie en une seule avec $this->>render
        $html = $this->renderView('page/categorie.html.twig', ['categories' => $this->categories]);

        return new Response($html, 200);
    }

    #[Route('pokemonPage/{id}', 'pokemon_id')]
    public function pokemonBuyId($id): Response{

        // Récupère toutes les super globals (ligne 1) pour récupérer l'id dans l'url (ligne 2)
        // $request = Request::createFromGlobals();
        // $id = $request->query->get('id');

        $pokemonFound = null;

        foreach ($this->pokemons as $pokemon) {
            if($pokemon['id'] === (int)$id){
                $pokemonFound = $pokemon;
            }
        }

        return $this->render('page/pagePokemon.html.twig', ['pokemon' => $pokemonFound]);
    }

    #[Route('shop', 'shop_pokemon')]
    public function shopPokemon(){
        return $this->render('page/shopPokemon.html.twig', ['products' => $this->products]);
    }

    #[Route('productDetail/{id}', 'product_id')]
    public function productBuyId($id){
        $productFound = null;

        foreach ($this->products as $product) {
            if($product['id'] === (int)$id){
                $productFound = $product;
            }
        }

        return $this->render('page/detailProduit.html.twig', ['product' => $productFound]);
    }

}