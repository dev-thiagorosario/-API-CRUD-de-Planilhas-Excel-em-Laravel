<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Str;

class LoginUserRepository implements LoginUserRepositoryInterface
{
    protected ?User $user = null;

    public function userByEmail(string $email): ?User
    {
        $this->user = User::where('email', $email)->first();

        return $this->user;
    }

    public function createAccessToken(User $user, string $password): string
    {
        $token = Str::random(60);

        $this->setRememberToken($user, $token);

        return $token;
    }

    public function setRememberToken(User $user, ?string $token): void
    {
        $user->setRememberToken($token);
        $user->save();
    }
}
