[![Build Status](https://travis-ci.org/BitcoinComputer/php.svg?branch=0.1)](https://travis-ci.org/BitcoinComputer/php)
[![Code Climate](https://codeclimate.com/github/BitcoinComputer/php/badges/gpa.svg)](https://codeclimate.com/github/BitcoinComputer/php)
[![Test Coverage](https://codeclimate.com/github/BitcoinComputer/php/badges/coverage.svg)](https://codeclimate.com/github/BitcoinComputer/php/coverage)

Bitcoin Computer PHP Library
============================

Example
-------

In your composer.json:
```
    {
      "require": {
        "jaschilz/bitcoincomputer-php" : "0.*"
      }
    }
```

In a page:
```
    <?php

    // Load Composer's autoload
    require_once dirname(__FILE__) . '/vendor/autoload.php';

    use BitcoinComputer\Request\Request;
    use BitcoinComputer\Request\RequestBuilder;

    session_start();

    /** @var boolean $sessionHasRequest */
    $sessionHasRequest = isset($_SESSION['request']);

    if (!$sessionHasRequest) {
        $_SESSION['request'] = RequestBuilder::begin()
            ->setSatoshi(400000)
            ->build();
    }

    /** @var Request $request */
    $request = $_SESSION['request'];

    if ($request->isPaid()) {
        // In this case, your request has been paid. Satisfy your visitor!
    } else {
        echo $request;
    }
```
