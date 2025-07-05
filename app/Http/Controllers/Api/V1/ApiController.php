<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ApiController extends Controller
{
    use ApiResponses;

    protected $policyClass;

    public function include(string $relation): bool
    {
        $params = request()->get('include');

        if (!isset($params)) {
            return false;
        }

        $includeValues = explode(',', strtolower($params));

        return in_array(strtolower($relation), $includeValues);
    }

    public function isAble($ability, $targetModel)
    {
        $modelClass = is_object($targetModel) ? get_class($targetModel) : $targetModel;
        Gate::policy($modelClass, $this->policyClass);
        return Gate::authorize($ability, $targetModel);
    }
}
