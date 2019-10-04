<?php

namespace Codervel\Dhl24WebApi\Structures;

use Illuminate\Database\Eloquent\Model;

class PaymentData extends Model
{
    	protected $hidden = ['id'];
    
    	protected $fillable = [
    		'paymentMethod', 'payerType', 'accountNumber', 'costsCenter'
    	];

    	public function receiverPays(){

    		$this->paymentMethod = "CASH";
    		$this->payerType = "RECEIVER";
    		unset($this->accountNumber);

    		return $this;
    	}

    	public function shipperPays($id  = 1){

    		$this->paymentMethod = "BANK_TRANSFER";
    		$this->payerType = "SHIPPER";
    		$this->accountNumber = config('dhl.api.'.$id.'.DHL_SAP');

    		return $this;
    	}

    	public function thirdPartyPays(){

    		$this->paymentMethod = "BANK_TRANSFER";
    		$this->payerType = "USER";
    		$this->accountNumber = config('dhl.api.'.$id.'.DHL_SAP');

    		return $this;

    	}

    	public function setCostsCenter($costsCenter){

    		$this->costsCenter = $costsCenter;

    		return $this;
    	}

}
