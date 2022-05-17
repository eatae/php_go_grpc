<?php

namespace App\EnumValue;

use MabeEnum\Enum;

class RequestMethod extends Enum
{
    public const GET    = 'GET';
    public const POST   = 'POST';
    public const PUT    = 'PUT';
    public const PATCH  = 'PATCH';
    public const DELETE = 'DELETE';
}
