<?php declare(strict_types=1);
/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace OxidEsales\EshopCommunity\Internal\Module\Install\Service;

use OxidEsales\EshopCommunity\Internal\Module\Install\DataObject\OxidEshopPackage;

/**
 * @internal
 */
class ModuleInstaller implements ModuleInstallerInterface
{
    /**
     * @var ModuleFilesInstallerInterface
     */
    private $moduleFilesInstaller;

    /**
     * @var ModuleConfigurationInstallerInterface
     */
    private $moduleConfigurationInstaller;

    /**
     * ModuleInstaller constructor.
     * @param ModuleFilesInstallerInterface         $moduleFilesInstaller
     * @param ModuleConfigurationInstallerInterface $moduleConfigurationInstaller
     */
    public function __construct(
        ModuleFilesInstallerInterface $moduleFilesInstaller,
        ModuleConfigurationInstallerInterface $moduleConfigurationInstaller
    ) {
        $this->moduleFilesInstaller = $moduleFilesInstaller;
        $this->moduleConfigurationInstaller = $moduleConfigurationInstaller;
    }

    /**
     * @param string           $packagePath
     * @param OxidEshopPackage $package
     */
    public function install(string $packagePath, OxidEshopPackage $package)
    {
        $this->moduleFilesInstaller->install($packagePath, $package);
        $this->moduleConfigurationInstaller->install($packagePath);
    }

    /**
     * @param string           $packagePath
     * @param OxidEshopPackage $package
     * @return bool
     */
    public function isInstalled(string $packagePath, OxidEshopPackage $package): bool
    {
        return $this->moduleFilesInstaller->isInstalled($packagePath, $package)
            && $this->moduleConfigurationInstaller->isInstalled($packagePath);
    }
}
