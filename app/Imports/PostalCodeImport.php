<?php

namespace App\Imports;

use App\Models\PostalCode;
use Maatwebsite\Excel\Concerns\ToModel;

class PostalCodeImport implements ToModel
{
    public function model(array $row)
    {
        if (isset($row[0]) && isset($row[1])) {
            $p = new PostalCode;
            $p->code = $row[0];
            $p->province = $row[1];
            $p->save();
        }
    }
}