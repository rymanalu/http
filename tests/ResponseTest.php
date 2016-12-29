<?php

use Mockery as m;
use Rymanalu\Http\Response;
use Psr\Http\Message\ResponseInterface;

class ResponseTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_is_an_instance_of_response_contract()
    {
        $httpResponse = $this->mockPsrResponse();
        $response = $this->createResponseInstance($httpResponse);

        $this->assertInstanceOf('Rymanalu\Http\Contracts\Response', $response);
    }

    /** @test */
    public function it_returns_true_if_response_code_is_between_two_hundred_and_three_hundred()
    {
        $httpResponse = $this->mockPsrResponse();
        $httpResponse->shouldReceive('getStatusCode')->andReturn(200);
        $response = $this->createResponseInstance($httpResponse);

        $this->assertTrue($response->isSuccessful());
    }

    /** @test */
    public function it_returns_an_object_when_call_get_body_method()
    {
        $httpResponse = $this->mockPsrResponse();
        $httpResponse->shouldReceive('getBody')->andReturn('{"foo":"bar"}');
        $response = $this->createResponseInstance($httpResponse);

        $this->assertEquals('object', gettype($response->getBody()));
        $this->assertInstanceOf('stdClass', $response->getBody());
    }

    /** @test */
    public function it_returns_an_object_when_call_get_body_method_with_to_array_param_true()
    {
        $httpResponse = $this->mockPsrResponse();
        $httpResponse->shouldReceive('getBody')->andReturn('{"foo":"bar"}');
        $response = $this->createResponseInstance($httpResponse);

        $this->assertEquals('array', gettype($response->getBody(true)));
    }

    /** @test */
    public function it_can_dynamically_calls_psr_response_method_from_response_instance()
    {
        $httpResponse = $this->mockPsrResponse();
        $httpResponse->shouldReceive('getReasonPhrase');
        $response = $this->createResponseInstance($httpResponse);

        $response->getReasonPhrase();
    }

    protected function createResponseInstance(ResponseInterface $httpResponse)
    {
        return new Response($httpResponse);
    }

    protected function mockPsrResponse()
    {
        return m::mock(ResponseInterface::class);
    }

    public function tearDown()
    {
        m::close();
    }
}
