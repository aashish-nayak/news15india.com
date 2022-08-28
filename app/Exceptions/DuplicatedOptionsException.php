<?php

namespace App\Exceptions;

use Exception;

class DuplicatedOptionsException extends Exception
{
    public function __construct()
    {
        parent::__construct('You provided a duplicated options');
    }
}
