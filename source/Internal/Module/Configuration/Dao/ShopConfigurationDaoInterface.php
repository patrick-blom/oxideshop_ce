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
interface ShopConfigurationDaoInterface
{
    /**
     * @param string $environment
     * @param int    $shopId
     *
     * @return ShopConfiguration
     */
    public function get(string $environment, int $shopId): ShopConfiguration;

    /**
     * @param string            $environment
     * @param int               $shopId
     * @param ShopConfiguration $shopConfiguration
     */
    public function save(string $environment, int $shopId, ShopConfiguration $shopConfiguration);
}