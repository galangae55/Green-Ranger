<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>volunteer</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">


        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.google.com/share?selection.family=Montserrat:ital,wght@0,100..900;1,100..900|
                    Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1
                    ,400;1,500;1,600;1,700;1,800;1,900|Quicksand:wght@300..700|Roboto:ital,wght@0,100;0,300;0,400
                    ;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
        <style>
            .grey-option {
            color: grey;
        }

        .popup {
            display: none; /* Awalnya disembunyikan */
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(65, 108, 53, 0.7);
            padding: 20px;
            border-radius: 10px;
            color: white;
            z-index: 1000;
        }

        .popup-content {
            text-align: center;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            font-size: 20px;
            color: white;
        }

        .close-btn:hover {
            color: #ccc;
        }
        </style>
    </head>

    <body>
          <!-- Top Bar Start -->
          <div class="top-bar d-none d-md-block">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="top-bar-left">
                            <div class="text">
                                <i class="fa fa-phone-alt"></i>
                                <p>082233853635</p>
                            </div>
                            <div class="text">
                                <i class="fa fa-envelope"></i>
                                <p>sagegreat00@gmail.com</p>
                            </div>
                        </div>
                    </div>
                    {{-- NOTIF KETIKA BERHASIL LOG OUT --}}
                    @if (request()->query('logout') === 'success')
                        <script>
                            alert('Anda telah berhasil logout.'); // Notifikasi pop-up
                        </script>
                    @endif

                    <div class="col-md-4">
                        <div class="top-bar-right">
                            <div class="social">
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-linkedin-in"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                            </div>
                            @if (session('user_name'))
                                <p style="margin-bottom: 0px;display: flex;align-items: center;color: #dfae42;padding: 0px 20px;">{{ session('user_name') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Bar End -->

        <!-- Nav Bar Start -->
        <div class="navbar navbar-expand-lg bg-dark navbar-dark">
            <div class="container-fluid">
                <a href="/" class="navbar-brand">Green Ranger</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav ml-auto">
                        <a href="/event" class="nav-item nav-link">Acara</a>
                        <a href="/blog" class="nav-item nav-link">Blog</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu">
                                <a href="/donate" class="dropdown-item">Donasi Sekarang</a>
                                <a href="/volunteer" class="dropdown-item">Daftar Relawan</a>
                            </div>
                        </div>
                        <a href="/contact" class="nav-item nav-link">Kontak</a>
                        <a href="/belanja" class="nav-item nav-link">Belanja</a>

                        @if (session('user_name')) <!-- Jika pengguna login -->
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: flex;">
                                @csrf
                                <button type="submit" title="Log Out" style="background: none;border: none;cursor: pointer;color: rgb(255, 255, 255);display: flex;align-items: center;padding-right: 15px;">
                                    <i class="fas fa-sign-out-alt" style="font-size: 20px;"></i>
                                </button>
                            </form>
                        @else <!-- Jika pengguna tidak login -->
                            <a href="/auth" class="nav-item nav-link">Login</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- Nav Bar End -->


               <!-- Carousel Start -->
               <div class="carousel">
                <div class="container-fluid">
                    <div class="owl-carousel">
                        <div class="carousel-item">
                            <div class="carousel-img">
                                <img src="img/ss2.jpg" alt="Image">
                            </div>
                            <div class="carousel-text">
                                <h1> Bersama menjaga kebersihan, bersama membuat perubahan</h1>
                                <p>
                                Mari bergandengan tangan dalam upaya menjaga lingkungan. Donasi Anda tidak hanya membantu mendanai proyek-proyek berkelanjutan,
                                    tetapi juga mensejahterakan pelaku kebersihan lingkungan.
                                </p>
                                <div class="carousel-btn">
                                    <a class="btn btn-custom" href="/donate">Donasi sekarang</a>
                                    <a class="btn btn-custom" href="/volunteer">Daftar Relawan</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="carousel-img">
                                <img src="img/ss1.jpg" alt="Image">
                            </div>
                            <div class="carousel-text">
                                <h1>Media kebersihan informatif</h1>
                                <p>
                                    Berbagai informasi dan tips dalam menjaga serta mengolah lingkungan. Mari sayangi bumi kita dengan ikut berpartisipasi dalam menjaga kebersihan.
                                </p>
                                <div class="carousel-btn">
                                    <a class="btn btn-custom" href="/donate">Donasi sekarang</a>
                                    <a class="btn btn-custom" href="/volunteer">Daftar Relawan</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="carousel-img">
                                <img src="img/ss3.jpg" alt="Image">
                            </div>
                            <div class="carousel-text">
                                <h1>Mari bergabung</h1>
                                <p>
                                Bergabunglah dengan komunitas sukarelawan kami dan jadilah bagian dari gerakan perubahan. Dengan partisipasi aktif, kita bisa membuat perbedaan nyata.
                                </p>
                                <div class="carousel-btn">
                                    <a class="btn btn-custom" href="/donate">Donasi sekarang</a>
                                    <a class="btn btn-custom" href="/volunteer">Daftar Relawan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Carousel End -->


        <!-- Volunteer Start -->
        @if (session('user_name')) <!-- Jika pengguna login -->
            <div class="container">
                <div class="volunteer" data-parallax="scroll" data-image-src="img/volunteer1.jpg">
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <div class="volunteer-form">
                                <form action="{{ route('volunteer.store') }}" method="POST">
                                    @csrf
                                    <!-- Umur -->
                                    <div class="control-group" data-aos="fade-right">
                                        <input type="number" class="form-control" name="umur" placeholder="Age" required="required" value="{{ old('umur') }}" />
                                        @error('umur')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Nomor Telepon -->
                                    <div class="control-group" data-aos="fade-right">
                                        <input type="text" class="form-control" name="no_telp" placeholder="Phone Number" required="required" value="{{ old('no_telp') }}" />
                                        @error('no_telp')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Pilihan Event -->
                                    <div class="control-group" data-aos="fade-right">
                                        <select class="form-control" name="event" required="required">
                                            <option value="" disabled {{ old('event') ? '' : 'selected' }}>Pilih Acara</option>
                                            <option value="Kenjeran Clean" class="grey-option" {{ old('event') == 'Acara 1' ? 'selected' : '' }}>Kenjeran Clean</option>
                                            <option value="Jaddih Bersih" class="grey-option" {{ old('event') == 'Acara 2' ? 'selected' : '' }}>Jaddih Bersih</option>
                                            <option value="Penyaluran Donasi" class="grey-option" {{ old('event') == 'Acara 3' ? 'selected' : '' }}>Penyaluran Donasi</option>
                                            <option value="Seminar Pelestarian Alam" class="grey-option" {{ old('event') == 'Acara 4' ? 'selected' : '' }}>Seminar Pelestarian Alam</option>
                                        </select>
                                        @error('event')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Tombol Submit -->
                                    <div>
                                        <button class="btn btn-custom" type="submit" data-aos="fade-right">Gabung relawan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="volunteer-content">
                                <div class="section-header">
                                    <h2>Menjadi Relawan</h2>
                                    <p>untuk salurkan kebaikan</p>
                                </div>
                                <div class="volunteer-text">
                                    <p>
                                        Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non. Aliquam metus tortor, auctor id gravida, viverra quis sem. Curabitur non nisl nec nisi maximus. Aenean convallis porttitor. Aliquam interdum at lacus non blandit.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
        <div class="container">
            <div class="volunteer" data-parallax="scroll" data-image-src="img/volunteer1.jpg">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="volunteer-form">
                            <a href="/auth" class="dropdown-item">Login untuk mendaftar volunteer!!!</a>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="volunteer-content">
                            <div class="section-header">
                                <h2>Menjadi Relawan</h2>
                                <p>untuk salurkan kebaikan</p>
                            </div>
                            <div class="volunteer-text">
                                <p>
                                    Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non. Aliquam metus tortor, auctor id gravida, viverra quis sem. Curabitur non nisl nec nisi maximus. Aenean convallis porttitor. Aliquam interdum at lacus non blandit.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Volunteer End -->


        <!-- Footer Start -->
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-contact">
                            <h2>Kantor Kami</h2>
                            <p><i class="fa fa-map-marker-alt"></i>Ketintang, Surabaya, Indonesia</p>
                            <p><i class="fa fa-phone-alt"></i>082334556778</p>
                            <p><i class="fa fa-envelope"></i>greenranger0@gmail.com</p>
                            <div class="footer-social">
                                <a class="btn btn-custom" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-custom" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-custom" href=""><i class="fab fa-youtube"></i></a>
                                <a class="btn btn-custom" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-custom" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-link">
                            <h2>Tautan Populer</h2>
                            <a href="/volunteer">Menjadi Sukarelawan</a>
                            <a href="/contact">Hubungi Kami</a>
                            <a href="/event">Acara Mendatang</a>
                            <a href="/detail">Artikel Terbaru</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-link">
                            <h2>Tautan Berguna</h2>
                            <a href="">Syarat Penggunaan</a>
                            <a href="">Kebijakan Privasi</a>
                            <a href="">Kuki</a>
                            <a href="">Bantuan</a>
                            <a href="">Pertanyaan Umum</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-newsletter">
                            <h2>Kritik & saran</h2>
                            <form>
                                <input class="form-control" placeholder="Email anda">
                                <button class="btn btn-custom">kirim</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container copyright">
                <div class="row">
                    <div class="col-md-6">
                        <p>&copy; <a href="#">Green Ranger</a>, copyright 2024.</p>
                    </div>
                    <div class="col-md-6">
                        <p>Designed By Green Ranger Team</></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        {{-- pop up  --}}
        <div class="popup" id="popup">
            <div class="popup-content">
                <span class="close-btn" id="close-btn">&times;</span>
                <h2>Success!</h2>
                <p>Anda telah berhasil menjadi volunteer!</p>
            </div>
        </div>
        {{-- pop up end --}}


        <!-- Back to top button -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

        <!-- Pre Loader -->
        <div id="loader" class="show">
            <div class="loader"></div>
        </div>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/counterup/counterup.min.js"></script>
        <script src="lib/parallax/parallax.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

        <!-- Contact Javascript File -->
        <script src="mail/jqBootstrapValidation.min.js"></script>
        <script src="mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
        <!-- SweetAlert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- JavaScript untuk pop-up -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ambil popup
            var popup = document.getElementById('popup');

            // Ambil tombol untuk menutup popup
            var closeButton = document.getElementById('close-btn');

            // Jika ada pesan sukses, tampilkan popup
            var successMessage = "{{ Session::get('success') }}"; // Session untuk sukses
            if (successMessage) {
                popup.style.display = 'block';
            }

            // Ketika tombol close diklik, sembunyikan popup
            closeButton.addEventListener('click', function() {
                popup.style.display = 'none';
            });
        });
    </script>

    <script>
        AOS.init();
    </script>

    </body>
</html>
