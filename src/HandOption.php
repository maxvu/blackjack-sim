<?php

namespace maxvu\blackjackSim;

class HandOption {

    const STAND = 1;
    const HIT = 2;
    const DOUBLE = 3;
    const SPLIT = 4;
    const SURRENDER = 5;

    public static function getAll () {
        return [
            HandOption::STAND,
            HandOption::HIT,
            HandOption::DOUBLE,
            HandOption::SPLIT,
            HandOption::SURRENDER
        ];
    }

    public static function isValid ( $option ) {
        return isset( array_flip( HandOption::getAll() )[ $option ] );
    }

};
