<?php
declare(strict_types=1);

namespace VM;

use VM\Entity\Inventory;
use VM\Service\InventoryService;
use VM\VO\Coin;
use VM\Utility\Calculation as Calc;

/**
 * Class VendingMachine
 * @package VM
 */
class VendingMachine
{

    /**
     * @var InventoryService
     */
    private $inventory;

    /**
     * @var int
     */
    private $credit = 0;

    /**
     * VendingMachine constructor.
     * @param Inventory $inventory
     */
    public function __construct(Inventory $inventory)
    {
        $this->inventory = new InventoryService($inventory);
    }

    /**
     * @return InventoryService
     */
    public function inventory()
    {
        return $this->inventory;
    }

    /**
     * @param Coin $coin
     */
    public function insertCoin(Coin $coin): void
    {
        $this->credit += $coin->value();
    }

    /**
     * @param string $selector
     */
    public function buyProduct(string $selector): void
    {
        $slot = $this->inventory->getSlotBySelector($selector);
        if ($this->credit >= $slot->product()->price()){
            if(!$slot->isEmpty()){
                $slot->subtractProduct();
                $this->credit -= $slot->product()->price();
            }
        }
    }

    /**
     * @return float
     */
    public function displayCredits(): float
    {
        return Calc::moneyFormat($this->credit);
    }

    /**
     * @return float
     */
    public function returnCredits(): float
    {
        $credit = $this->credit;
        $this->credit = 0;

        return Calc::moneyFormat($credit);
    }
}