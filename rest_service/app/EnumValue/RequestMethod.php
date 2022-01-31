<?php

namespace App\EnumValue;

use MabeEnum\Enum;

class RequestMethod extends Enum
{
    const GET    = 'GET';
    const POST   = 'POST';
    const PUT    = 'PUT';
    const PATCH  = 'PATCH';
    const DELETE = 'DELETE';
}