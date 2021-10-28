<?php


namespace Aropixel\SyliusStockMovementPlugin\Factory;


use Aropixel\SyliusStockMovementPlugin\Entity\StockMovement;
use Aropixel\SyliusStockMovementPlugin\Entity\StockMovementInterface;
use Sylius\Component\Core\Model\OrderInterface;
use Sylius\Component\Core\Model\ProductVariantInterface;
use Symfony\Component\Security\Core\Security;

class StockMovementFactory implements StockMovementFactoryInterface
{
    /**
     * @var Security
     */
    private $security;

    public function __construct(
        Security $security
    ){
        $this->security = $security;
    }

    public function createManualStockMovement(ProductVariantInterface $productVariant): StockMovementInterface
    {
        $adminUser = $this->security->getUser();

        $stockMovement = new StockMovement();
        $stockMovement->setProductVariant($productVariant);
        $stockMovement->setQuantity((int)$productVariant->getOnHand());
        $stockMovement->setMovement($productVariant->getStockMovement());
        $stockMovement->setOrigin(StockMovement::ORIGIN_MANUAL);
        $stockMovement->setAdminUser($adminUser);

        return $stockMovement;
    }

    public function createOrderStockMovement(ProductVariantInterface $productVariant, OrderInterface $order): StockMovementInterface
    {
        $stockMovement = new StockMovement();
        $stockMovement->setProductVariant($productVariant);
        $stockMovement->setQuantity($productVariant->getOnHand());
        $stockMovement->setMovement($productVariant->getStockMovement());
        $stockMovement->setOrigin(StockMovement::ORIGIN_ORDER);
        $stockMovement->setOrder($order);

        return $stockMovement;
    }

}

