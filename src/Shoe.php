<?php

namespace maxvu\blackjackSim;

class Shoe {

    public static function generate ( int $numDecks ) {
        $numDecks = abs( $numDecks );
        $shoe = new Pile( [] );
        while ( $numDecks-- )
            ( Deck::generate() )->moveTo( $shoe );
        return new Shoe( $shoe->getCards() );
    }

    protected $undrawn;
    protected $discard;
    protected $initSize;

    public function __construct ( array $init ) {
        $this->undrawn = new Pile( $init );
        $this->discard = new Pile( [] );
        $this->initSize = sizeof( $init );
    }

    public function draw () {
        return $this->undrawn->draw();
    }

    public function discard ( Card $card ) {
        $this->discard[] = $card;
        return $this;
    }

    public function shuffle ( ShuffleProvider $shuffler ) {
        $this->discard->moveTo( $this->undrawn );
        $this->undrawn->shuffle( $shuffler );
        return $this;
    }

    public function getShoe () {
        return $this->undrawn;
    }

    public function getDiscardPile () {
        return $this->discard;
    }

    public function getPenetration () {
        if ( $this->initSize === 0 )
            return 1;
        return 1 - sizeof( $this->undrawn ) / $this->initSize;
    }

};
