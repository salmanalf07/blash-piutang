<?php

namespace App\Imports;

use App\Models\reminderKrs3;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class reminderKrs3mport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }
    public function model(array $row)
    {
        return new reminderKrs3([
            'type' => $row['type'],
            'nim' => $row['nim'],
            'name' => $row['name'],
            'email' => $row['email'],
            'semester' => $row['semester'],
            'date_regist' => $row['date_regist'],
            'jatem' => $this->transformDate($row['jatem']),

        ]);
    }
}
