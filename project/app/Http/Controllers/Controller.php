<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Contracts\Validation\Validator;

class Controller extends BaseController
{
    protected function formatValidationErrors(Validator $validator)
    {
        throw new ApiException(422, 'Validation error.', $validator->errors());
    }
}
