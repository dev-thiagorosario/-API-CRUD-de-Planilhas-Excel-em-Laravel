<?php

declare(strict_types=1);

namespace Modules\Identity\Exceptions;

use App\Enum\CodeExceptionEnum;
use App\Exceptions\User\UserImportValidationException;

class UserNotFoundException extends UserImportValidationException
{
    public function __construct(
        string $msg = 'Usuário não encontrado.',
        int $code = CodeExceptionEnum::USER_NOT_FOUND_ERROR->value
    ) {
        parent::__construct($msg, $code);
    }
}
