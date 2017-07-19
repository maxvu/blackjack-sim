<?php

namespace maxvu\blackjackSim;

abstract class Option {

    protected $decider;
    protected $table;

    abstract public function getChoices ();

    public function getBankroll () {
        return $this->table->getSeat( $decider->getId() )
            ->getBankroll()
            ->clone();
    }

    public function getRules () {
        return $table->getRules();
    }

    public function getShoePenetration () {
        return $table->getShoePenetration();
    }

};
