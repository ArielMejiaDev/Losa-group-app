<?php namespace App\Http\Controllers\Formatters;

use Illuminate\Support\Carbon;

class CrmEntityFormatter 
{

    /**
     * Create a format for profile data as array
     * 
     * @param \AlexaCRM\CRMToolkit\Client::entity $crmContact
     * 
     * @return array
     */
    public function jsonFromContact($contact)
    {
        // return response()->json([
        //     'name'                  => $contact->fullname,
        //     'email'                 => $contact->emailaddress1,
        //     'dpi'                   => $contact->new_dpi,
        //     'licencia_de_conducir'  => $contact->new_licenciadeconducir,
        //     'pasaporte'             => $contact->new_pasaporte,
        //     'visa'                  => $contact->new_visa,
        //     'fecha_dpi'             => $this->dateStringFromUnixTime($contact->new_vencimientodpi),
        //     'fecha_licencia'        => $this->dateStringFromUnixTime($contact->new_vencimientolicencia),
        //     'fecha_pasaporte'       => $this->dateStringFromUnixTime($contact->new_vencimientopasaporte),
        //     'fecha_visa'            => $this->dateStringFromUnixTime($contact->new_vencimientovisa),
        //     'contacto_uno'          => $contact->new_contacto_uno,
        //     'contacto_dos'          => $contact->new_contacto_dos,
        //     'contacto_tres'         => $contact->new_contacto_tres,
        //     'contacto_cuatro'       => $contact->new_contacto_cuatro,
        //     'contacto_cinco'        => $contact->new_contacto_cinco
        // ]);
    }

    /**
     * Creates a date string from a unix timestamp
     * 
     * @param int $date
     * 
     * @return string 
     */
    public function dateStringFromUnixTime(int $unixDate)
    {
        return Carbon::createFromTimestamp($unixDate)->toDateString();
    }
    

}