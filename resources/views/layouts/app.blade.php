@extends('index')


@section('konten')
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
@livewireStyles
<!-- Scripts -->
<script src="{{ mix('js/app.js') }}" defer></script>
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

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <div class="min-h-screen bg-gray-100">
                        <main>
                            {{ $slot }}
                        </main>
                    </div>

                </div>
            </div><!-- End Left side columns -->
        </div>
    </section>

</main><!-- End #main -->
<script src="/assets/js/jquery-3.5.1.js"></script>
@livewireScripts
@endsection