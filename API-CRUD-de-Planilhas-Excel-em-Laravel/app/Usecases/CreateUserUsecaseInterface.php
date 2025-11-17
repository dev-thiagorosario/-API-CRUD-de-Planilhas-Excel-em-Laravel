<?php

declare(strict_types=1);

namespace App\Usecases;

use App\Models\User;

interface CreateUserUsecaseInterface
{
    public function handle(array $data): User;
}
