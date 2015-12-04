<?php

namespace BitcoinComputer\Gateway;


interface GatewayInterface
{
    /** @return GatewayInterface */
    public static function getInstance();

    /**
     * @param $amount
     * @return string $requestId
     */
    public static function makeRequest($amount);

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