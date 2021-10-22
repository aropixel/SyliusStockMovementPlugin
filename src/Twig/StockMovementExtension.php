<?php


namespace Aropixel\SyliusStockMovementPlugin\Twig;

use Aropixel\SyliusStockMovementPlugin\Repository\StockMovementRepositoryInterface;
use Sylius\Component\Core\Model\ProductVariant;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;


class StockMovementExtension extends AbstractExtension
{

    /**
     * @var StockMovementRepositoryInterface
     */
    private $stockMovementRepository;

    public function __construct(StockMovementRepositoryInterface $stockMovementRepository)
    {
        $this->stockMovementRepository = $stockMovementRepository;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('getStockMovements', [$this, 'getStockMovements']),
        ];
    }

    public function getStockMovements(ProductVariant $productVariant): array
    {
        return $this->stockMovementRepository->findBy(['productVariant' => $productVariant]);
    }

}
