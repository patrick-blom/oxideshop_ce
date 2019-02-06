<?php declare(strict_types=1);
/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace OxidEsales\EshopCommunity\Internal\Module\Install\Service;

use OxidEsales\EshopCommunity\Internal\Module\Install\DataObject\OxidEshopPackage;

/**
 * Interface ModuleFilesInstallerInterface
 *
 * @internal
 *
 * @package OxidEsales\EshopCommunity\Internal\Module\Setup\Install
 */
interface ModuleFilesInstallerInterface
{
    /**
     * Copies package from vendor directory to eShop source directory.
     * In contract to copy(), this method even copies if the target directory is already present.
     *
     * @param string           $packagePath Path to the package like /var/www/vendor/oxid-esales/paypal
     * @param OxidEshopPackage $package
     *
     */
    public function install(string $packagePath, OxidEshopPackage $package);

    /**
     * @param string           $packagePath Path to the package like /var/www/vendor/oxid-esales/paypal
     * @param OxidEshopPackage $package
     * @return bool
     */
    public function isInstalled(string $packagePath, OxidEshopPackage $package): bool;
}
