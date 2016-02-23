<?php

namespace BitcoinComputer\Gateway;


interface GatewayInterface
{
    /** @return GatewayInterface */
    public static function getInstance();

    /**
     * @param $satoshi
     * @return string $requestId
     */
    public static function makeRequest($satoshi);

    /**
     * @param $requestId
     * @return string
     */
    public static function makeRequestBody($requestId);

    /**
     * @param $requestId
     * @return bool
     */
    public static function isPaid($requestId);
}