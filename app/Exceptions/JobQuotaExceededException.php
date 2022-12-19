<?php

namespace App\Exceptions;

use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class JobQuotaExceededException extends HttpException
{
    public function __construct($message = 'Limite de vagas excedido!')
    {
        parent::__construct(Response::HTTP_UNPROCESSABLE_ENTITY, $message);
    }
}
