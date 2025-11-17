<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Requests\CreateUserRequest;
use App\Usecases\CreateUserUsecaseInterface;


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

            $agenda = $this->usecase->handle($data);

            return response()->json([
                'message' => 'Agenda criada com sucesso.',
                'data'    => $agenda,
            ], 201);

        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Erro ao criar agenda.',
                'error'   => $e->getMessage(),
            ], 500);
        }

    }
}
