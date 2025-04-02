<?php

require_once 'Product.php';

class Warehouse {
    private array $products = [];

    public function addProduct(Product $product, int $quantity): void {
        $this->products[] = [
            'product' => $product,
            'quantity' => $quantity,
            'date_added' => date('Y-m-d')
        ];
    }

    public function getProducts(): array {
        return $this->products;
    }
}

?>