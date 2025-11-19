<?php

declare(strict_types=1);

namespace App\Exceptions\Agenda;

use App\Exceptions\Import\RowImportException;
use App\Enum\CodeExceptionEnum;

class AgendaRequiredFieldMissingException extends RowImportException
{
    public function __construct(
        string $msg = 'Campo obrigatório de agenda ausente.',
        int $code = CodeExceptionEnum::AGENDA_REQUIRED_FIELD_MISSING->value
    ) {
        parent::__construct($msg, $code);
    }
}
