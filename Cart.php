<?php

require_once 'Product.php';

class Cart {
    private array $items = [];

    public function addToCart(Product $product, int $quantity): void {
        $this->items[] = [
            'product' => $product,
            'quantity' => $quantity
        ];
    }

    public function getItems(): array {
        return $this->items;
    }

    public function getTotal(): string {
        $totalWhole = 0;
        $totalCents = 0;
        foreach ($this->items as $item) {
            $price = $item['product']->getPriceInUAH(); // Викликаємо getPriceInUAH()
            [$whole, $cents] = explode('.', str_replace([' грн', '$'], '', $price));
            $totalWhole += (int)$whole * $item['quantity'];
            $totalCents += (int)$cents * $item['quantity'];
        }
        $totalWhole += intdiv($totalCents, 100);
        $totalCents %= 100;
        return "{$totalWhole}.{$totalCents}";
    }

    public function getTotalUSD(): string {
        $totalWhole = 0;
        $totalCents = 0;
        foreach ($this->items as $item) {
            $priceInUSD = $item['product']->getPriceInUSD();
            [$whole, $cents] = explode('.', str_replace(['$', ' '], '', $priceInUSD)); // Замість грн обробляйте долари
            $totalWhole += (int)$whole * $item['quantity'];
            $totalCents += (int)$cents * $item['quantity'];
        }
        $totalWhole += intdiv($totalCents, 100);
        $totalCents %= 100;
        return "{$totalWhole}.{$totalCents}";
    }
}

?>