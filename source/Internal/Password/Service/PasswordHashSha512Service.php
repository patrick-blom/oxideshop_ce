<?php declare(strict_types=1);
/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace OxidEsales\EshopCommunity\Internal\Password\Service;

/**
 * @internal
 */
class PasswordHashSha512Service implements PasswordHashServiceInterface
{
    /**
     * Creates a password hash
     *
     * @param string $password
     *
     * @return string
     */
    public function hash(string $password): string
    {
        return hash('sha512', $password);
    }
}
