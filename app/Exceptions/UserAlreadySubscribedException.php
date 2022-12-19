<?php

namespace App\Exceptions;

use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class UserAlreadySubscribedException extends HttpException
{
    public function __construct($message = 'Usuário já inscrito nessa vaga!')
    {
        parent::__construct(Response::HTTP_CONFLICT, $message);
    }
}
