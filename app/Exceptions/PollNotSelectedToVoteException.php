<?php

namespace App\Exceptions;

use Exception;

class PollNotSelectedToVoteException extends Exception
{
    public function __construct()
    {
        parent::__construct('Poll not specified to vote in');
    }
}
