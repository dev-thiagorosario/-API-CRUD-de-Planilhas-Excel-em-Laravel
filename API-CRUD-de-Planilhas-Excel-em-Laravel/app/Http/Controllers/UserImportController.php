<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Exceptions\Import\EmptyFileException;
use App\Exceptions\Import\SpreadsheetException;
use App\Http\Requests\UserImportRequest;
use App\Usecases\UserImportUsecaseInterface;
use Throwable;

class UserImportController extends Controller
{
 public function __construct(
     private readonly UserImportUsecaseInterface $importUsecase
 ){}
    public function __invoke(UserImportRequest $request)
    {
        try {
            $file = $request->file('file');

            $result = $this->importUsecase->handle($file);

            return response()->json([
                'message' => 'Planilha Importada com sucesso.',
                'data' => $result->toArray(),
            ], 201);
        }catch (EmptyFileException $e){
            return response()->json(
                data: [
                    'message' => $e->getMessage(),
                ],status: 400
            );
        }catch (SpreadsheetException $e){
            return response()->json(
                data: [
                    'message' => $e->getMessage(),
                ],status: 500
            );
        }catch (\Throwable $e) {    
            return response()->json(
                data: [
                    'message' => 'Error Interno ao importar Planilha de Usuarios'
                ], status: 500
            );
        }

    }
}
