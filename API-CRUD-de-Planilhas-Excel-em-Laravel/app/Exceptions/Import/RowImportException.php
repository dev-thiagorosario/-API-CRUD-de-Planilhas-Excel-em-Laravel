<?php

declare(strict_types=1);

namespace App\Exceptions\Import;

use App\Enum\CodeExceptionEnum;

class RowImportException extends SepreedsheetException
{
    public function __construct(
        string $msg = 'Erro ao importar uma linha da planilha.',
        int $code = CodeExceptionEnum::IMPORT_ROW_ERROR->value
    ) {
        parent::__construct($msg, $code);
    }
}
