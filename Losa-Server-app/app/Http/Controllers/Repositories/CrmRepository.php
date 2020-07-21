<?php namespace App\Http\Controllers\Repositories;

use AlexaCRM\CRMToolkit\Settings;
use AlexaCRM\CRMToolkit\Client;

class CrmRepository 
{

    /**
     * Set default options
     *
     * @return array
     */
    public function setOptions($url = null, $user = null, $password = null, $authMode = null)
    {
        return [
            'serverUrl'     => $url         = ($url)        ? $url      :  config('app.crm_url'),
            'username'      => $user        = ($user)       ? $user     :  config('app.crm_user'),
            'password'      => $password    = ($password)   ? $password :  config('app.crm_password'),
            'authMode'      => $authMode    = ($authMode)   ? $authMode : 'OnlineFederation' ,
        ];
    }

    /**
     * Set service
     *
     * @return
     */
    public function setService($options = null)
    {
        if (is_null($options)) {
            $options        = $this->setOptions();
        }
        $serviceSettings    = new Settings( $options );
        $service            = new Client( $serviceSettings );
        return $service;
    }


    /**
     * Get Crm data from specific module and contact id
     *
     * @param int $id
     *
     * @return void
     */
    public function findOrCreate(string $module, $id = null)
    {
        $service = $this->setService();
        $entity = ($id) ? $service->entity( $module, $id ) : $service->entity( $module ) ;
        return $entity;
    }

    /**
     * Get all Crm Data form specific module and contact id
     *
     * @return void
     */
    public function all(string $module)
    {
        $client     = $this->setService();
        $entities   = $client->retrieveMultipleEntities($module, $allPages = true, $pagingCookie = null, $limitCount = null, $pageNumber = null, $simpleMode = false);
        return $entities;
    }

}