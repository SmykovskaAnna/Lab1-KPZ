<?php

class Money {
    private int $whole;
    private int $cents;

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
}

?>