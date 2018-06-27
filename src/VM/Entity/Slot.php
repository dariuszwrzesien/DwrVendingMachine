<?php
declare(strict_types=1);

namespace VM\Entity;

/**
 * Class Slot
 * @package VM\Entity
 */
class Slot
{
    /**
     * @var string
     */
    private $selector;

    /**
     * @var Product
     */
    private $product;

    /**
     * @var int
     */
    private $amount = 0;

    public function __construct(string $selector, Product $product, int $amount)
    {
        $this->product = $product;
        $this->amount = $amount;
        $this->selector = $selector;
    }

    /**
     * @return Product
     */
    public function selector(): string
    {
        return $this->selector;
    }

    /**
     * @return Product
     */
    public function product(): Product
    {
        return $this->product;
    }

    /**
     * @return int
     */
    public function amount(): int
    {
        return $this->amount;
    }

    public function subtractProduct(): void
    {
        $this->amount -= 1;
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->amount === 0;
    }


}