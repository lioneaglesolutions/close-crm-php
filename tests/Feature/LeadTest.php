<?php

namespace Lioneagle\Close\Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Lioneagle\Close\Facades\Close;
use Lioneagle\Close\Leads\CreateLeadRequest;
use Lioneagle\Close\Leads\Lead;
use Lioneagle\Close\Tests\FeatureTestCase;

class LeadTest extends FeatureTestCase
{
    use WithFaker;

    /** @test */
    public function it_can_create_a_lead()
    {
        $this->fakeCreateLead();

        $lead = Close::leads()
            ->create(
                new CreateLeadRequest(
                    name: $name = $this->faker->company,
                    status: 'On Trial'
                )
            );

        $this->assertInstanceOf(Lead::class, $lead);
        $this->assertEquals($name, $lead->name);
    }
}