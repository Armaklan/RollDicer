<?php

namespace jdRoll\Entity;

/**
 * Description of Dice
 *
 * @package Dice
 * @copyright (C) 2013 jdRoll
 * @license MIT
 */
class Dice {

    var $type;
    var $resultat;
    var $randService;

    function __construct($randService, $type) {
        $this->type = $type;
        $this->randService = $randService;
    }

    public function launch() {
        return $this->randService->getValue(1, $this->type);
    }

}

?>
