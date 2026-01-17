<?php

namespace App\Imports;

use App\Models\Client;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Facades\Excel;

class DynamicExcelImport implements ToCollection
{
    /**
     * @param Collection[] $sheets
     */
    public function collection(Collection $rows)
    {
       
    }

    public static function importFile($file)
    {
        $allSheets = Excel::toCollection(null, $file);

        foreach ($allSheets as $sheetIndex => $rows) {
            if ($rows->isEmpty()) continue;

            $sheetName = 'Sheet ' . ($sheetIndex + 1);
            $columns = $rows->first()->toArray();

            foreach ($rows->skip(1) as $row) {
                $data = [];
                foreach ($columns as $index => $colName) {
                    $data[$colName] = $row[$index] ?? null;
                }
                
                Client::create([
                    'sheet_name' => $sheetName,
                    'data' => json_encode($data),
                ]);
            }
        }
    }
}
