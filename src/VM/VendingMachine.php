<?php
declare(strict_types=1);

namespace VM;

use VM\Model\Inventory;

/**
 * Class VendingMachine
 * @package VM
 */
class VendingMachine
{
    /**
     * @var Inventory
     */
    private $inventory;

    /**
     * VendingMachine constructor.
     * @param Inventory $inventory
     */
    public function __construct(Inventory $inventory) {
        $this->inventory = $inventory;
    }

    /**
     * @return array
     */
    public function getProductList(): array {
        $productList = [];
        foreach($this->inventory as $slot) {
            $productList[] = ['product' => $slot->product(), 'amount' => $slot->amount()];
        }

        return $productList;
    }
}