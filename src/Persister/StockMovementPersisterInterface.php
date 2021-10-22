<?php


namespace Aropixel\SyliusStockMovementPlugin\Persister;

use Sylius\Component\Core\Model\ProductVariantInterface;
use Sylius\Component\Payment\Model\PaymentInterface;

interface StockMovementPersisterInterface
{
    public function persistManualStockMovement(ProductVariantInterface $productVariant): void;

    public function persistOrderStockMovements(PaymentInterface $payment): void;
}
