<?php

declare(strict_types=1);

namespace App\Exceptions\User;

use App\Enum\CodeExceptionEnum;

class UserRequiredFieldMissingException extends UserImportValidationException
{
    public function __construct(
        string $msg = 'Campo obrigatório do usuário está ausente.',
        int $code = CodeExceptionEnum::USER_REQUIRED_FIELD_MISSING->value
    ) {
        parent::__construct($msg, $code);
    }
}

