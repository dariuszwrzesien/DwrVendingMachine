<?php
declare(strict_types=1);

namespace VM\Model;

/**
 * Class Product
 * @package VM\Model
 */
class Product
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var float
     */
    private $price;

    /**
     * Product constructor.
     * @param string $name
     * @param float $price
     */
    public function __construct(string $name, float $price) {
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function name(): string {
        return $this->name;
    }

    /**
     * @return float
     */
    public function price(): float {
        return $this->price;
    }
}