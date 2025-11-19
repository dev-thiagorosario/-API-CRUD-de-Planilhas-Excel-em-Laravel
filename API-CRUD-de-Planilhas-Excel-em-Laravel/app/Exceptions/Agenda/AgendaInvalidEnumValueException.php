<?php

declare(strict_types=1);

namespace App\Exceptions\Agenda;

use App\Enum\CodeExceptionEnum;
use App\Exceptions\Import\RowImportException;

class AgendaInvalidEnumValueException extends RowImportException
{
    public function __construct(
        string $msg = 'A data informada é inválida.',
        int $code = CodeExceptionEnum::AGENDA_INVALID_DATE->value
    ) {
        parent::__construct($msg, $code);
    }
}
