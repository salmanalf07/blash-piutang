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
      max-width: 800px;
      width: 100% !important;
      /* position: relative; */
      position: absolute;
      left: 0px;
      top: 0px;
      z-index: -1;
      /* border: 1px solid red; */
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
      top: 200px;
      left: 158px;
      width: 600px;
      font-size: 10pt;
      padding: 2px;
      /* border: 1px solid black; */
      text-align: justify;
    }

    .no .col1 {
      width: 1% !important;
    }

    .no .col2 {
      width: 2% !important;
    }

    .no .col3 {
      width: 15% !important;
    }

    .no .col4 {
      width: 15% !important;
    }

    .no .col5 {
      width: 30% !important;
    }

    .veralig-top {
      vertical-align: top;
    }

    .bold {
      font-weight: bold;
    }
  </style>


</head>

<body>
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



  <div class="pdf">
    <img class="img-pdf" src="{{$pic}}">
    <div class="content">
      <table class="no">
        <tbody>
          <tr>
            <td class="col1"></td>
            <td class="col2"></td>
            <td class="col3"></td>
            <td class="col4"></td>
            <td class="col5"></td>
          </tr>
          <tr>
            <td colspan="5" class="bold">Dear {{$data->mahasiswa}},</td>
          </tr>
          <tr>
            <td colspan="5" style="height: 10px"></td>
          </tr>
          <tr>
            <td colspan="5">Kami informasikan bahwa status perkuliahan kamu saat ini adalah <b>Cuti Tidak Resmi.</b> Berikut adalah tagihan Semester {{$semester}} {{$data->semester}} yang belum lunas dan harus dipenuhi agar kamu dapat ter-registrasi aktif dan mendapatkan jadwal perkuliahan.</td>
          </tr>
          <tr>
            <td colspan="5" style="height: 10px"></td>
          </tr>
          <tr>
            <td colspan="5" class="bold">Semester {{$semester}} {{$data->semester}}</td>
          </tr>
          <tr>
            <td colspan="5" style="height: 10px"></td>
          </tr>
          @if($data->bp3 != null)
          <tr>
            <td></td>
            <td>*</td>
            <td>Biaya BP3</td>
            <td>Rp. {{number_format($data->bp3, 0, ',', '.')}}</td>
            <td>(Jatuh tempo {{getRomawi($data->bp3_tempo)}})</td>
          </tr>
          @endif
          @if($data->sks != null)
          <tr>
            <td></td>
            <td>*</td>
            <td>Biaya Full SKS</td>
            <td>Rp. {{number_format($data->sks, 0, ',', '.')}}</td>
            <td>(Jatuh tempo {{getRomawi($data->sks_tempo)}})</td>
          </tr>
          @endif
          <tr>
            <td colspan="5">
              <hr>
            </td>
          </tr>
          <tr class="bold">
            <td></td>
            <td>*</td>
            <td>Total</td>
            <td colspan="2">Rp. {{number_format($data->total_tunggakan, 0, ',', '.')}}</td>
          </tr>
          @if($data->sks != null)
          <tr>
            <td colspan="5" style="height: 10px"></td>
          </tr>
          <tr>
            <td colspan="5">* Biaya Full SKS terdiri dari {{$data->jumlah_sks}} SKS Enrichment x Rp. {{number_format($data->harga_sks, 0, ',', '.')}} (Harga per SKS)</td>
          </tr>
          @endif
          <tr>
            <td colspan="5" style="height: 10px"></td>
          </tr>
          <tr>
            <td colspan="5">Mahasiswa dapat aktif kembali dan mendapatkan jadwal mata kuliah jika mahasiswa sudah melunasi tagihan @if($data->bp3 != null)BP3 @endif @if($data->sks != null && $data->bp3 != null)dan @endif @if($data->sks != null)SKS @endif. Mohon untuk segera melakukan pembayaran dengan cara transfer manual melalui prosedur terlampir. Harap sesuaikan no. pelanggan dengan format NIM + Kode bayar.</td>
          </tr>
          <tr>
            <td colspan="5">Contoh :</td>
          </tr>
          @if($data->bp3 != null)
          <tr>
            <td></td>
            <td>*</td>
            <td colspan="3">NIM : {{$data->nim}}, Kode bayar BP3 : 21 maka format yang tepat : <b>{{$data->nim}}21</b></td>
          </tr>
          @endif
          @if($data->sks != null)
          <tr>
            <td></td>
            <td>*</td>
            <td colspan="3">NIM : {{$data->nim}}, Kode bayar SKS : 22 maka format yang tepat : <b>{{$data->nim}}22</b></td>
          </tr>
          @endif
          <tr>
            <td colspan="5">Lampirkan bukti pembayaran dengan membalas Email ini, kami tunggu selambatnya pada <b>tanggal {{getRomawi($data->tgl_konfirm)}}.</b></td>
          </tr>
          <tr>
            <td colspan="5" style="height: 10px"></td>
          </tr>
          @if($data->i_tambahan != null)
          <tr>
            <td colspan="5">{{$data->i_tambahan}}</td>
          </tr>
          @endif
          <tr>
            <td colspan="5" style="height: 10px"></td>
          </tr>
          <tr>
            <td colspan="5">Jika terdapat pertanyaan lebih lanjut, silakan menghubungi WhatsApp Student Services : 0821-3008-5900 atau melalui Zoom Layanan di link: <a href="https://binus.zoom.us/j/9842369396">https://binus.zoom.us/j/9842369396</a> (Meeting ID: 984 236 9396) dengan username : NIM - NAMA.</td>
          </tr>
          <tr>
            <td colspan="5" style="height: 10px"></td>
          </tr>
          <tr>
            <td colspan="5">Demikian informasi ini kami sampaikan. Atas perhatiannya kami ucapkan terima kasih.</td>
          </tr>
          <tr>
            <td colspan="5" style="height: 10px"></td>
          </tr>
          <tr>
            <td colspan="5">Best Regards,</td>
          </tr>
          <tr>
            <td colspan="5" style="height: 10px"></td>
          </tr>
          <tr>
            <td colspan="5">Student Services</td>
          </tr>
          <tr>
            <td colspan="5">BINUS@Bekasi Campus</td>
          </tr>
        </tbody>
      </table>
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