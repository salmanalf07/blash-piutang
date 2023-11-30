<?php

namespace App\Imports;

use App\Models\reminderPembayaranBol;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;

class reminderPembayaranBolImport implements ToCollection, WithHeadingRow
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

    // public function headingRow(): int
    // {
    //     return 2;
    // }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $reminBuyName = reminderPembayaranBol::create([

                'nim' => $row['nim'],
                'name' => $row['name'],
                'email' => $row['email'],
                'email_cc1' => $row['email_cc1'],
                'semester' => $row['semester'],
                'periode_kuliah' => $row['periode_kuliah'],
                'date_kuliah' => $this->transformDate($row['tanggal_kuliah']),
                'periode_ujian' => $row['periode_ujian'],
                'dateSt_ujian' => $this->transformDate($row['mulai_tanggal_ujian']),
                'dateEd_ujian' => $this->transformDate($row['selesai_tanggal_ujian']),
            ]);
        }
    }
}
