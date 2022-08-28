<?php

namespace App\Exceptions;

use Exception;

class OptionsNotProvidedException extends Exception
{
    public function __construct()
    {
        parent::__construct('You can not create poll without providing options');
    }
}
