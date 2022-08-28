<?php

namespace App\Exceptions;

use Exception;

class VoteInClosedPollException extends Exception
{
    public function __construct()
    {
        parent::__construct('Poll is closed, You can not vote anymore');
    }
}
