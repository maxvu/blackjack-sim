<?php

namespace maxvu\blackjackSim;

interface PostDealOption extends Option {

    public function getBet () {
        return $this->table->getSeat( $this->decider->getId() )
            ->getBet();
    }

    public function getUpCard () {
        return $this->table->getDealerHand()->getCards()[ 1 ];
    }

    public function getHand () {
        return $this->getSeat( $this->decider->getId() )->getHand()->clone();
    }

    public function getTableSeats () {
        return array_map( function ( $seat ) {
            return $seat->clone()
        }, $this->table->getSeats() );
    }

};
