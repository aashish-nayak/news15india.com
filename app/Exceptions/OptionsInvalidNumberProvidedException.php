<?php

namespace App\Exceptions;

use Exception;

class OptionsInvalidNumberProvidedException extends Exception
{
    public function __construct()
    {
        parent::__construct('A poll must be composed of two options at least');
    }
}
