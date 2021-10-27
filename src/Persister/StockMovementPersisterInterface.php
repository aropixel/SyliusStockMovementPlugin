<?php


namespace Aropixel\SyliusStockMovementPlugin\Persister;

use Sylius\Component\Core\Model\ProductVariantInterface;
use Sylius\Component\Core\Model\OrderInterface;


interface StockMovementPersisterInterface
{
    public function persistManualStockMovement(ProductVariantInterface $productVariant): void;

    public function persistOrderStockMovements(OrderInterface $payment): void;
}
