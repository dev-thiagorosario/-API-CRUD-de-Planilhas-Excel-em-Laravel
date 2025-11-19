<?php

declare(strict_types=1);

namespace App\Usecases;

use Illuminate\Http\UploadedFile;

interface AgendaImportUsecaseInterface
{
    public function handle(UploadedFile $file): array;
}

