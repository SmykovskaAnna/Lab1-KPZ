<?php

require_once 'Money.php';

class Product {
    private string $name;
    private Money $price;
    private string $category;

    public function __construct(string $name, Money $price, string $category = 'General') {
        $this->name = $name;
        $this->price = $price;
        $this->category = $category;
    }

    public function reducePrice(int $amount): void {
        $newWhole = $this->price->getWhole() - $amount;
        $this->price->setMoney($newWhole, $this->price->getCents());
    }

    public function getName(): string {
        return $this->name;
    }

    public function getPriceInUAH(): string {
        return $this->price->getPriceInUAH();
    }

    public function getPriceInUSD(): string {
        return $this->price->getPriceInUSD();
    }

    public function getCategory(): string {
        return $this->category;
    }
}

?>