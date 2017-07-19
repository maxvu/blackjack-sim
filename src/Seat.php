<?php

namespace maxvu\blackjackSim;

class Seat {

    protected $player;
    protected $bankroll;
    protected $bet;
    protected $insuranceBet;
    protected $hand;

    public function __construct (
        Player $player,
        Bankroll $bankroll,
        $bet = 0,
        $insuranceBet = 0,
        $hand = []
    ) {
        $this->player = $player;
        $this->bankroll = $bankroll;
        $this->bet = $bet;
        $this->insuranceBet = 0;
        $this->hand = $hand;
    }

    public function getPlayer () {
        return $this->player;
    }

    public function getBankroll () {
        return $this->bankroll;
    }

    public function getBet () {
        return $this->bet;
    }

    public function getHand () {
        return $this->hand;
    }

    public function dealCard ( Card $card ) {
        $this->hand[] = $card;
        return $this;
    }

    public function takeHand () {
        $toTake = $this->hand;
        $this->hand = [];
        return $toTake;
    }

    public function clone () {
        return new Seat(
            $this->player->clone(),
            $this->bankroll->clone(),
            $this->bet,
            $this->insuranceBet,
            $this->$hand->clone();
        );
    }

};
