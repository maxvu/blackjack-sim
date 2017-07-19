<?php

namespace maxvu\blackjackSim;

class PhpNativeShuffle implements ShuffleProvider {

    public function shuffle ( array $items ) {
        shuffle( $items );
        return $items;
    }

};
