<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;
use App\Repositories\UserImportRepositoryInterface;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use Modules\Identity\Exceptions\UserCreateException;
use Exception;

class UserImportRepository implements UserImportRepositoryInterface
{
    public function createUser(array $data): void
    {
        try {
            $hashedPassword = Hash::make($data['password']);

            User::create([
                'name'     => $data['name'],
                'email'    => $data['email'],
                'password' => $hashedPassword,
            ]);

        } catch (QueryException $e) {
            if ($e->getCode() === '23000') {
                throw new UserCreateException("O e-mail '{$data['email']}' já está cadastrado.");
            }

            throw new UserCreateException("Erro ao salvar usuário no banco de dados.");
        } catch (Exception $e) {
            throw new UserCreateException("Erro inesperado: " . $e->getMessage());
        }
    }
}
