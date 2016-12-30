<?php

use Rymanalu\Http\Endpoint;

class EndpointTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_is_an_instance_of_endpoint_contract()
    {
        $endpoint = new EmptyEndpointStub;

        $this->assertInstanceOf('Rymanalu\Http\Contracts\Endpoint', $endpoint);
    }

    /** @test */
    public function it_returns_right_uri()
    {
        $endpoint = new ExampleEndpoint;

        $this->assertEquals('foo/bar', $endpoint->uri());
    }

    /** @test */
    public function it_returns_right_method()
    {
        $endpoint = new ExampleEndpoint;

        $this->assertEquals('POST', $endpoint->method());
    }

    /** @test */
    public function it_returns_get_when_call_method_in_empty_endpoint()
    {
        $endpoint = new EmptyEndpointStub;

        $this->assertEquals('GET', $endpoint->method());
    }

    /** @test */
    public function it_returns_right_options()
    {
        $options = ['foo' => 'bar'];
        $endpoint = new ExampleEndpoint($options);

        $this->assertEquals($options, $endpoint->options());
    }

    /** @test */
    public function it_can_add_additional_options()
    {
        $options = ['foo' => 'bar'];
        $endpoint = new ExampleEndpoint($options);
        $additionalOptions = ['bar' => 'foo'];

        $this->assertEquals(
            array_merge($options, $additionalOptions), $endpoint->addOptions($additionalOptions)->options()
        );
    }
}

class EmptyEndpointStub extends Endpoint
{
    //
}

class ExampleEndpoint extends Endpoint
{
    /**
     * The endpoint's URI.
     *
     * @var string
     */
    protected $uri = 'foo/bar';

    /**
     * The endpoint's method.
     *
     * @var string
     */
    protected $method = 'POST';
}
