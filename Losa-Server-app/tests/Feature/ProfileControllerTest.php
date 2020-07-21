<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Providers\CrmProvider;
use App\Http\Controllers\Formatters\CrmEntityFormatter;
use App\User;

class ProfileControllerTest extends TestCase
{
    use RefreshDatabase;

    //TODO 
    //--------------
    // verify env files for crm user and crm password

    /**
     * Tests crm url exists in env file 
     * 
     * @return void
     */
    public function testCrmUrlExistsInEnvFile()
    {
        $result = (env('CRM_URL')) ? true : false;
        $this->assertTrue($result);
    }

    /**
     * Tests if crm user key exists in env file
     * 
     * @return void
     */
    public function testCrmUserExistsInEnvFile()
    {
        $result = (env('CRM_USER')) ? true : false;
        $this->assertTrue($result);
    }

    /**
     * Tests if crm password exists in env file
     * 
     * @return void
     */
    public function testCrmPasswordExistsInEnvFile()
    {
        $result = (env('CRM_PASSWORD')) ? true : false;
        $this->assertTrue($result);
    }

    /**
     * Tests if Profile API route return http code 200
     *
     * @return void
     */
    public function testProfileApiRouteIsOk()
    {
        $user = $this->createUser();
        $id = $user->id;
        $this->get("/api/v1/profile/$id")->assertStatus(200);
    }

    /**
     * Get contact data from crm by user id in dashboard database
     * 
     * @return \Illuminate\Http\Response
     */
    public function testProfileRequest()
    {
        $contactid = $this->createContactInCrm();
        $provider = new CrmProvider;
        $provider->syncAllContacts();
        $user = User::where('email', '=', $this->mockUserData['emailaddress1'])->first();
        $this->get("/api/v1/profile/$user->id", $this->headers)->assertJson([
            "name"                      => $user->name,
            "email"                     => $user->email,
            "contactid"                 => $user->contactid,
            "new_dpi"                   => $user->new_dpi,
            "new_vencimientodpi"        => $user->new_vencimientodpi,
            "new_licenciadeconducir"    => $user->new_licenciadeconducir,
            "new_vencimientolicencia"   => $user->new_vencimientolicencia,
            "new_visa"                  => $user->new_visa,
            "new_vencimientovisa"       => $user->new_vencimientovisa,
            "new_pasaporte"             => $user->new_pasaporte,
            "new_vencimientopasaporte"  => $user->new_vencimientopasaporte,
            "new_segurovida"            => $user->new_segurovida,
            "new_seguromedico"          => $user->new_seguromedico,
            "new_tipodesangre"          => $user->new_tipodesangre,
            "new_contactoLosa"          => $user->new_contactoLosa,
        ]);
        $this->deleteContactFromCrm($contactid);
    }

}
