<?php declare(strict_types=1);
/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace OxidEsales\EshopCommunity\Internal\Password\Service;

use OxidEsales\EshopCommunity\Internal\Password\Exception\PasswordHashException;

/**
 * @internal
 */
class PasswordHashServiceFactory implements PasswordHashServiceFactoryInterface
{
    const ALGORITHM_SHA_512 = 'sha512';
    const ALGORITHM_BCRYPT = 'bcrypt';

    /**
     * @param string $algorithm
     * @param array  $options
     *
     * @throws PasswordHashException
     *
     * @return mixed
     */
    public function getPasswordHashService(string $algorithm, array $options): PasswordHashServiceInterface
    {
        $map = $this->getAlorithmToClassMap();
        if (false === array_key_exists($algorithm, $map)) {
            throw new PasswordHashException('The requested hashing algorithm is not supported: ' . $algorithm);
        }

        return new $map[$algorithm]($options);
    }

    /**
     * @return array
     */
    private function getAlorithmToClassMap(): array
    {
        return [
            'sha512' => PasswordHashSha512Service::class,
            'bcrypt' => PasswordHashBcryptService::class
        ];
    }
}
