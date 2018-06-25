<?php
declare(strict_types=1);

namespace VM;

use PHPUnit\Framework\TestCase;

final class VendingMachineTest extends TestCase
{
    public function testWrzucamDoMaszynyMonetyWyswietlaczPokazujeMiJakaWartoscWrzucilem(): void
    {
        $this->assertTrue(true);
    }

    public function testNaZadanieMaszynaPokazujeMiDostepneProdukty(): void
    {
        $products = [
            new Product('woda', 0.65, 10),
            new Product('kola', 1, 15),
            new Product('energolek', 1.50, 20)
        ];
        $vm = new VendingMachine($products);
        $this->assertEquals($products, $vm->getProducts());
    }
}