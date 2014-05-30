<?php

namespace jdRoll\Entity;

use jdRoll\Entity\Dice;

/**
 * Description of Dice
 *
 * @package Dice
 * @copyright (C) 2013 jdRoll
 * @license MIT
 */
class ExplosifDice extends Dice {


    public function launch() {
        $diceResult = $this->type;
        $globalResult = 0;
        while($diceResult === $this->type) {
            $diceResult = parent::launch();
            $globalResult += $diceResult;
        }
        return $globalResult;
    }

}

?>
