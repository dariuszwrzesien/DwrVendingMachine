<?php
declare(strict_types=1);

namespace VM;

class VendingMachine
{
    private $products;

    public function __construct(array $products) {
        $this->products = $products;
    }

    public function getProducts() {
        return $this->products;
    }
}