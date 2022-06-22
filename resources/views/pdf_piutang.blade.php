<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PDF</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
    @page {
      margin: 0px;
    }

    body {
      margin: 0px;
      color: black;
    }

    .pdf .img-pdf {
      /* max-width: 500px; */
      width: 100% !important;
      /* position: relative; */
      position: absolute;
      left: 0px;
      top: 0px;
      z-index: -1;
    }

    .pdf .fm {
      position: absolute;
      top: 125px;
      left: 590px;
      line-height: 35px;
      /* width: 500px; */
      font-size: 8pt;
      /* border: 1px solid black; */
      width: 200px;
    }

    .pdf .no {
      position: absolute;
      top: 178px;
      left: 158px;
      width: 300px;
      font-size: 8pt;
      /* border: 1px solid black; */
    }

    .pdf .col1 {
      width: 20% !important;
    }

    .pdf .col2 {
      width: 20% !important;
    }

    .pdf .col3 {
      width: 15% !important;
    }

    .pdf .yth {
      padding-top: 21px;
    }

    .pdf .nama {
      padding-top: 9px;
    }

    .pdf .nim {
      padding-top: 7px;
    }

    .pdf .hal {
      padding-top: 11px;
    }

    .pembukaan {
      position: absolute;
      top: 345px;
      left: 158px;
      width: 550px;
      font-size: 8pt;
      /* border: 1px solid black; */
    }

    .jatuhtempo {
      position: relative;
      top: 383px;
      left: 158px;
      width: 550px;
      font-size: 8pt;
      line-height: 20px;
      border: 1px solid black;
    }

    .jatuhtempo .col1 {
      width: 145px;
    }

    .jatuhtempo .col2 {
      width: 239px;
    }

    .jatuhtempo .col3 {
      width: 260px;
    }

    .isi {
      position: relative;
      top: 390px;
      left: 158px;
      width: 550px;
      font-size: 8pt;
      /* line-height: 36px; */
      /* .saty */
    }

    .isi .surat {
      position: absolute;
      color: black;
      top: 46px;
      line-height: 15px;
      text-align: justify;
    }

    .penutup {
      position: relative;
      top: 530px;
      left: 158px;
      width: 550px;
      font-size: 8pt;
      /* line-height: 36px; */
      /* border: 1px solid red; */
    }


    .ttda {
      position: relative;
      top: 520px;
      left: 158px;
      width: 550px;
      font-size: 8pt;
      /* line-height: 36px;  */
      /* border: 1px solid red; */
    }


    .ttd-img {
      position: absolute;
      top: 730px;
      left: 158px;
      width: 550px;
      font-size: 8pt;
    }

    .ttd-nama {
      position: absolute;
      top: 800px;
      left: 158px;
      width: 550px;
      font-size: 10pt;
      font-weight: bold;
    }

    .ttd-title {
      position: absolute;
      top: 825px;
      left: 158px;
      width: 550px;
      font-size: 8pt;
      font-weight: bold;
    }

    .ttd-jam {
      position: absolute;
      top: 840px;
      left: 158px;
      width: 550px;
      font-size: 8pt;
    }

    .ttd-user {
      position: absolute;
      top: 855px;
      left: 158px;
      width: 550px;
      font-size: 8pt;
    }

    @media print {

      .pdf .no {
        top: 250px;
        left: 227px;
      }

      .pdf .nomor {
        top: 280px;
        left: 160px;
      }

      .pdf .yth {
        padding-top: 35px;
      }

      .pdf .nim {
        padding-top: 5px;
      }

      .pdf .hal {
        padding-top: 10px;
      }

      .pdf .fm {
        top: 210px;
        left: 800px;
        border: 1px solid black;
      }

      /* content{ width: 780px;} */
      .pembukaan {
        top: 505px;
        left: 227px;
        /* width: 780px; */
        font-size: 16px;
        border: none;
      }

      .jatuhtempo {
        position: absolute;
        top: 545px;
        left: 227px;
        /* width: 780px; */
        font-size: 16px;
        line-height: 36px;
        border: none;
      }

      .jatuhtempo .col1 {
        width: 155px;
      }

      .jatuhtempo .col2 {
        width: 205px;
      }

      .jatuhtempo .col3 {
        width: 230px;
      }

      .isi {
        top: 645px;
        left: 227px;
        max-width: 780px;
        font-size: 16px;
        /* line-height: 36px; */
        border: none;
      }

      .penutup {
        top: 990px;
        left: 227px;
        max-width: 780px;
        font-size: 16px;
        border: 1px solid red;
      }

      .ttda {
        position: absolute;
        top: 1065px;
        left: 227px;
        width: 870px;
        font-size: 16px;
        /* line-height: 36px;  */
        border: 1px solid red;
      }


      .ttd-img {
        position: absolute;
        top: 1085px;
        left: 227px;
        width: 160px;
        height: 80px;
      }

      .ttd-nama {
        position: absolute;
        top: 1160px;
        left: 227px;
        width: 870px;
        font-size: 18px;
        font-weight: bold;
      }

      .ttd-title {
        position: absolute;
        top: 1183px;
        left: 227px;
        width: 870px;
        font-size: 18px;
        font-weight: bold;
      }

      .ttd-jam {
        position: absolute;
        top: 1215px;
        /* left: 227px; */
        width: 870px;
        font-size: 10px;
      }

      .ttd-user {
        position: absolute;
        top: 1230px;
        left: 227px;
        width: 870px;
        font-size: 10px;
        border: 1px solid blue;
      }

      /* .ttd-s{
  position: absolute;
  top: 1230px;
  left: 227px;
  width: 870px;
  font-size:10px;
} */
    }
  </style>


