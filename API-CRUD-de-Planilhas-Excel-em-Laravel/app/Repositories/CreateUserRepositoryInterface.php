<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;

interface CreateUserRepositoryInterface
{
    public function create(array $data): User;
}
