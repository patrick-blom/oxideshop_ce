<?php declare(strict_types=1);

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace OxidEsales\EshopCommunity\Internal\Module\Configuration\Dao;

use OxidEsales\EshopCommunity\Internal\Module\Configuration\DataObject\ShopConfiguration;

/**
 * @internal
 */
class ShopConfigurationDao implements ShopConfigurationDaoInterface
{
    /**
     * @var ProjectConfigurationDaoInterface
     */
    private $projectConfigurationDao;

    /**
     * ModuleConfigurationDao constructor.
     *
     * @param ProjectConfigurationDaoInterface $projectConfigurationDao
     */
    public function __construct(ProjectConfigurationDaoInterface $projectConfigurationDao)
    {
        $this->projectConfigurationDao = $projectConfigurationDao;
    }

    /**
     * @param string $environment
     * @param int    $shopId
     *
     * @return ShopConfiguration
     */
    public function get(string $environment, int $shopId): ShopConfiguration
    {
        $projectConfiguration = $this->projectConfigurationDao->getConfiguration();

        return $projectConfiguration
            ->getEnvironmentConfiguration($environment)
            ->getShopConfiguration($shopId);
    }

    /**
     * @param string            $environment
     * @param int               $shopId
     * @param ShopConfiguration $shopConfiguration
     */
    public function save(string $environment, int $shopId, ShopConfiguration $shopConfiguration)
    {
        $projectConfiguration = $this->projectConfigurationDao->getConfiguration();
        $projectConfiguration->getEnvironmentConfiguration($environment)
            ->addShopConfiguration($shopId, $shopConfiguration);

        $this->projectConfigurationDao->persistConfiguration($projectConfiguration);
    }
}
