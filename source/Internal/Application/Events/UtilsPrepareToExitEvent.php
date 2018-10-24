<?php
declare(strict_types=1);

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace OxidEsales\EshopCommunity\Internal\Application\Events;

use Symfony\Component\EventDispatcher\Event;

/**
 * Class UtilsPrepareToExitEvent
 *
 * @package OxidEsales\EshopCommunity\Internal\Application\Events
 */
class UtilsPrepareToExitEvent extends Event
{
    /**
     * Result
     *
     * @var bool
     */
    protected $result = false;

    /**
     * Handle event.
     *
     * @return null
     */
    public function handleEvent()
    {
    }

    /**
     * Setter for result.
     *
     * @param string $result
     */
    public function setResult($result)
    {
        $this->result = $result;
    }

    /**
     * Getter for result
     *
     * @return bool
     */
    public function getResult()
    {
        return $this->result;
    }
}
