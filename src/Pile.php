<?php

namespace maxvu\blackjackSim;

class Pile {

    public static function empty () {
        return new Pile( [] );
    }

    protected $cards;

    public function __construct ( array $cardsInit ) {
        $this->cards = $cardsInit;
    }

    public function getCards () {
        return $this->cards;
    }

    public function draw () {
        if ( sizeof( $this->cards ) <= 0 )
            throw new \Exception( "Tried to draw an empty card." );
        return array_pop( $this->cards );
    }

    public function peek () {
        if ( sizeof( $this->cards ) <= 0 )
            return null;
        return $this->cards[ 0 ];
    }

    public function takeAtop ( Card $card ) {
        array_unshift( $this->cards, $card );
        return $this;
    }

    public function takeUnder ( Card $card ) {
        array_push( $this->cards, $card );
        return $this;
    }

    public function shuffle ( ShuffleProvider $shuffler ) {
        $this->cards = $shuffler->shuffle( $this->cards );
        return $this;
    }

    public function moveTo ( Pile $target ) {
        $target->cards = array_merge( $target->cards, $this->cards );
        $this->cards = [];
        return $this;
    }

    public function getSize () {
        return sizeof( $this->cards );
    }

    public function isEmpty () {
        return sizeof( $this->cards ) === 0;
    }

    public function copy () {
        return new Pile( $this->cards );
    }

};
