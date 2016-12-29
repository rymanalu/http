<?php

namespace Rymanalu\Http\Contracts;

interface Client
{
    /**
     * Call an API by the given Endpoint object.
     *
     * @param  \Rymanalu\Http\Contracts\Endpoint  $endpoint
     * @param  bool  $wait
     * @return mixed
     *
     * @throws \App\Exceptions\CircuitBreakerException
     */
    public function call(Endpoint $endpoint, $wait = true);
}
