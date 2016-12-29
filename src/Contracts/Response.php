<?php

namespace Rymanalu\Http\Contracts;

interface Response
{
    /**
     * Check if the calls is successful by the response code.
     *
     * @return bool
     */
    public function isSuccessful();

    /**
     * Get the response body.
     *
     * @param  bool  $toArray
     * @return array|object|null
     */
    public function getBody($toArray = false);
}
