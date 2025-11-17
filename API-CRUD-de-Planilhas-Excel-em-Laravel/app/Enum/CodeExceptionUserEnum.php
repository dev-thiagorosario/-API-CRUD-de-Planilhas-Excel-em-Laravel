<?php

declare(strict_types=1);

namespace App\Enum;

enum CodeExceptionUserEnum: int
{
    case USER_CREATE_ERROR = 1001;
    case USER_NOT_FOUND_ERROR = 1003;
    case USER_CREATE_NOT_AUTHORIZED = 1004;
    case LOGIN_OR_PASSWORD_INVALID = 1008;
}
