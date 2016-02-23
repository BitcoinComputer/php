<?php

namespace BitcoinComputer\Request;

use BitcoinComputer\Gateway\GatewayInterface;

class Request implements RequestInterface
{
    /** @var integer */
    protected $satoshi;

    /** @var GatewayInterface */
    protected $gateway;

    /** @var string */
    protected $requestId;

    /**
     * @param integer $satoshi
     * @param GatewayInterface $gateway
     */
    public function __construct($satoshi, GatewayInterface $gateway) {
        $this->gateway = $gateway;
        $this->satoshi = $satoshi;

        $this->requestId = $gateway::makeRequest($satoshi);
    }

    /** @return boolean */
    public function isPaid() {
        $gateway = $this->gateway;

        return (int)$gateway::isPaid($this->requestId) >= 0;
    }

    /** @return string */
    public function __toString() {
        $gateway = $this->gateway;
        return $gateway::makeRequestBody($this->requestId);
    }
}