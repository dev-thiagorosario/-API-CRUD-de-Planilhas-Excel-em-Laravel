<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LogoutRepository implements LogoutRepositoryInterface
{
    protected User $user;

    public function invalidateAccessToken():void
    {
        $user = Auth::user();

        if ($user instanceof User) {

            $this->user = $user;
            $this->user->currentAccessToken()->delete();
        }
    }
}
