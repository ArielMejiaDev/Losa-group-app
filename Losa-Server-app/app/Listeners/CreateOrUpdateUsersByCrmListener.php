<?php namespace App\Listeners;

use App\GeneralContact;
use App\Http\Controllers\Formatters\PhoneNumberFormatter;
use App\Http\Controllers\Repositories\CrmRepository;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Carbon;

class CreateOrUpdateUsersByCrmListener implements ShouldQueue
{

    public $crmRepository;
    public $phoneFormatter;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->crmRepository = new CrmRepository;
        $this->phoneFormatter = new PhoneNumberFormatter;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $contacts = $this->crmRepository->all('contact');
        GeneralContact::truncate();
        array_filter($contacts->Entities, function($contact) {
            $user = User::withTrashed()->whereEmail($contact->emailaddress1)->first();
            if ( $user == null) $user = new User;
            //if ( $contact->new_status_app !== null ) 
            $this->createOrUpdate($user, $contact);
        });
    }

    public function createOrUpdate($user, $contact)
    {
        $user->name                     =       $contact->fullname;
        $user->password                 =       $user->password !== null ? $user->password : bcrypt('legadof@miliar');
        $user->email                    =       $contact->emailaddress1;
        $user->contact_id               =       $contact->contactid;
        $user->dpi                      =       $contact->new_dpi;
        $user->vencimiento_dpi          =       Carbon::createFromTimestamp($contact->new_vencimientodpi)->format('Y-m-d');
        $user->licencia_conducir        =       $contact->new_licenciadeconducir;
        $user->vencimiento_licencia     =       Carbon::createFromTimestamp($contact->new_vencimientolicencia)->format('Y-m-d');
        $user->visa                     =       $contact->new_visa;
        $user->vencimiento_visa         =       Carbon::createFromTimestamp($contact->new_vencimientovisa)->format('Y-m-d');
        $user->pasaporte                =       $contact->new_pasaporte;
        $user->vencimiento_pasaporte    =       Carbon::createFromTimestamp($contact->new_vencimientopasaporte)->format('Y-m-d');
        $user->seguro_vida              =       $contact->new_segurovida;
        $user->seguro_medico            =       $contact->new_seguromedico;
        $user->tipo_sangre              =       $contact->new_tipodesangre;
        $user->contacto_losa            =       $contact->new_contactolosa;
        $user->celular                  =       $contact->mobilephone;
        $user->status_app               =       $contact->new_app_status;
        $user->save();

        if($contact->new_contactolosa == 1) {
            $newContactLosa             =       new GeneralContact;
            $newContactLosa->name       =       $contact->fullname;
            $newContactLosa->celular    =       $contact->mobilephone;
            $newContactLosa->email      =       $contact->emailaddress1;
            $newContactLosa->save();
        }

        $this->updateUserModel($contact, $user);

    }


    public function updateUserModel($contact, User $user)
    {
        $user->crm_status = 'synchronized';
        $user->save();

        if ($this->userMustBeTrashed($contact, $user)) {
            $user->delete();
        }

        if ($this->userMustBeRestore($contact, $user)) {
            $user->restore();
        }
    }

    public function userMustBeTrashed($contact, User $user)
    {
        return $contact->new_app_status == false && ! $user->trashed();
    }

    public function userMustBeRestore($contact, User $user)
    {
        return $contact->new_app_status == true && $user->trashed();
    }

}
