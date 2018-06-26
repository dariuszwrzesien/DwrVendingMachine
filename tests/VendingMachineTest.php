<?php
declare(strict_types=1);

namespace VM;

use PHPUnit\Framework\TestCase;
use VM\Model\Slot;
use VM\Model\Product;
use VM\Model\Inventory;

final class VendingMachineTest extends TestCase
{
    public function testWrzucamDoMaszynyMonetyWyswietlaczPokazujeMiJakaWartoscWrzucilem(): void
    {
        $this->assertTrue(true);
    }

    public function testNaZadanieMaszynaPokazujeMiDostepneProdukty(): void
    {
        //given
        $product1 = new Product('woda', 0.65);
        $product2 = new Product('kola', 1);
        $product3 = new Product('energolek', 1.50);

        $inventory = new Inventory(
            new Slot($product1, 10),
            new Slot($product2, 15),
            new Slot($product3, 20)
        );

        $productList = [
            [
                'product' => $product1,
                'amount' => 10
            ],
            [
                'product' => $product2,
                'amount' => 15
            ],
            [
                'product' => $product3,
                'amount' => 20
            ],
        ];

        //when
        $vm = new VendingMachine($inventory);

        //then
        $this->assertEquals($productList, $vm->getProductList());
    }
}