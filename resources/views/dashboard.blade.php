@extends('index')


@section('konten')
<style>
    #pageloader {
        background: rgba(255, 255, 255, 0.8);
        display: none;
        height: 100%;
        top: 0;
        position: fixed;
        width: 100%;
        z-index: 9999;
    }

    #pageloader img {
        left: 50%;
        margin-left: -32px;
        margin-top: -32px;
        position: absolute;
        top: 50%;
    }
</style>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    <form action="/dashboard" id="form-import" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Input File Excel</label>

                            <div class="input-group">
                                <input id="file" type="file" name="file" class="form-control">
                                <span class="input-group-btn">
                                    <input type="button" class="btn btn-primary" id="import" value="Import">
                                </span>
                            </div>
                        </div>
                    </form>
                    <div class=" mb-3" style="width: fit-content;">
                        <a class="btn btn-primary" href="{{ Storage::url('import.xlsx') }}">Download Template
                            Excel</a>
                    </div>
                    <div class="mb-3" style="width: fit-content;">
                        <form action="/clear" id="form-clear" method="post" enctype="multipart/form-data">
                            @csrf
                            @forelse ($mahasiswa as $datamaha)
                            <input type="text" name="mahasiswa[]" value="{{ $datamaha->id }}" hidden>
                            @empty
                            <input type="text" name="mahasiswa[]" value="" hidden>
                            @endforelse
                            <button id="clear" class="btn btn-danger">Clear Data</button>
                        </form>
                    </div>

                    <div class="col-12">
                        <div class="card ">
                            <div class="card-body ">
                                <div class="d-grid gap-2 mt-3">
                                    <button id="generate" class="btn btn-primary" type="button">Generate</button>
                                    <div class="modal fade" id="basicModal" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Send Email</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="/blash" id="form-add" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="template_id">Template PDF</label>
                                                            <select class="form-control" name="template_id" id="template_id">
                                                                @forelse ($template as $template)
                                                                <option value="#" selected="selected">--PILIH--
                                                                </option>
                                                                <option value="{{ $template->id }}">
                                                                    {{ $template->template }}
                                                                </option>
                                                                @empty
                                                                <option value="#" selected="selected">--PILIH--
                                                                </option>
                                                                @endforelse
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="hal">Hal Surat</label>
                                                            <input type="text" class="form-control" name="hal" id="hal" placeholder="Peringatan Pembayaran">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="semester">Tahun Ajaran</label>
                                                            <input type="text" class="form-control" name="semester" id="semester" placeholder="2019/2020">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="date_bayar">Tanggal Pembayaran</label>
                                                            <input type="text" class="form-control" name="date_bayar" id="date_bayar" placeholder="22/01/2022">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="norek_id">Rekening pembayaran</label>
                                                            <select class="form-control" name="norek_id" id="norek_id">
                                                                @forelse ($rekening as $rekening)
                                                                <option value="#" selected="selected">--PILIH--
                                                                </option>
                                                                <option value="{{ $rekening->id }}">
                                                                    {{ $rekening->nama_rek }}
                                                                </option>
                                                                @empty
                                                                <option value="#" selected="selected">--PILIH--
                                                                </option>
                                                                @endforelse
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="kemahasiswaan_id">Layanan Kemahasiswaan</label>
                                                            <select class="form-control" name="kemahasiswaan_id" id="kemahasiswaan_id">
                                                                @forelse ($kemahasiswaan as $kemahasiswaan)
                                                                <option value="#" selected="selected">--PILIH--
                                                                </option>
                                                                <option value="{{ $kemahasiswaan->id }}">
                                                                    {{ $kemahasiswaan->nama }}
                                                                </option>
                                                                @empty
                                                                <option value="#" selected="selected">--PILIH--
                                                                </option>
                                                                @endforelse
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            @forelse ($mahasiswa as $datamaha)
                                                            <input type="text" name="mahasiswa[]" value="{{ $datamaha->id }}" hidden>
                                                            @empty
                                                            <input type="text" name="mahasiswa[]" value="" hidden>
                                                            @endforelse
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class=" modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button id="send" class="btn btn-primary">Send</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Recent Status <span>| Today</span></h5>

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">NIM</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Total Tunggakan</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no = 0;
                                        @endphp
                                        @forelse ($mahasiswa as $mahasiswa)
                                        <tr>
                                            <th scope="row">{{ ++$no }}</th>
                                            <td>{{ $mahasiswa->nim }}</td>
                                            <td>{{ $mahasiswa->nama }}</td>
                                            <td>{{ $mahasiswa->email }}</td>
                                            <td>{{ $mahasiswa->total }}</td>
                                            <td>{{ $mahasiswa->total }}</td>
                                        </tr>
                                        @empty
                                        <td colspan="6" class="table-active text-center">Data Empty</td>
                                        @endforelse
                                    </tbody>
                                </table>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </nav>

                            </div>

                        </div>
                    </div><!-- End Recent Sales -->



                </div>
            </div><!-- End Left side columns -->
        </div>
    </section>

</main><!-- End #main -->
<script src="assets/js/jquery-3.5.1.js"></script>
<script>
    $(document).on('click', '#generate', function() {
        //console.log($('#file').val());
        var mahasiswa = '{{ $mahasiswa }}';
        //console.log(mahasiswa.length);
        if (mahasiswa.length > 2) {
            $('#basicModal').modal('show');
            // alert('Import Data Terlebih Dahulu bro');
        } else {
            alert('Import Data Terlebih Dahulu');
        }
    })

    $(document).on('click', '#send', function() {
        var frm = document.getElementById("form-add");
        if (confirm('Yakin akan mengirim email ini?')) {
            // alert("Thank you for subscribing!" + $(this).data('id') );
            frm.submit();
            frm.reset();
            $("#pageloader").fadeIn();

        } else {
            $('#basicModal').modal('hide');
            frm.reset();
            return false;
        }
    });
    $(document).on('click', '#import', function() {
        var frm = document.getElementById("form-import");
        if (document.getElementById("file").files.length == 0) {
            alert("Silahkan Pilih File Terlebih dahulu!");

        } else {
            frm.submit();
            frm.reset();
        }
    });

    $(document).on('click', '#clear', function() {
        var mahasiswa = '{{ $mahasiswa }}';
        //console.log(mahasiswa.length);
        if (mahasiswa.length > 2) {
            var frm = document.getElementById("form-clear");
            if (confirm('Yakin akan menghapus semua data?')) {
                // alert("Thank you for subscribing!" + $(this).data('id') );
                frm.submit();
                frm.reset();
            } else {
                return false;
            }
        } else {
            alert('Data Kosong');
            return false;
        }

    });
</script>
@endsection