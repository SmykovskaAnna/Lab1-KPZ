<?php

require_once 'Money.php';

class USD extends Money {
    public function __toString(): string {
        return '$' . parent::__toString();
    }
}

?>