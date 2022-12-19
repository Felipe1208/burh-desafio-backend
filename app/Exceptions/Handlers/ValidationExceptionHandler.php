<?php

namespace App\Exceptions\Handlers;

use Illuminate\Http\Response;

class ValidationExceptionHandler
{
    public function response($exception) {
        $response = [];

        $response['message'] = $exception->getMessage() ?? 'Os dados fornecidos são inválidos!';

        foreach ($exception->errors() as $key => $value) {
            $response['errors'][$key] = $value[0];
        }

        return response()->json($response, Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
