<?php

namespace maxvu\blackjackSim;

class Bankroll {

    protected $amount;

    public function __construct ( $initialAmount ) {
        $this->amount = $initialAmount;
    }

    public function give ( $amount ) {
        $this->amount += $amount;
        return $this;
    }

    public function take ( $amount ) {
        $this->amount -= $amount;
        return $this;
    }

    public function getAmount () {
        return $this->amount;
    }

    public function clone () {
        return new Bankroll( $this->amount );
    }

};
