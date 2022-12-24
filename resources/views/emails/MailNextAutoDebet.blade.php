<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="text-align: justify;">
    <?php
    if (!function_exists('getRomawi')) {
        function getRomawi($tanggal)
        {
            $bulan = array(
                1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );

            $pecahkan = explode('-', $tanggal);

            return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
        }
    }

    ?>
    <table>
        <tbody>
            <tr>
                <td colspan="3">Dear Binusian,</td>
            </tr>
            <tr>
                <td colspan="3">
                    <br>
                </td>
            </tr>
            <tr>
                <td colspan="3">Diinformasikan kepada seluruh Mahasiswa, akan dilaksanakan <b>AUTO DEBET</b> untuk <b>{{$biaya}} Semester {{$semester}},</b> serta bagi yang memiliki Tunggakan Pembayaran Semester sebelumnya <b>BELUM LUNAS,</b> maka diberikan kesempatan untuk di-Auto debet pada:</td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center;">
                    <br>
                    <b>TANGGAL <?php echo getRomawi($tgl_batas) ?></b>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <br>
                </td>
            </tr>
            <tr>
                <td colspan="3">Jumlah tagihan dapat dilihat di <a href="http://binusmaya.binus.ac.id">http://binusmaya.binus.ac.id</a> pada :</td>
            </tr>
            <tr>
                <td>·</td>
                <td colspan="2">menu Financial, pilih Financial Summary</td>
            </tr>
            <tr>
                <td colspan="3">Status hasil auto debet dapat dilihat 2 hari setelah tanggal auto debet di <a href="http://binusmaya.binus.ac.id">http://binusmaya.binus.ac.id</a> pada :</td>
            </tr>
            <tr>
                <td>·</td>
                <td colspan="2">menu Mail</td>
            </tr>
            <tr>
                <td>·</td>
                <td colspan="2">menu Financial, pilih Financial Summary</td>
            </tr>
            <tr>
                <td>·</td>
                <td colspan="2">menu Message pilih Inbox (status gagal)</td>
            </tr>
            <br>
            <tr>
                <td colspan="3">Apabila terdapat pertanyaan lebih lanjut dapat menghubungi Student Services Center BINUS @Bekasi melalui Channel di bawah ini.</td>
            </tr>
            <tr>
                <td colspan="3"><br></td>
            </tr>
            <tr>
                <td colspan="3">Whatsapp Chatbot: 087801724687 (For Student Only)</td>
            </tr>
            <tr>
                <td colspan="3">LINE Chatbot: @BINUS_UNIV (For Student Only)</td>
            </tr>
            <tr>
                <td colspan="3">Email: <a style="font-style:italic ;" href="mailto:halobinus@binus.edu">halobinus@binus.edu</a></td>
            </tr>
            <tr>
                <td colspan="3">Binusmaya >> Feedback >> Send Feedback</td>
            </tr>
            <tr>
                <td colspan="3">Binusmaya >> Chat with us</td>
            </tr>
            <tr>
                <td colspan="3">Zoom: <a style="font-style:italic ;" href="https://binus.zoom.us/j/9842369396">https://binus.zoom.us/j/9842369396</a> (Meeting ID: 984 236 9396) Dengan Username: NIM - NAMA</td>
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
                <td colspan="3">Best Regards,</td>
            </tr>
            <tr>
                <td colspan="3">Student Services BINUS@Bekasi</td>
            </tr>
        </tbody>
    </table>
</body>

</html>