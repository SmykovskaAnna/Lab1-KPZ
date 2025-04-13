<?php

require_once 'Money.php';

class UAH extends Money {
    public function __toString(): string {
        return parent::__toString() . ' грн';
    }
}

?>