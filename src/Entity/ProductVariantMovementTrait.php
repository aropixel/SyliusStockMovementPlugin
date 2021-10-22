<?php


namespace Aropixel\SyliusStockMovementPlugin\Entity;

trait ProductVariantMovementTrait
{

    private $oldOnHand;

    /**
     * @return mixed
     */
    public function getOldOnHand(): int
    {
        return $this->oldOnHand;
    }

    public function setOnHand(?int $onHand): void
    {
        $this->oldOnHand = $this->onHand;
        $this->onHand = (0 > $onHand) ? 0 : $onHand;
    }

    public function getStockMovement(): int
    {
        return $this->getOnHand() - $this->getOldOnHand();
    }


}
