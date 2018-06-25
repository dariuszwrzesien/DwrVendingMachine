<?php
declare(strict_types=1);

namespace VM;

class Product
{
    private $name;
    private $price;
    private $amount;

    public function __construct(string $name, float $price, int $amount) {
        $this->name = $name;
        $this->price = $price;
        $this->amount = $amount;
    }
}