<?php

namespace Rymanalu\Http\Contracts;

interface Endpoint
{
    /**
     * Get the endpoint URI.
     *
     * @return string
     */
    public function uri();

    /**
     * Get the endpoint method.
     *
     * @return string
     */
    public function method();

    /**
     * Get the endpoint options.
     *
     * @return array
     */
    public function options();

    /**
     * Add additional options.
     *
     * @param  array  $options
     * @return \Rymanalu\Http\Contracts\Endpoint
     */
    public function addOptions(array $options);
}
