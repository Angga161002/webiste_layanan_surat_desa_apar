@extends('layouts.apppendudukforgotpassword')
@section('extrahead')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/views/login.css') }}">
    <style>
        .password-toggle {
            position: relative;
        }

        .password-toggle__icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            user-select: none;
            z-index: 1;
        }
    </style>
@endsection
@section('content')
    <div id="preloader"></div>
    <div id="page-container" class="main-content-boxed">
        <main id="main-container">
            <div class="row mx-0">
                <div class="d-flex hero-static col-md-6 col-xl-4 align-items-center bg-default-grey invisible px-0"
                    data-toggle="appear" data-class="animated fadeInRight">
                    <div class="content content-full content-login" style="height: auto">
                        <div class="logo-sm d-flex section-text-login" style="margin-bottom: 16px;">
                            <img src="{{ asset('kota-pariaman.png') }}" alt="Kota Pariaman" style="width: 40px">
                        </div>
                        <form class="js-validation-signin signIn">
                            <div class="section-text-login">
                                <h4>Lupa Password Anda?</h4>
                                <p>Jangan Khawatir! Silakan Isi Form Dan Klik Submit.</p>
                            </div>

                            {{ csrf_field() }}
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="form-custom-border">
                                        <label class="label-title" for="nik">NIK</label>

                                        <input type="nik" name="nik" id="nik" class="form-control"
                                            value="" placeholder="Masukan NIK" autocomplete="nik">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="form-custom-border">
                                        <label class="label-title" for="nama">Nama</label>

                                        <input type="nama" name="nama" id="nama" class="form-control"
                                            value="" placeholder="Masukan Nama" autocomplete="nama">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <button type="submit" class="btn btn-primary-dark w-100" onclick="redirectToWhatsApp()">
                            Submit
                        </button>
                        <!-- END Sign In Form -->
                    </div>
                </div>
                <div class="d-flex hero-static col-md-6 col-xl-8 bg-white d-none d-md-flex align-items-center text-center px-0"
                    data-toggle="appear" data-class="animated fadeInRight">

                    <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="section-title">
                                    <h3 class="login-title">
                                        Mudah memanajemen pengajuan surat kepada pegawai desa apar
                                    </h3>
                                </div>
                                <div class="section-content">
                                    <p class="login-content">
                                        Dengan sistem yang efisien dan terintegrasi, proses pengajuan surat kepada pegawai
                                        desa apar menjadi lebih efektif dan transparan.
                                    </p>
                                </div>

                                <div class="section-img">
                                    <img src="{{ asset('assets/media/photos/logo_login_1.svg') }}" alt="First slide">
                                </div>
                            </div>


                            <div class="carousel-item">
                                <div class="section-title">
                                    <h3 class="login-title">
                                        Mudah memanajemen pengajuan surat kepada pegawai desa apar
                                    </h3>
                                </div>
                                <div class="section-content">
                                    <p class="login-content">
                                        Dengan sistem yang efisien dan terintegrasi, proses pengajuan surat kepada pegawai
                                        desa apar menjadi lebih efektif dan transparan.
                                    </p>
                                </div>

                                <div class="section-img">
                                    <img src="{{ asset('assets/media/photos/logo_login_1.svg') }}" alt="Second slide">
                                </div>
                            </div>


                            <div class="carousel-item">
                                <div class="section-title">
                                    <h3 class="login-title">
                                        Mudah memanajemen pengajuan surat kepada pegawai desa apar
                                    </h3>
                                </div>
                                <div class="section-content">
                                    <p class="login-content">
                                        Dengan sistem yang efisien dan terintegrasi, proses pengajuan surat kepada pegawai
                                        desa apar menjadi lebih efektif dan transparan.
                                    </p>
                                </div>

                                <div class="section-img">
                                    <img src="{{ asset('assets/media/photos/logo_login_1.svg') }}" alt="Third slide">
                                </div>
                            </div>


                            <div class="carousel-item">
                                <div class="section-title">
                                    <h3 class="login-title">
                                        Mudah memanajemen pengajuan surat kepada pegawai desa apar
                                    </h3>
                                </div>
                                <div class="section-content">
                                    <p class="login-content">
                                        Dengan sistem yang efisien dan terintegrasi, proses pengajuan surat kepada pegawai
                                        desa apar menjadi lebih efektif dan transparan.
                                    </p>
                                </div>

                                <div class="section-img">
                                    <img src="{{ asset('assets/media/photos/logo_login_1.svg') }}" alt="Fourth slide">
                                </div>
                            </div>

                        </div>

                        <ol class="carousel-indicators">
                            <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselIndicators" data-slide-to="2"></li>
                            <li data-target="#carouselIndicators" data-slide-to="3"></li>
                        </ol>
                    </div>
                </div>

            </div>
            <!-- END Page Content -->

        </main>
        <!-- END Main Container -->
    </div>
@endsection

<script src="{{ asset('assets/js/core/jquery.min.js') }} "></script>

@section('extrascript')
    @if (session('sukses'))
        <script type="text/javascript">
            let message = "{{ session('sukses') }}"
            notify(message, 'success', 'fa fa-check')
        </script>
    @endif
    @if (session('gagal'))
        <script type="text/javascript">
            let message = "{{ session('gagal') }}"
            notify(message, 'error', 'fa fa-times-circle')
            $(".form-control").css("border", "1px solid #ff0000");
        </script>
    @endif
    <script>
        function redirectToWhatsApp() {
            window.location.href = "https://wa.me/6281374821410?text=saya lupa password akun saya, ini nik saya 'isi dengan nik anda'";
        }
    </script>
    <script>
        localStorage.setItem('menu_active', 1)
        $(document).ready(function() {
            tz = Intl.DateTimeFormat().resolvedOptions().timeZone;
            $('#time_zone').val(tz);
        });

        $("#nik").on("input", function() {
            if ($("#nik").val() == "") {
                $("#nik").css("border", "1px solid #ff0000");
            } else {
                $("#nik").css("border", "");
            }
        });

        $("#password").on("input", function() {
            if ($("#password").val() == "") {
                $("#password").css("border", "1px solid #ff0000");
            } else {
                $("#password").css("border", "");
            }
        });
    </script>
    <script>
        function togglePasswordVisibility(icon) {
            var input = icon.previousElementSibling;
            var iconElement = icon.querySelector("i");
            if (input.type === "password") {
                input.type = "text";
                iconElement.classList.remove("fa-eye");
                iconElement.classList.add("fa-eye-slash");
            } else {
                input.type = "password";
                iconElement.classList.remove("fa-eye-slash");
                iconElement.classList.add("fa-eye");
            }
        }
    </script>
@endsection
