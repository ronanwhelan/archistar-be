<?php

namespace App\Imports;

use App\Property;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class PropertiesImport implements ToModel, WithStartRow
{

    public function startRow(): int
    {
        return 2;
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Property([
            'id' => $row[0],
            'suburb' => $row[1],
            'state' => $row[2],
            'country' => $row[3],
        ]);
    }
}
