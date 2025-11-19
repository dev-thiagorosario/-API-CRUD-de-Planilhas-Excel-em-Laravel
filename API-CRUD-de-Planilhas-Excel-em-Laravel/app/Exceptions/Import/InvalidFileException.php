<?php

declare(strict_types=1);

namespace App\Exceptions\Import;

use App\Enum\CodeExceptionEnum;

class InvalidFileException extends SepreedsheetException
{
    public function __construct(
        string $msg = 'Arquivo de importação inválido.',
        int $code = CodeExceptionEnum::IMPORT_INVALID_FILE->value
    ) {
        parent::__construct($msg, $code);
    }
}
