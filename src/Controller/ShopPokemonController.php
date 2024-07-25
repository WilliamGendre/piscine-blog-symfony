<?php

declare(strict_types=1);

namespace App\Controller;

use http\Env\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class ShopPokemonController extends AbstractController
{
    private array $products;

    function __construct(){
        $this->products = [
            [
                'id' => 1,
                'title' => 'Pokéball',
                'price' => 200,
                'price_reduction' => 0,
                'image' => 'https://www.pokepedia.fr/images/e/e2/Pok%C3%A9_Ball-RS.png',
                'categories' => ['objet', 'capture'],
                'description' => 'Un objet semblable à une capsule, qui capture les Pokémon sauvages. Il suffit pour cela de le jeter comme une balle.'
            ],
            [
                'id' => 2,
                'title' => 'Potion',
                'price' => 300,
                'price_reduction' => 0,
                'image' => 'https://www.media.pokekalos.fr/img/pokemon/objets/big/potion.png',
                'categories' => ['objet', 'soin'],
                'description' =>"Un spray qui soigne les blessures. Restaure 20 PV d'un Pokémon."
            ],
            [
                'id' => 3,
                'title' => 'Corde sortie',
                'price' => 550,
                'price_reduction' => 0,
                'image' => 'https://www.media.pokekalos.fr/img/pokemon/objets/big/corde-sortie.png',
                'categories' => ['objet', 'autre'],
                'description' => "Une corde longue et solide permettant de sortir rapidement d’une grotte ou d’un donjon."
            ],
            [
                'id' => 4,
                'title' => 'Repousse',
                'price' => 350,
                'price_reduction' => 300,
                'image' => 'https://www.media.pokekalos.fr/img/pokemon/objets/big/repousse.png',
                'categories' => ['objet', 'autre'],
                'description' => "Repousse les Pokémon sauvages faibles pendant 100 pas."
            ],
            [
                'id' => 5,
                'title' => 'Total soin',
                'price' => 600,
                'price_reduction' => 500,
                'image' => 'https://www.media.pokekalos.fr/img/pokemon/objets/big/total-soin.png',
                'categories' => ['objet', 'soin'],
                'description' => "Un médicament sous forme de spray. Soigne tous les problèmes de statut d'un Pokémon."
            ],
        ];
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