<?php
namespace Test\Exception;

use OlzaApiClient\Exception\ResponseException;
use Test\Exception\ApiExceptionTest;

final class ResponseExceptionTest extends ApiExceptionTest
{
    protected $class = ResponseException::class;
}
