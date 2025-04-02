<?php

require_once 'Warehouse.php';

class Reporting {
    private array $incomeInvoices = [];
    private array $outgoingInvoices = [];

    public function registerIncome(Product $product, int $quantity, Warehouse $warehouse): void {
        $warehouse->addProduct($product, $quantity);
        $this->incomeInvoices[] = [
            'product' => $product,
            'quantity' => $quantity,
            'date' => date('Y-m-d')
        ];
    }

    public function getIncomeInvoices(): array {
        return $this->incomeInvoices;
    }
}

?>