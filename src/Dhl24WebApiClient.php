<?php

namespace Codervel\Dhl24WebApi;

use SoapClient, DOMDocument;

class Dhl24WebApiClient extends SoapClient
{
    const WSDL = 'https://dhl24.com.pl/webapi2';

    protected $api;

    protected $authData = [];

    public $driver;

    public function __construct($driver = 1)
    {
        parent::__construct( self::WSDL );
        $this->driver = $driver;
        
        $this->api = config('dhl.api.'.$this->driver);
        
        $this->authData = [
            'username' => $this->api['DHL_USER'],
            'password' => $this->api['DHL_PASSWORD']
        ];

    }

    public function getAuthData(){

        return $this->authData;
    }

}