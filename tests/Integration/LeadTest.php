<?php

namespace Lioneagle\Close\Tests\Integration;

use Illuminate\Foundation\Testing\WithFaker;
use Lioneagle\Close\Facades\Close;
use Lioneagle\Close\Leads\CreateLeadRequest;
use Lioneagle\Close\Leads\Lead;
use Lioneagle\Close\Tests\IntegrationTestCase;

class LeadTest extends IntegrationTestCase
{
    use WithFaker;

    /** @test */
    public function it_can_create_a_lead()
    {
        $lead = Close::leads()
            ->create(
                new CreateLeadRequest(name: $name = $this->faker->company)
            );

        $this->assertInstanceOf(Lead::class, $lead);
        $this->assertEquals($name, $lead->name);
    }
}