<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Requests\CreateUserRequest;
use App\Usecases\CreateUserUsecaseInterface;
use Modules\Identity\Exceptions\UserCreateException;


class CreateUserController extends Controller
{
    public function __construct(
        private readonly CreateUserUsecaseInterface $usecase
    ){}

    public function __invoke(CreateUserRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();

            if ($request->user()) {
                $data['user_id'] = $request->user()->id;
            }

            $user = $this->usecase->handle($data);
            
            return response()->json([
                'message' => 'Usuário criado com sucesso.',
                'data' => $user,
            ], 201);

        } catch (UserCreateException $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Erro inesperado ao criar usuário.',
            ], 500);
        }

    }
}
