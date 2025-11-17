<?php

declare(strict_types=1);

namespace App\Usecases;

use App\Models\User;
use App\Repositories\CreateUserRepositoryInterface;


class CreateUserUsecase implements CreateUserUsecaseInterface
{
    public function __construct(
        private readonly CreateUserRepositoryInterface $repository
    ) {
    }

    public function handle(array $data): User
    {
        return $this->repository->create($data);
    }
}