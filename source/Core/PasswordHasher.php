<?php
/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace OxidEsales\EshopCommunity\Core;

use OxidEsales\EshopCommunity\Internal\Password\Service\PasswordHashServiceInterface;

/**
 * Hash password together with salt, using set hash algorithm
 */
class PasswordHasher
{
    /**
     * @var \oxHasher
     */
    private $_ohasher = null;

    /**
     * Gets hasher.
     *
     * @return \OxidEsales\Eshop\Core\Hasher|PasswordHashServiceInterface
     */
    protected function _getHasher()
    {
        return $this->_ohasher;
    }

    /**
     * Sets dependencies.
     *
     * @param \OxidEsales\Eshop\Core\Hasher|PasswordHashServiceInterface $oHasher hasher.
     */
    public function __construct($oHasher)
    {
        $this->_ohasher = $oHasher;
    }

    /**
     * Hash password with a salt.
     *
     * @param string $sPassword not hashed password.
     * @param string $sSalt     salt string.
     *
     * @return string
     */
    public function hash($sPassword, $sSalt)
    {
        return $this->_getHasher()->hash($sPassword, ['salt' => $sSalt]);
    }
}
