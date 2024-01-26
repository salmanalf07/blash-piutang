<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .bold {
            font-weight: bold;
        }

        table {
            border-collapse: collapse;
        }

        .border {
            border: 1px solid black;
        }

        .center {
            text-align: center;
        }

        .right {
            text-align: right;
        }

        .left {
            text-align: left;
        }

        .table td {
            padding: 0.3%;
        }
    </style>
</head>

<body style="text-align: justify;">
    <?php
    if (!function_exists('getRomawi')) {
        function getRomawi($tanggal)
        {
            $bulan = array(
                1 =>   'JANUARI',
                'FEBRUARI',
                'MARET',
                'APRIL',
                'MEI',
                'JUNI',
                'JULI',
                'AGUSTUS',
                'SEPTEMBER',
                'OKTOBER',
                'NOVEMBER',
                'DESEMBER'
            );

            $pecahkan = explode('-', $tanggal);

            return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
        }
    }

    ?>
    <img width="30%" src="{{$message->embed(public_path().'/assets/img/Logo-BINUS-University.jpg')}}">
    <table>
        <tbody>
            <tr>
                <td colspan="4" class="bold">Yth. {{$data['name']}} – {{$data['student_id']}},</td>
            </tr>
            <tr>
                <td colspan="4">
                    <br>
                </td>
            </tr>
            <tr>
                <td colspan="4">Kami informasikan bahwa kamu masih memiliki tagihan <b>Semester {{$data['semester_now']}}</b> yang <b><U>BELUM LUNAS</U></b> sebesar <b>Rp. {{number_format(($data['detReminPem1'][0]['totalTunggakan']+$data['detReminPem2'][0]['totalTunggakan']))}}</b></td>
            </tr>
            <tr>
                <td colspan="4">
                    <br>
                </td>
            </tr>
            <tr>
                <td colspan="4">Berikut ini adalah rincian kewajiban pembayaran perkuliahan:</td>
            </tr>
            <tr class="table center bold" style="background-color: #34b4eb;color:white">
                <td class="border" style="width: 30%;">Periode</td>
                <td class="border" style="width: 30%;">Jenis Tagihan</td>
                <td class="border" style="width: 20%;">Jatuh Tempo</td>
                <td class="border" style="width: 20%;">Jumlah Tagihan (Rp)</td>
            </tr>
            @if ($data['detReminPem2'][0]["daftarUlang"])
            <tr class="table center">
                <td class="border">Semester {{$data['detReminPem2'][0]["semester"]}}</td>
                <td class="border left">Re-Registration Fee/Daftar Ulang</td>
                <td class="border">{{getRomawi($data['detReminPem2'][0]["jatemDaftarUlang"])}}</td>
                <td class="border right">{{number_format($data['detReminPem2'][0]["daftarUlang"])}}</td>
            </tr>
            @endif
            @if ($data['detReminPem2'][0]["sisaBP3"])
            <tr class="table center">
                <td class="border">Semester {{$data['detReminPem2'][0]["semester"]}}</td>
                <td class="border left">Fixed Tuition Fee/BP3</td>
                <td class="border">{{getRomawi($data['detReminPem2'][0]["jatemBP3"])}}</td>
                <td class="border right">{{number_format($data['detReminPem2'][0]["sisaBP3"])}}</td>
            </tr>
            @endif
            @if ($data["detReminPem2"][0]["sisaFPU"])
            <tr class="table center">
                <td class="border">Semester {{$data["detReminPem2"][0]["semester"]}}</td>
                <td class="border left">FPU</td>
                <td class="border">{{getRomawi($data["detReminPem2"][0]["jatemFPU"])}}</td>
                <td class="border right">{{number_format($data["detReminPem2"][0]["sisaFPU"])}}</td>
            </tr>
            @endif
            @if ($data["detReminPem2"][0]["sisaLab"])
            <tr class="table center">
                <td class="border">Semester {{$data["detReminPem2"][0]["semester"]}}</td>
                <td class="border left">Lab Fee</td>
                <td class="border">{{getRomawi($data["detReminPem2"][0]["jatemLab"])}}</td>
                <td class="border right">{{number_format($data["detReminPem2"][0]["sisaLab"])}}</td>
            </tr>
            @endif
            @if ($data["detReminPem2"][0]["sisaSKS-1"])
            <tr class="table center">
                <td class="border">Semester {{$data["detReminPem2"][0]["semester"]}}</td>
                <td class="border left">Variable Tuition Fee/SKS-1</td>
                <td class="border">{{getRomawi($data["detReminPem2"][0]["jatemSKS-1"])}}</td>
                <td class="border right">{{number_format($data["detReminPem2"][0]["sisaSKS-1"])}}</td>
            </tr>
            @endif
            @if ($data["detReminPem2"][0]["sisaSKS-2"])
            <tr class="table center">
                <td class="border">Semester {{$data["detReminPem2"][0]["semester"]}}</td>
                <td class="border left">Variable Tuition Fee/SKS-2</td>
                <td class="border">{{getRomawi($data["detReminPem2"][0]["jatemSKS-2"])}}</td>
                <td class="border right">{{number_format($data["detReminPem2"][0]["sisaSKS-2"])}}</td>
            </tr>
            @endif
            @if ($data["detReminPem2"][0]["sisaDP3"])
            <tr class="table center">
                <td class="border">Semester {{$data["detReminPem2"][0]["semester"]}}</td>
                <td class="border left">DP3</td>
                <td class="border">{{getRomawi($data["detReminPem2"][0]["jatemDP3"])}}</td>
                <td class="border right">{{number_format($data["detReminPem2"][0]["sisaDP3"])}}</td>
            </tr>
            @endif
            @if ($data["detReminPem2"][0]["sisaAlat"])
            <tr class="table center">
                <td class="border">Semester {{$data["detReminPem2"][0]["semester"]}}</td>
                <td class="border left">Alat</td>
                <td class="border">{{getRomawi($data["detReminPem2"][0]["jatemAlat"])}}</td>
                <td class="border right">{{number_format($data["detReminPem2"][0]["sisaAlat"])}}</td>
            </tr>
            @endif

            @if ($data["detReminPem2"][0]["sisaBuku"])
            <tr class="table center">
                <td class="border">Semester {{$data["detReminPem2"][0]["semester"]}}</td>
                <td class="border left">Textbook</td>
                <td class="border">{{getRomawi($data["detReminPem2"][0]["jatemBuku"])}}</td>
                <td class="border right">{{number_format($data["detReminPem2"][0]["sisaBuku"])}}</td>
            </tr>
            @endif
            @if ($data["detReminPem2"][0]["beelinguaFee"])
            <tr class="table center">
                <td class="border">Semester {{$data["detReminPem2"][0]["semester"]}}</td>
                <td class="border left">Beelingua Fee</td>
                <td class="border">{{getRomawi($data["detReminPem2"][0]["jatemBeelingua"])}}</td>
                <td class="border right">{{number_format($data["detReminPem2"][0]["beelinguaFee"])}}</td>
            </tr>
            @endif
            @if ($data["detReminPem1"][0]["sisaBP3"])
            <tr class="table center">
                <td class="border">Semester {{$data["detReminPem1"][0]["semester"]}}</td>
                <td class="border left">Fixed Tuition Fee/BP3</td>
                <td class="border">{{getRomawi($data["detReminPem1"][0]["jatemBP3"])}}</td>
                <td class="border right">{{number_format($data["detReminPem1"][0]["sisaBP3"])}}</td>
            </tr>
            @endif
            @if ($data["detReminPem1"][0]["sisaFPU"])
            <tr class="table center">
                <td class="border">Semester {{$data["detReminPem1"][0]["semester"]}}</td>
                <td class="border left">FPU</td>
                <td class="border">{{getRomawi($data["detReminPem1"][0]["jatemFPU"])}}</td>
                <td class="border right">{{number_format($data["detReminPem1"][0]["sisaFPU"])}}</td>
            </tr>
            @endif
            @if ($data["detReminPem1"][0]["sisaLab"])
            <tr class="table center">
                <td class="border">Semester {{$data["detReminPem1"][0]["semester"]}}</td>
                <td class="border left">Lab Fee</td>
                <td class="border">{{getRomawi($data["detReminPem1"][0]["jatemLab"])}}</td>
                <td class="border right">{{number_format($data["detReminPem1"][0]["sisaLab"])}}</td>
            </tr>
            @endif
            @if ($data["detReminPem1"][0]["sisaSKS-1"])
            <tr class="table center">
                <td class="border">Semester {{$data["detReminPem1"][0]["semester"]}}</td>
                <td class="border left">Variable Tuition Fee/SKS-1</td>
                <td class="border">{{getRomawi($data["detReminPem1"][0]["jatemSKS-1"])}}</td>
                <td class="border right">{{number_format($data["detReminPem1"][0]["sisaSKS-1"])}}</td>
            </tr>
            @endif
            @if ($data["detReminPem1"][0]["sisaSKS-2"])
            <tr class="table center">
                <td class="border">Semester {{$data["detReminPem1"][0]["semester"]}}</td>
                <td class="border left">Variable Tuition Fee/SKS-2</td>
                <td class="border">{{getRomawi($data["detReminPem1"][0]["jatemSKS-2"])}}</td>
                <td class="border right">{{number_format($data["detReminPem1"][0]["sisaSKS-2"])}}</td>
            </tr>
            @endif
            @if ($data["detReminPem1"][0]["sisaDP3"])
            <tr class="table center">
                <td class="border">Semester {{$data["detReminPem1"][0]["semester"]}}</td>
                <td class="border left">DP3</td>
                <td class="border">{{getRomawi($data["detReminPem1"][0]["jatemDP3"])}}</td>
                <td class="border right">{{number_format($data["detReminPem1"][0]["sisaDP3"])}}</td>
            </tr>
            @endif
            @if ($data["detReminPem1"][0]["sisaAlat"])
            <tr class="table center">
                <td class="border">Semester {{$data["detReminPem1"][0]["semester"]}}</td>
                <td class="border left">Alat</td>
                <td class="border">{{getRomawi($data["detReminPem1"][0]["jatemAlat"])}}</td>
                <td class="border right">{{number_format($data["detReminPem1"][0]["sisaAlat"])}}</td>
            </tr>
            @endif

            @if ($data["detReminPem1"][0]["sisaBuku"])
            <tr class="table center">
                <td class="border">Semester {{$data["detReminPem1"][0]["semester"]}}</td>
                <td class="border left">Textbook</td>
                <td class="border">{{getRomawi($data["detReminPem1"][0]["jatemBuku"])}}</td>
                <td class="border right">{{number_format($data["detReminPem1"][0]["sisaBuku"])}}</td>
            </tr>
            @endif
            @if ($data["detReminPem1"][0]["beelinguaFee"])
            <tr class="table center">
                <td class="border">Semester {{$data["detReminPem1"][0]["semester"]}}</td>
                <td class="border left">Beelingua Fee</td>
                <td class="border">{{getRomawi($data["detReminPem1"][0]["jatemBeelingua"])}}</td>
                <td class="border right">{{number_format($data["detReminPem1"][0]["beelinguaFee"])}}</td>
            </tr>
            @endif
            <tr>
                <td colspan="4">
                    <br>
                </td>
            </tr>
            <tr>
                <td colspan="4" class="bold">*Informasi detail tagihan dapat dilihat pada Binusmaya/BINUS Mobile > Finance > Financial Summary</td>
            </tr>
            <tr>
                <td colspan="4">
                    <br>
                </td>
            </tr>
            <tr>
                <td colspan="4"><?php echo $data["i_tambahan"] ? $data["i_tambahan"] : '' ?></td>
            </tr>
            <tr>
                <td colspan="4">
                    <br>
                </td>
            </tr>
            @if ($data["i_tambahan_1"])
            <tr>
                <td colspan="4"><?php echo $data["i_tambahan_1"] ? $data["i_tambahan_1"]  : '' ?></td>
            </tr>
            <tr>
                <td colspan="4">
                    <br>
                </td>
            </tr>
            @endif
            <tr>
                <td colspan="4" class="bold">Pembayaran melalui Virtual Account BCA: 12007+1+NIM (Contoh: 1200712601234567)</td>
            </tr>
            <tr>
                <td colspan="4" style="font-style: italic;">*Cara pembayaran melalui Virtual Account terlampir pada Email ini</td>
            </tr>
            <tr>
                <td colspan="4">
                    <br>
                </td>
            </tr>
            @if ($data["autoDebet"])
            <tr>
                <td colspan="4" class="bold">Atau melalui penarikan Autodebet tanggal {{getRomawi($data["autoDebet"])}}</td>
            </tr>
            <tr>
                <td colspan="4" style="font-style: italic;">*Harap simpan dana pada saldo rekening Autodebet sebelum tanggal {{getRomawi($data["autoDebet"])}}</td>
            </tr>
            <tr>
                <td colspan="4">
                    <br>
                </td>
            </tr>
            @endif
            <tr>
                <td colspan="4">Bukti pembayaran dapat dilampirkan melalui Email: <a style="font-style:italic;text-decoration:none !important;" href="mailto:studentservices_bekasi@binus.edu">studentservices_bekasi@binus.edu</a> dengan Subject: <b>Nama_NIM_Jenis Tagihan</b></td>
            </tr>
            <tr>
                <td colspan="4"><br></td>
            </tr>
            <tr>
                <td colspan="4">Jika ada pertanyaan lebih lanjut, silakan menghubungi Student Services melalui Layanan Onsite Lt.1 BINUS Bekasi, Layanan Online Zoom - <a style="font-style:italic ;" href="https://binus.zoom.us/j/9842369396">https://binus.zoom.us/j/9842369396</a> (Meeting ID: 984 236 9396) dan Email: <a style="font-style:italic;text-decoration:none !important;" href="mailto:studentservices_bekasi@binus.edu">studentservices_bekasi@binus.edu</a>.</td>
            </tr>
            <tr>
                <td colspan="3"><br></td>
            </tr>
            <tr>
                <td colspan="3">Terima kasih.</td>
            </tr>
            <tr>
                <td colspan="3"><br></td>
            </tr>
            <tr>
                <td colspan="3">Salam,</td>
            </tr>
            <tr>
                <td colspan="3"><br></td>
            </tr>
            <tr>
                <td colspan="3" class="bold">Student Service Center</td>
            </tr>
            <tr>
                <td colspan="3">BINUS University @Bekasi</td>
            </tr>
        </tbody>
    </table>
</body>

</html>