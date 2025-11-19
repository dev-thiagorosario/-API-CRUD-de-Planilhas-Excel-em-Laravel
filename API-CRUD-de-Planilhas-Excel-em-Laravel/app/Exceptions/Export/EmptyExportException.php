<?php

declare(strict_types=1);

namespace App\Exceptions\Export;

use App\Enum\CodeExceptionEnum;

class EmptyExportException extends ExportException
{
    public function __construct(
        string $msg = 'Não há dados para exportar.',
        int $code = CodeExceptionEnum::EXPORT_EMPTY->value
    ) {
        parent::__construct($msg, $code);
    }
}
