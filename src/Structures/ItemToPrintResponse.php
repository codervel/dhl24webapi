<?php

namespace Codervel\Dhl24WebApi\Structures;

use Illuminate\Database\Eloquent\Model;

use Response;
use stdClass;

class ItemToPrintResponse extends Model
{
    
    public function __construct(stdClass $label){

    	$values = (array) $label;
    	$this->setRawAttributes($values, true);
    	return $this;
    }

    public function getFileToPrint(){

    	return Response::make(base64_decode($this->labelData), 200, array('content-type' => $this->labelMimeType));
    }
}
