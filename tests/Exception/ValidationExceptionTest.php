<?php
namespace Test\Exception;

use OlzaApiClient\Exception\ValidationException;
use Test\Exception\ApiExceptionTest;

final class ValidationExceptionTest extends ApiExceptionTest
{
    protected $class = ValidationException::class;
}
