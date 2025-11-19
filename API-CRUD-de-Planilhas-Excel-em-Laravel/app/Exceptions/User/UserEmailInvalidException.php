<?php

declare(strict_types=1);

namespace App\Exceptions\User;

use App\Enum\CodeExceptionEnum;

class UserEmailInvalidException extends UserImportValidationException
{
    public function __construct(
        string $msg = 'O e-mail informado é inválido.',
        int $code = CodeExceptionEnum::USER_EMAIL_INVALID->value
    ) {
        parent::__construct($msg, $code);
    }
}
