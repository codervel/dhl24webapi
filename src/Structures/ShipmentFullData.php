<?php

namespace Codervel\Dhl24WebApi\Structures;

use Illuminate\Database\Eloquent\Model;

use Codervel\Dhl24WebApi\Structures\AddressStructure;
use Codervel\Dhl24WebApi\Structures\PaymentData;
use Codervel\Dhl24WebApi\Structures\PieceDefinition;
use Codervel\Dhl24WebApi\Structures\ServiceDefinition;

class ShipmentFullData extends Model
{
    
    public function setShipper(AddressStructure $shipper){

    	$this->shipper = $shipper->toArray();
    	return $this;
    }

    public function setReceiver(AddressStructure $receiver){

    	$this->receiver = $receiver->toArray();
    	return $this;
    }

    public function addPieceToList(PieceDefinition $piece){

    	$this->pieceList = array('item' => $piece->toArray());
    	return $this;
    }

    public function setPaymentData(PaymentData $paymentData){

    	$this->payment = $paymentData->toArray();
    	return $this;
    }   

    public function setServiceDefinition(ServiceDefinition $serviceDefinition){

    	$this->service = $serviceDefinition->toArray();
    	return $this;
    }

    public function setServiceZK(){

        $this->serviceType = "ZK";
        return $this;
    }

    public function setShipmentDate($date){

    	$this->shipmentDate = $date;
    	return $this;
    }

    public function addComment($comment){

    	$this->comment = $comment;
    	return $this;
    }

    public function setContent($content){

    	$this->content = $content;
    	return $this;
    }

    public function skipRestrictionCheck($set = true){

    	$this->skipRestrictionCheck = $set;
    	return $this;
    }

   public function setPaymentReturnData(PaymentData $paymentData){

        $this->billing = $paymentData->toArray();
        return $this;
    }
   

}


