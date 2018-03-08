<?php

/**
 * @author    Jörg Lautenschlager <jl@solutiondrive.de>
 * @copyright 2017 solutionDrive GmbH (http://www.solutiondrive.de)
 */
class FrontendTest extends Enlight_Components_Test_Controller_TestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->dispatch('/');
    }

    public function testSmartyVariables()
    {
        $smartyAssigns = $this->View()->getAssign();

        $this->assertArrayHasKey('jlauteEnvironment', $smartyAssigns);
        $this->assertEquals('testing', $smartyAssigns['jlauteEnvironment']);
    }
}
