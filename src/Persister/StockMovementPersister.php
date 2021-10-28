<?php


namespace Aropixel\SyliusStockMovementPlugin\Persister;

use Aropixel\SyliusStockMovementPlugin\Factory\StockMovementFactoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Component\Core\Model\OrderInterface;
use Sylius\Component\Core\Model\ProductVariantInterface;

class StockMovementPersister implements StockMovementPersisterInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;
    /**
     * @var StockMovementFactoryInterface
     */
    private $stockMovementFactory;

    public function __construct(
        EntityManagerInterface $entityManager,
        StockMovementFactoryInterface $stockMovementFactory
    ){
        $this->entityManager = $entityManager;
        $this->stockMovementFactory = $stockMovementFactory;
    }

    public function persistManualStockMovement(ProductVariantInterface $productVariant): void
    {
        if ($productVariant->getStockMovement()) {
            $stockMovement = $this->stockMovementFactory->createManualStockMovement($productVariant);
            $this->entityManager->persist($stockMovement);
        }
    }

    public function persistOrderStockMovements(OrderInterface $order): void
    {
        foreach ($order->getItems() as $orderItem) {
            /** @var ProductVariantInterface $variant */
            $productVariant = $orderItem->getVariant();

            $stockMovement = $this->stockMovementFactory->createOrderStockMovement($productVariant, $order);
            $this->entityManager->persist($stockMovement);
        }

        $this->entityManager->flush();
    }

}
