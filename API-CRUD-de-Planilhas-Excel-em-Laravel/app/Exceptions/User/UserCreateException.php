<?php

declare(strict_types=1);

namespace App\Exceptions\User;

use App\Enum\CodeExceptionEnum;
use App\Exceptions\User\UserImportValidationException;

class UserCreateException extends userImportValidationException
{
    public function __construct(
        string $msg = 'Erro ao criar um usuário.',
        int $code = CodeExceptionEnum::USER_CREATE_ERROR->value
    ) {
        parent::__construct($msg, $code);
    }
}
