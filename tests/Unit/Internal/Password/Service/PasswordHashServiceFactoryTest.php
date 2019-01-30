<?php declare(strict_types=1);
/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace OxidEsales\EshopCommunity\Tests\Unit\Internal\Service;

use OxidEsales\EshopCommunity\Internal\Password\Exception\PasswordHashException;
use OxidEsales\EshopCommunity\Internal\Password\Service\PasswordHashBcryptService;
use OxidEsales\EshopCommunity\Internal\Password\Service\PasswordHashServiceFactory;
use OxidEsales\EshopCommunity\Internal\Password\Service\PasswordHashSha512Service;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
class PasswordHashServiceFactoryTest extends TestCase
{
    /**
     */
    public function testGetPasswordHashServiceThrowsExceptionOnNonSupportedAlgorythm()
    {
        $this->expectException(PasswordHashException::class);

        $algorithm = 'non-existent';
        $options = [];
        $factory = new PasswordHashServiceFactory();

        $factory->getPasswordHashService($algorithm, $options);
    }

    /**
     */
    public function testGetPasswordHashServiceReturnsInstanceOfSha512Service()
    {
        $algorithm = PasswordHashServiceFactory::ALGORITHM_SHA_512;
        $options = [];
        $factory = new PasswordHashServiceFactory();

        $service = $factory->getPasswordHashService($algorithm, $options);

        $this->assertInstanceOf(PasswordHashSha512Service::class, $service);
    }

    /**
     */
    public function testGetPasswordHashServiceReturnsInstanceOfBcryptService()
    {
        $algorithm = PasswordHashServiceFactory::ALGORITHM_BCRYPT;
        $options = [];
        $factory = new PasswordHashServiceFactory();

        $service = $factory->getPasswordHashService($algorithm, $options);

        $this->assertInstanceOf(PasswordHashBcryptService::class, $service);
    }
}
