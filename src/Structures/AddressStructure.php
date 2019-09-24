<?php

namespace Codervel\Dhl24WebApi\Structures;

use Illuminate\Database\Eloquent\Model;

class AddressStructure extends Model
{

    	protected $hidden = ['id'];
    
    	protected $fillable = [
    		'name', 'postalCode', 'city', 'street', 'houseNumber', 'apartmentNumber', 'contactPerson', 'contactPhone', 'contactEmail', 'country', 'isPackstation', 'isPostfiliale', 'postnummer'
    	];

    	public static function createFromStrings($name, $postalCode, $city, $street, $houseNumber){

    		$address = new self;
    		$address->setName($name)
    				->setPostalCode($postalCode)
    				->setCity($city)
    				->setStreet($street)
    				->setHouseNumber($houseNumber);
    		return $address;
    	}


    	public function setName($name){

    		$this->name = $name;
    		return $this;
    	}

    	public function setPostalCode($postalCode){

    		$this->postalCode = $postalCode;
    		return $this;
    	}

    	public function setCity($city){

    		$this->city = $city;
    		return $this;
    	}

    	public function setStreet($street){

    		$this->street = $street;
    		return $this;
    	}

    	public function setHouseNumber($houseNumber){

    		$this->houseNumber = $houseNumber;
    		return $this;
    	}

    	public function setApartmentNumber($apartmentNumber){

    		$this->apartmentNumber = $apartmentNumber;
    		return $this;
    	}

    	public function setContactPerson($contactPerson){

    		$this->contactPerson = $contactPerson;
    		return $this;
    	}

    	public function setContactPhone($contactPhone){

    		$this->conntactPerson = $contactPhone;
    		return $this;
    	}

    	public function setContactEmail($contactEmail){

    		$this->contactEmail = $contactEmail;
    		return $this;
    	}

    	public function setCountry($country){

    		$this->country = $country;
    		return $this;
    	}



}
