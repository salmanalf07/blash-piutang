<?php

namespace App\Imports;

use App\Models\reaktif;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ReaktifImport implements ToModel, WithHeadingRow
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
        return new Reaktif([
            'semester' => $row['semester'],
            'nim' => $row['nim'],
            'mahasiswa' => $row['mahasiswa'],
            'email' => $row['email'],
            'tgl_batas' => $this->transformDate($row['tanggal_batas_pengajuan']),
            'i_tambahan' => $row['informasi_tambahan'],

        ]);
    }
}
