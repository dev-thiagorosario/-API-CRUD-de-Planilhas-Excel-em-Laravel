<?php

declare (strict_types=1);

namespace App\Usecases;

use App\Repositories\LogoutRepositoryInterface;

class LogoutUsecase implements LogoutUsecaseInterface
{
    protected LogoutRepositoryInterface $logoutRepository;

    public function __construct(LogoutRepositoryInterface $logoutRepository)
    {
        $this->logoutRepository = $logoutRepository;
    }

    public function __invoke(): void
    {
        $this->logoutRepository->invalidateAccessToken();
    }
}