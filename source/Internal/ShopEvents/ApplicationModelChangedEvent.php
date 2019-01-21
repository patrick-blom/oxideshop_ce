<?php
declare(strict_types=1);

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */
namespace OxidEsales\EshopCommunity\Internal\ShopEvents;

use Symfony\Component\EventDispatcher\Event;

/**
 * Class ApplicationModelChangedEvent
 *
 * @package OxidEsales\EshopCommunity\Internal\ShopEvents
 */
class ApplicationModelChangedEvent extends Event
{
    const NAME = self::class;

    /**
     * Calling model class
     *
     * @var string
     */
    private $modelClass = '';

    /**
     * Arguments
     *
     * @var array
     */
    private $arguments = [];

    /**
     * Getter for model class name.
     *
     * @return string
     */
    public function getModelClass()
    {
        return $this->modelClass;
    }

    /**
     * Setter for model class name.
     *
     * @param string $modelClass Model class name
     */
    public function setModelClass(string $modelClass)
    {
        $this->modelClass = $modelClass;
    }

    /**
     * Getter for arguments
     *
     * @return array
     */
    public function getArguments()
    {
        return $this->arguments;
    }

    /**
     * Setter for argument
     *
     * @param array $arguments
     */
    public function setArguments(array $arguments)
    {
        $this->arguments = $arguments;
    }
}