# Simple HTTP Client library powered by Guzzle

[![Build Status](https://travis-ci.org/rymanalu/http.svg?branch=master)](https://travis-ci.org/rymanalu/http)

This package provides a new way to use [GuzzleHttp](https://packagist.org/packages/guzzlehttp/guzzle) package.

## Installation

Install this package via the Composer package manager:
```
composer require rymanalu/http
```

## Usage

Case: we want to call `http://foo.com/bar` API.

Steps:

- Create a new endpoint by extending `Rymanalu\Http\Endpoint`. For example:
```php
use Rymanalu\Http\Endpoint;

class BarEndpoint extends Endpoint
{
    /**
     * The endpoint's URI.
     *
     * @var string
     */
    protected $uri = 'bar';

    /**
     * The endpoint's method.
     *
     * @var string
     */
    protected $method = 'POST';
}
```
- Create a new `Rymanalu\Http\Client` instance:
```php
$http = new Rymanalu\Http\Client('http://foo.com');
```
- Call the `call` method in the `Rymanalu\Http\Client` instance by giving the `BarEndpoint` instance:
```php
$endpoint = new BarEndpoint; // or `new BarEndpoint($anArrayOfGuzzleOptions)`

$response = $http->call($endpoint);
```
- The `$response` will be an object of `Rymanalu\Http\Response`:
```php
// Check if the calls is successful by the response code...
$response->isSuccessful(); // `true` or `false`

// Get the response body...
$response->getBody(); // object of `stdClass`
$response->getBody(true); // array
```
