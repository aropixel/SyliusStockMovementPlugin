<?php

namespace Aropixel\SyliusStockMovementPlugin\Factory;

use Aropixel\SyliusStockMovementPlugin\Entity\StockMovementInterface;
use Sylius\Component\Core\Model\OrderInterface;
use Sylius\Component\Core\Model\ProductVariantInterface;

interface StockMovementFactoryInterface
{
    public function createManualStockMovement(ProductVariantInterface $productVariant): StockMovementInterface;

    public function createOrderStockMovement(ProductVariantInterface $productVariant, OrderInterface $order): StockMovementInterface;
}
