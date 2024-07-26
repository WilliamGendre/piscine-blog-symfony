<?php

namespace App\Repository;

use App\Entity\Pokemon;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Pokemon>
 */
class PokemonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pokemon::class);
    }

    public function findLikeTitle($search){
        // créer une nouvelle instance $queryBuilder: permet de récupérer le constructeur sql en restant en php
        $queryBuilder = $this->createQueryBuilder('pokemon');

        // remplace une recherche en dur en une recherche souple
        // on sélectionne tous les pokemons
        $query = $queryBuilder->select('pokemon')
            // on lui dit où chercher
            ->where('pokemon.title LIKE :search')
            // on passe par le setParmeter pour sécurisé un minimum
            ->setParameter('search', '%'.$search.'%')
            ->getQuery();

        $pokemons = $query->getResult();

        return $pokemons;
    }
}
