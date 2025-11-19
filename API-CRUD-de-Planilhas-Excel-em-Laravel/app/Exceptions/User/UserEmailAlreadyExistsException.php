<?php

declare(strict_types=1);

namespace App\Exceptions\User;

use App\Enum\CodeExceptionEnum;

class UserEmailAlreadyExistsException extends UserImportValidationException
{
    public function __construct(
        string $msg = 'Já existe um usuário com este e-mail.',
        int $code = CodeExceptionEnum::USER_EMAIL_ALREADY_EXISTS->value
    ) {
        parent::__construct($msg, $code);
    }
}
