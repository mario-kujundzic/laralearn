<?php

namespace App\Exceptions;

use Exception;

class CustomException extends Exception
{
    function render ($request) {
        return response()->json(['foo' => 'bar']);
    }
}
