<?php

namespace App\Imports;

use App\Models\detReminPemb1;
use App\Models\detReminPemb2;
use App\Models\reminderPembayaran;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;

class reminderPembayaranImport implements ToCollection, WithHeadingRow
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
            $reminBuyName = reminderPembayaran::create([
                'name' => $row['name'],
                'student_id' => $row['student_id'],
                'email' => $row['email'],
                'email_cc1' => $row['email_cc1'],
                'email_cc2' => $row['email_cc2'],
                'semester_now' => $row['semester_now'],
                'i_tambahan' => $row['info_tambahan_1'],
                'i_tambahan_1' => $row['info_tambahan_2'],
            ]);

            detReminPemb1::create([
                'reminPembId' => $reminBuyName->id,
                'semester' => $row['1_periode_semester'],
                'sisaBP3' => $row['1_sisa_bp3'],
                'sisaFPU' => $row['1_sisa_fpu'],
                'sisaSKS-1' => $row['1_sisa_sks_1'],
                'sisaSKS-2' => $row['1_sisa_sks_2'],
                'sisaDP3' => $row['1_sisa_dp3'],
                'sisaAlat' => $row['1_sisa_alat'],
                'sisaLab' => $row['1_sisa_lab'],
                'sisaBuku' => $row['1_sisa_buku'],
                'beelinguaFee' => $row['1_beelingua_fee'],
                'totalTunggakan' => $row['1_sisa_bp3'] + $row['1_sisa_fpu'] + $row['1_sisa_sks_1'] + $row['1_sisa_sks_2'] + $row['1_sisa_dp3'] + $row['1_sisa_alat'] + $row['1_sisa_lab'] + $row['1_sisa_buku'] + $row['1_beelingua_fee'],
                'jatemBP3' => $this->transformDate($row['1_jatem_bp3']),
                'jatemFPU' => $this->transformDate($row['1_jatem_fpu']),
                'jatemSKS-1' => $this->transformDate($row['1_jatem_sks_1']),
                'jatemSKS-2' => $this->transformDate($row['1_jatem_sks_2']),
                'jatemDP3' => $this->transformDate($row['1_jatem_dp3']),
                'jatemAlat' => $this->transformDate($row['1_jatem_alat']),
                'jatemLab' => $this->transformDate($row['1_jatem_lab']),
                'jatemBuku' => $this->transformDate($row['1_jatem_buku']),
                'jatemBeelingua' => $this->transformDate($row['1_jatem_beelingua']),
            ]);

            detReminPemb2::create([
                'reminPembId' => $reminBuyName->id,
                'semester' => $row['2_periode_semester'],
                'sisaBP3' => $row['2_sisa_bp3'],
                'sisaFPU' => $row['2_sisa_fpu'],
                'sisaSKS-1' => $row['2_sisa_sks_1'],
                'sisaSKS-2' => $row['2_sisa_sks_2'],
                'sisaDP3' => $row['2_sisa_dp3'],
                'sisaAlat' => $row['2_sisa_alat'],
                'sisaLab' => $row['2_sisa_lab'],
                'sisaBuku' => $row['2_sisa_buku'],
                'beelinguaFee' => $row['2_beelingua_fee'],
                'totalTunggakan' => $row['2_sisa_bp3'] + $row['2_sisa_fpu'] + $row['2_sisa_sks_1'] + $row['2_sisa_sks_2'] + $row['2_sisa_dp3'] + $row['2_sisa_alat'] + $row['2_sisa_lab'] + $row['2_sisa_buku'] + $row['2_beelingua_fee'],
                'jatemBP3' => $this->transformDate($row['2_jatem_bp3']),
                'jatemFPU' => $this->transformDate($row['2_jatem_fpu']),
                'jatemSKS-1' => $this->transformDate($row['2_jatem_sks_1']),
                'jatemSKS-2' => $this->transformDate($row['2_jatem_sks_2']),
                'jatemDP3' => $this->transformDate($row['2_jatem_dp3']),
                'jatemAlat' => $this->transformDate($row['2_jatem_alat']),
                'jatemLab' => $this->transformDate($row['2_jatem_lab']),
                'jatemBuku' => $this->transformDate($row['2_jatem_buku']),
                'jatemBeelingua' => $this->transformDate($row['2_jatem_beelingua']),
            ]);
        }
    }
}
