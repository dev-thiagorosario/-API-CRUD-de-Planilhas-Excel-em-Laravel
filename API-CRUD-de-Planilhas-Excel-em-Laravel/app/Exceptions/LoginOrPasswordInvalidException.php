<?php

declare(strict_types=1);

namespace App\Exceptions;

use App\Enum\CodeExceptionUserEnum;

class LoginOrPasswordInvalidException extends \Exception
{
 public function __construct(
     string $message = "Usuário ou senha inválidos",
     int $code = CodeExceptionUserEnum::LOGIN_OR_PASSWORD_INVALID->value,
 )
 {
     parent::__construct($message, $code);
 }
}
