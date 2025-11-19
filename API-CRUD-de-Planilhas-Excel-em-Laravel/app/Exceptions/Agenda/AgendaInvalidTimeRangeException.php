<?php

declare(strict_types=1);

namespace App\Exceptions\Agenda;

use App\Exceptions\Import\RowImportException;
use App\Enum\CodeExceptionEnum;

class AgendaInvalidTimeRangeException extends RowImportException
{
    public function __construct(
        string $msg = 'Horário inicial maior que o horário final.',
        int $code = CodeExceptionEnum::AGENDA_INVALID_TIME_RANGE->value
    ) {
        parent::__construct($msg, $code);
    }
}
