<?php

namespace App\Imports;

use App\Models\Client;
use Maatwebsite\Excel\Concerns\ToModel;

class ClientsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Client([
            'name'  => $row[0],
            'email' => $row[1],
            'phone' => $row[2],
        ]);
    }
}
