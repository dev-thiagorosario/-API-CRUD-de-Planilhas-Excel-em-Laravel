<?php

declare(strict_types=1);

namespace App\Exceptions\Login;

use App\Enum\CodeExceptionEnum;

class LoginOrPasswordInvalidException extends \Exception
{
 public function __construct(
     string $message = "Usuário ou senha inválidos",
     int $code = CodeExceptionEnum::LOGIN_OR_PASSWORD_INVALID->value,
 )
 {
     parent::__construct($message, $code);
 }
}
