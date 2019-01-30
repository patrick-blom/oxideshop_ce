<?php declare(strict_types=1);
/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace OxidEsales\EshopCommunity\Tests\Unit\Internal\Password;

use OxidEsales\EshopCommunity\Internal\Password\Service\PasswordHashSha512Service;
use PHPUnit\Framework\TestCase;

/**
 *
 */
class PasswordHashSha512ServiceTest extends TestCase
{
    /**
     *
     */
    public function testHashForGivenPasswordIsEncrypted()
    {
        $password = 'secret';

        $passwordHashService = new PasswordHashSha512Service();
        $hash = $passwordHashService->hash($password);

        $this->assertNotEmpty($hash);
        $this->assertSame(128, strlen($hash));
        $this->assertNotEquals($password, $hash);
    }

    /**
     *
     */
    public function testHashForEmptyPasswordIsEncrypted()
    {
        $password = '';

        $passwordHashService = new PasswordHashSha512Service();
        $hash = $passwordHashService->hash($password);

        $this->assertSame(128, strlen($hash));
        $this->assertNotEquals($password, $hash);
    }

    /**
     *
     */
    public function testConsecutiveHashingTheSamePasswordProducesSameHashes()
    {
        $password = 'secret';

        $passwordHashService = new PasswordHashSha512Service();
        $hash_1 = $passwordHashService->hash($password);
        $hash_2 = $passwordHashService->hash($password);

        $this->assertSame($hash_1, $hash_2);
    }
}
