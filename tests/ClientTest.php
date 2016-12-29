<?php

use Rymanalu\Http\Client;
use Rymanalu\Http\Endpoint;

class ClientTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_is_an_instance_of_client_contract()
    {
        $client = new Client('http://foo.bar');

        $this->assertInstanceOf('Rymanalu\Http\Contracts\Client', $client);
    }

    /** @test */
    public function it_returns_response_object_when_call_call_method()
    {
        $client = new Client('https://google.com');

        $this->assertInstanceOf('Rymanalu\Http\Response', $client->call(new ExampleClientEndpoint));
    }
}

class ExampleClientEndpoint extends Endpoint
{
    //
}
