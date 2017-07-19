<?php

namespace maxvu\blackjackSim;

interface class Player {

    public function getId ();
    public function seeCard ( Card $card );
    public function decideBet ( BetOption $option );
    public function decideInsurance ( InsuranceOption $hand );
    public function decideHand ( HandOption $hand );

};
