<?php declare(strict_types=1);
/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace OxidEsales\EshopCommunity\Tests\Unit\Internal\Module\Install\Dao;


use OxidEsales\EshopCommunity\Internal\Module\Install\Dao\OxidEshopPackageDao;

class OxidEshopPackageDaoTest extends TestCase
{
    public function testGetPackageReturnsOxidEshopPackage()
    {
        $oxidEshopPackageDao = new OxidEshopPackageDao();

    }

    public function testGetPackageThrowsExceptionIfNoValidComposerJsonFileExisting()
    {

    }

}