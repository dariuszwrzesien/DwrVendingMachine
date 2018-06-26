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
     * @var float
     */
    private $credit = 0;

    /**
     * VendingMachine constructor.
     * @param Inventory $inventory
     */
    public function __construct(Inventory $inventory) {
        $this->inventory = $inventory;
    }

    public function insertCoin(float $nominal): void {
        $this->credit += $nominal;
    }

    /**
     * @return array
     */
    public function getProductList(): array {
        $productList = [];
        foreach($this->inventory as $slot) {
            $productList[$slot->selector()] = ['product' => $slot->product(), 'amount' => $slot->amount()];
        }

        return $productList;
    }

    public function getCredit(): float {
        return $this->credit;
    }
}