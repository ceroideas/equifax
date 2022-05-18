<?php

namespace App\Imports;

use App\Models\Party;
use Maatwebsite\Excel\Concerns\ToModel;

class PartyImport implements ToModel
{
    public function model(array $row)
    {
        if (isset($row[0]) && isset($row[1]) && isset($row[2])) {
            $p = new Party;
            $p->locality = $row[0];
            $p->province = $row[1];
            $p->procurator = $row[2];
            $p->save();
        }
    }
}