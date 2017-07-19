<?php

namespace maxvu\blackjackSim;

class InsuranceOption extends PostDealOption {

    protected $table;

    public function __construct ( Table $table ) {
        $this->table = $table;
    }

};
