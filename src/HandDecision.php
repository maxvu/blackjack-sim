<?php

namespace maxvu\blackjackSim;

class HandDecision {

    protected $options;

    public function __construct ( $options ) {
        $options = array_unique( $options );
        foreach ( $options as $option )
            if ( !HandOption::isValid( $option ) )
                throw new \Exception( "No such hand option: $option." );
        $this->options = array_flip( $options );
    }

    public function canHit () {
        return isset( $this->options[ HandOption::HIT ] );
    }

    public function canDoubleDown () {
        return isset( $this->options[ HandOption::DOUBLE ] );
    }

    public function canSplit () {
        return isset( $this->options[ HandOption::SPLIT ] );
    }

    public function canSurrender () {
        return isset( $this->options[ HandOption::SURRENDER ] );
    }

};
