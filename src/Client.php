<?php

namespace OlzaApiClient;

use OlzaApiClient\Services\Transport,
    OlzaApiClient\Entities\Request\ApiBatchRequest;

use OlzaApiClient\Entities\Response\Parcel,
    OlzaApiClient\Entities\Response\ParcelList,
    OlzaApiClient\Entities\Response\ErrorList,
    OlzaApiClient\Entities\Response\ProcessedList,
    OlzaApiClient\Entities\Response\DataStream,
    OlzaApiClient\Entities\Response\ApiBatchResponse;

use OlzaApiClient\Exception\ApiException;
use OlzaApiClient\Exception\ValidationException;
use OlzaApiClient\Exception\ResponseException;
use OlzaApiClient\Exception\SpeditionException;
use OlzaApiClient\Exception\ProcessingException;
use OlzaApiClient\Exception\ApiClientException;

/**
 * Client for communication with Olza Logistic sever API
 */
class Client
{

    const RETURN_CODE_OK = 0;


    /**
     *
     * @var string
     */
    protected $method_create_shipments = 'createShipments';

    /**
     *
     * @var string 
     */
    protected $method_post_shipments = 'postShipments';

    /**
     *
     * @var string
     */
    protected $method_get_labels = 'getLabels';

    /**
     *
     * @var string
     */
    protected $method_get_statuses = 'getStatuses';

    /**
     *
     * @var string
     */
    protected $method_get_shipments_details = 'getShipmentsDetails';

    /**
     *
     * @var TransportInterface 
     */
    protected $transport;

    /**
     * 
     * @param string $apiUrl
     */
    public function __construct($apiUrl) {

        $this->transport = new Transport($apiUrl);
    }

    /**
     * Add batch of new shipment
     * @param ApiBatchRequest $list
     * @return ApiBatchResponse
     */
    public function createShipments(ApiBatchRequest $list) {

        $response = $this->processResponse(
            $this->transport->executePost($this->method_create_shipments, $list->getBody())
        );

        $errors = ErrorList::fromApiData($response);
        $processed = ProcessedList::fromApiData($response);

        return ApiBatchResponse::create($processed, $errors);
    }

    /**
     * Post already created shipments
     * @param ApiBatchRequest $list
     * @return ApiBatchResponse
     */
    public function postShipments(ApiBatchRequest $list) {

        $response = $this->processResponse(
                        $this->transport->executePost($this->method_post_shipments, $list->getBody() ) 
        );

        $errors = ErrorList::fromApiData($response);
        $processed = ProcessedList::fromApiData($response);

        return ApiBatchResponse::create($processed, $errors);
    }

    /**
     * Get labels (stickers) batch for given shipments
     * @param ApiBatchRequest $list
     * @return ApiBatchResponse
     */
    public function getLabels(ApiBatchRequest $list) {

        $response = $this->processResponse(
                        $this->transport->executePost($this->method_get_labels, $list->getBody() ) 
        );

        $errors = ErrorList::fromApiData($response);
        $processed = ProcessedList::fromApiData($response);
        $dataStreams = DataStream::fromApiData($response);

        return ApiBatchResponse::create($processed, $errors, $dataStreams);
    }

    /**
     * Get statuses of given shipments
     * 
     * @param ApiBatchRequest $list
     * @return ApiBatchResponse
     */
    public function getStatuses(ApiBatchRequest $list) {

        $response = $this->processResponse(
                        $this->transport->executePost($this->method_get_statuses, $list->getBody() )
        );

        $errors = ErrorList::fromApiData($response);
        $processed = ProcessedList::fromApiData($response);

        return ApiBatchResponse::create($processed, $errors);
    }

    /**
     * Get details of given shipments
     * 
     * @param ApiBatchRequest $list
     * @return ApiBatchResponse
     */
    public function getShipmentsDetails(ApiBatchRequest $list)
    {

        $response = $this->processResponse(
            $this->transport->executePost($this->method_get_shipments_details, $list->getBody())
        );

        $errors = ErrorList::fromApiData($response);
        $processed = ProcessedList::fromApiData($response);

        return ApiBatchResponse::create($processed, $errors);
    }

    /**
     * Validate internal response format and global RC check + get response payload
     * @param mixed $bodyArray
     * @return array
     * @throws ApiException
     */
    protected function processResponse($bodyArray) {

        // precheck, if status is in place
        if( !is_array($bodyArray) || empty($bodyArray['status']) || !is_array($bodyArray['status']) ) {
            throw new ResponseException('Malformed status.');
        }

        if( !isset($bodyArray['status']['responseCode']) ) {
            throw new ResponseException('Malformed response code.');
        }

        if( !isset($bodyArray['status']['responseDescription']) ) {
            throw new ResponseException('Malformed response description.');
        }

        if( empty($bodyArray['response']) ) {
            throw new ResponseException('Malformed response payload.');
        }

        // validation error on global level
        if($bodyArray['status']['responseCode'] == ApiException::ERROR_CODE_VALIDATION) { 
            throw ValidationException::createFromApiStatus($bodyArray['status']);
        }

        // spedition error on global level
        if($bodyArray['status']['responseCode'] == ApiException::ERROR_CODE_SPEDITION) {
            throw SpeditionException::createFromApiStatus($bodyArray['status']);
        }

        // throw exception if response is not RC=0
        if($bodyArray['status']['responseCode'] != self::RETURN_CODE_OK) {

            throw ProcessingException::createFromApiStatus($bodyArray['status']);
        }

        return $bodyArray['response'];
        
    }
   
}
