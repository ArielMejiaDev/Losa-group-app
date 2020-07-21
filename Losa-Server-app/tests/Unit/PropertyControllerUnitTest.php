<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Property;
use Illuminate\Support\Carbon;

class PropertyControllerUnitTest extends TestCase
{
    use RefreshDatabase;
    
    //todo test create method

    
    /**
     * It test Property Controller be able to edited a property
     * 
     * @return void
     */
    public function test_property_can_be_edited_in_dashboard()
    {
        
        $user = $this->createUser();
        $this->be($user);
        $property = $this->createProperty();
        $result = $this->get("admin/properties/{$property->id}");
        $result->assertStatus(200)->assertSee($property->name);
        
    }
    
    /**
     * It test Property Controller be able to updated a property
     * 
     * @return void
     */
    public function test_property_can_be_updated_in_dashboard()
    {
        $user = $this->createUser();
        $this->be($user);
        $property = $this->createProperty();
        $property->name = 'New property name';
        $propertyEditedForm = [
            '_token' => csrf_field(),
            'name'                  => $property->name,
            'address'               => 'New Address',
            'parking'               => 'New Parking number',
            'rooms'                 => 'New Rooms number',
            'beds'                  => 'New beds number',
            'maintenancePerson'     => 'New maintenance person',
            'maintenancePhone'      => '+12365-0757',
            'mapsLink'              => 'New maps link',
            'wifiNetwork'           => 'New wifi network',
            'wifiPassword'          => 'New wifi password',
            'infoPhone'             => 'New info phone',
            'receptionPhone'        => 'New reception phone',
            'calendarId'            => 'New calendar id',
        ];
        $this->call('PUT', "/admin/properties/{$property->id}", $propertyEditedForm)->assertRedirect();
        $this->assertDatabaseHas('properties', [
            'id'                    => $property->id,
            'name'                  => $property->name,
            'address'               => 'New Address',
            'parking'               => 'New Parking number',
            'rooms'                 => 'New Rooms number',
            'beds'                  => 'New beds number',
            'maintenancePerson'     => 'New maintenance person',
            'maintenancePhone'      => '+12365-0757',
            'mapsLink'              => 'New maps link',
            'wifiNetwork'           => 'New wifi network',
            'wifiPassword'          => 'New wifi password',
            "imageUrlRelative"      => $property->imageUrlRelative,
            "imageUrlAbsolute"      => $property->imageUrlAbsolute,
            'infoPhone'             => 'New info phone',
            'receptionPhone'        => 'New reception phone',
            'calendarId'            => 'New calendar id',
            "deleted_at"            => $property->deleted_at,
            "created_at"            => Carbon::createFromFormat('Y-m-d H:i:s', $property->created_at)->format('Y-m-d H:i:s'),
            "updated_at"            => Carbon::createFromFormat('Y-m-d H:i:s', $property->updated_at)->format('Y-m-d H:i:s'),
        ]);
        
    }

    
    /**
     * It test Property Controller be able to destroyed a property
     * 
     * @return void
     */
    public function test_property_can_be_destroyed_in_dashboard()
    {
        $user = $this->createUser();
        $this->be($user);
        $property = $this->createProperty();
        $this->call('DELETE', "/admin/properties/{$property->id}", ['_token' => csrf_token()])->assertRedirect();
        $this->assertDatabaseMissing('properties', [
            'id'                    => $property->id,
            'name'                  => $property->name,
            'address'               => $property->address,
            'parking'               => $property->parking,
            'rooms'                 => $property->rooms,
            'beds'                  => $property->beds,
            'maintenancePerson'     => $property->maintenancePerson,
            'maintenancePhone'      => $property->maintenancePhone,
            'mapsLink'              => $property->mapsLink,
            'wifiNetwork'           => $property->wifiNetwork,
            'wifiPassword'          => $property->wifiPassword,
            'imageUrlAbsolute'      => $property->imageUrlAbsolute,
            'infoPhone'             => $property->infoPhone,
            'receptionPhone'        => $property->receptionPhone,
            'calendarId'            => $property->calendarId,
            'deleted_at'            => $property->deleted_at,
            'created_at'            => $property->created_at,
            'updated_at'            => $property->updated_at
        ]);
    }


}
