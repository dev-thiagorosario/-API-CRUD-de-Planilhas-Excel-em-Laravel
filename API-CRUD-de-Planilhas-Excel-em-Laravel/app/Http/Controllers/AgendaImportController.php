<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Exceptions\Import\EmptyFileException;
use App\Exceptions\Import\SpreadsheetException;
use App\Http\Requests\AgendaImportRequest;
use App\Usecases\AgendaImportUsecaseInterface;
use Illuminate\Http\JsonResponse;

class AgendaImportController extends Controller
{
    public function __construct(
        private readonly AgendaImportUsecaseInterface $agendaImportUsecase
    ){}

    public function __invoke(AgendaImportRequest $request): JsonResponse
    {
        try {
            $file = $request->file('file');

            $result = $this->agendaImportUsecase->handle($file);

            return response()->json([
                'message' => 'Agenda importada com sucesso.',
                'data' => $result,
            ], 201);

        } catch (EmptyFileException $e) {

            return response()->json([
                'message' => $e->getMessage(),
            ], 400);

        } catch (SpreadsheetException $e) {

            return response()->json([
                'message' => 'Erro ao importar arquivo de agenda.',
                'details' => $e->getMessage(),
            ], 400);
        } catch (\Throwable $e) {    
            return response()->json(
                data: [
                    'message' => 'Error Interno ao importar agenda'
                ], status: 500
            );
        }
    }
}
