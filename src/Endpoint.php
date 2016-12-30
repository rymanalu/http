<?php

namespace Rymanalu\Http;

use Rymanalu\Http\Contracts\Endpoint as EndpointContract;

abstract class Endpoint implements EndpointContract
{
    /**
     * The endpoint's URI.
     *
     * @var string
     */
    protected $uri;

    /**
     * The endpoint's method.
     *
     * @var string
     */
    protected $method;

    /**
     * The endpoint's options.
     *
     * @var array
     */
    protected $options;

    /**
     * Create a new Endpoint instance.
     *
     * @param  array  $options
     * @return void
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    /**
     * Get the endpoint URI.
     *
     * @return string
     */
    public function uri()
    {
        return $this->normalize($this->uri ?: '');
    }

    /**
     * Get the endpoint method.
     *
     * @return string
     */
    public function method()
    {
        return $this->method ?: 'GET';
    }

    /**
     * Get the endpoint options.
     *
     * @return array
     */
    public function options()
    {
        return $this->options;
    }

    /**
     * Normalize the given string.
     *
     * @param  string  $string
     * @return string
     */
    protected function normalize($string)
    {
        return trim($string, '/');
    }

    /**
     * Add additional options.
     *
     * @param  array  $options
     * @return \Rymanalu\Http\Contracts\Endpoint
     */
    public function addOptions(array $options)
    {
        $this->options = array_merge($this->options, $options);

        return $this;
    }
}
