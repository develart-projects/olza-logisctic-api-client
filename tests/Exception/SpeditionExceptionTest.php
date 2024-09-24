<?php
namespace Test\Exception;

use OlzaApiClient\Exception\SpeditionException;
use Test\Exception\ApiExceptionTest;

final class SpeditionExceptionTest extends ApiExceptionTest
{
    protected $class = SpeditionException::class;
}
