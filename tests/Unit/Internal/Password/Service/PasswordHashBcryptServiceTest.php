<?php declare(strict_types=1);
/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace OxidEsales\EshopCommunity\Tests\Unit\Internal\Password;

use OxidEsales\EshopCommunity\Internal\Password\Service\PasswordHashBcryptService;
use PHPUnit\Framework\TestCase;

/**
 *
 */
class PasswordHashBcryptServiceTest extends TestCase
{
    /**
     *
     */
    public function testHashForGivenPasswordIsEncryptedWithBcrypt()
    {
        $password = 'secret';

        $passwordHashService = new PasswordHashBcryptService();
        $hash = $passwordHashService->hash($password);
        $info = password_get_info($hash);

        $this->assertSame(PASSWORD_BCRYPT, $info['algo']);
    }

    /**
     *
     */
    public function testHashWithOptions()
    {
        $password = 'secret';

        $passwordHashService = new PasswordHashBcryptService();
        $hash = $passwordHashService->hash($password, ['cost' => 5]);
        $info = password_get_info($hash);

        $this->assertSame(5, $info['options']['cost']);
    }

    /**
     * @dataProvider invalidCostOptionValueDataProvider
     *
     * @param mixed $invalidCostOption
     *
     * @throws \OxidEsales\EshopCommunity\Internal\Password\Exception\PasswordHashException
     */
    public function testHashWithInvalidCostOptionValue($invalidCostOption)
    {
        $this->expectException(\PHPUnit\Framework\Error\Warning::class);

        $password = 'secret';

        $passwordHashService = new PasswordHashBcryptService();
        $passwordHashService->hash($password, ['cost' => $invalidCostOption]);
    }

    /**
     * @return array
     */
    public function invalidCostOptionValueDataProvider(): array
    {
        return [
            [-5],
            [0],
            [[10]],
            ['string'],
            [new \stdClass()],
        ];
    }

    /**
     *
     */
    public function testHashForEmptyPasswordIsEncryptedWithBcrypt()
    {
        $password = '';

        $passwordHashService = new PasswordHashBcryptService();
        $hash = $passwordHashService->hash($password);
        $info = password_get_info($hash);

        $this->assertSame(PASSWORD_BCRYPT, $info['algo']);
    }

    /**
     *
     */
    public function testConsecutiveHashingTheSamePasswordProducesDifferentHashes()
    {
        $password = 'secret';

        $passwordHashService = new PasswordHashBcryptService();
        $hash_1 = $passwordHashService->hash($password);
        $hash_2 = $passwordHashService->hash($password);

        $this->assertNotSame($hash_1, $hash_2);
    }
}
