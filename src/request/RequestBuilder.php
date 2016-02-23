<?php

namespace BitcoinComputer\Request;

use BitcoinComputer\Gateway\SystemGateway;

class RequestBuilder
{
    /** @var integer */
    private $satoshi;

    /**
     * @return RequestBuilder
     */
    public static function begin()
    {
        return new static();
    }

    /**
     * @param integer $satoshi
     * @return RequestBuilder
     */
    public function setSatoshi($satoshi)
    {
        $this->satoshi = (integer)$satoshi;
        return $this;
    }

    /**
     * @return RequestInterface
     */
    public function build() {
        if (!isset($this->satoshi)) {
            throw new \RuntimeException("You must use ::setSatoshi(integer \$satoshi) before calling ::build");
        }

        return new Request($this->satoshi, SystemGateway::getInstance());
    }

}