<?php

namespace App\Imports;

use App\Models\enrichment;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EnrichmentImport implements ToModel, WithHeadingRow
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
        return new enrichment([
            'semester' => $row['semester'],
            'nim' => $row['nim'],
            'mahasiswa' => $row['mahasiswa'],
            'email' => $row['email'],
            'tgl_konfirm' => $this->transformDate($row['tanggal_konfirmasi']),
            'jumlah_sks' => $row['jumlah_sks'],
            'harga_sks' => $row['harga_sks'],
            'bp3' => $row['tunggakan_bp3'],
            'bp3_tempo' => $this->transformDate($row['jatuh_tempo_bp3']),
            'sks' => $row['tunggakan_sks'],
            'sks_tempo' => $this->transformDate($row['jatuh_tempo_sks']),
            'total_tunggakan' => $row['tunggakan_bp3'] + $row['tunggakan_sks'],
            'i_tambahan' => $row['informasi_tambahan'],

        ]);
    }
}
