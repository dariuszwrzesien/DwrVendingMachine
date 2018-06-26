<?php
declare(strict_types=1);

namespace VM;

use PHPUnit\Framework\TestCase;
use VM\Model\Slot;
use VM\Model\Product;
use VM\Model\Inventory;

final class VendingMachineTest extends TestCase
{
    public function testNaZadanieMaszynaPokazujeMiDostepneProdukty(): void
    {
        //given
        $product1 = new Product('woda', 0.65);
        $product2 = new Product('kola', 1);
        $product3 = new Product('energolek', 1.50);

        // @TODO selector musi być unikatowy,należało by sprawdzać/wymuszać tą unikatowość .
        $inventory = new Inventory(
            new Slot('A', $product1, 10),
            new Slot('B', $product2, 15),
            new Slot('C', $product3, 20)
        );

        $productList = [
            'A' => [
                'product' => $product1,
                'amount' => 10
            ],
            'B' => [
                'product' => $product2,
                'amount' => 15
            ],
            'C' => [
                'product' => $product3,
                'amount' => 20
            ],
        ];

        //when
        $vm = new VendingMachine($inventory);

        //then
        $this->assertEquals($productList, $vm->getProductList());
    }

    public function testWrzucamDoMaszynyMonetyWyswietlaczPokazujeMiJakaWartoscWrzucilem(): void
    {
        //given
        $slot = new Slot('A', new Product('test', 0.1), 10);
        $inventory = new Inventory($slot);
        $vm = new VendingMachine($inventory);

        //when
        $vm->insertCoin(0.05);
        $vm->insertCoin(0.05);
        $vm->insertCoin(0.10);
        $vm->insertCoin(0.25);
        $vm->insertCoin(0.25);
        $vm->insertCoin(1.00);

        //then
        $this->assertEquals(1.70, $vm->getCredit());
    }
}