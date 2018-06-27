<?php 

namespace OlzaApiClient\Services;

use OlzaApiClient\Exception\ApiTransportException;
use OlzaApiClient\Exception\ApiException;
use OlzaApiClient\Exception\ResponseException;
use OlzaApiClient\Exception\ApiClientException;

use OlzaApiClient\Interfaces\TransportInterface;
    
use GuzzleHttp;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Client as HttpClient;
use Psr\Http\Message\ResponseInterface as HttpResponseInterface;
use GuzzleHttp\Exception\ClientException as HttpException;
    
use Exception;

/**
 * Transport is providing any communication with API counterpart, returning Arrays
 */
class Transport
        implements TransportInterface
{
    
    const METHOD_POST = 'POST';
    const METHOD_GET = 'GET';
    
    /**
     *
     * @var string 
     */
    protected $apiCallUri = '/api/v1/';   
    
    /**
     *
     * @var HttpClient 
     */
    protected $provider = NULL;

    
    /**
     * Prepare client for new connection.
     * 
     * @param string $apiUrl
     */
    public function __construct($apiUrl) {
        
        // init
        $this->provider = new HttpClient(
                    Array(
                        'base_uri' => $apiUrl . $this->apiCallUri,
                       // RequestOptions::HTTP_ERRORS => FALSE,
                    )
                );
    }
    
    /**
     * Send request to server, get response, process errors and exceptions
     * 
     * @param string $apiCall
     * @param string $method
     * @param array $body = NULL
     * @return array
     * @throws ApiException
     */
    protected function request($apiCall, $method, array $body = NULL) {
        
        try {
            
            //communication
            if($method == self::METHOD_POST) { // POST
                
                $response = $this->provider->request($method, $apiCall, Array(
                    RequestOptions::JSON => $body
                ));
                
            } else { // GET
                $response = $this->provider->request($method, $apiCall);
            }
            
            // decode response to structured array
            return $this->decodeResponse($response);
            
        } catch(HttpException $he) { // HTTP errors - specific to Guzzle
            
            throw new ApiTransportException("Communication with API failed - HTTP RC {$he->getCode()}", $he->getCode());
            
        } catch(ApiException $he) { // direct API errors
            
            throw $he;

        } catch(Exception $e) { // uncought exception or problem with client

            throw new ApiClientException('API request failed with message: ' . $e->getMessage(), $e->getCode() );
        }
        
        
    }
    
    /**
     * Decode proivided response into structured array
     * @param HttpResponseInterface $response
     * @return array
     * @throws ApiException
     */
    protected function decodeResponse(HttpResponseInterface $response) {

        // decode response
        try {
            
            $body = $response->getBody()->getContents();
           
            $bodyArray = GuzzleHttp\json_decode($body, true);
            
        } catch(Exception $e) {
            throw new ResponseException('Unable to decode response: ' . $e->getMessage());
        }
                
        return $bodyArray;
        
    }

    /**
     * Execute POST request
     * 
     * @param string $apiCall
     * @param array $data = NULL
     * @return array
     * @throws ApiException
     */
    public function executePost($apiCall, array $data = NULL) {
        return $this->request($apiCall, self::METHOD_POST, $data);
    }
    
    /**
     * Execute GET request
     * 
     * @param string $apiCall
     * @return array
     * @throws ApiException
     */
    public function executeGet($apiCall) {
        return $this->request($apiCall, self::METHOD_GET);
    }

}
