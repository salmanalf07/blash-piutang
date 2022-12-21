<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
        table,
        tr,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        .center {
            text-align: center;
        }

        .bold {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <p>HEYWO BINUSIAN!!!</p>
    <p>
        Kami ingin mengundang Binusian 2024 & Binusian 2025 untuk mengikuti event
        Welcome Back to Campus.
    </p>
    <p>Berikut detail event Welcome Back to Campus :</br>
        Tanggal : 20 September - 23 September 2022</br>
        Tempat : BINUS @Bekasi Campus
    </p>
    <p>
        Event ini bersifat WAJIB yaa!!! </br>
        Jadi jangan sampai kelewatan! </br>
        Bakal nyesel gabisa Bermain, Bergembira & </br>
        Bersosialisasi di BINUS Bekasi BEKEN >.< </br>
            Soalnya WAJIB! HARUS! KUDU! MESTI! ANTI SKIP!
    </p>
    <p>
        DISINI YA JADWALNYA!!! </br>
        Tiap orang beda-beda jadi harus cek sendiri! mandiri!
    </p>
    <p>
        Jadwal Tiap Kelompok</br>
        Tanggal : 20 September - 23 September 2022 </br>
        Nomor Kelompokmu : {{$no_kelompok}}</br>
        Nama Kelompokmu : {{$nama_kelompok}}</br>
        Link Group WA mu : {{$link_wa}}</br>

    </p>
    <p>Cememonial Activities</p>
    <table style="border:1px solid black ;">
        <tr>
            <td class="center bold" style="width: 30% ;">Ceremonial Activities</td>
            <td class="center bold" style="width: 60%;" colspan="2">Waktu</td>
        </tr>
        <tr class="center">
            <td>Opening Ceremony</td>
            <td style="width: 30%;">20 September 2022</td>
            <td style="width: 30%;">Pukul 07:00 WIB</td>
        </tr>
        <tr class="center">
            <td>Closing Ceremony</td>
            <td>23 September 2022</td>
            <td>Pukul 15:00 WIB</td>
        </tr>
    </table>

    <p>Jadwal Kelas limited seats kelompokmu:</p>
    <table>
        <tr class="center">
            <td style="width: 20%;">Jadwal</td>
            <td colspan="2" style="width: 25%;">Daebak 대박</td>
            <td colspan="2" style="width: 25%;">Employee vs Entrepreneur</td>
            <td colspan="2" style="width: 25%;">Cantik Tulus</td>

        </tr>
        <tr class="center">
            <td>Hari / Tanggal</td>
            <td>{{$daebak_tgl}}</td>
            <td>{{$daebak_jam}}</td>
            <td>{{$gee_tgl}}</td>
            <td>{{$gee_jam}}</td>
            <td>{{$wardah_tgl}}</td>
            <td>{{$wardah_jam}}</td>
        </tr>
        <tr class="center">
            <td>Ruangan</td>
            <td colspan="6">R. 0412</td>
        </tr>

    </table>

    <p>
        Poster 31 Fun Activites : https://bit.ly/funActivitiesWB2C </br>
        Informasi lainnya : https://bit.ly/WB2CBekasi

    </p>
    <p>See ya’ll soon</p>

</body>

</html>