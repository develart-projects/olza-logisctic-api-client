<?php 

namespace OlzaApiClient\Services;

use OlzaApiClient\Exception\ApiTransportException;
use OlzaApiClient\Exception\ApiException;
use OlzaApiClient\Exception\ResponseException;
use OlzaApiClient\Exception\ApiClientException;

use OlzaApiClient\Interfaces\TransportInterface;

use Psr\Http\Client\ClientInterface as HttpClient;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\ResponseInterface as HttpResponseInterface;
    
use Exception;

/**
 * Transport is providing any communication with API counterpart, returning Arrays
 */
class Transport
        implements TransportInterface
{
    
    const METHOD_POST = 'POST';
    const METHOD_GET = 'GET';
    
    const API_CALL_URI = '/api/v1/';
    
    /**
     *
     * @var string 
     */
    protected $apiCallUri;   
    
    /**
     *
     * @var HttpClient 
     */
    protected $provider;
    
    /**
     * 
     * @var RequestFactoryInterface
     */
    protected $requestFactory;
    
    /**
     * 
     * @var StreamFactoryInterface
     */
    protected $streamFactory;

    
    /**
     * If parameters beyond API URL are empty, client will try to use Guzzle automaticaly, if installed.
     * Http client must be PSR-18 type and factory implementations must follow PSR-17.     * 
     * 
     * @param string $apiUrl
     * @param HttpClient $httpClient = NULL
     * @param RequestFactoryInterface $requestFactory = NULL
     * @param StreamFactoryInterface $streamFactory = NULL
     */
    public function __construct($apiUrl, HttpClient $httpClient = NULL, RequestFactoryInterface $requestFactory = NULL, StreamFactoryInterface $streamFactory = NULL) {
        
        // try auto-guzzle setup (or fail)
        if($httpClient === NULL) {
            
            $this->withGuzzleHttpClient();            
            
        } else { // explicit PSR-18 http client
            
            if($requestFactory === NULL) {
                throw new \RuntimeException('RequestFactory not found. See library docs for assistance.');
            }
            
            if($requestFactory === NULL) {
                throw new \RuntimeException('StreamFactory not found. See library docs for assistance.');
            }
            
            $this->provider = $httpClient; 
            $this->requestFactory = $requestFactory;
            $this->streamFactory = $streamFactory;
        }        

        $this->apiCallUri = $apiUrl . self::API_CALL_URI;

    }
    
    /**
     * Configures Client instance to use Guzzle HTTP client.
     *
     * NOTE: Requires Guzzle package to be installed.
     */
    protected function withGuzzleHttpClient()
    {

        // NOTE: do NOT move Guzzle reference out of this method! This code is OPTIONAL and
        // if you "optimize" by i.e. adding "use" instead, then instantiation of this
        // class will be Guzzle dependent and will simply fail if there's no Guzzle dependency.
        /** @noinspection ClassConstantCanBeUsedInspection */
        $httpClientClass = '\GuzzleHttp\Client';

        if (!\class_exists($httpClientClass)) {
            throw new \RuntimeException('Guzzle HTTP client not found. See library docs for assistance.');
        }
        
        $guzzleOptions = [
            'http_errors' => false,
            ];

        $this->provider = new $httpClientClass($guzzleOptions);
        
        // this is part of Guzzle by default
        $psr17factoryClass = '\GuzzleHttp\Psr7\HttpFactory';        
        
        $this->requestFactory = new $psr17factoryClass;
        $this->streamFactory = new $psr17factoryClass;

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
            
            $request = $this->requestFactory->createRequest($method, $this->apiCallUri . $apiCall)
                        ->withHeader('Accept', 'application/json');
 
            //communication
            if($method == self::METHOD_POST) { // POST
       
                $request = $request->withHeader('Content-Type', 'application/json');

                $requestWithBody = $request->withBody(
                        $this->streamFactory->createStream( json_encode($body) )
                );
    
                $response = $this->provider->sendRequest($requestWithBody);
        
            } else { // GET
                $response = $this->provider->sendRequest($request);
            }
            
            if($response->getStatusCode() >= 400) {
                throw new ApiTransportException($response->getReasonPhrase(), $response->getStatusCode());
            }
        
            // decode response to structured array
            return $this->decodeResponse($response);
            
        } catch(ApiTransportException $ate) { // HTTP errors - specific to communication
            
            throw new ApiTransportException("Communication with API failed - HTTP RC {$ate->getCode()}", $ate->getCode());
            
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
           
            $bodyArray = json_decode($body, true);
            
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
