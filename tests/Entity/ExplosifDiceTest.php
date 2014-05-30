<?php

use jdRoll\Entity\ExplosifDice;

class ExplosifDiceTest extends PHPUnit_Framework_TestCase
{

    /**
    * Test dice is correctly launch
    */
    public function testLaunch() {
        $randService = $this->getMock('RandomService', array('getValue'));
        $randService->expects($this->once())
             ->method('getValue')
             ->will($this->returnValue(5));


        $dice = new ExplosifDice($randService, 6);
        $resultat = $dice->launch();
        $this->assertEquals(5, $resultat);
    }

    /**
    * Test dice relaunch when the max value is given
    */
    public function testLaunchMaxWithOneExplosion() {
        $randService = $this->getMock('RandomService', array('getValue'));

        $randService->expects($this->at(0))
             ->method('getValue')
             ->will($this->returnValue(6));

        $randService->expects($this->at(1))
             ->method('getValue')
             ->will($this->returnValue(5));

        $dice = new ExplosifDice($randService, 6);
        $resultat = $dice->launch();
        $this->assertEquals(11, $resultat);
    }

    /**
    * Test dice relaunch many times
    */
    public function testLaunchMaxWithManyExplosion() {
        $randService = $this->getMock('RandomService', array('getValue'));

        $randService->expects($this->at(0))
             ->method('getValue')
             ->will($this->returnValue(6));

        $randService->expects($this->at(1))
             ->method('getValue')
             ->will($this->returnValue(6));

        $randService->expects($this->at(2))
             ->method('getValue')
             ->will($this->returnValue(3));

        $dice = new ExplosifDice($randService, 6);
        $resultat = $dice->launch();
        $this->assertEquals(15, $resultat);
    }

}
