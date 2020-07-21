<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Providers\CrmProvider;
use App\ContactoLosa;

class LosaContactsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Tests Losas contacts endpoint
     * 
     * @return void
     */
    public function testLosasContactsEndpoint()
    {
        $provider = new CrmProvider;
        $provider->syncAllContacts();
        $this->get('/api/v1/losa-contacts', $this->headers)->assertStatus(200);
    }

    /**
     * Tests retrive all losas contacts endpoint
     * 
     * @return void
     */
    public function testLosasContactsRetriveContacts()
    {
        $provider = new CrmProvider;
        $provider->syncAllContacts();
        $losasContacts = ContactoLosa::all()->toArray();
        $this->get('/api/v1/losa-contacts', $this->headers)->assertStatus(200)->assertJsonFragment($losasContacts[0]);
    }

}
