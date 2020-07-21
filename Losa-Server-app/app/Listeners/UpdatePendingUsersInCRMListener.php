<?php

namespace App\Listeners;

use App\Http\Controllers\Repositories\CrmRepository;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdatePendingUsersInCRMListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {

        $usersToUpdate = User::withTrashed()->where('crm_status', 'pending')->get();

        $usersToUpdate->each(function($user){

            if ($user->contact_id !== null) {
                $contact = $this->updateUserInCrm($user);
            }

            if ($user->contact_id == null) {
                $contact = $this->createUserInCrm($user);
            }

            $this->updateUserModel($contact, $user);
            
        });

    }

    public function updateUserInCrm(User $user)
    {

        $contact = (new CrmRepository)->findOrCreate('contact', $user->contact_id);
        $contact->firstname                 = explode(' ', $user->name)[0];
        $contact->lastname                  = explode(' ', $user->name)[1] ?? 'No Disponible';
        $contact->emailaddress1             = $user->email;
        $contact->new_dpi                   = $user->dpi;
        $contact->new_vencimientodpi        = $user->vencimiento_dpi;
        $contact->new_licenciadeconducir    = $user->licencia_conducir;
        $contact->new_vencimientolicencia   = $user->vencimiento_licencia;
        $contact->new_visa                  = $user->visa;
        $contact->new_vencimientovisa       = $user->vencimiento_visa;
        $contact->new_pasaporte             = $user->pasaporte;
        $contact->new_vencimientopasaporte  = $user->vencimiento_pasaporte;
        $contact->new_segurovida            = $user->seguro_vida;
        $contact->new_seguromedico          = $user->seguro_medico;
        $contact->new_tipodesangre          = $user->tipo_sangre;
        $contact->new_contactolosa          = $user->contacto_losa;
        $contact->mobilephone               = $user->celular;
        $contact->update();
        return $contact;
    }

    public function createUserInCrm(User $user)
    {
        $contact                            = (new CrmRepository)->findOrCreate('contact');
        $contact->firstname                 = explode(' ', $user->name)[0];
        $contact->lastname                  = explode(' ', $user->name)[1] ?? 'No Disponible';
        $contact->emailaddress1             = $user->email;
        $contact->new_dpi                   = $user->dpi;
        $contact->new_vencimientodpi        = $user->vencimiento_dpi;
        $contact->new_licenciadeconducir    = $user->licencia_conducir;
        $contact->new_vencimientolicencia   = $user->vencimiento_licencia;
        $contact->new_visa                  = $user->visa;
        $contact->new_vencimientovisa       = $user->vencimiento_visa;
        $contact->new_pasaporte             = $user->pasaporte;
        $contact->new_vencimientopasaporte  = $user->vencimiento_pasaporte;
        $contact->new_segurovida            = $user->seguro_vida;
        $contact->new_seguromedico          = $user->seguro_medico;
        $contact->new_tipodesangre          = $user->tipo_sangre;
        $contact->new_contactolosa          = $user->contacto_losa;
        $contact->mobilephone               = $user->celular;
        $contactId = $contact->create();
        $user->contact_id = $contactId;
        return $contact;
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
