<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;


class UserExportController extends Controller
{
    public function __invoke()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
