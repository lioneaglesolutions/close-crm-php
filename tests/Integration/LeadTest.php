<?php

namespace Lioneagle\Close\Tests\Integration;

use Illuminate\Foundation\Testing\WithFaker;
use Lioneagle\Close\Contacts\CreateContactRequest;
use Lioneagle\Close\Facades\Close;
use Lioneagle\Close\Leads\CreateLeadRequest;
use Lioneagle\Close\Leads\Lead;
use Lioneagle\Close\Tests\IntegrationTestCase;

class LeadTest extends IntegrationTestCase
{
    use WithFaker;

    /** @test */
    public function it_can_create_a_lead_with_a_contact()
    {
        $request = new CreateLeadRequest(
            name: $name = $this->faker->company,
            status: 'On Trial'
        );

        $contact = new CreateContactRequest('John Doe');

        $contact->email($this->faker->safeEmail())
            ->phone($this->faker->numerify('##########'))
            ->addCustomField('cf_ZvEielgu5OgMPYO5OAYvqcikSmWjpceWtLScO3kyehD', 'Business Owner');

        $request->addContact($contact);

        $lead = Close::leads()->create($request);

        $this->assertInstanceOf(Lead::class, $lead);
        $this->assertEquals($name, $lead->name);
    }

    /** @test */
    public function it_can_create_a_lead_with_multiple_contacts()
    {
        $request = new CreateLeadRequest(
            name: $name = $this->faker->company,
            status: 'On Trial'
        );

        $contact1 = new CreateContactRequest('John Doe');

        $contact1->email($this->faker->safeEmail())
            ->phone($this->faker->numerify('##########'));

        $request->addContact($contact1);

        $contact2 = new CreateContactRequest('Jane Dear');

        $contact2->email($this->faker->safeEmail())
            ->phone($this->faker->numerify('##########'));

        $request->addContact($contact2, 'Team Member');

        $lead = Close::leads()->create($request);

        $this->assertInstanceOf(Lead::class, $lead);
        $this->assertEquals($name, $lead->name);
    }

    /** @test */
    public function it_can_update_a_lead()
    {
        $request = new CreateLeadRequest(
            name: $name = $this->faker->company,
            status: 'On Trial'
        );

        $lead = Close::leads()
            ->create(
                $request
            );

        $updated = Close::leads()
            ->updateStatus($lead, 'Trial Expired');

        $this->assertInstanceOf(Lead::class, $lead);
        $this->assertEquals('Trial Expired', $updated->status_label);
    }
}