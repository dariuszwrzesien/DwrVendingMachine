<?php
declare(strict_types=1);

namespace VM\Service;

use VM\Entity\Inventory;
use VM\Entity\Slot;

/**
 * Class InventoryService
 * @package VM\Service
 */
class InventoryService
{
    /**
     * @var Inventory
     */
    private $inventory;

    /**
     * InventoryService constructor.
     * @param Inventory $inventory
     */
    public function __construct(Inventory $inventory)
    {
        $this->inventory = $inventory;
    }

    /**
     * @return array
     */
    public function getProductList(): array {
        $productList = [];
        foreach($this->inventory as $slot) {
            $productList[$slot->selector()] = [
                'product' => $slot->product(),
                'amount' => $slot->amount()
            ];
        }

        return $productList;
    }

    /**
     * @param string $selector
     * @return Slot
     */
    public function getSlotBySelector(string $selector):? Slot
    {
        foreach($this->inventory as $slot) {
            if ($slot->selector() === $selector) {
                return $slot;
            }
        }
    }
}