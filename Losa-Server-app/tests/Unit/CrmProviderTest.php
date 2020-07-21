<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Providers\CrmProvider;

class CrmProviderTest extends TestCase
{
    /**
     * Tests if CrmProvider class can create successfully a Entitiy in specific module
     * 
     * @return void
     * method create returns a string with the entityid in this case contactid
     */
    public function testCrmProviderCreateSuccessfullyEntity()
    {
        $crmProvider = new CrmProvider;
        $contactFromCrm = $crmProvider->findOrCreate('contact');
        $contactFromCrm->firstname = 'John';
        $contactFromCrm->lastname = 'Doe';
        $contactFromCrm->emailaddress1 = 'john.doe@example.com';
        $contactFromCrmId = $contactFromCrm->create();
        $this->assertTrue(is_string($contactFromCrmId));
        $contactFromCrm->delete();
    }

    //todo make a select test and delete test

    /**
     * Tests if CrmProvider class can select a single entity
     * 
     * @return void
     */
    public function testCrmProviderSelectASingleEntity()
    {
        $crmProvider = new CrmProvider;
        $userFromCrm = $crmProvider->findOrCreate('contact', 'dortiz@losagroup.co');
        $userFromCrm = $crmProvider->findOrCreate('contact');
        $userFromCrm->firstname = 'John';
        $userFromCrm->lastname = 'Doe';
        $userFromCrm->emailaddress1 = 'john.doe@example.com';
        $userFromCrmId = $userFromCrm->create();

        $result = $crmProvider->findOrCreate('contact', $userFromCrmId);
        $this->assertEquals($userFromCrm->emailaddress1, $result->emailaddress1);

        $userFromCrm->delete();
    }

    /**
     * Tests if CrmProvider class can select all records from an entity
     * 
     * @return void
     */
    public function testCrmProviderSelectAllRecordsFromAnEntity()
    {
        $crmProvider = new CrmProvider;
        $allContacts = $crmProvider->all('contact');
        $this->assertTrue(is_array($allContacts->Entities));
    }

    /**
     * Test if CrmProvier updates a entity
     * 
     * @return void
     */
    public function testCrmProviderUpdatesAnEntity()
    {
        $crmProvider = new CrmProvider;
        $contact = $crmProvider->findOrCreate('contact');
        $contact->firstname = 'John';
        $contact->lastname = 'Doe';
        $contact->emailaddress1 = 'john.doe@example.com';
        $contactId = $contact->create();

        $expectedData = ['firstname' => 'Anne', 'lastname' => 'Doe', 'emailaddress1' => 'anne.doe@example.com'];
        $updatedContact = $crmProvider->findOrCreate('contact', $contactId);
        $updatedContact->firstname = $expectedData['firstname'];
        $updatedContact->lastname = $expectedData['lastname'];
        $updatedContact->emailaddress1 = $expectedData['emailaddress1'];
        $updatedContact->update();
        $this->assertEquals($expectedData['firstname'], $updatedContact->firstname);

        $updatedContact->delete();
    }

    /**
     * Test if CrmProvider deletes an entity
     */
    public function testCrmProviderDeletesAnEntity()
    {
        $crmProvider = new CrmProvider;
        $contact = $crmProvider->findOrCreate('contact');
        $contact->firstname = 'John';
        $contact->lastname = 'Doe';
        $contact->emailaddress1 = 'john.doe@example.com';
        $contactId = $contact->create();

        $updatedContact = $crmProvider->findOrCreate('contact', $contactId);

        $this->assertTrue($updatedContact->delete());
    }

}
