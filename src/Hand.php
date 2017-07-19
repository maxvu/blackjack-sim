<?php

namespace maxvu\blackjackSim;

class Hand {

    protected $cards;

    public function __construct ( array $cards = [] ) {
        $this->cards = $cards;
    }

    public function getCards () {
        return $this->cards;
    }

    public function isSoft () {
        return $this->getHighCount() !== $this->getLowCount();
    }

    public function isHard () {
        return !$this->isSoft();
    }

    public function getHighCount() {
        return array_reduce( $this->cards, function ( $total, $card ) {
            return $total + $card->getHighValue();
        }, 0 );
    }

    public function getLowCount () {
        return array_reduce( $this->cards, function ( $total, $card ) {
            return $total + $card->getLowValue();
        }, 0 );
    }

    public function isBust () {
        return $this->getLowCount() > 21;
    }

    public function is21 () {
        return $this->getHighCount() === 21 || $this->getLowCount() === 21;
    }

    public function __toString () {
        return implode( $this->cards, ', ' );
    }

    public function clone () {
        return new Hand( $this->cards );
    }

};
