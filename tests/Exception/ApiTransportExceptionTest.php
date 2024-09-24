<?php
namespace Test\Exception;

use OlzaApiClient\Exception\ApiTransportException;
use Test\Exception\ApiExceptionTest;

final class ApiTransportExceptionTest extends ApiExceptionTest
{
    protected $class = ApiTransportException::class;
}
