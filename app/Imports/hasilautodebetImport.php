<?php

namespace App\Imports;

use App\Models\autodebet;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class hasilautodebetImport implements ToModel, WithHeadingRow
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
        return new autodebet([
            'type' => 'hasilautodebet',
            'nim' => $row['nim'],
            'name' => $row['name'],
            'email' => $row['email'],
            'semester' => $row['semester'],
            'tgl_batas' => $this->transformDate($row['tanggal_batas']),
            'biaya' => $row['biaya'],

        ]);
    }
}
