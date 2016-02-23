<?php

namespace BitcoinComputer\Request;

use BitcoinComputer\Gateway\GatewayInterface;

interface RequestInterface
{
    /**
     * @param float $satoshi
     * @param GatewayInterface $gateway
     */
    public function __construct($satoshi, GatewayInterface $gateway);

    /** @return bool */
    public function isPaid();

    /** @return string */
    public function __toString();

}