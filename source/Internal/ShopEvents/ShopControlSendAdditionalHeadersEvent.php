<?php
declare(strict_types=1);

/**
 * Copyright © OXID eSales AG. All rights reserved.
 * See LICENSE file for license details.
 */

namespace OxidEsales\EshopCommunity\Internal\ShopEvents;

use Symfony\Component\EventDispatcher\Event;

/**
 * Class ShopControlSendAdditionalHeadersEvent
 *
 * @package OxidEsales\EshopCommunity\Internal\ShopEvents
 */
class ShopControlSendAdditionalHeadersEvent extends Event
{
    const NAME = self::class;

    /**
     * Result
     *
     * @var bool
     */
    private $result = false;

    /**
     * @var \OxidEsales\Eshop\Core\Controller\BaseController
     */
    private $controller = null;

    /**
     * @var \OxidEsales\Eshop\Core\ShopControl
     */
    private $shopControl = null;

    /**
     * Setter for ShopControl object.
     *
     * @param \OxidEsales\Eshop\Core\ShopControl $shopControl ShopControl object
     */
    public function setShopControl(\OxidEsales\Eshop\Core\ShopControl $shopControl)
    {
        $this->shopControl = $shopControl;
    }

    /**
     * Setter for result.
     *
     * @param bool $result
     */
    public function setResult(bool $result)
    {
        $this->result = $result;
    }

    /**
     * Setter for controller object.
     *
     * @param \OxidEsales\Eshop\Core\Controller\BaseController controller object
     */
    public function setController(\OxidEsales\Eshop\Core\Controller\BaseController $controller)
    {
        $this->controller = $controller;
    }

    /**
     * Getter for ShopControl object.
     *
     * @return \OxidEsales\Eshop\Core\ShopControl
     */
    public function getShopControl()
    {
        return $this->shopControl;
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

    /**
     * Getter for controller object.
     *
     * @return \OxidEsales\Eshop\Core\Controller\BaseController
     */
    public function getController()
    {
        return $this->controller;
    }
}
