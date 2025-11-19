<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;

interface LoginRepositoryInterface
{
    public function userByEmail(string $email): ?User;

    public function createAccessToken(User $user, string $password): string;

    public function setRememberToken(User $user, ?string $token): void;
}
