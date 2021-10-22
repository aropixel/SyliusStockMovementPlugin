<?php


namespace Aropixel\SyliusStockMovementPlugin\Repository;


use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class StockMovementRepository extends ServiceEntityRepository implements StockMovementRepositoryInterface
{

    public function __construct(
        ManagerRegistry $registry,
        $stockMovementEntityClass
    )
    {
        parent::__construct($registry, $stockMovementEntityClass);
    }

}
