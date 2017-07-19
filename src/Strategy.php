<?php

namespace maxvu\blackjackSim;

interface Strategy {

    public function decideBet (
        BetOption $option
    );

    public function decideInsurance (
        Hand $playerHand,
        Hand $dealerHand,
        InsuranceOption $option
    );

    public function decideHand (
        Hand $playerHand,
        Hand $dealerHand,
        HandOption $option
    );

};
