<?php declare(strict_types=1);
/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace OxidEsales\EshopCommunity\Internal\Password\Service;

/**
 * @internal
 */
interface PasswordHashServiceFactoryInterface
{
    /**
     * @param string $algorithm
     * @param array  $options
     *
     * @return PasswordHashServiceInterface
     */
    public function getPasswordHashService(string $algorithm, array $options): PasswordHashServiceInterface;
}
