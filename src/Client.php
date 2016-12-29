<?php

namespace Rymanalu\Http;

use GuzzleHttp\Client as HttpClient;
use Rymanalu\Http\Contracts\Client as ClientContract;
use Rymanalu\Http\Contracts\Endpoint as EndpointContract;

class Client implements ClientContract
{
    /**
     * The GuzzleHttp Client instance.
     *
     * @var \GuzzleHttp\Client
     */
    protected $httpClient;

    /**
     * Create a new Client instance.
     *
     * @param  string  $baseUri
     * @return void
     */
    public function __construct($baseUri)
    {
        $this->httpClient = new HttpClient(['base_uri' => $baseUri]);
    }

    /**
     * Call an API by the given Endpoint object.
     *
     * @param  \Rymanalu\Http\Contracts\Endpoint  $endpoint
     * @param  bool  $wait
     * @return mixed
     */
    public function call(EndpointContract $endpoint, $wait = true)
    {
        $method = $wait ? 'request' : 'requestAsync';

        $result = $this->httpClient->{$method}(
            $endpoint->method(), $endpoint->uri(), $endpoint->options()
        );

        return $wait ? new Response($result) : $result;
    }

    /**
     * Handle dynamic method calls into the HttpClient.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return call_user_func_array([$this->httpClient, $method], $parameters);
    }
}
