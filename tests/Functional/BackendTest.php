<?php
/**
 * © solutionDrive GmbH
 */

/**
 * @author    Jörg Lautenschlager <jl@solutiondrive.de>
 * @copyright 2017 solutionDrive GmbH (http://www.solutiondrive.de)
 */
class BackendTest extends Enlight_Components_Test_Controller_TestCase
{
    public function setUp()
    {
        parent::setUp();

        // disable auth and acl
        Shopware()->Plugins()->Backend()->Auth()->setNoAuth();
        Shopware()->Plugins()->Backend()->Auth()->setNoAcl();

        $this->dispatch('backend');
    }

    public function testSmartyVariables()
    {
        $smartyAssigns = $this->View()->getAssign();

        $this->assertArrayHasKey('jlauteEnvironment', $smartyAssigns);
        $this->assertEquals('testing', $smartyAssigns['jlauteEnvironment']);
    }
}
