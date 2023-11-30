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
    <img width="20%" src="{{$message->embed(public_path().'/assets/img/Logo-BINUS-University-BOL.jpg')}}">
    <table>
        <tbody>
            <tr>
                <td colspan="4" class="bold">Yth. Bapak/Ibu Binusian,</td>
            </tr>
            <tr>
                <td colspan="4">
                    <br>
                </td>
            </tr>
            <tr>
                <td colspan="4">Dengan ini Kami informasikan untuk segera melakukan pembayaran tagihan biaya kuliah untuk Perkuliahan Semester {{$data['semester']}} Periode {{$data['periode_kuliah']}}</td>
            </tr>

            <tr>
                <td colspan="4">
                    <br>
                </td>
            </tr>
            <tr>
                <td colspan="4" class="bold">Mohon untuk segera melunasi pembayaran,agar bisa dijadwalkan untuk perkuliahan periode {{$data['periode_kuliah']}}.</td>
            </tr>
            <tr>
                <td colspan="4">
                    <br><br>
                </td>
            </tr>
            <tr>
                <td colspan="4">Pembayaran Perkuliahan dapat dilakukan dengan cara sebagai berikut :</td>
            </tr>
            <tr>
                <td colspan="4">
                    <br>
                </td>
            </tr>
            <tr>
                <td class="center" style="width: 5%;">1. </td>
                <td colspan="3">Nomor Virtual Account BCA Bapak/Ibu dapat dilihat di LMS pada <b>Menu --> Private --> Financial</b> (Lihat nominal yang harus dilunasi pada Pending Charge).</td>
            </tr>
            <tr>
                <td colspan="4"><br></td>
            </tr>
            <tr>
                <td class="center">2. </td>
                <td colspan="3">Nomor Virtual Account BCA Bapak/Ibu ada di atas nama (deret angka paling depan / 120041+NIM).</td>
            </tr>
            <tr>
                <td colspan="4"><br></td>
            </tr>
            <tr>
                <td class="center">3. </td>
                <td colspan="3">Lakukan pembayaran melalui: ATM BCA / Mobile Banking BCA / Teller Bank BCA</td>
            </tr>
            <tr>
                <td colspan="4"><br><br><br></td>
            </tr>
            <tr>
                <td colspan="4">Informasi Tambahan:</td>
            </tr>
            <tr>
                <td colspan="4">
                    <br>
                </td>
            </tr>
            <tr>
                <td class="center" style="width: 5%;">1. </td>
                <td colspan="3">Ujian Online periode {{$data['periode_ujian']}} dilaksanakan pada {{getRomawi($data['dateSt_ujian'])}} s.d {{getRomawi($data['dateEd_ujian'])}}</td>
            </tr>
            <tr>
                <td colspan="4"><br></td>
            </tr>
            <tr>
                <td class="center">2. </td>
                <td colspan="3">Awal Perkuliahan periode {{$data['periode_kuliah']}} dimulai pada {{getRomawi($data['date_kuliah'])}}</td>
            </tr>
            <tr>
                <td colspan="4"><br><br></td>
            </tr>
            <tr>
                <td colspan="4">Jika ada yang ingin dikonsultasikan dapat melalui:</td>
            </tr>
            <tr>
                <td colspan="4">
                    <br>
                </td>
            </tr>
            <tr>
                <td class="center" style="width: 5%;">1. </td>
                <td colspan="3">Zoom meeting Pelayanan pada Dasboard LMS (dipojok kanan bawah)</td>
            </tr>
            <tr>
                <td colspan="4"><br></td>
            </tr>
            <tr>
                <td class="center">2. </td>
                <td colspan="3">WA <a style="font-style:italic;text-decoration:none !important;" href="https://wa.me/6287878448800">0878 7844 8800</a> (Layanan BLC Bekasi)</td>
            </tr>
            <tr>
                <td colspan="4"><br><br></td>
            </tr>
            <tr>
                <td colspan="4">Jadwal Operasional pelayanan Mahasiswa:</td>
            </tr>
            <tr>
                <td colspan="4"><br></td>
            </tr>
            <tr>
                <td colspan="4">Zoom Meeting</td>
            </tr>
            <tr>
                <td colspan="4"><br></td>
            </tr>
            <tr>
                <td style="width: 15%;" colspan="2">Senin - Jumat</td>
                <td style="width: 1%;">:</td>
                <td>09.00 - 20.00 WIB</td>
            </tr>
            <tr>
                <td colspan="4"><br></td>
            </tr>
            <tr>
                <td style="width: 15%;" colspan="2">Sabtu</td>
                <td style="width: 1%;">:</td>
                <td>09.00 - 12.00 WIB</td>
            </tr>
            <tr>
                <td colspan="4"><br></td>
            </tr>
            <tr>
                <td style="width: 15%;" colspan="2">Minggu</td>
                <td style="width: 1%;">:</td>
                <td>Libur</td>
            </tr>
            <tr>
                <td colspan="4"><br><br></td>
            </tr>
            <tr>
                <td colspan="4">WA Pelayanan Mahasiswa BULC Bekasi</td>
            </tr>
            <tr>
                <td colspan="4"><br></td>
            </tr>
            <tr>
                <td style="width: 10%;" colspan="2">Senin - Jumat</td>
                <td style="width: 1%;">:</td>
                <td>09.00 - 17.00 WIB</td>
            </tr>
            <tr>
                <td colspan="4"><br></td>
            </tr>
            <tr>
                <td style="width: 10%;" colspan="2">Sabtu</td>
                <td style="width: 1%;">:</td>
                <td>09.00 - 15.00 WIB</td>
            </tr>
            <tr>
                <td colspan="4"><br></td>
            </tr>
            <tr>
                <td style="width: 10%;" colspan="2">Minggu</td>
                <td style="width: 1%;">:</td>
                <td>Libur</td>
            </tr>
            <tr>
                <td colspan="4"><br><br><br></td>
            </tr>
            <tr>
                <td colspan="4">Silakan abaikan reminder ini, untuk:</td>
            </tr>
            <tr>
                <td colspan="4">
                    <br>
                </td>
            </tr>
            <tr>
                <td class="center" style="width: 5%;">1. </td>
                <td colspan="3">Bapak/Ibu yang saat ini sedang proses pengajuan Matakuliah melalui email <a style="font-style:italic;text-decoration:none !important;" href="mailto:halobinus@binus.edu">halobinus@binus.edu</a></td>
            </tr>
            <tr>
                <td colspan="4"><br></td>
            </tr>
            <tr>
                <td class="center">2. </td>
                <td colspan="3">Bapak/Ibu yang mengajukan Cuti Resmi periode {{$data['periode_kuliah']}}</td>
            </tr>
            <tr>
                <td colspan="4"><br></td>
            </tr>
            <tr>
                <td class="center">3. </td>
                <td colspan="3">Bapak/Ibu yang sudah melakukan pembayaran</td>
            </tr>
            <tr>
                <td colspan="4"><br><br><br></td>
            </tr>
            <tr>
                <td colspan="4">Demikian informasi yang dapat Kami sampaikan, atas perhatian Bapak/Ibu kami ucapkan terimakasih.</td>
            </tr>
            <tr>
                <td colspan="4"><br><br></td>
            </tr>
            <tr>
                <td colspan="4">Salam,</td>
            </tr>
            <tr>
                <td colspan="4" class="bold">BINUS Online Operation</td>
            </tr>
            <tr>
                <td colspan="4">BINUS @Bekasi</td>
            </tr>
        </tbody>
    </table>
</body>

</html>