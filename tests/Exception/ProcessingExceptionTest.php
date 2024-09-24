<?php
namespace Test\Exception;

use OlzaApiClient\Exception\ProcessingException;
use Test\Exception\ApiExceptionTest;

final class ProcessingExceptionTest extends ApiExceptionTest
{
    protected $class = ProcessingException::class;
}
