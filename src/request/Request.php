<?php

namespace BitcoinComputer\Request;

use BitcoinComputer\Gateway\GatewayInterface;

class Request implements RequestInterface
{
    /** @var float */
    protected $amount;

    /** @var GatewayInterface */
    protected $gateway;

    /** @var string */
    protected $requestId;

    /**
     * @param float $amount
     * @param GatewayInterface $gateway
     */
    public function __construct($amount, GatewayInterface $gateway) {
        $this->gateway = $gateway;
        $this->amount = $amount;

        $this->requestId = $gateway::makeRequest($amount);
    }

    /** @return bool */
    public function isPaid() {
        $gateway = $this->gateway;
        return $gateway::isPaid($this->requestId);
    }

    /** @return string */
    public function __toString() {
        $gateway = $this->gateway;
        return $gateway::makeRequestBody($this->requestId);
    }
}