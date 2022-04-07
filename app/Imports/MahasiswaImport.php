<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MahasiswaImport implements ToModel, WithHeadingRow
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
        return new Mahasiswa([
            'no_formulir' => $row['no_formulir'],
            'nim' => $row['nim'],
            'nama' => $row['nama'],
            'jenjang' => $row['jenjang'],
            'email' => $row['email_mhs'],
            'bp3' => $row['tunggakan_bp3'],
            'bp3_tempo' => $this->transformDate($row['tempo_bp3']),
            'sks' => $row['tunggakan_sks'],
            'sks_tempo' => $this->transformDate($row['tempo_sks']),
            'lab' => $row['tunggakan_lab'],
            'lab_tempo' => $this->transformDate($row['tempo_lab']),
            'uniform' => $row['tunggakan_uniform'],
            'uniform_tempo' => $this->transformDate($row['tempo_uniform']),
            'alat' => $row['tunggakan_alat'],
            'alat_tempo' => $this->transformDate($row['tempo_alat']),
            'dp31' => $row['tunggakan_dp31'],
            'dp31_tempo' => $this->transformDate($row['tempo_dp31']),
            'dp32' => $row['tunggakan_dp32'],
            'dp32_tempo' => $this->transformDate($row['tempo_dp32']),
            'total' => $row['total_sisa_tagihan'],

        ]);
    }
}
