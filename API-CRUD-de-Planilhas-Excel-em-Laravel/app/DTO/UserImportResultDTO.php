<?php

declare(strict_types=1);

namespace App\DTO;

class UserImportResultDTO
{
    public function __construct(
        public readonly int $totalRows,
        public readonly int $imported,
        public readonly array $errors = [],
    ){}
    
    public function failed(): int
    {
        return $this->totalRows - $this->imported;
    }

    public function toArray(): array
    {
        return [
            'total_rows' => $this->totalRows,
            'imported'   => $this->imported,
            'failed'     => $this->failed(),
            'errors'     => $this->errors,
        ];
    }
}