<?php

namespace Test;

use BitcoinComputer\Gateway\AbstractGateway;

class MockGateway extends AbstractGateway
{
    protected static $isPaid = false;
    protected static $requestBody = "";

    public function __construct() {}

    /**
     * @param bool $isPaid
     */
    public static function setIsPaid($isPaid)
    {
        static::$isPaid = $isPaid;
    }

    /**
     * @param string $requestBody
     */
    public static function setRequestBody($requestBody)
    {
        static::$requestBody = $requestBody;
    }

    public static function makeRequest($amount)
    {
        return (string)rand();
    }

    public static function makeRequestBody($requestId)
    {
        return static::$requestBody;
    }

    public static function isPaid($requestId)
    {
        return static::$isPaid;
    }

}