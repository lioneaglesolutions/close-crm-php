<?php

namespace Lioneagle\Close\Tests\Feature;

use Illuminate\Support\Facades\Config;
use InvalidArgumentException;
use Lioneagle\Close\CloseClient;
use Lioneagle\Close\Tests\FeatureTestCase;

class CloseServiceProviderFeatureTest extends FeatureTestCase
{
    /** @test */
    public function it_throws_exception_if_api_key_is_missing()
    {
        Config::set('close.api_key', null);

        $this->expectException(InvalidArgumentException::class);

        app(CloseClient::class);
    }

    /** @test */
    public function it_throws_exception_if_base_url_is_missing()
    {
        Config::set('close.base_url', null);

        $this->expectException(InvalidArgumentException::class);

        app(CloseClient::class);
    }

    /** @test */
    public function it_binds_the_client_to_the_container()
    {
        Config::set('close.api_key', '1234');

        $this->assertInstanceOf(CloseClient::class, app(CloseClient::class));
    }

    /** @test */
    public function the_client_is_a_singleton()
    {
        Config::set('close.api_key', '1234');

        $this->assertSame(app(CloseClient::class), app(CloseClient::class));
    }
}
