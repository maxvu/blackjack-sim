<?php

namespace maxvu\blackjackSim;

class BetOption {

    public static function create ( $min, $max, $step ) {
        $bets = [ 0 ];
        for ( $i = $min; $i <= $max; $i += $step )
            $bets[] = $i;
        return new BetOption( $bets );
    }

    protected $bets;

    private function __construct ( array $bets ) {
        $this->bets = $bets;
    }

};
