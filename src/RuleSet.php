<?php

namespace maxvu\blackjackSim;

class RuleSet {

    public static function VegasStrip () {
        return new RuleSet([
            'deckCount'     => 4,
            'maxPenetration'   => 0.5 // TODO: find realistic figure
        ]);
    }

    public static function AtlanticCity () {
        return new RuleSet([
            'deckCount'     => 8,
            'lateSurrender' => true,
            'maxPenetration'   => 0.75 // TODO: find realistic figure
        ]);
    }

    public static function European () {
        return new RuleSet([
            'deckCount'          => 6,
            'doubleOnlyOn10Or11' => true,
            'splitCount'         => false,
            'maxPenetration'        => 0.5 // high variance, unimportant
        ]);
    }

    public static function getRuleSpec () {
        return [
            'deckCount' => [
                'desc' => 'How many decks sit in the shoe?',
                'validate' => function ( $count ) {
                    return is_integer( $count ) && $count >= 1;
                }
            ],
            'soft17Stand' => [
                'desc' => 'Must the dealer stand on a soft 17?',
                'validate' => function ( $stand ) {
                    return $stand === true || $stand === false;
                },
                'default' => true
            ],
            'blackjackPayout' => [
                'desc' => 'What is the additional payout for player blackjack?',
                'validate' => function ( $payout ) {
                    return is_numeric( $payout );
                },
                'default' => 1.5
            ],
            'lateSurrender' => [
                'desc' => 'May players surrender late?',
                'validate' => function ( $surrender ) {
                    return $surrender === true || $surrender === false;
                },
                'default' => false
            ],
            'insurance' => [
                'desc' => 'Is insurance available?',
                'validate' => function ( $insurance ) {
                    return $insurance === true || $insurance === false;
                },
                'default' => true
            ],
            'splitCount' => [
                'desc' => 'How many times may a player split in one hand?',
                'validate' => function ( $count ) {
                    return is_integer( $count ) && $count >= 0;
                },
                'default' => 9999 // TODO: problematic for non-realistic games?
            ],
            'splitDouble' => [
                'desc' => 'Can you double on split hands?',
                'validate' => function ( $canDouble ) {
                    return $canDouble === true || $canDouble === false;
                },
                'default' => true
            ],
            'doubleOnlyOn10Or11' => [
                'desc' => 'Is doubling only allowed on ten and eleven hands?',
                'validate' => function ( $limitedDouble ) {
                    return $limitedDouble === true || $limitedDouble === false;
                },
                'default' => false
            ],
            'dealerPeek' => [
                'desc' => 'Does the dealer preemptively report blackjack?',
                'validate' => function ( $peeks ) {
                    return $peeks === true || $peeks === false;
                },
                'default' => true
            ],
            'dealerWinsTie' => [
                'desc' => "If a play ties hands, does the dealer win?",
                'validate' => function ( $wins ) {
                    return $wins === true || $wins === false;
                },
                'default' => false
            ],
            'maxPenetration' => [
                'desc' => 'At which penetration should the shoe be reshuffled?',
                'validate' => function ( $pc ) {
                    return is_numeric( $pc ) && $pc > 0.0 && $pc <= 100.0;
                }
            ]
        ];
    }

    protected $rules;

    public function __construct ( $opts ) {
        foreach ( RuleSet::getRuleSpec() as $rule => $spec ) {
            $opt = $options[ $rule ] ?? null;
            if ( isset( $opts[ $rule ] ) ) {
                if ( !call_user_func( $spec[ 'validate' ], $opts[ $rule ] ) ) {
                    throw new \Exception(
                        "Setting '$opt' invalid for rule $rule."
                    );
                }
                $this->rules[ $rule ] = $opts[ $rule ];
            } else {
                if ( isset( $spec[ 'default' ] ) )
                    $this->rules[ $rule ] = $spec[ 'default' ];
                else
                    throw new \Exception( "Missing rule '$rule'." );
            }
        }
    }

    public function getRule ( $ruleName ) {
        if ( !isset( $this->rules[ $ruleName ] ) )
            throw new \Exception( "Lookup on unknown rule '$ruleName'." );
        return $this->rules[ $ruleName ];
    }

};
