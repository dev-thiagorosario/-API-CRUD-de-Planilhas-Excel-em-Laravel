<?php

declare(strict_types=1);

namespace App\Exceptions\Import;

use App\Enum\CodeExceptionEnum;

class EmptyFileException extends SepreedsheetException
{
    public function __construct(
        string $msg = 'A planilha está vazia.',
        int $code = CodeExceptionEnum::IMPORT_EMPTY_FILE->value
    ) {
        parent::__construct($msg, $code);
    }
}

