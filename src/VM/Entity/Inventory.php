<?php
declare(strict_types=1);

namespace VM\Entity;

/**
 * Class Inventory
 * @package VM\Entity
 */
class Inventory implements \IteratorAggregate
{
    /**
     * @var array
     */
    private $slots = [];

    /**
     * Inventory constructor.
     * @param Slot ...$slots
     */
    public function __construct(Slot ...$slots)
    {
        foreach($slots as $slot) {
            $this->slots[] = $slot;
        }
    }

    /**
     * @return \ArrayIterator
     */
    public function getIterator(): \ArrayIterator
    {
        return new \ArrayIterator($this->slots);
    }
}