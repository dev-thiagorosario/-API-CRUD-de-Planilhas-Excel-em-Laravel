<?php

declare(strict_types=1);

namespace App\Exceptions\Agenda;

use App\Exceptions\Import\RowImportException;
use App\Enum\CodeExceptionEnum;

class AgendaUserNotFoundException extends RowImportException
{
    public function __construct(
        string $msg = 'Usuário relacionado à agenda não foi encontrado.',
        int $code = CodeExceptionEnum::AGENDA_USER_NOT_FOUND->value
    ) {
        parent::__construct($msg, $code);
    }
}
