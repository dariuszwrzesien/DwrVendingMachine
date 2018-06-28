<?php
declare(strict_types=1);

namespace VM\Entity;

/**
 * Class Product
 * @package VM\Entity
 */
class Product
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $price;

    /**
     * Product constructor.
     * @param string $name
     * @param int $price
     */
    public function __construct(string $name, int $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function price(): int
    {
        return $this->price;
    }
}
