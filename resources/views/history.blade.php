@extends('index')


@section('konten')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>History</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">History</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">


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
                      <th scope="col">Price</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <!-- <tbody>
                    <tr>
                      <th scope="row"><a href="#">1</a></th>
                      <td>20230981921</td>
                      <td>Brandon Jacob</td>
                      <td><a href="#" class="text-primary">At praesentium minu</a></td>
                      <td>$64</td>
                      <td><span class="badge bg-success">Success</span></td>
                    </tr>
                    <tr>
                      <th scope="row"><a href="#">1</a></th>
                      <td>20230981921</td>
                      <td>Brandon Jacob</td>
                      <td><a href="#" class="text-primary">At praesentium minu</a></td>
                      <td>$64</td>
                      <td><span class="badge bg-danger">Failed</span></td>
                    </tr>
                    <tr>
                      <th scope="row"><a href="#">1</a></th>
                      <td>20230981921</td>
                      <td>Brandon Jacob</td>
                      <td><a href="#" class="text-primary">At praesentium minu</a></td>
                      <td>$64</td>
                      <td><span class="badge bg-success">Approved</span></td>
                    </tr>
                    <tr>
                      <th scope="row"><a href="#">1</a></th>
                      <td>20230981921</td>
                      <td>Brandon Jacob</td>
                      <td><a href="#" class="text-primary">At praesentium minu</a></td>
                      <td>$64</td>
                      <td><span class="badge bg-success">Approved</span></td>
                    </tr>
                    <tr>
                      <th scope="row"><a href="#">1</a></th>
                      <td>20230981921</td>
                      <td>Brandon Jacob</td>
                      <td><a href="#" class="text-primary">At praesentium minu</a></td>
                      <td>$64</td>
                      <td><span class="badge bg-danger">Failed</span></td>
                    </tr>
                    <tr>
                      <th scope="row"><a href="#">1</a></th>
                      <td>20230981921</td>
                      <td>Brandon Jacob</td>
                      <td><a href="#" class="text-primary">At praesentium minu</a></td>
                      <td>$64</td>
                      <td><span class="badge bg-success">Approved</span></td>
                    </tr>


                  </tbody> -->
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
                      <td><span class="badge bg-success">Success</span></td>
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

      <!-- Right side columns -->
      <div class="col-lg-4">




      </div><!-- End Right side columns -->

    </div>
  </section>

</main><!-- End #main -->
@endsection