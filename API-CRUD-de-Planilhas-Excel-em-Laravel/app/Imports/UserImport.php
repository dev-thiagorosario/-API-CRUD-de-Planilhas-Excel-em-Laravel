<?php

declare(strict_types=1);

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UserImport implements WithHeadingRow, SkipsEmptyRows
{
    public function headingRow(): int
    {
        return 1;
    }

}
