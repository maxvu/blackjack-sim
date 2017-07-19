<?php

namespace maxvu\blackjackSim;

class Suit {

    const CLUBS = 1;
    const DIAMONDS = 2;
    const HEARTS = 4;
    const SPADES = 8;

    public static function getAll () {
        return [
            Suit::CLUBS,
            Suit::DIAMONDS,
            Suit::HEARTS,
            Suit::SPADES
        ];
    }

    public static function isValid ( int $suit ) {
        return in_array( $suit, Suit::getAll() );
    }

    private $suit;

    public function __construct ( $suit ) {
        if ( !Suit::isValid( $suit ) )
            throw new \Exception( "Invalid suit: $suit." );
        $this->suit = $suit;
    }

    public function get () {
        return $this->suit;
    }

    public function isRed () {
        return array_search( $this->suit, [ Suit::DIAMONDS, Suit::HEARTS ] );
    }

    public function isBlack () {
        return array_search( $this->suit, [ Suit::CLUBS, Suit::SPADES ] );
    }

    public function asSymbol () {
        switch ( $this->suit ) {
            case Suit::CLUBS: return '♣'; break;
            case Suit::DIAMONDS: return '♦'; break;
            case Suit::HEARTS: return '♥'; break;
            case Suit::SPADES: return '♠'; break;
        }
    }

    public function asLetter () {
        switch ( $this->suit ) {
            case Suit::CLUBS: return 'C'; break;
            case Suit::DIAMONDS: return 'D'; break;
            case Suit::HEARTS: return 'H'; break;
            case Suit::SPADES: return 'S'; break;
        }
        return '?';
    }

};
