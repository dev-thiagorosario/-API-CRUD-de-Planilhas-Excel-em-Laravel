<?php

declare(strict_types=1);

namespace App\Usecases;

use App\DTO\UserImportResultDTO;
use Illuminate\Http\UploadedFile;

interface UserImportUsecaseInterface
{
    public function handle(UploadedFile $file): UserImportResultDTO;
}
