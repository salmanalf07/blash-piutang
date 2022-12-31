<x-guest-layout>
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                    <div class="card mb-3">

                        <div class="card-body">
                            <div class="row  pb-2">
                                <div class=" col-2">

                                    <img src="assets/img/ribbon.svg" alt="">
                                </div>
                                <div class=" col-10">

                                    <h5 class="card-title text-center pb-0 fs-5">Login to Your Account</h5>
                                    <!-- <p class="text-center small ">Enter your username email & password</p> -->
                                </div>
                            </div>
                            <hR style="height:0.1px;border:none;color:#333;background-color:#333;">
                            </hR>
                            <x-slot name="logo">
                                <!-- <x-jet-authentication-card-logo /> -->
                            </x-slot>

                            <x-jet-validation-errors class="mb-4" />

                            @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                            @endif
                            <form class=" row g-3 needs-validation" method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="col-12">
                                    <x-jet-label class="form-label" for="email" value="{{ __('Username') }}" />

                                    <div class="input-group">
                                        <x-jet-input id="email" class="form-control" type="text" name="email" :value="old('email')" required autofocus />
                                        <span class="input-group-text" id="basic-addon2">@binus.edu</span>
                                        <div class="invalid-feedback">Please enter your username</div>
                                    </div>


                                </div>

                                <div class="col-12">
                                    <x-jet-label for="password" class="form-label" value="{{ __('Password') }}" />
                                    <x-jet-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                                    <div class="invalid-feedback">Please enter your password!</div>
                                </div>
                                <x-jet-button class="col-12">
                                    {{ __('Log in') }}
                                </x-jet-button>
                                <div class="col-12">
                                    <p class="small mb-0">Don't have account? <a href="/register">Create an account</a></p>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>