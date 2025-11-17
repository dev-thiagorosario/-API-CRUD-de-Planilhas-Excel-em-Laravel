<?php

declare(strict_types=1);

namespace Modules\Identity\Exceptions;

use App\Enum\CodeExceptionUserEnum;

class UserNotFoundException extends \RuntimeException
{
    public function __construct(
        string $msg = 'Usuário não encontrado.',
        int $code = CodeExceptionUserEnum::USER_NOT_FOUND_ERROR->value
    ) {
        parent::__construct($msg, $code);
    }
}