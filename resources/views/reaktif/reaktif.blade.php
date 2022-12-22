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
      top: 220px;
      left: 158px;
      width: 600px;
      font-size: 10pt;
      padding: 2px;
      /* border: 1px solid black; */
      text-align: justify;
    }

    .no .col1 {
      width: 2% !important;
    }

    .no .col2 {
      width: 3% !important;
    }

    .no .col3 {
      width: 70% !important;
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
          </tr>
          <tr>
            <td colspan="3">Dear Binusian,</td>
          </tr>
          <tr>
            <td colspan="3" style="height: 20px;"></td>
          </tr>
          <tr>
            <td colspan="3">Bagi Binusian yang saat ini status perkuliahannya <b>CUTI TIDAK RESMI</b> dan ingin aktif kembali di perkuliahan Semester {{$data->semester}}, masih ada kesempatan untuk mengajukan proses <b>REAKTIF</b>.</td>
          </tr>
          <tr>
            <td colspan="3">Prosedur Reaktif adalah sebagai berikut:</td>
          </tr>
          <tr>
            <td colspan="3" style="height: 5px;"></td>
          </tr>
          <tr>
            <td></td>
            <td class="veralig-top">1.</td>
            <td>Silakan isi formulir reaktif (terlampir).</td>
          </tr>
          <tr>
            <td></td>
            <td class="veralig-top">2.</td>
            <td>Mengirimkan hasil scan formulir reaktif yang sudah diisi ke Student Advisory & Support Center (SASC) melalui email <a style="font-style:italic ;" href="mailto:sasc.bekasi@binus.edu">sasc.bekasi@binus.edu</a> serta cc: <a style="font-style:italic ;" href="mailto:studentservices_bekasi@binus.edu">studentservices_bekasi@binus.edu</a>.</td>
          </tr>
          <tr>
            <td></td>
            <td class="veralig-top">3.</td>
            <td>Mahasiswa diwajibkan melakukan janji temu konsultasi dengan pihak SASC/Konselor di nomor Whatsapp Konseling: 089530525282.</td>
          </tr>
          <tr>
            <td></td>
            <td class="veralig-top">4.</td>
            <td>Student Services Center (SSC) akan melanjutkan proses pembayaran Reaktif apabila seluruh proses administratif telah selesai.</td>
          </tr>
          <tr>
            <td></td>
            <td class="veralig-top">5.</td>
            <td>Pada periode cuti tidak resmi, Mahasiswa tetap wajib membayarkan Biaya BP3, Biaya Daftar Ulang (jika ada) dan Biaya Lab (jika ada), serta Biaya Semester pada periode Reaktif kembali secara penuh <i>(full payment)</i>. Informasi terkait rincian pembayaran akan kami info setelah proses dari Student Advisory & Support Center (SASC) selesai.</td>
          </tr>
          <!-- @if($data->i_tambahan != null)
          <tr>
            <td></td>
            <td class="veralig-top">4.</td>
            <td><?php echo $data->i_tambahan ?></td>
          </tr>
          @endif -->
          <tr>
            <td colspan="3" style="height:10px"></td>
          </tr>
          <tr>
            <td colspan="3" class="bold">*Batas pengajuan form reaktif selambatnya <b style="color: red;"><?php echo getRomawi($data->tgl_batas) ?></b>.</td>
          </tr>
          <tr>
            <td colspan="3" style="height:20px"></td>
          </tr>
          <tr>
            <td colspan="3">Apabila terdapat pertanyaan lebih lanjut dapat menghubungi Student Services Center BINUS @Bekasi melalui Channel di bawah ini.</td>
          </tr>
          <tr>
            <td colspan="3" style="height:10px"></td>
          </tr>
          <tr>
            <td colspan="3">Email: <a style="font-style:italic ;" href="mailto:studentservices_bekasi@binus.edu">studentservices_bekasi@binus.edu</a></td>
          </tr>
          <tr>
            <td colspan="3" style="height:10px"></td>
          </tr>
          <tr>
            <td colspan="3">Zoom: <a style="font-style:italic ;" href="https://binus.zoom.us/j/9842369396">https://binus.zoom.us/j/9842369396</a> (Meeting ID: 984 236 9396) Dengan Username: NIM - NAMA</td>
          </tr>
          <tr>
            <td colspan="3" style="height:10px"></td>
          </tr>
          <tr>
            <td colspan="3" class="bold">Operational Hours:</td>
          </tr>
          <tr>
            <td colspan="3" style="height:10px"></td>
          </tr>
          <tr>
            <td colspan="3">Senin – Jumat >> 07:00 – 18:00 WIB</td>
          </tr>
          <tr>
            <td colspan="3" style="height:10px"></td>
          </tr>
          <tr>
            <td colspan="3">Sabtu >> 07:00 – 15:00 WIB</td>
          </tr>
          <tr>
            <td colspan="3" style="height:20px"></td>
          </tr>
          <tr>
            <td colspan="3">Terima kasih.</td>
          </tr>
          <tr>
            <td colspan="3" style="height:20px"></td>
          </tr>
          <tr>
            <td colspan="3">Best Regards,</td>
          </tr>
          <tr>
            <td colspan="3">Student Services BINUS@Bekasi</td>
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