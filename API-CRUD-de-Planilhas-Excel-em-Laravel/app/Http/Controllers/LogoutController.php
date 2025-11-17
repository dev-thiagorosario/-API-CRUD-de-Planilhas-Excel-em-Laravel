<?php

declare (strict_types=1);

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\JsonResponse;
use App\Usecases\LogoutUsecaseInterface;

class LogoutController extends Controller
{
    public function __construct(
        protected readonly LogoutUsecaseInterface $logoutUsecase
    ){} 

    public function __invoke()
    {
       try{
            $logoutUsecase = $this->logoutUsecase;

            $logoutUsecase();

            $data = [
                'message' => 'Logout realizado com sucesso.',
            ];

            $response = new JsonResponse(
                data: $data,
                status: 200
            );
            return $response;
        } catch (\Exception $e) {
            return new JsonResponse(
                data: [
                    'message' => 'Erro ao realizar logout.',
                ],
                status: 500
            );
       }
    }
}
