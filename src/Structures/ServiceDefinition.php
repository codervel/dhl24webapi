<?php

namespace Codervel\Dhl24WebApi\Structures;

use Illuminate\Database\Eloquent\Model;

class ServiceDefinition extends Model
{
    protected $hidden = ['id'];

    public function __construct($product = "AH"){

    	parent::__construct();

    	$this->product = $product;

    	return $this;
    }

    public function deliveryEvening($set = true){

    	$this->deliveryEvening = $set;
    	
    	return $this;
    }

    public function deliverySaturday($set = true){

		if($set){
    		$this->deliveryOnSunday = false;
    		$this->deliveryOnSaturday = true;
    	}else $this->deliveryOnSaturday = false;
    	
    	return $this;
    }

    public function deliverySunday($set = true){

    	if($set){
    		$this->deliveryOnSaturday = false;
    		$this->deliveryOnSunday = true;
    	}else $this->deliveryOnSunday = false;
    	
    	return $this;
    }

    public function collectOnDelivery($value, $form = "BANK_TRANSFER", $reference = null){

    	$this->collectOnDelivery = true;
    	$this->collectOnDeliveryValue = $value;
    	$this->collectOnDeliveryForm = $form;
    	$this->collectOnDeliveryReference = $reference;

    	return $this;
    }

    public  function insurance($value) {

    	$this->insurance = true;
    	$this->insuranceValue = $value;

    	return $this;

    }

    public function returnOnDelivery($set = true, $reference = null){

    	$this->returnOnDelivery = $set;
    	$this->returnOnDeliveryReference = $reference;

    	return $this;
    }

    public function proofOfDelivery($set = true){

    	$this->proofOfDelivery = $set;

    	return $this;
    }

    public function selfCollect($set = true){

    	$this->selfCollect  = $set;

    	return $this;
    }

    public function deliveryToNeighbour($set = true){

    	$this->deliveryToNeighbour = $set;

    	return $this;
    }

    public function predeliveryInformation($set  = true){

    	$this->predeliveryInformation = $set;

    	return $this;
    }

}
