<?php

namespace BitcoinComputer\Gateway;

abstract class AbstractGateway implements GatewayInterface
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

}