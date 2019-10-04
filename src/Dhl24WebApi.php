<?php

namespace Codervel\Dhl24WebApi;

use Codervel\Dhl24WebApi\Dhl24WebApiClient;
use Codervel\Dhl24WebApi\Structures\ShipmentFullData;
use Codervel\Dhl24WebApi\Structures\ItemToPrintResponse;

use stdClass;
use Carbon;

class Dhl24WebApi
{

	protected $apiClient;

	protected $pieceDefinition;


    public function __construct($driver = 1){

        $this->apiClient = new Dhl24WebApiClient($driver);
    }


    public function bookCourier($pickupDate, $pickupTimeFrom, $pickupTimeTo, $shipmentList, $additionalInfo = "", $courierWithLabel = false){

    	$bookData = [
    					'authData' => $this->apiClient->getAuthData(), 
    					'pickupDate' =>$pickupDate,
    					'pickupTimeFrom' => $pickupTimeFrom,
    					'pickupTimeTo' => $pikupTimeTo,
    					'additionalInfo' => $additionalInfo,
    					'shipmentIdList' => $shipmentIdList,
    					'courierWithLabel' => $courierWithLabel
    				];

    	$bookResult = $this->apiCLient->bookCourier($bookData);
    	return $bookResult;
    }

    public function bookCourierTodayAfternoon($shipmentList){

    	$pickupDate  = Carbon::now()->format('Y-m-d');
    	$pickupTimeFrom  = config('dhl.api.'.$this->apiClient->driver.'.pickupfrom');
    	$pickupTimeTo = config('dhl.api.'.$this->apiClient->driver.'.pickupto');

    	return $this->bookCourier($pickupDate, $pickupTimeFrom, $pickupTimeTo, $shipmentList);
    }


    public function createShipment(ShipmentFullData $shipments){

    	$shipmentsResult = $this->createShipments([$shipments]);

    	return $shipmentsResult;

    }

    public function createShipments($toShipment){

    	$shipments = new stdClass();
    	$shipments->item = $toShipment;

    	$shipmentData = [ 
    						'authData' => $this->apiClient->getAuthData(), 
    						'shipments' => $shipments
    					];				

    	$shipmentsResult = $this->apiClient->createShipments($shipmentData);

    	return $shipmentsResult;

    }

    public function deleteShipments($shipmentList){

    	$deleteData = [
    						'authData' => $this->apiClient->getAuthData(),
    						'shipments' => $shipmentList
    				  ];

    	$deleteResult = $this->apiClient->deleteShipments($deleteData);

    	return $deleteResult;
    }

    public function getLabel($itemToPrint){

    	return $this->getLabels([$itemToPrint]);
    }


    public function getLabels( $toPrint ){

    	try{
    		$itemsToPrint = new stdClass();
    		$itemsToPrint->item = $toPrint;

    		$labelData = [
    					'authData' => $this->apiClient->getAuthData(), 
    					'itemsToPrint' => $itemsToPrint
    				];

    		$labels = $this->apiClient
    					   ->getLabels($labelData)
    					   ->getLabelsResult
    					   ->item;

    		if(is_array($labels)){
    			$labelsArray = [];
    			foreach($labels as $label)
    				array_push($labelsArray, ItemToPrintResponse::createFromStdClass($label));
    			return $labelsArray;
    		}

    		return ItemToPrintResponse::createFromStdClass($labels);

    	} catch(\Exception $e){

    		return new ItemToPrintResponse();
    	}
    }

    public function getTrackAndTraceInfo( $shipmentId ){

		$trackData = [
    						'authData' => $this->apiClient->getAuthData(),
    						'shipmentId' => $shipmentId
    				  ];

    	return $this->apiClient->getTrackAndTraceInfo($trackData);
    }



}