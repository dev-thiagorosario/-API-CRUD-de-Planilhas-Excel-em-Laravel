<?php

declare(strict_types=1);

namespace App\Usecases;


interface LoginUsecaseInterface
{
    public function __invoke(string $email, string $password): LoginResult;
}
