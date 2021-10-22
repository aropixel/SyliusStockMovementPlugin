<?php


namespace Aropixel\SyliusStockMovementPlugin\Persister;

use Aropixel\SyliusStockMovementPlugin\Factory\StockMovementFactoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Component\Core\Model\ProductVariantInterface;
use Sylius\Component\Order\Model\OrderItem;
use Sylius\Component\Payment\Model\PaymentInterface;

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
        $stockMovement = $this->stockMovementFactory->createManualStockMovement($productVariant);
        $this->entityManager->persist($stockMovement);
        $this->entityManager->flush();
    }

    public function persistOrderStockMovements(PaymentInterface $payment): void
    {
        $order = $payment->getOrder();

        foreach ($payment->getOrder()->getItems() as $orderItem) {
            /** @var ProductVariantInterface $variant */
            $productVariant = $orderItem->getVariant();

            $stockMovement = $this->stockMovementFactory->createOrderStockMovement($productVariant, $order);
            $this->entityManager->persist($stockMovement);
        }

        $this->entityManager->flush();
    }

}
