<?php

namespace VM\VO;

/**
 * Class Coin
 * @package VM
 */
class Coin
{
    const NICKEL = 5;
    const DIME = 10;
    const QUARTER = 25;
    const DOLLAR = 100;

    /**
     * @var int
     */
    private $value;

    /**
     * Coin constructor.
     * @param int $value
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function value(): int
    {
        return $this->value;
    }
}