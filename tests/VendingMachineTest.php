<?php
declare(strict_types=1);

namespace VM;

use PHPUnit\Framework\TestCase;
use VM\Entity\Slot;
use VM\Entity\Product;
use VM\Entity\Inventory;
use VM\VO\Coin;

final class VendingMachineTest extends TestCase
{
    /**
     * @var VendingMachine
     */
    private $minimalVm;

    public function setUp(): void
    {
        $slot = new Slot('A', new Product('test', 65), 10);
        $inventory = new Inventory($slot);
        $vm = new VendingMachine($inventory);

        $this->minimalVm = $vm;
    }

    public function testNaZadanieMaszynaPokazujeMiDostepneProdukty(): void
    {
        //given
        $product1 = new Product('woda', 65);
        $product2 = new Product('kola', 100);
        $product3 = new Product('energolek', 150);

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
        $this->assertEquals($productList, $vm->inventory()->getProductList());
    }

    public function testWrzucamDoMaszynyMonetyWyswietlaczPokazujeMiJakaWartoscWrzucilem(): void
    {
        //when
        $this->minimalVm->insertCoin(new Coin(Coin::NICKEL));
        $this->minimalVm->insertCoin(new Coin(Coin::NICKEL));
        $this->minimalVm->insertCoin(new Coin(Coin::DIME));
        $this->minimalVm->insertCoin(new Coin(Coin::QUARTER));
        $this->minimalVm->insertCoin(new Coin(Coin::QUARTER));
        $this->minimalVm->insertCoin(new Coin(Coin::DOLLAR));

        //then
        $this->assertEquals(1.70, $this->minimalVm->displayCredits());
    }

    public function testPoWrzuceniuDoMaszynyMonetNaciskamPrzyciskZwrotMonetAutomatWydajeMonety(): void
    {
        //when
        $this->minimalVm->insertCoin(new Coin(Coin::QUARTER));
        $this->minimalVm->insertCoin(new Coin(Coin::QUARTER));
        $this->minimalVm->insertCoin(new Coin(Coin::DOLLAR));

        //then
        $this->assertEquals(1.50, $this->minimalVm->returnCredits());
        $this->assertEquals(0, $this->minimalVm->displayCredits());
    }

    public function testPoWrzuceniuOdpowiedniejIlosciMonetIWybraniuProduktuInwentarzZostajePomniejszonyOZakupionyTowar(): void
    {
        //when
        $selector = 'A';
        $this->minimalVm->insertCoin(new Coin(Coin::DOLLAR));
        $this->minimalVm->buyProduct($selector);

        //then
//        $this->assertEquals(0.35, $this->minimalVm->displayCredits());

        $slotInfo = $this->minimalVm->inventory()->getProductList()[$selector];
        $this->assertEquals(9, $slotInfo['amount']);
    }
}