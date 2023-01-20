<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        br {
            display: block;
            margin: 10px 0;
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
    <table>
        <tbody>
            <tr>
                <td colspan="3"><b>Dear Binusian,</b></td>
            </tr>
            <tr>
                <td colspan="3">
                    <br>
                </td>
            </tr>
            <tr>
                <td colspan="3">Kami informasikan bahwa kamu sudah mengisi KRSS dan KRS, oleh karena itu kamu memiliki tagihan <b>{{ucwords($data['tagihan'])}}</b> yang <b style="text-decoration: underline;">BELUM LUNAS</b> dan <b>wajib dilunasi sebelum</b> tanggal <b>{{getRomawi($data["jatem"])}}</b> (periode KRS tahap 3).</td>
            </tr>
            <tr>
                <td colspan="3">
                    <br>
                </td>
            </tr>
            <tr>
                <td colspan="3">Jika tidak ada pelunasan, maka otomatis Enrollment akan ter-drop by system dan harus registrasi ulang pada KRS tahap 3 ({{$data['enrollment']}}).</td>
            </tr>
            <tr>
                <td colspan="3">
                    <br>
                </td>
            </tr>
            <tr>
                <td colspan="3">Cek tagihan pembayaran di <b>Binusmaya/BIMOB pada menu Financial -> Financial Summary.</b></td>
            </tr>
            <tr>
                <td colspan="3">
                    <br>
                </td>
            </tr>
            @if($data['type'] == 1)
            <tr>
                <td colspan="3">Pembayaran secara <b>AUTODEBET KEBIJAKAN PADA TANGGAL {{getRomawi($data['jatem_auto'])}}.</b> Simpan dana di rekening maksimal H-1.</td>
            </tr>
            <tr>
                <td colspan="3">
                    <br>
                </td>
            </tr>
            <tr>
                <td colspan="3">Bagi kamu yang tidak memiliki rekening Autodebet, dapat membayarkan secara transfer manual dengan penginputan NIM+Kode Bayar (terlampir prosedurnya). Lalu kirimkan bukti bayarnya ke Email: studentservices_bekasi@binus.edu</td>
            </tr>
            @else
            <tr>
                <td colspan="3">Pembayaran dilakukan secara Transfer Manual dengan penginputan NIM+Kode Bayar (terlampir prosedurnya). Lalu kirimkan bukti bayarnya ke Email: studentservices_bekasi@binus.edu.</td>
            </tr>
            @endif
            <tr>
                <td colspan="3"><br></td>
            </tr>
            <tr>
                <td colspan="3">Jika terdapat kendala, silakan hubungi Student Services BINUS Bekasi melalui: </td>
            </tr>
            <tr>
                <td colspan="3"><br></td>
            </tr>
            <tr>
                <td colspan="3">Whatsapp Chatbot: 087801724687 (For Student Only)</td>
            </tr>
            <tr>
                <td colspan="3">Telephone : 021-29285598 (Ext. 7918)</td>
            </tr>
            <tr>
                <td colspan="3">Email : <a style="font-style:italic ;" href="mailto:studentservices_bekasi@binus.edu">studentservices_bekasi@binus.edu</a></td>
            </tr>
            <tr>
                <td colspan="3">Zoom : <a style="font-style:italic ;" href="https://binus.zoom.us/j/9842369396">https://binus.zoom.us/j/9842369396</a> (Meeting ID: 984 236 9396) Dengan Username: NIM - NAMA</td>
            </tr>
            <tr>
                <td colspan="3"><br></td>
            </tr>
            <tr>
                <td colspan="3" style="font-weight:bold">Operational Hours:</td>
            </tr>
            <tr>
                <td colspan="3">Senin – Jumat >> 07:00 – 18:00 WIB</td>
            </tr>
            <tr>
                <td colspan="3">Sabtu >> 07:00 – 15:00 WIB</td>
            </tr>
            <tr>
                <td colspan="3"><br><br></td>
            </tr>
            <tr>
                <td colspan="3">Terima kasih.</td>
            </tr>
            <tr>
                <td colspan="3"><br></td>
            </tr>
            <tr>
                <td colspan="3"><b>Student Services</b></td>
            </tr>
            <tr>
                <td colspan="3">BINUS University @Bekasi</td>
            </tr>
        </tbody>
    </table>
</body>

</html>