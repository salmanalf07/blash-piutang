<?php

namespace App\Imports;

use App\Models\reminderKrs12;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class reminderKrs12mport implements ToModel, WithHeadingRow
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
        return new reminderKrs12([
            'nim' => $row['nim'],
            'name' => $row['name'],
            'email' => $row['email'],
            'semester' => $row['semester'],
            'tagihan' => $row['tagihan'],
            'enrollment' => $row['enrollment'],
            'jatem' => $this->transformDate($row['jatem']),
            'jatem_auto' => $this->transformDate($row['jatem_auto']),
            'type' => $row['type'],

        ]);
    }
}
