<?php
declare(strict_types=1);

namespace VM\Model;

/**
 * Class Inventory
 * @package VM\Model
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
    public function __construct(Slot ...$slots) {
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