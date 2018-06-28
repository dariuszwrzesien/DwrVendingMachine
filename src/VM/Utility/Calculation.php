<?php
declare(strict_types=1);

namespace VM\Utility;

class Calculation
{
    /**
     * @param int $value
     * @return float
     */
    public static function moneyFormat(int $value)
    {
        return (float) $value/100;
    }
}