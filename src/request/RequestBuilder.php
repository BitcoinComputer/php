<?php

namespace BitcoinComputer\Request;

use BitcoinComputer\Gateway\SystemGateway;

class RequestBuilder
{
    /** @var float */
    private $amount;

    /**
     * @return RequestBuilder
     */
    public static function begin()
    {
        return new static();
    }

    /**
     * @param float $amount
     * @return RequestBuilder
     */
    public function setAmount($amount)
    {
        $this->amount = (float)$amount;
        return $this;
    }

    /**
     * @return RequestInterface
     */
    public function build() {
        if (!isset($this->amount)) {
            throw new \RuntimeException("You must use ::setAmount(float \$amount) before calling ::build");
        }

        return new Request($this->amount, SystemGateway::getInstance());
    }

}