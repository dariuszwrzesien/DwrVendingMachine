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

    /**
     * @param float $coin
     */
    public function insertCoin(float $coin): void {
        $this->credit += $coin;
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
     * @return float
     */
    public function displayCredits(): float {
        return $this->credit;
    }

    /**
     * @return float
     */
    public function returnCredits(): float {
        $credit = $this->credit;
        $this->credit = 0;

        return $credit;
    }
}