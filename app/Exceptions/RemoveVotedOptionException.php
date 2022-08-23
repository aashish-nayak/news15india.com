<?php

namespace App\Exceptions;

use Exception;

class RemoveVotedOptionException extends Exception
{
    public function __construct()
    {
        parent::__construct('You can not remove an option that has got some votes');
    }
}
