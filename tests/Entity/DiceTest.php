<?php

use jdRoll\Entity\Dice;

class DiceTest extends PHPUnit_Framework_TestCase
{

    /**
    * Test dice is correctly launch
    */
    public function testLaunch() {
        $randService = $this->getMock('RandomService', array('getValue'));
        $randService->expects($this->once())
             ->method('getValue')
             ->will($this->returnValue(5));


        $dice = new Dice($randService, 6);
        $resultat = $dice->launch();
        $this->assertEquals(5, $resultat);
    }

    /**
    * Test dice dont relaunch when the max value is given
    */
    public function testLaunchMaxWihoutExplosion() {
        $randService = $this->getMock('RandomService', array('getValue'));
        $randService->expects($this->once())
             ->method('getValue')
             ->will($this->returnValue(6));


        $dice = new Dice($randService, 6);
        $resultat = $dice->launch();
        $this->assertEquals(6, $resultat);
    }

}
