<?php

namespace Codervel\Dhl24WebApi\Structures;

use Illuminate\Database\Eloquent\Model;

class PieceDefinition extends Model
{
    	protected $hidden = ['id'];
    
    	protected $fillable = [
    		'type', 'width', 'height', 'length', 'weight', 'quantity', 'nonStandard', 'euroReturn', 'blpPieceId'
    	];

    	public function clearAttributes(){

    		foreach($this->attributes as $key => $value){
    			unset($this->$key);
    		}
    	}

    	public function prepareEnvelopes( $qty ) : self {

    		$this->clearAttributes();
    		$this->type = "ENVELOPE";
    		$this->quantity = $qty;    
    		return $this;

     	}

    	public function preparePackages( $qty ) : self {

    		$this->clearAttributes();
    		$this->type = "PACKAGE";
    		$this->quantity = $qty;
    		return $this;
    	}


    	public function preparePallets( $qty ) : self {

    		$this->clearAttributes();
    		$this->type = "PALLET";
    		$this->quantity = $qty;
    		return $this;
    	}


    	public function prepareEnvelope( $qty = 1 ) : self {

    		return $this->prepareEnvelopes($qty);
    		
    	} 


    	public function prepareCustomPackages( $width, $height, $length, $weight, $qty ) : self {

    		$this->preparePackages($qty);
    		$this->setMeasures($width, $height, $length, $weight);
    		return $this;

    	}

    	public function prepareSmallPackage( $qty = 1 ) : self {

    		$width = config('dhl.package.SMALL_WIDTH');
    		$height = config('dhl.package.SMALL_HEIGHT');
    		$length = config('dhl.package.SMALL_LENGTH');
    		$weight = config('dhl.package.SMALL_WEIGHT');

    		return $this->prepareCustomPackages( $width, $height, $length, $weight, $qty );

    	}

    	public function prepareSmallPackages( $qty ) : self {

    		return $this->prepareSmallPackage( $qty );

    	}

    	public function prepareMediumPackage( $qty = 1 ) : self {

    		$width = config('dhl.package.MEDIUM_WIDTH');
    		$height = config('dhl.package.MEDIUM_HEIGHT');
    		$length = config('dhl.package.MEDIUM_LENGTH');
    		$weight = config('dhl.package.MEDIUM_WEIGHT');

    		return $this->prepareCustomPackages( $width, $height, $length, $weight, $qty );

    	}

    	public function prepareMediumPackages( $qty ) : self {

    		return $this->prepareMediumPackage( $qty );

    	}

    	public function prepareBigPackage( $qty = 1 ) : self {

    		$width = config('dhl.package.BIG_WIDTH');
    		$height = config('dhl.package.BIG_HEIGHT');
    		$length = config('dhl.package.BIG_LENGTH');
    		$weight = config('dhl.package.BIG_WEIGHT');

    		return $this->prepareCustomPackages( $width, $height, $length, $weight, $qty );

    	}

    	public function prepareBigPackages( $qty ) : self {

    		return $this->prepareBigPackage( $qty );

    	}


    	public function prepareCustomPallets( $width, $height, $length, $weight, $qty, $euroReturn = false ) : self {

    		$this->preparePallets($qty);
    		$this->setMeasures( $width, $height, $length, $weight );
    		if($euroReturn) $this->euroReturn = $euroReturn;
    		return $this;

    	}


    	public function preparePallet( $qty = 1, $euroReturn = false ) : self {


    		$width = config('dhl.package.PALLET_WIDTH');
    		$height = config('dhl.package.PALLET_HEIGHT');
    		$length = config('dhl.package.PALLET_LENGTH');
    		$weight = config('dhl.package.PALLET_WEIGHT');

    		return $this->prepareCustomPallets( $width, $height, $length, $weight, $qty, $euroReturn = false );

    	}

    	public function setMeasures( $width, $height, $length, $weight ){

    		$this->width = $width;
    		$this->height = $height;
    		$this->length = $length;
    		$this->weight = $weight;
    	}

}
