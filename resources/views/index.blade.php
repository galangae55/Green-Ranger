<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Green Ranger</title>
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
        <link href="/lib/flaticon/font/flaticon.css" rel="stylesheet">
        <link href="/lib/animate/animate.min.css" rel="stylesheet">
        <link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- Template Stylesheet -->
        <link href="/css/style.css" rel="stylesheet">
        <style>
            .popup {
                position: fixed;
                top: 20px; /* Jarak dari atas */
                left: 50%; /* Tengah horizontal */
                transform: translate(-50%, -20px); /* Mengangkat sedikit untuk animasi */
                background-color: #4CAF50; /* Warna latar belakang hijau */
                color: white;
                padding: 15px 30px; /* Padding di sekitar teks */
                border-radius: 8px; /* Membuat sudut membulat */
                box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2); /* Bayangan lebih jelas */
                z-index: 1000; /* Pastikan popup muncul di atas konten lainnya */
                opacity: 0; /* Mulai dengan opasitas 0 */
                pointer-events: none; /* Cegah interaksi saat popup tidak terlihat */
                transition: opacity 0.6s ease-in-out, transform 0.6s ease-in-out; /* Transisi lebih lambat dan halus */
            }

            .popup.red {
                background-color: red; /* Warna latar belakang merah */
            }

            .popup.show {
                opacity: 1; /* Tampilkan popup dengan opasitas penuh */
                transform: translate(-50%, 0); /* Kembali ke posisi normal */
                pointer-events: auto; /* Aktifkan interaksi ketika ditampilkan */
            }

            .popup.hide {
                opacity: 0; /* Hilangkan popup dengan opasitas */
                transform: translate(-50%, -20px); /* Kembali ke posisi semula */
                pointer-events: none; /* Cegah interaksi saat popup mulai hilang */
            }

            @-webkit-keyframes fadein {
                from {bottom: 0; opacity: 0;}
                to {bottom: 30px; opacity: 1;}
            }

            @keyframes fadein {
                from {bottom: 0; opacity: 0;}
                to {bottom: 30px; opacity: 1;}
            }

            @-webkit-keyframes fadeout {
                from {bottom: 30px; opacity: 1;}
                to {bottom: 0; opacity: 0;}
            }

            @keyframes fadeout {
                from {bottom: 30px; opacity: 1;}
                to {bottom: 0; opacity: 0;}
            }
        </style>
    </head>

    <body>
        {{-- MIDDLEWARE UNTUK HALAMAN ADMIN --}}
        @if (session('error'))
            <div id="notification" class="popup hide red"> <!-- Tambahkan kelas 'red' -->
                {{ session('error') }}
            </div>
            <script>
                // Tampilkan notifikasi
                const notification = document.getElementById('notification');
                notification.classList.remove('hide');
                notification.classList.add('show');

                // Hapus notifikasi setelah 3 detik
                setTimeout(function() {
                    notification.classList.remove('show');
                    notification.classList.add('hide');
                }, 3000);
            </script>
        @endif

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

        {{-- @if (session('user_name'))
            <p style="margin-bottom: 0px; display: flex; align-items: center; color: #dfae42; padding-left: 16px;">{{ session('user_name') }}</p>
        @endif --}}

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

        <!-- About Start -->
        <div class="about">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-img" data-parallax="scroll" data-image-src="img/about.jpg"></div>
                    </div>
                    <div class="col-lg-6">
                        <div class="section-header">
                            <p>Lebih dekat dengan kami</p>
                            <h2>Green Ranger</h2>
                        </div>
                        <div class="about-tab">
                            <ul class="nav nav-pills nav-justified">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="pill" href="#tab-content-1">Tentang</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#tab-content-2">Visi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#tab-content-3">Misi</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div id="tab-content-1" class="container tab-pane active">
                                    Green ranger adalah platform inovatif yang berfokus pada merekrut relawan kebersihan dan menggalang donasi untuk kegiatan terkait kebersihan lingkungan.
                                     Dengan menghubungkan individu, komunitas, dan organisasi yang peduli dengan kelestarian lingkungan, CleanUp Heroes bertujuan untuk menciptakan dunia yang lebih bersih dan sehat.
                                      Melalui teknologi dan kolaborasi, kami menyediakan informasi, alat, dan sumber daya yang diperlukan untuk memfasilitasi aksi nyata dalam mengatasi masalah kebersihan.
                                </div>
                                <div id="tab-content-2" class="container tab-pane fade">
                                    Menjadi platform terdepan dalam menginspirasi dan memberdayakan individu serta komunitas untuk bersama-sama menciptakan dunia yang bebas dari sampah dan polusi,
                                     sehingga tercipta lingkungan yang bersih, sehat, dan berkelanjutan bagi generasi sekarang dan yang akan datang.
                                </div>
                                <div id="tab-content-3" class="container tab-pane fade">
                                    <tr><td>1. </td><td>Memberdayakan relawan</td></tr><br>
                                    <tr><td>Merekrut, melatih, dan mendukung relawan kebersihan dari berbagai latar belakang untuk berpartisipasi dalam kegiatan kebersihan di lingkungan mereka masing-masing. </td></tr><br>
                                    <tr><td>2. </td><td>menggalang donasi</td></tr><br>
                                    <tr><td>Membangun jaringan donatur yang kuat dan transparan untuk mendanai proyek-proyek kebersihan dan inisiatif lingkungan di berbagai komunitas. </td></tr><br>
                                    <tr><td>3. </td>Edukasi dan Kesadaran </tr><br>
                                    <tr><td> Menyediakan informasi, sumber daya, dan kampanye pendidikan untuk meningkatkan kesadaran tentang pentingnya kebersihan dan kelestarian lingkungan.</td></tr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

        {{-- service start --}}
        <div class="service">
            <div class="text-center" data-aos="fade-up">
                <div class="container">
                    <div class="section-header text-center">
                        <p>Apa benefit dari website ini?</p>
                        <h>beberapa benefit yang akan kalian dapatkan adalah</h2>
                     </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                        <div class="text-center" data-aos="fade-up">
                            <div class="service-item">
                                <div class="service-icon">
                                    <i class="flaticon-diet"></i>
                                </div>
                                <div class="service-text">
                                    <h3>Memberi dampak sosial</h3>
                                    <p>Kesempatan untuk berperan dalam mendanai proyek-proyek yang memberikan manfaat nyata bagi kebersihan dan kesehatan lingkungan.
                                    </p>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                        <div class="text-center" data-aos="fade-up">
                            <div class="service-item">
                                <div class="service-icon">
                                    <i class="flaticon-water"></i>
                                </div>
                                <div class="service-text">
                                    <h3>Kontribusi positif terhadap lingkungan</h3>
                                    <p>Peluang untuk langsung berkontribusi dalam menjaga kebersihan lingkungan dan mengurangi sampah.</p>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                        <div class="text-center" data-aos="fade-up">
                            <div class="service-item">
                                <div class="service-icon">
                                    <i class="flaticon-healthcare"></i>
                                </div>
                                <div class="service-text">
                                    <h3>Edukasi kebersihan</h3>
                                    <p>Terdapat berbagai informasi dan edukasi mengenai kebersihan</p>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                        <div class="text-center" data-aos="fade-up">
                            <div class="service-item">
                                <div class="service-icon">
                                    <i class="flaticon-education"></i>
                                </div>
                                <div class="service-text">
                                    <h3>Mensejahterakan lingkungan</h3>
                                    <p>Membantu menciptakan lingkungan yang lebih aman dan sehat bagi mereka yang tinggal di sekitar tempat tersebut.</p>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                        <div class="text-center" data-aos="fade-up">
                            <div class="service-item">
                                <div class="service-icon">
                                    <i class="flaticon-home"></i>
                                </div>
                                <div class="service-text">
                                    <h3>Kepuasan diri</h3>
                                    <p>Dapat berkontribusi untuk menjaga lingkungan memiliki kepuasan tersendiri.</p>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                        <div class="text-center" data-aos="fade-up">
                            <div class="service-item">
                                <div class="service-icon">
                                    <i class="flaticon-social-care"></i>
                                </div>
                                <div class="service-text">
                                    <h3>Menambah relasi</h3>
                                    <p>Dengan terlibat dalam kegiatan sukarelawan, Anda dapat bertemu dan berinteraksi dengan beragam orang dari latar belakang yang berbeda.</p>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!-- Service End -->

        <!-- Event Start -->
            <div class="event">
                <div class="container">
                    <div class="section-header text-center">
                        <p>Event selanjutnya</p>
                        <h2>Bersiaplah menjadi agen perubahan</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                        <div data-aos="fade-up">
                            <div class="event-item">
                                <img src="img/event1.jpg" alt="Image">
                                <div class="event-content">
                                    <div class="event-meta">
                                        <p><i class="fa fa-calendar-alt"></i>10 Juni 2024</p>
                                        <p><i class="far fa-clock"></i>08:00 - 12:00 WIB</p>
                                        <p><i class="fa fa-map-marker-alt"></i>Bukit Jaddih, Bangkalan</p>
                                    </div>
                                    <div class="event-text">
                                        <h3>Jaddih Bersih</h3>
                                        <p>
                                            Sebuah kegiatan tahunan yang dibuat oleh Pemerintah Kota Bangkalan untuk membersihkan lembah Bukit Jaddih dari sampah wisatawan.
                                        </p>
                                        <a class="btn btn-custom" href="/acara2">Gabung sekarang</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-lg-6" data-aos="fade-up">
                            <div class="event-item">
                                <img src="img/event2.jpg" alt="Image">
                                <div class="event-content">
                                    < <div class="event-meta">
                                        <p><i class="fa fa-calendar-alt"></i>12 Juni 2024</p>
                                        <p><i class="far fa-clock"></i>07:00 - 12:00 WIB</p>
                                        <p><i class="fa fa-map-marker-alt"></i>Pantai Kenjeran</p>
                                    </div>
                                    <div class="event-text">
                                        <h3>Kenjeran Clean</h3>
                                        <p>
                                            Sebuah kegiatan tahunan yang diprakarsai oleh Bank Sampah Trash Wallet dan berkolaborasi dengan warga setempat untuk membersihkan pantai dari sampah laut.
                                        </p>
                                        <a class="btn btn-custom" href="/acara1">Gabung sekarang</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Event End -->

            <!-- Blog Start -->
            <div class="blog">
                <div class="container">
                    <div class="section-header text-center">
                        <p>Blog kami</p>
                        <h2>Artikel dan tips kebersihan terbaru</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                        <div class="text-center" data-aos="fade-up">
                            <div class="blog-item">
                                <div class="blog-img">
                                    <img src="img/blog1.jpg" alt="Image">
                                </div>
                                <div class="blog-text">
                                    <h3><a href="#">Mengapa Kebersihan Lingkungan Penting dan Bagaimana Kita Bisa Berkontribusi</a></h3>
                                    <p>
                                        Kebersihan lingkungan adalah isu yang semakin mendapat perhatian global, mengingat dampak negatif dari polusi dan sampah terhadap kesehatan manusia dan ekosistem. Lingkungan yang bersih tidak hanya menyenangkan untuk dilihat, tetapi juga vital bagi kesejahteraan manusia.
                                    </p>
                                </div>
                                <div class="blog-meta">
                                    <p><i class="fa fa-user"></i><a href="">Subagyo</a></p>
                                    <p><i class="fa fa-comments"></i><a href="">15 komentar</a></p>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="text-center" data-aos="fade-up">
                            <div class="blog-item">
                                <div class="blog-img">
                                    <img src="img/blog2.jpg" alt="Image">
                                </div>
                                <div class="blog-text">
                                    <h3><a href="/detail">Meningkatkan Kesadaran Lingkungan Melalui Pendidikan</a></h3>
                                    <p>
                                        Pendidikan adalah kunci untuk meningkatkan kesadaran tentang pentingnya kebersihan lingkungan. Dengan memahami dampak dari tindakan kita terhadap alam, kita dapat mengambil langkah-langkah yang lebih bertanggung jawab untuk melindungi planet ini.
                                         Artikel ini akan membahas pentingnya pendidikan lingkungan.
                                    </p>
                                </div>
                                <div class="blog-meta">
                                    <p><i class="fa fa-user"></i><a href="">M. Galang</a></p>
                                    <p><i class="fa fa-comments"></i><a href="">15 komentar</a></p>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="text-center" data-aos="fade-up">
                            <div class="blog-item">
                                <div class="blog-img">
                                    <img src="img/blog3.jpg" alt="Image">
                                </div>
                                <div class="blog-text">
                                    <h3><a href="#">Mengelola Sampah Rumah Tangga Secara Efektif</a></h3>
                                    <p>
                                        Pengelolaan sampah rumah tangga yang efektif adalah langkah penting dalam menjaga kebersihan lingkungan. Dengan cara yang benar, kita dapat mengurangi jumlah sampah yang berakhir di tempat pembuangan akhir dan meningkatkan daur ulang.
                                        Artikel ini membahas berbagai metode untuk mengelola sampah rumah tangga.
                                    </p>
                                </div>
                                <div class="blog-meta">
                                    <p><i class="fa fa-user"></i><a href="">Effendi</a></p>
                                    <p><i class="fa fa-comments"></i><a href="">15 komentar</a></p>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Blog End -->

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
        <!-- Popup Notification -->
        @if(session('success'))
            <div id="popup" class="popup show">
                {{ session('success') }}
            </div>
        @endif

        <script>
            document.addEventListener('DOMContentLoaded', (event) => {
                var popup = document.getElementById('popup');
                if (popup) {
                    popup.classList.add('show');
                    setTimeout(() => {
                        popup.classList.remove('show');
                        popup.classList.add('hide');
                    }, 3000); // Popup mulai menghilang setelah 3 detik
                }
            });
        </script>

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
        <script src="/js/main.js"></script>
        <script>
            AOS.init();
        </script>
    </body>
</html>
