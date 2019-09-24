<?php

namespace Codervel\Dhl24WebApi;

use SoapClient, DOMDocument;

class Dhl24WebApiClient extends SoapClient
{
    const WSDL = 'https://dhl24.com.pl/webapi2';

    protected $api;

    protected $authData = [];

    public function __construct()
    {
        parent::__construct( self::WSDL );

        
        $this->api = config('dhl.api');
        
        $this->authData = [
            'username' => $this->api['DHL_USER'],
            'password' => $this->api['DHL_PASSWORD']
        ];

    }

    public function getAuthData(){

        return $this->authData;
    }

}