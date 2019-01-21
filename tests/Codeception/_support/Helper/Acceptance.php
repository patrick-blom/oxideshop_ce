<?php
namespace OxidEsales\EshopCommunity\Tests\Codeception\Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

use Codeception\TestInterface;

class Acceptance extends \Codeception\Module
{

    /**
     * Define custom actions here
     */
    public function _before(TestInterface $I)
    {
        Context::setActiveUser(null);
    }
}
