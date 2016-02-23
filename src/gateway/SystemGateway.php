<?php

namespace BitcoinComputer\Gateway;

class SystemGateway extends AbstractGateway
{
    /**
     * @param $amount
     * @return string $requestId
     */
    public static function makeRequest($amount)
    {
        $command = "btc-channel --create --amount=$amount";

        exec($command, $output, $returnValue);

        if ($returnValue !== 0) {
            throw new \RuntimeException("Unexpected error from payment channel: $output");
        }

        return static::clean($output);
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
            throw new \RuntimeException("Unexpected error from payment channel: " . static::clean($output));
        }

        return static::clean($output);
    }

    /**
     * @param $requestId
     * @return bool
     */
    public static function isPaid($requestId)
    {
        $command = "btc-channel $requestId --verify-payment";

        exec($command, $output, $returnValue);

        if ($returnValue !== 0) {
            throw new \RuntimeException("Unexpected error from payment channel: " . static::clean($output));
        }

        return static::clean($output);
    }

    /**
     * @param string|string[] $result
     * @return string
     */
    protected static function clean($result) {
        if (is_array($result)) {
            $result = implode(" ", $result);
        }

        return trim($result);
    }

}