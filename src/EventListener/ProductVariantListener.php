<?php


namespace Aropixel\SyliusStockMovementPlugin\EventListener;

use Aropixel\SyliusStockMovementPlugin\Persister\StockMovementPersisterInterface;
use Sylius\Bundle\ResourceBundle\Event\ResourceControllerEvent;
use Sylius\Component\Core\Model\ProductVariantInterface;

class ProductVariantListener
{

    /**
     * @var StockMovementPersisterInterface
     */
    private $stockMovementPersister;

    public function __construct(StockMovementPersisterInterface $stockMovementPersister)
    {
        $this->stockMovementPersister = $stockMovementPersister;
    }

    public function onProductVariantPreRegister(ResourceControllerEvent $event): void
    {
        /** @var ProductVariantInterface $product */
        $productVariant = $event->getSubject();

        $this->stockMovementPersister->persistManualStockMovement($productVariant);
    }
}
