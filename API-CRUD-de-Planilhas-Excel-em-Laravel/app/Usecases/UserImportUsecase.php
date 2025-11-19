<?php

declare(strict_types=1);

namespace App\Usecases;

use App\DTO\UserImportResultDTO;
use App\Exceptions\Import\EmptyFileException;
use App\Exceptions\Import\InvalidFileExtensionException;
use App\Exceptions\Import\MissingHeadersException;
use App\Exceptions\Import\UserRequiredFieldMissingException;
use App\Imports\UserImport;
use App\Repositories\UserImportRepositoryInterface;
use Illuminate\Http\UploadedFile;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Identity\Exceptions\UserCreateException;

class UserImportUsecase implements UserImportUsecaseInterface
{
    private const ALLOWED_EXTENSIONS = ['xlsx', 'xls', 'csv'];

    private const REQUIRED_HEADERS = [
        'name',
        'email',
        'password',
    ];

    public function __construct(
        private readonly UserImportRepositoryInterface $userImportRepository
    ) {}

    public function handle(UploadedFile $file): UserImportResultDTO
    {
        $this->validatedExtension($file);

        $sheets = Excel::toArray(new UserImport, $file);
        $rows = $sheets[0] ?? [];

        if (empty($rows)) {
            throw new EmptyFileException();
        }

        $this->validateHeaders(array_keys($rows[0]));

        $imported = 0;
        $errors = [];

        foreach ($rows as $index => $row) {
            $rowNumber = $index + 2;

            try {
                $this->importRow($row, $rowNumber);
                $imported++;
            } catch (UserRequiredFieldMissingException | UserCreateException $e) {
                $errors[] = [
                    'row'     => $rowNumber,
                    'message' => $e->getMessage(),
                ];
            }
        }

        return new UserImportResultDTO(
            totalRows: $totalRows,
            imported: $imported,
            errors: $errors,
        );
    }

    private function validatedExtension(UploadedFile $file): void
    {
        $extension = strtolower((string) $file->getClientOriginalExtension());

        if (!in_array($extension, self::ALLOWED_EXTENSIONS, true)) {
            throw new InvalidFileExtensionException($extension);
        }
    }

    private function validateHeaders(array $presentHeaders): void
    {
        $presentHeaders = array_map('strtolower', $presentHeaders);
        $missing = array_diff(self::REQUIRED_HEADERS, $presentHeaders);

        if (!empty($missing)) {
            throw new MissingHeadersException(array_values($missing));
        }
    }

    private function importRow(array $row, int $rowNumber): void
    {
        $name     = $this->validateField($row, 'name', $rowNumber);
        $email    = $this->validateField($row, 'email', $rowNumber);
        $password = $this->validateField($row, 'password', $rowNumber);

        $this->userImportRepository->createUser([
            'name'     => $name,
            'email'    => $email,
            'password' => $password,
        ]);
    }

    private function validateField(array $row, string $field, int $rowNumber): string
    {
        if (empty($row[$field]) || trim((string)$row[$field]) === '') {
            throw new UserRequiredFieldMissingException($field, $rowNumber);
        }

        return trim((string)$row[$field]);
    }
}
