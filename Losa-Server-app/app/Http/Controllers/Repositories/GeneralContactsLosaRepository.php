<?php namespace App\Http\Controllers\Repositories;

use App\GeneralContact;
use App\User;

class GeneralContactsLosaRepository
{

    /**
     * Get all losa contacts and just save the ones with contactLosa as true in table contacts
     *
     * @return bool
     */
    public function sync()
    {
        GeneralContact::truncate();
        $contactsLosa = User::where('contacto_losa', '=', 1)->get();
        foreach ($contactsLosa as $contactoLosa) {
            $newContactLosa                 = new GeneralContact;
            $newContactLosa->name           = $contactoLosa->name;
            $newContactLosa->phone          = $contactoLosa->mobilephone;
            $newContactLosa->email          = $contactoLosa->email;
            $newContactLosa->save();
        }
        return true;
    }

}