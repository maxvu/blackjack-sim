<?php

namespace maxvu\blackjackSim;

class Card {

    protected $suit;
    protected $number;

    public function __construct ( Suit $suit, Number $number ) {
        $this->suit = $suit;
        $this->number = $number;
    }

    public function getSuit () {
        return $this->suit;
    }

    public function getNumber () {
        return $this->number;
    }

    public function getHighValue () {
        switch ( $this->number->get() ) {
            case Number::ACE: return 11; break;
            case Number::TWO: return 2; break;
            case Number::THREE: return 3; break;
            case Number::FOUR: return 4; break;
            case Number::FIVE: return 5; break;
            case Number::SIX: return 6; break;
            case Number::SEVEN: return 7; break;
            case Number::EIGHT: return 8; break;
            case Number::NINE: return 9; break;
            case Number::TEN: return 10; break;
            case Number::JACK: return 10; break;
            case Number::QUEEN: return 10; break;
            case Number::KING: return 10; break;
        }
    }

    public function getLowValue () {
        if ( $this->number->get() === Number::ACE )
            return 1;
        return $this->getHighValue();
    }

    public function __toString () {
        return $this->number->asDigit() . $this->suit->asSymbol();
    }

};
