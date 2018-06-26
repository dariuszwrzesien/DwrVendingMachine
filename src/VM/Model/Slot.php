<?php
declare(strict_types=1);

namespace VM\Model;

/**
 * Class Slot
 * @package VM\Model
 */
class Slot
{
    /**
     * @var Product
     */
    private $product;

    /**
     * @var int
     */
    private $amount;

    public function __construct(Product $product, int $amount)
    {
        $this->product = $product;
        $this->amount = $amount;
    }

    /**
     * @return Product
     */
    public function product(): Product {
        return $this->product;
    }

    /**
     * @return int
     */
    public function amount(): int {
        return $this->amount;
    }
}