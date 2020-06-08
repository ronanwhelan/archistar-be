<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class AppDataImport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            'Properties' => new PropertiesImport(),
            'AnalyticTypes' => new AnalyticTypesImport(),
            'Property_analytics' => new PropertyAnalyticsImport(),

        ];
    }
}
