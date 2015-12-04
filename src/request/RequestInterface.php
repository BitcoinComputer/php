<?php

namespace BitcoinComputer\Request;

use BitcoinComputer\Gateway\GatewayInterface;

interface RequestInterface
{
    /**
     * @param float $amount
     * @param GatewayInterface $gateway
     */
    public function __construct($amount, GatewayInterface $gateway);

    /** @return bool */
    public function isPaid();

    /** @return string */
    public function __toString();

}