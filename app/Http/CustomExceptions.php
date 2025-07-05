<?php

namespace App\Http;

use App\Traits\ApiResponses;

class CustomExceptions
{
    use ApiResponses;

    public function render($exception)
    {
        return $this->error([
            'message' => $exception->getMessage(),
            'type' => get_class($exception),
        ], 400);
    }
}
