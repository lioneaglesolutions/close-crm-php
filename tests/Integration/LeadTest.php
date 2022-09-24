<?php

namespace Lioneagle\Close\Tests\Integration;

use Illuminate\Support\Facades\Config;
use Lioneagle\Close\Tests\IntegrationTestCase;

class LeadTest extends IntegrationTestCase
{
    /** @test */
    public function it_can_create_a_lead()
    {
        // Http::preventStrayRequests()
        //     ->fake([
        //         'https://api.close.com/api/v1/lead' => Http::response('', 200),
        //     ]);

        dump(env('CLOSE_API_KEY'));

        dump(Config::get('close.api_key'));

        // $lead = Close::leads()
        //     ->create(
        //         new Lead(name: 'Acme')
        //     );

        // $response = Http::post(config('close.base_url') . '/lead');

        // $this->assertEquals(200, $response->status());
    }
}