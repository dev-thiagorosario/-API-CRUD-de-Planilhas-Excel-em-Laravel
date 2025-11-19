<?php

declare(strict_types=1);

namespace App\Repositories;

interface UserImportRepositoryInterface
{
    public function create(array $data): void;
}
