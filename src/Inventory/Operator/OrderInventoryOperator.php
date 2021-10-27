<?php


namespace Aropixel\SyliusStockMovementPlugin\Inventory\Operator;

use Aropixel\SyliusStockMovementPlugin\Persister\StockMovementPersisterInterface;
use Sylius\Component\Core\Inventory\Operator\OrderInventoryOperatorInterface;
use Sylius\Component\Core\Model\OrderInterface;

class OrderInventoryOperator implements OrderInventoryOperatorInterface
{
    /** @var OrderInventoryOperatorInterface */
    private $decoratedOperator;
    /**
     * @var StockMovementPersisterInterface
     */
    private $stockMovementPersister;


    public function __construct(
        OrderInventoryOperatorInterface $decoratedOperator,
        StockMovementPersisterInterface $stockMovementPersister
    ) {
        $this->decoratedOperator = $decoratedOperator;
        $this->stockMovementPersister = $stockMovementPersister;
    }


    public function cancel(OrderInterface $order): void
    {
        $this->decoratedOperator->cancel($order);
        $this->stockMovementPersister->persistOrderStockMovements($order);
    }


    public function hold(OrderInterface $order): void
    {
        $this->decoratedOperator->hold($order);
    }


    public function sell(OrderInterface $order): void
    {
        $this->decoratedOperator->sell($order);
        $this->stockMovementPersister->persistOrderStockMovements($order);
    }


}
