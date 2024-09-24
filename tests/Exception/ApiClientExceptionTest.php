<?php
namespace Test\Exception;

use OlzaApiClient\Exception\ApiClientException;
use Test\Exception\ApiExceptionTest;

final class ApiClientExceptionTest extends ApiExceptionTest
{
    protected $class = ApiClientException::class;
}