</head>

<body>
  <div class="pdf">
    <img class="img-pdf" src="{{$pic}}">
    <div class="content">
      <table class="no">
        <colgroup>
          <col span="1" class="col1">
          <col span="1" class="col2">
          <col span="1" class="col3">
        </colgroup>
        <tbody>
          <tr>
            <td class="no-acc">No</td>
            <td>: {{$data->no_surat}}/Mgr.SSC-KG/{{$romawi}}/{{date("Y", time())}}</td>
          </tr>
          <tr>
            <td class="yth" colspan="2">Kepada Yth,</td>
          </tr>
          <tr>
            <td class="nama">Nama</td>
            <td class="nama">: {{$data->nama}}</td>
          </tr>
          <tr>

            <td class="nim">No. Test - NIM</td>
            <td class="nim">: {{$data->no_formulir}} - {{$data->nim}} / SI</td>
          </tr>
          <tr>

            <td colspan="1"></td>
            <td>ABN 06 - ABN012</td>
          </tr>
          <tr>
            <td class="hal">Hal</td>
            <td class="hal">: {{$data->surat['hal']}}</td>
          </tr>
        </tbody>
      </table>
      <div class="fm" style="text-align: end;">
        <p>FM-BINUS-AP-FAK-21/R0</p>
        <p style="margin-top: -30px;">Jakarta, {{date('d F Y', strtotime($data->surat['date_send']) )}}</p>
      </div>
      <p class="pembukaan">Dengan ini kami informasikan bahwa pembayaran Saudara/i seperti yang tertera dibawah ini telah jatuh tempo: </p>
      <table class="jatuhtempo">
        <colgroup>
          <col span="1" class="col1">
          <col span="1" class="col2">
          <col span="1" class="col3">
          <!-- <col span="1" style="width: 65px">
          <col span="1" style="width: 100px">
          <col span="1" style="width: 115px "> -->
        </colgroup>
        <tbody>
          <tr>
            <td class="no-acc">Pembayaran</td>
            <td>No. BSB</td>
            <td>Tanggal Jatuh Tempo</td>
            <td>Jumlah</td>
          </tr>
          @if ($data->bp3 != 0)
          <tr>
            <td>BP3</td>
            <td></td>
            <td>{{date('d F Y', strtotime($data->bp3_tempo))}}</td>
            <td>Rp. {{number_format($data->bp3, 0, '.', ',')}}</td>
          </tr>
          @endif
          @if ($data->sks != 0)
          <tr>
            <td>SKS</td>
            <td></td>
            <td>{{date('d F Y', strtotime($data->sks_tempo))}}</td>
            <td>Rp. {{number_format($data->sks, 0, '.', ',')}}</td>
          </tr>
          @endif
          @if ($data->lab != 0)
          <tr>
            <td>LAB</td>
            <td></td>
            <td>{{date('d F Y', strtotime($data->lab_tempo))}}</td>
            <td>Rp. {{number_format($data->lab, 0, '.', ',')}}</td>
          </tr>
          @endif
          @if ($data->uniform != 0)
          <tr>
            <td>UNIFORM</td>
            <td></td>
            <td>{{date('d F Y', strtotime($data->uniform_tempo))}}</td>
            <td>Rp. {{number_format($data->uniform, 0, '.', ',')}}</td>
          </tr>
          @endif
          @if ($data->alat != 0)
          <tr>
            <td>ALAT</td>
            <td></td>
            <td>{{date('d F Y', strtotime($data->alat_tempo))}}</td>
            <td>Rp. {{number_format($data->alat, 0, '.', ',')}}</td>
          </tr>
          @endif
          @if ($data->dp31 != 0)
          <tr>
            <td>DP31</td>
            <td></td>
            <td>{{date('d F Y', strtotime($data->dp31_tempo))}}</td>
            <td>Rp. {{number_format($data->dp31, 0, '.', ',')}}</td>
          </tr>
          @endif
          @if ($data->dp32 != 0)
          <tr>
            <td>DP32</td>
            <td></td>
            <td>{{date('d F Y', strtotime($data->dp32_tempo))}}</td>
            <td>Rp. {{number_format($data->dp32, 0, '.', ',')}}</td>
          </tr>
          @endif
          <tr>
            <td style="padding-top: 8px;" class="no-acc">Pembayaran</td>
            <td style="padding-top: 8px;">No. BSB</td>
            <td style="padding-top: 8px;">Tanggal Jatuh Tempo</td>
            <td style="padding-top: 8px;">Jumlah</td>
          </tr>
        </tbody>

      </table>
      <div class="isi">
        <p>Diharapkan pembayaran di atas dapat segera Saudara/i lunasi paling lambat tanggal {{date('d F Y', strtotime($data->surat['date_bayar']))}}</p>
        <p>Saudara/i sampai saat ini masih belum membuka rekening autodebet</p>
        <p class="surat">Kami memberikan kesempatan untuk membuka rekening Autodebet sesuai BCA cabang kampus saudara/i paling lambat tanggal 26 Juli 2019. Apabila Saudara/i telah melunasi pembayaran sesuai lokasi kampus Saudara/i. Apabila Saudara/i belum melunasi pembayaran di atas, mohon agat Saudara/i dapat langsung membayar via ATM/Setoran tunai ke rekening {{$data->surat->norek['bank']}} dengan nomor {{$data->surat->norek['no_rek']}} atas nama {{$data->surat->norek['nama_rek']}} dan segera melaporkan bukti pembayaran tersebut paling lambat tanggal {{date('d F Y', strtotime($data->surat['date_bayar']))}}. Apabila sampai dengan batas waktu di atas Saudara/i masih belum memenuhi kewajiban tersebut, maka dengan sangat terpalsa kami tidak dapat mengizinkan Saudara/i untuk mengikuti perkuliahan semester Ganjil {{$data->surat['semester']}}. Apabula Saudara/i telah membayar dan melaporkan bukti pembayaran, maka surat peringatan pembayaran ini dapat diabaikan. Untuk pembayaran berikutnya dilakukan memlaluiAutodebet dari rekening Autodebet Saudara/i. Bila ada hal yang ingin ditanyakan, Saudara/i dapat menghubungi Layanan Keuangan Mahasiswa dengan no telp. {{$data->surat->kemahasiswaan['no_phone']}} ext. {{$data->surat->kemahasiswaan['ext']}}</p>
      </div>
      <p class="penutup">Atas perhatian kami ucapkan terima kasih</p>
      <p class="ttda">Hormat kami,</p>
      <img class="ttd-img" src="" alt="">
      <p class="ttd-nama">Rita kusumasari</p>
      <p class="ttd-title">Student Service Center</p>
      <p class="ttd-jam">Jam Cetak : {{date("H:i:s", time())}}</p>
      <p class="ttd-user">USER ID : </p>
      <!-- <br> USER ID : -->
    </div>


  </div>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>