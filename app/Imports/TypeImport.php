<?php

namespace App\Imports;

use App\Models\Type;
use Maatwebsite\Excel\Concerns\ToModel;

class TypeImport implements ToModel
{
    public function model(array $row)
    {
        if (isset($row[0]) && isset($row[1]) && isset($row[2])) {
            $t = new Type;
            $t->locality = $row[0];
            $t->comunity = $row[1];
            $t->type = $row[2];
            $t->save();
        }
    }
}