<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Event</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
        <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
        <style>
            body {
                font-family: 'Quicksand', sans-serif;
                padding-left: 15px;
                padding-right: 15px;
            }

            .custom-table {
                width: 100%;
                border-collapse: collapse;
                background-color: #F8B739; /* Matches the background color in the image */
                color: white;
                margin: 20px 0;
            }

            .custom-table th, .custom-table td {
                padding: 12px;
                text-align: left;
                border: 1px solid white; /* Matches the border color in the image */
            }

            .custom-table th {
                background-color: #f2f2f2;
                color: #000;
            }

            .custom-table tr:nth-child(even) {
                background-color: #FFCC66; /* Slightly different shade for even rows */
            }

            .custom-table tr:hover {
                background-color: #FFC107; /* Hover effect color */
                transition: background-color 0.3s ease;
            }

            @media (max-width: 768px) {
                .custom-table thead {
                    display: none;
                }

                .custom-table, .custom-table tbody, .custom-table tr, .custom-table td {
                    display: block;
                    width: 100%;
                }

                .custom-table tr {
                    margin-bottom: 15px;
                }

                .custom-table td {
                    text-align: right;
                    padding-left: 50%;
                    position: relative;
                }

                .custom-table td::before {
                    content: attr(data-label);
                    position: absolute;
                    left: 0;
                    width: 50%;
                    padding-left: 15px;
                    font-weight: bold;
                    text-align: left;
                }
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
                                <p>082334556778</p>
                            </div>
                            <div class="text">
                                <i class="fa fa-envelope"></i>
                                <p>greenranger@gmail.com</p>
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
                        <a href="/" class="nav-item nav-link active">Beranda</a>
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

                <!-- Event detail start -->
                <main class="container">
                    <section class="event-details row my-5">
                        <div class="col-md-6" data-aos="fade-right">
                            <div class="event-image">
                                <img src="img/event2.jpg" alt="Event Image" class="img-fluid rounded shadow">
                            </div>
                        </div>
                        <div class="col-md-6" data-aos="fade-left">
                            <div class="event-info">
                                <h2 class="my-4">Kenjeran Clean</h2>
                                <p class="date-time"><i class="fas fa-calendar-alt"></i> 12 Juni 2024 | 07:00  - 12:00 WIB</p>
                                <p class="location"><i class="fas fa-map-marker-alt"></i> Pantai Kenjeran, Surabaya</p>
                                <p class="description">Ayo bergabung dan jadilah pahlawan kebersihan Pantai Kenjeran</p>
                                <button class="btn btn-primary mt-3 register-button" href="/volunteer">Daftar sekarang</button>
                            </div>
                        </div>
                    </section>

                    <section class="event-schedule my-5">
                        <div class="text-center" data-aos="fade-up">
                            <h2 class="my-4">Susunan Acara</h2>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                                <div class="schedule-item p-3 rounded shadow d-flex flex-column">
                                    <h4>Pembersihan Sampah dibibir Pantai</h4>
                                    <p><i class="fas fa-clock"></i> 07:00 - 09:00 WIB</p>
                                    <p>Ayo buat Kenjeran menjadi bersih dan terhindar dari abrasi!</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                                <div class="schedule-item p-3 rounded shadow d-flex flex-column">
                                    <h4>Recycling Workshop</h4>
                                    <p><i class="fas fa-clock"></i> 09:00 - 11:00 WIB</p>
                                    <p>Belajar mengubah sampah pantai menjadi barang yang berguna.</p>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                                <div class="schedule-item p-3 rounded shadow d-flex flex-column">
                                    <h4>Expert Talks</h4>
                                    <p><i class="fas fa-clock"></i> 11:00 - 12:00 WIB</p>
                                    <p>Sesi penutup yang menghadirkan pembicara dengan tema kebersihan.</p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="event-gallery my-5">
                        <div class="text-center" data-aos="fade-up">
                            <h2 class="my-4">Galeri</h2>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-4" data-aos="zoom-in" data-aos-delay="100">
                                <img src="img/gallery1.jpg" alt="Gallery Image 1" class="img-fluid rounded shadow">
                            </div>
                            <div class="col-md-4 mb-4" data-aos="zoom-in" data-aos-delay="200">
                                <img src="img/gallery2.jpg" alt="Gallery Image 2" class="img-fluid rounded shadow">
                            </div>
                            <div class="col-md-4 mb-4" data-aos="zoom-in" data-aos-delay="300">
                                <img src="img/gallery3.jpg" alt="Gallery Image 3" class="img-fluid rounded shadow">
                            </div>
                        </div>
                    </section>
                </main>
                <!-- Event detail end -->

                <!-- acara1 Start -->
                <div class="container">
                    <div class="text-center" data-aos="fade-up">
                        <h2 style="color: #3a5f4c;">Pendaftar Volunteer jeddih bersih</h2>
                        @if ($volunteers->isEmpty())
                            <p>Tidak ada data.</p>
                        @else
                            <table class="custom-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Umur</th>
                                        <th>No Telepon</th>
                                        <th>Email</th>
                                        <!-- Tambahkan kolom-kolom lain yang diperlukan -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($volunteers as $key => $volunteer)
                                        <tr>
                                            <td data-label="No">{{ $key + 1 }}</td>
                                            <td data-label="Nama">{{ $volunteer->nama }}</td>
                                            <td data-label="Umur">{{ $volunteer->umur }}</td>
                                            <td data-label="No Telepon">{{ $volunteer->no_telp }}</td>
                                            <td data-label="Email">{{ $volunteer->email }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                    </div>
                    <!-- acara1 End -->

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
        <script>
            AOS.init();
        </script>
    </body>
</html>
