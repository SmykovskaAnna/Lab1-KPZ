<?php

class Money {
    private int $whole;
    private int $cents;
    private const UAH_TO_USD = 40; // 1 USD = 40 UAH

    public function __construct(int $whole, int $cents) {
        $this->setMoney($whole, $cents);
    }

    public function setMoney(int $whole, int $cents): void {
        $this->whole = $whole;
        $this->cents = $cents % 100;
        $this->whole += intdiv($cents, 100);
    }

    public function getWhole(): int {
        return $this->whole;
    }

    public function getCents(): int {
        return $this->cents;
    }

    public function __toString(): string {
        return "{$this->whole}.{$this->cents}";
    }

    public function getPriceInUAH(): string {
        return "{$this->whole}.{$this->cents} грн";
    }

    public function getPriceInUSD(): string {
        $totalUAH = $this->whole + $this->cents / 100;
        $totalUSD = $totalUAH / self::UAH_TO_USD;
        return number_format($totalUSD, 2) . " USD";
    }
}

?>