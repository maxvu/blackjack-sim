<?php

namespace maxvu\blackjackSim;

abstract class Deck {

    public static function generate () {
        $deck = [];
        foreach ( Suit::getAll() as $suit ) {
            foreach ( Number::getAll() as $number ) {
                $deck[] = new Card(
                    new Suit( $suit ),
                    new Number( $number )
                );
            }
        }
        return new Pile( $deck );
    }

};
