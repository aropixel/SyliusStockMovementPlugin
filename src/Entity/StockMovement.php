<?php


namespace Aropixel\SyliusStockMovementPlugin\Entity;


use Sylius\Component\Core\Model\UserInterface;
use Sylius\Component\Core\Model\ProductVariantInterface;
use Sylius\Component\Order\Model\OrderInterface;
use Sylius\Component\Resource\Model\ResourceInterface;

class StockMovement  implements ResourceInterface, StockMovementInterface
{
    public const ORIGIN_MANUAL = "manual";
    public const ORIGIN_ORDER = "order";

    /** @var int */
    private $id;

    /** @var \DateTime */
    private $createdAt;

    /** @var int */
    private $quantity;

    /** @var int */
    private $movement;

    /** @var string */
    private $origin;

    /** @var ?OrderInterface */
    private $order;

    /** @var ?\Symfony\Component\Security\Core\User\UserInterface */
    private $adminUser;

    /** @var ProductVariantInterface */
    private $productVariant;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return string
     */
    public function getOrigin(): string
    {
        return $this->origin;
    }

    /**
     * @param string $origin
     */
    public function setOrigin(string $origin): void
    {
        $this->origin = $origin;
    }

    /**
     * @return OrderInterface|null
     */
    public function getOrder(): ?OrderInterface
    {
        return $this->order;
    }

    /**
     * @param OrderInterface|null $order
     */
    public function setOrder(?OrderInterface $order): void
    {
        $this->order = $order;
    }

    /**
     * @return \Symfony\Component\Security\Core\User\UserInterface|null
     */
    public function getAdminUser(): ?\Symfony\Component\Security\Core\User\UserInterface
    {
        return $this->adminUser;
    }

    /**
     * @param \Symfony\Component\Security\Core\User\UserInterface|null $adminUser
     */
    public function setAdminUser(?\Symfony\Component\Security\Core\User\UserInterface $adminUser): void
    {
        $this->adminUser = $adminUser;
    }

    /**
     * @return ProductVariantInterface
     */
    public function getProductVariant(): ProductVariantInterface
    {
        return $this->productVariant;
    }

    /**
     * @param ProductVariantInterface $productVariant
     */
    public function setProductVariant(ProductVariantInterface $productVariant): void
    {
        $this->productVariant = $productVariant;
    }

    /**
     * @return int
     */
    public function getMovement(): int
    {
        return $this->movement;
    }

    /**
     * @param int $movement
     */
    public function setMovement(int $movement): void
    {
        $this->movement = $movement;
    }

}
