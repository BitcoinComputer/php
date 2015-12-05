<?php

use BitcoinComputer\Request\Request;

use Test\MockGateway;

class RequestTest extends PHPUnit_Framework_TestCase
{
    /**
     * Assert that Request retrieves isPaid from the gateway.
     */
    public function testIsPaid() {
        $gateway = new MockGateway();

        $request = new Request(0.12, $gateway);

        $gateway->setIsPaid(true);
        $this->assertTrue($request->isPaid());

        $gateway->setIsPaid(false);
        $this->assertFalse($request->isPaid());
    }

    /**
     * Assert that Request derives its string representation from the
     * gateway's request body method.
     */
    public function testRequestToString() {
        $gateway = new MockGateway();

        $request = new Request(0.12, $gateway);

        $requestBody = (string)rand();
        $gateway->setRequestBody($requestBody);
        $this->assertEquals($requestBody, (string)$request);

        $requestBody = (string)rand();
        $gateway->setRequestBody($requestBody);
        $this->assertEquals($requestBody, (string)$request);
    }
}

