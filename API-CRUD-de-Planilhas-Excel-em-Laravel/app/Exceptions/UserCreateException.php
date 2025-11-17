<?php

declare(strict_types=1);

namespace Modules\Identity\Exceptions;

use App\Enum\CodeExceptionUserEnum;

class UserCreateException extends \RuntimeException
{
    public function __construct(
        string $msg = 'Erro ao criar um usuário.',
        int $code = CodeExceptionUserEnum::USER_CREATE_ERROR->value
    ) {
        parent::__construct($msg, $code);
    }
}