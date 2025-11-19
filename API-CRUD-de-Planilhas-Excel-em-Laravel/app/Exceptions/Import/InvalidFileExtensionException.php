<?php

declare(strict_types=1);

namespace App\Exceptions\Import;

use App\Enum\CodeExceptionEnum;

class InvalidFileExtensionException extends SepreedsheetException
{
    public function __construct(
        string $msg = 'Extensão de arquivo inválida.',
        int    $code = CodeExceptionEnum::IMPORT_INVALID_EXTENSION->value
    )
    {
        parent::__construct($msg, $code);
    }
}
