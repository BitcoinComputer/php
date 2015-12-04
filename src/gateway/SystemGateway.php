<?php

namespace BitcoinComputer\Gateway;

class SystemGateway implements GatewayInterface
{
    /** @var SystemGateway */
    protected static $instance;

    protected function __construct() {}


    /** @return GatewayInterface */
    public static function getInstance()
    {
        if (!isset(static::$instance)) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * @param $amount
     * @return string $requestId
     */
    public static function makeRequest($amount)
    {
        $command = "btc-channel --create -a $amount";

        $result = exec($command, $output, $returnValue);

        if ($returnValue !== 0) {
            throw new \RuntimeException("Unexpected error from payment channel: $output");
        }

        return $result;
    }

    /**
     * @param $requestId
     * @return string
     */
    public static function makeRequestBody($requestId)
    {
        $command = "btc-channel $requestId --body";

        exec($command, $output, $returnValue);

        if ($returnValue !== 0) {
            throw new \RuntimeException("Unexpected error from payment channel: $output");
        }

        return $output;
    }

    /**
     * @param $requestId
     * @return bool
     */
    public static function isPaid($requestId)
    {
        $command = "btc-channel $requestId --verify-payment";

        $result = exec($command, $output, $returnValue);

        if ($returnValue !== 0) {
            throw new \RuntimeException("Unexpected error from payment channel: $output");
        }

        return $result;
    }

}