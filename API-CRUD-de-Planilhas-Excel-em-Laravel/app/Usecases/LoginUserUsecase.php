<?php

declare(strict_types=1);

namespace App\Usecases;

use App\Exceptions\LoginOrPasswordInvalidException;
use App\Models\User;
use App\Repositories\LoginUserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Modules\Identity\Exceptions\UserNotFoundException;

class LoginUserUsecase implements LoginUserUsecaseInterface
{
    public function __construct(
        private readonly LoginUserRepositoryInterface $loginUserRepository,
    ) {
    }

    public function __invoke(string $email, string $password): LoginResult
    {
        try {
            $user = $this->loginUserRepository->userByEmail($email);

            if (!$user || !Hash::check($password, $user->password)) {
                throw new LoginOrPasswordInvalidException();
            }

            $accessToken = $this->loginUserRepository->createAccessToken($user, $password);

            $tokenTtlSeconds = 3600; 
            return new LoginResult(
                token: $accessToken,
                expiresIn: $tokenTtlSeconds,
                user: $user,
                onBoardingAccess: false,
            );
        } catch (UserNotFoundException|LoginOrPasswordInvalidException $e) {
            throw new LoginOrPasswordInvalidException();
        } catch (\Throwable $e) {
            throw new \RuntimeException($e->getMessage(), previous: $e);
        }
    }
}

final class LoginResult
{
    public function __construct(
        private readonly string $token,
        private readonly int $expiresIn,
        private readonly User $user,
        private readonly bool $onBoardingAccess = false,
    ) {
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function getExpiresIn(): int
    {
        return $this->expiresIn;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function isOnBoardingAcess(): bool
    {
        return $this->onBoardingAccess;
    }
}
