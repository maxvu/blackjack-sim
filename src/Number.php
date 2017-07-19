<?php

namespace maxvu\blackjackSim;

class Number {

    const ACE = 1;
    const TWO = 2;
    const THREE = 3;
    const FOUR = 4;
    const FIVE = 5;
    const SIX = 6;
    const SEVEN = 7;
    const EIGHT = 8;
    const NINE = 9;
    const TEN = 10;
    const JACK = 11;
    const QUEEN = 12;
    const KING = 13;

    public static function getAll () {
        return [
            Number::ACE,
            Number::TWO,
            Number::THREE,
            Number::FOUR,
            Number::FIVE,
            Number::SIX,
            Number::SEVEN,
            Number::EIGHT,
            Number::NINE,
            Number::TEN,
            Number::JACK,
            Number::QUEEN,
            Number::KING
        ];
    }

    public function isValid ( int $number ) {
        return in_array( $number, Number::getAll() );
    }

    private $number;

    public function __construct ( $number ) {
        if ( !Number::isValid( $number ) )
            throw new \Exception( "Invalid number: $number." );
        $this->number = $number;
    }

    public function get () {
        return $this->number;
    }

    public function asDigit () {
        switch ( $this->number ) {
            case Number::ACE: return 'A'; break;
            case Number::TWO: return '2'; break;
            case Number::THREE: return '3'; break;
            case Number::FOUR: return '4'; break;
            case Number::FIVE: return '5'; break;
            case Number::SIX: return '6'; break;
            case Number::SEVEN: return '7'; break;
            case Number::EIGHT: return '8'; break;
            case Number::NINE: return '9'; break;
            case Number::TEN: return '10'; break;
            case Number::JACK: return 'J'; break;
            case Number::QUEEN: return 'Q'; break;
            case Number::KING: return 'K'; break;
        }
    }

};
