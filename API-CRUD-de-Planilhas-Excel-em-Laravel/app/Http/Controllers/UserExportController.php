<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;


class UserExportController extends Controller
{
    public function __invoke(UsersExportRequest $request)
    {
        
    }
}
