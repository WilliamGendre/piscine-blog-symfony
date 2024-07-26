<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Pokemon;
use App\Repository\PokemonRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PokemonsController extends AbstractController{


    private array $pokemons;

    private array $categories;


    function __construct()
    {
        $this->pokemons = [
            [
                'id' => 1,
                'title' => 'Carapuce',
                'content' => 'Pokemon eau',
                'pokedex' => "Son dos durcit avec l'âge et devient une super carapace. Il peut cracher des jets d'écume.",
                'image' => 'https://eternia.fr/public/media//rb/artworks/007.png',
                'isPublished' => true,
                'starter' =>true
            ],
            [
                'id' => 2,
                'title' => 'Salamèche',
                'content' => 'Pokemon feu',
                'pokedex' => 'Il préfère les endroits chauds. En cas de pluie, de la vapeur se forme autour de sa queue.',
                'image' => 'https://www.pokepedia.fr/images/0/0c/Salam%C3%A8che-RB.png',
                'isPublished' => true,
                'starter' =>true
            ],
            [
                'id' => 3,
                'title' => 'Bulbizarre',
                'content' => 'Pokemon plante',
                'pokedex' => 'Il a une étrange graine plantée sur son dos. Elle grandit avec lui depuis la naissance.',
                'image' => 'https://www.pokepedia.fr/images/thumb/d/de/Bulbizarre-RB.png/175px-Bulbizarre-RB.png',
                'isPublished' => true,
                'starter' =>true
            ],
            [
                'id' => 4,
                'title' => 'Pikachu',
                'content' => 'Pokemon electrique',
                'pokedex' => 'Quand plusieurs de ces POKéMON se réunissent, ils provoquent de gigantesques orages.',
                'image' => 'https://www.pokepedia.fr/images/thumb/b/be/Pikachu-RB.png/175px-Pikachu-RB.png',
                'isPublished' => true,
                'starter' =>false
            ],
            [
                'id' => 5,
                'title' => 'Rattata',
                'content' => 'Pokemon normal',
                'pokedex' => 'Sa morsure est très puissante. Petit et rapide, on en voit un peu partout.',
                'image' => 'https://www.media.pokekalos.fr/img/pokemon/sugimori/1G/019.png',
                'isPublished' => false,
                'starter' =>false
            ],
            [
                'id' => 6,
                'title' => 'Roucool',
                'content' => 'Pokemon vol',
                'pokedex' => "Il est souvent vu dans les forêts. Il brasse l'air de ses ailes près du sol pour projeter du sable.",
                'image' => 'https://www.media.pokekalos.fr/img/pokemon/sugimori/1G/016.png',
                'isPublished' => true,
                'starter' =>false
            ],
            [
                'id' => 7,
                'title' => 'Aspicot',
                'content' => 'Pokemon insecte',
                'pokedex' => "Il se nourrit de feuilles dans les forêts. L'aiguillon sur son front est empoisonné.",
                'image' => 'https://www.media.pokekalos.fr/img/pokemon/sugimori/1G/013.png',
                'isPublished' => false,
                'starter' =>false
            ],
            [
                'id' => 8,
                'title' => 'Nosferapti',
                'content' => 'Pokemon poison',
                'pokedex' => "Se déplace en colonie dans les endroits sombres. Il s'oriente grâce aux ultrasons.",
                'image' => 'https://www.pokepedia.fr/images/thumb/3/3c/Nosferapti-RB.png/175px-Nosferapti-RB.png',
                'isPublished' => false,
                'starter' =>false
            ],
            [
                'id' => 9,
                'title' => 'Mewtwo',
                'content' => 'Pokemon psy',
                'pokedex' => 'Il est le fruit de nombreuses expériences génétiques horribles et malsaines.',
                'image' => 'https://www.pokepedia.fr/images/thumb/6/61/Mewtwo-RB.png/175px-Mewtwo-RB.png',
                'isPublished' => true,
                'starter' =>false
            ],
            [
                'id' => 10,
                'title' => 'Ronflex',
                'content' => 'Pokemon normal',
                'pokedex' => 'Très paresseux, il ne fait que manger et dormir. Plus il est gros, plus il devient fainéant.',
                'image' => 'https://www.pokepedia.fr/images/thumb/a/ac/Ronflex-RB.png/175px-Ronflex-RB.png',
                'isPublished' => false,
                'starter' =>false
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

    #[Route('/choicePokemon', name: 'choice_pokemon')]
    public function ageLegalPokemon(Request $request){
        $age = $request->query->get('age');

        if(!$request->query->has('age')){
            return $this->render('page/formulaireAge.html.twig');
        } else{
            if($age > 10){
                return $this->render('page/choisePokemon.html.twig', ['pokemons' => $this->pokemons]);
            }else{
                return $this->render('page/getOut.html.twig', []);
            }
        }

    }

    #[Route('/pokemon_bdd', 'pokemon_bdd')]
    public function pokemonBdd(PokemonRepository $pokemonRepository){
        // findAll pour prendre toutes les données de la Bdd
        return $this->render('page/pokemonBdd.html.twig', ['pokemons' => $pokemonRepository->findAll()]);
    }

    #[Route('/pokemon_bdd_id/{id}', name: 'pokemon_bdd_id')]
    public function pokemonBddBuyId(int $id, PokemonRepository $pokemonRepository): Response{

        $pokemon = $pokemonRepository->find($id);
        return $this->render('page/detailPokemon.html.twig', ['pokemon' => $pokemon]);
    }


    #[Route('/search_pokemon', 'search_pokemon')]
    public function searchPokemon(Request $request,PokemonRepository $pokemonRepository)
    {

        // on défini $pokemonFound: on lui donne comme valeur un tableau vide
        // car on va lui retourner un tableau
        $pokemonFound = [];

        // on regarde si on à lancé une recherche avec le "has"
        if ($request->request->has('title')){
            // on récupère la recherche
            $searchTitle = $request->request->get('title');
            // on comparer avec la Bdd
            $pokemonFound = $pokemonRepository->findLikeTitle($searchTitle);

            // si on ne trouve rien
            if(count($pokemonFound) === 0){
                // on affiche la page d'erreur
                $html = $this->renderView('page/404.html.twig');

                return new Response($html, 404);
            }
        }

        return $this->render('page/searchPokemon.html.twig', ['pokemons' => $pokemonFound]);
    }

    #[Route('pokemon/delete/{id}', 'delete_pokemon')]
    public function deletePokemon(int $id, PokemonRepository $pokemonRepository, EntityManagerInterface $entityManager){
        // Récupère un pokémon dans la base de données grâce à son id
        $pokemon = $pokemonRepository->find($id);

        if (!$pokemon){
            $html = $this->renderView('page/404.html.twig');

            return new Response($html, 404);
        }

        // Prépare la suppression
        $entityManager->remove($pokemon);
        // Lance la (ou les) supression
        $entityManager->flush();

        // redirige vers une page grâce à "redirectToRoute"
        // mettre entre paranthèse le nom de la route vers laquelle se rediriger
        return $this->redirectToRoute('pokemon_bdd');
    }

    #[Route('insert-one-pokemon', name: 'insert_pokemon')]
    public function insertPokemon(EntityManagerInterface $entityManager){
        $pokemon = new Pokemon(
            'tygnon',
            "Il distribue des séries de coups de poing rapides comme l'éclair, invisibles à l'oeil nu.",
            'https://www.pokepedia.fr/images/thumb/d/dc/Tygnon-RB.png/175px-Tygnon-RB.png',
            'combat'
        );

        $entityManager->persist($pokemon);
        $entityManager->flush();
        return $this->redirectToRoute('pokemon_bdd', ['pokemon' => $pokemon]);
    }
}