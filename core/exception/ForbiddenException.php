<?php

namespace App\Core\Exception;

class ForbiddenException extends \Exception
{

    protected $message = 'UnAuthorized';
    protected $code = 403;
}
