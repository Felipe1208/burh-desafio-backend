<?php

namespace App\Exceptions\Handlers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;

class ModelNotFoundExceptionHandler
{
    public function response(ModelNotFoundException $exception) {
        $model = $exception->getModel();

        $response = [];

        $response['message'] = "Registro [$model] não encontrado!";

        return response()->json($response, Response::HTTP_NOT_FOUND);
    }
}
