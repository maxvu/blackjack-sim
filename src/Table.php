<?php

namespace maxvu\blackjackSim;

class Table {

    protected $rules;
    protected $shoe;
    protected $maxPlayers;
    protected $seats;
    protected $dealerHand;

    public function __construct ( RuleSet $rules, int $maxPlayers = 5 ) {
        $this->rules = $rules;
        $this->shoe = Shoe::generate( $rules->getRule( 'deckCount' ) );
        $this->maxPlayers = $maxPlayers;
        $this->seats = [];
        $this->dealerHand = new Hand;
    }

    public function getRules () {
        return $this->rules;
    }

    public function getShoePenetration () {
        return $this->shoe->getPenetration();
    }

    public function getSeat ( $id ) {
        return $this->seats[ $id ] ?? null;
    }

    public function getSeats () {
        return $this->seats;
    }

    public function getDealerHand () {
        return $this->dealerHand;
    }

    public function addPlayer ( Player $player, Bankroll $roll ) {
        if ( sizeof( $this->seats ) >= $this->maxPlayers )
            throw new \Exception( "No room for player $id at table." );
        $this->seats[] = new Seat( $player, $roll );
        return $this;
    }

};
