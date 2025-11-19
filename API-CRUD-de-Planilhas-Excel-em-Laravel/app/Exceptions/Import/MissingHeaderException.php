<?php

declare(strict_types=1);

namespace App\Exceptions\Import;

use App\Enum\CodeExceptionEnum;

class MissingHeaderException extends SepreedsheetException
{
    public function __construct(
        string $msg = 'A planilha está faltando colunas obrigatórias.',
        int $code = CodeExceptionEnum::IMPORT_MISSING_HEADER->value
    ) {
        parent::__construct($msg, $code);
    }
}

