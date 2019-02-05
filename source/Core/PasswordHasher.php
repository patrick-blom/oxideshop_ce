<?php
/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace OxidEsales\EshopCommunity\Core;

use OxidEsales\EshopCommunity\Internal\Password\Exception\PasswordHashException;
use OxidEsales\EshopCommunity\Internal\Password\Service\PasswordHashServiceInterface;

/**
 * Hash password together with salt, using set hash algorithm
 */
class PasswordHasher
{
    /**
     * @var \OxidEsales\Eshop\Core\Hasher|PasswordHashServiceInterface
     */
    private $passwordHashService;

    /**
     * Returns password hash service
     *
     * @return \OxidEsales\Eshop\Core\Hasher|PasswordHashServiceInterface
     */
    protected function _getHasher()
    {
        return $this->passwordHashService;
    }

    /**
     * Sets dependencies.
     *
     * @param \OxidEsales\Eshop\Core\Hasher|PasswordHashServiceInterface $passwordHashService
     */
    public function __construct($passwordHashService)
    {
        $this->passwordHashService = $passwordHashService;
    }

    /**
     * Hash password with a salt.
     *
     * @param string $password not hashed password.
     * @param string $salt     salt string.
     *
     * @return string
     */
    public function hash($password, $salt): string
    {
        $passwordHashService = $this->_getHasher();

        if ($passwordHashService instanceof Hasher) {
            $hash =  $passwordHashService->hash($password.$salt);
        } elseif ($passwordHashService instanceof PasswordHashServiceInterface) {
            $options = $this->getOptionsForHashService($salt);

            $hash =  $passwordHashService->hash($password, $options);
        } else {
            throw new PasswordHashException('Unsupported password hashing service: ' . get_class($passwordHashService));
        }

        return $hash;
    }

    /**
     * @param string $salt
     *
     * @return array
     */
    private function getOptionsForHashService(string $salt): array
    {
        return ['salt' => $salt];
    }
}
