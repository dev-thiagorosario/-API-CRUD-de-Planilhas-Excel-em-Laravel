<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Exceptions\Login\LoginOrPasswordInvalidException;
use App\Http\Requests\LoginRequest;
use App\Usecases\LoginUsecaseInterface;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    public function __construct(
        private readonly LoginUsecaseInterface $usecase
    ) {
    }

    public function __invoke(LoginRequest $request): JsonResponse
    {
        try {
            $usecase = $this->usecase;

            $result = $usecase(
                $request->email,
                $request->password
            );

            $data = [
                'token' => [
                    'acess_token' => $result->getToken(),
                    'token_type' => 'Bearer',
                    'expires_in' => $result->getExpiresIn(),
                ],
                'user' => $result->getUser(),
                'onBoardingAcess' => $result->isOnBoardingAcess(),
            ];

            $response = new JsonResponse(
                data: [
                    'message' => 'Login realizado com sucesso.',
                    'data' => $data,
                ],
                status: 200
            );

            return $response;
        } catch (LoginOrPasswordInvalidException $e) {
            return new JsonResponse(
                data: [
                    'message' => $e->getMessage(),
                ],
                status: 401
            );
        } catch (\Throwable $e) {
            return new JsonResponse(
                data: [
                    'message' => 'Erro ao realizar login.',
                ],
                status: 500
            );
        }
    }
}
