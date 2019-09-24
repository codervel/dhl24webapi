<?php

namespace Codervel\Dhl24WebApi\Structures;

use Illuminate\Database\Eloquent\Model;

class ItemToPrint extends Model
{


    public function setShipmentId($shipmentId){

    	$this->shipmentId = $shipmentId;
    	return $this->shimentId;
    }

    public function lp($shipmentId){

    	$this->labelType = "LP";
    	return $this->setShipmentId($shipmentId);
    }

    public function blp($shipmentId){

    	$this->labelType = "BLP";
    	return $this->setShipmentId($shipmentId);
    }

    public function lblp($shipmentId){

    	$this->labelType = "LBLP";
    	return $this->setShipmentId($shipmentId);
    }

    public function zblp($shipmentId){

    	$this->labelType = "ZBLP";
    	return $this->setShipmentId($shipmentId);
    }
}
