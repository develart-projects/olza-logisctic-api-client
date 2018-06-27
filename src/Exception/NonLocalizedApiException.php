<?php

namespace OlzaApiClient\Exception;

use Exception;

/**
 * Generic API exception with undetermined language (generic Enlish messages, locale specific excetions from speditions, etc)
 */
abstract class NonLocalizedApiException extends ApiException {}