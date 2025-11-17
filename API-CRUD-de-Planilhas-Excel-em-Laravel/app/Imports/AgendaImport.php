<?php

namespace App\Imports;

use App\Models\Agenda;
use Maatwebsite\Excel\Concerns\ToModel;

class AgendaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Agenda([
            //
        ]);
    }
}
