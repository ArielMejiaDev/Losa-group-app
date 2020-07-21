<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use App\User;
use App\Property;
use Spatie\GoogleCalendar\Event;
use Carbon\Carbon;
use App\Aircraft;
use App\Http\Controllers\Providers\CrmProvider;
use App\NewItem;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $loginUrl = '/api/v1/login';
    protected $headers = ['api-key' => '$2y$10$tAajJXlhdqDfGi8CppFN3.KWnofLUVE03gknOyEDv9OBAcypda9MO'];
    protected $mockUserData = [
        'fullname'                  => 'John Doe',
        'firstname'                 => 'John',
        'lastname'                  => 'Doe',
        'password'                  => 'legadof@miliar',
        'emailaddress1'             => 'johndoe@mail.com',
        'new_dpi'                   => '12345678-1',
        'new_vencimientodpi'        => '2023-01-01',
        'new_licenciadeconducir'    => '65412365-2',
        'new_vencimientolicencia'   => '2024-02-02',
        'new_visa'                  => '3426187655-3',
        'new_vencimientovisa'       => '2024-03-03',
        'new_pasaporte'             => '334568221-4',
        'new_vencimientopasaporte'  => '2025-01-01',
        'new_segurovida'            => 'Poliza 4491',
        'new_seguromedico'          => 'Poliza 3355',
        'new_tipodesangre'          => 'A+',
        'new_contactoLosa'          => false
    ];

    /**
     * It creates a simple user
     * 
     * @return \App\User
     */
    public function createUser($columns = null)
    {
        if ($columns) {
            return factory(User::class)->create($columns);
        }
        return factory(User::class)->create();
    }

    /**
     * It creates a property model
     * 
     * @return void
     */
    public function createProperty($columns = null)
    {
        if ($columns) {
            return factory(Property::class)->create($columns);
        }
        return factory(Property::class)->create();
    }

    /**
     * It creates an Aircraft model
     *
     * @param array $data
     *  
     * @return \App\Aircraft
     */
    public function createAircraft($columns = null)
    {
        if ($columns) {
            return factory(Aircraft::class)->create($columns);
        }
        return factory(Aircraft::class)->create();
    }


    /**
     * Creates a google event
     * 
     * @return \Spatie\GoogleCalendar\Event
     */
    public function createGoogleEvent()
    {
        $event = new Event;
        $event->name = 'A new event';
        $event->startDateTime = Carbon::now();
        $event->endDateTime = Carbon::now()->addHour();
        $event->addAttendee(['email' => 'arielsalvadormejia@gmail.com']);
        return $event->save();
    }

    /**
     * Get a google event id
     * 
     * @return string
     */
    public function getGoogleEventId()
    {
        return $eventId = Event::get()->first()->id;
    }

    /**
     * Get google event object from id
     * 
     * @param string $id
     * 
     * @return \Spatie\GoogleCalendar\Event
     */
    public function getGoogleEventObject(string $id)
    {
        return Event::find($id);
    }


    /**
     * Delete a google event
     * 
     * @param string $id
     * 
     * @return \Spatie\GoogleCalendar\Event
     */
    public function deleteGoogleEvent(string $id)
    {
        return Event::find($id)->delete();
    }

    /**
     * Create Crm Contact
     * 
     * @return \AlexaCRM\CRMToolkit\Client::entity
     */
    public function createContactInCrm()
    {
        $crmProvider                        =  new CrmProvider;
        $contact                            =  $crmProvider->findOrCreate('contact');
        $contact->firstname                 =  $this->mockUserData['firstname'];
        $contact->lastname                  =  $this->mockUserData['lastname'];
        $contact->emailaddress1             =  $this->mockUserData['emailaddress1'];
        $contact->new_dpi                   =  $this->mockUserData['new_dpi'];
        $contact->new_licenciadeconducir    =  $this->mockUserData['new_licenciadeconducir'];
        $contact->new_visa                  =  $this->mockUserData['new_visa'];
        $contact->new_pasaporte             =  $this->mockUserData['new_pasaporte'];
        $contact->new_segurovida            =  $this->mockUserData['new_segurovida'];
        $contact->new_seguromedico          =  $this->mockUserData['new_seguromedico'];
        $contact->new_tipodesangre          =  $this->mockUserData['new_tipodesangre'];
        $contact->new_contactoLosa          =  $this->mockUserData['new_contactoLosa'];
        $contactid = $contact->create();

        return $contactid;
    }

    /**
     * It deletes a test contact in crm
     * 
     * @return boolean
     */
    public function deleteContactFromCrm($contact_id)
    {
        $crmProvider = new CrmProvider;
        $contact = $crmProvider->findOrCreate('contact', $contact_id);
        return $contact->delete();
    }

    /**
     * It creates a  news item
     * 
     * @return \App\NewItem
     */
    public function createNewItem()
    {
        $newItem = new NewItem;
        $newItem->title = 'Title of an amazing news';
        $newItem->published_at = now()->subDays(2);
        $newItem->save();
        return $newItem;
    }

}
