<?php

declare(strict_types=1);

namespace App\Enum;

enum CodeExceptionUserEnum: int
{
    case USER_CREATE_ERROR = 1001;
    case USER_LIST_ERROR = 1002;
    case USER_NOT_FOUND_ERROR = 1003;
    case USER_CREATE_NOT_AUTHORIZED = 1004;
    case USER_LIST_NOT_AUTHORIZED = 1005;
    case USER_COMPANY_NOT_FOUND_ERROR = 1006;
    case NOTIFICATION_NOT_FOUND_ERROR = 1007;
    case LOGIN_OR_PASSWORD_INVALID = 1008;
    case USER_BLOCKED_ATTEMPT_REQUEST = 1009;
}
