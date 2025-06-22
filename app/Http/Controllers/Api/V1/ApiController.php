<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function include(string $relation): bool
    {
        $params = request()->get('include');

        if (!isset($params)) {
            return false;
        }

        $includeValues = explode(',', strtolower($params));

        return in_array(strtolower($relation), $includeValues);
    }
}
