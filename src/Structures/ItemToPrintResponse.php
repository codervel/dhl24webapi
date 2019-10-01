<?php

namespace Codervel\Dhl24WebApi\Structures;

use Illuminate\Database\Eloquent\Model;

use Response;
use stdClass;

class ItemToPrintResponse extends Model
{
    

    public static function createFromStdClass(stdClass $label){

    	$values = (array) $label;
    	$item  = new self;
    	$item->setRawAttributes($values, true);
    	return $item;
    }

    public function getFileToPrint(){

    	if(isset($this->labelData))
    		return Response::make(base64_decode($this->labelData), 200, array('content-type' => $this->labelMimeType));
    	else return 'No data';
    }
}
