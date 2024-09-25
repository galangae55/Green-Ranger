<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>detail</title>
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
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
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

        <!-- Single Post Start-->
        <div class="single">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="single-content">
                            <img src="img/blog4.jpg" />
                            <h2>Tips Mengurangi Penggunaan Energi di Rumah</h2>
                            <h3>Deskripsi</h3>
                            <p>
                                Mengurangi penggunaan energi di rumah adalah langkah penting untuk menghemat biaya dan berkontribusi pada pelestarian lingkungan.
                                Penggunaan energi yang efisien dapat mengurangi jejak karbon kita, yang berdampak positif bagi planet ini.
                                 Berikut adalah beberapa tips praktis untuk mengurangi penggunaan energi di rumah.
                            </p>
                            <h3>Pentingnya Mengurangi Penggunaan Energi</h3>
                            <p>Mengurangi penggunaan energi adalah langkah yang sangat penting dalam menghadapi tantangan lingkungan dan ekonomi yang dihadapi dunia saat ini. Penggunaan energi yang berlebihan tidak hanya meningkatkan biaya hidup,
                                tetapi juga mempercepat laju perubahan iklim dan menipiskan sumber daya alam. Oleh karena itu, mengurangi konsumsi energi memiliki banyak manfaat yang signifikan, baik bagi individu maupun masyarakat secara keseluruhan.
                                Berikut adalah beberapa tips praktis untuk mengurangi penggunaan energi di rumah.
                            </p>
                            <h6>1. Menggunakan Perangkat Hemat Energi</h6>
                            <p>Biasakan untuk mematikan perangkat elektronik ketika tidak digunakan. Banyak perangkat seperti komputer, televisi, dan konsol game yang terus mengkonsumsi energi dalam mode siaga. Gunakan power strip untuk mematikan beberapa perangkat sekaligus dan hindari membiarkan charger terpasang ketika tidak digunakan.
                                 Dengan cara ini, Anda bisa menghemat energi yang terbuang sia-sia dan juga memperpanjang umur perangkat elektronik Anda.</p>
                            <h6>2. Optimalkan Penggunaan Penerangan</h6>
                            <p>
                                Gunakan lampu hemat energi seperti LED yang mengkonsumsi lebih sedikit listrik dan memiliki umur lebih panjang dibandingkan lampu pijar biasa.
                                Selain itu, manfaatkan cahaya alami sebanyak mungkin dengan membuka tirai atau jendela pada siang hari. Pasang sensor gerak atau timer pada lampu luar ruangan untuk menghindari penggunaan yang tidak perlu.
                                Menggunakan cermin untuk memantulkan cahaya alami juga bisa menjadi solusi yang efektif untuk menerangi ruangan tanpa harus menambah lampu.
                            </p>
                            <h6>3. Gunakan Energi Terbarukan</h6>
                            <p>Memanfaatkan sumber energi terbarukan seperti panel surya dapat secara signifikan mengurangi konsumsi energi dari jaringan listrik.
                                Instalasi panel surya mungkin memerlukan investasi awal yang cukup besar, tetapi dapat memberikan penghematan jangka panjang dan juga mengurangi jejak karbon rumah tangga Anda. Selain itu,
                                energi yang dihasilkan dari panel surya adalah energi bersih yang tidak menimbulkan polusi.</p>

                            <h6>4. Edukasi Keluarga</h6>
                            <p>Libatkan semua anggota keluarga dalam upaya penghematan energi. Edukasi mereka tentang pentingnya menghemat energi dan cara-cara sederhana yang bisa dilakukan sehari-hari. Misalnya, ajarkan anak-anak untuk mematikan lampu saat keluar dari ruangan dan menggunakan air dengan bijak. Dengan kesadaran dan kerjasama seluruh penghuni rumah,
                                upaya penghematan energi bisa lebih efektif dan berdampak signifikan.</p>

                            <h3>Kesimpulan</h3>
                            <p>Mengurangi penggunaan energi di rumah adalah langkah penting dalam menjaga lingkungan dan menghemat biaya. Dengan menggunakan perangkat hemat energi, mematikan perangkat elektronik yang
                                tidak digunakan, mengoptimalkan penggunaan penerangan, mengatur termostat dengan bijak, memperbaiki dan memelihara peralatan, mengisolasi rumah, memanfaatkan energi terbarukan, mengurangi penggunaan air panas, menutup tirai dan jendela, serta melibatkan keluarga dalam edukasi penghematan energi, kita bisa mencapai penggunaan energi yang lebih efisien.
                                 Langkah-langkah sederhana ini tidak hanya bermanfaat bagi rumah tangga kita, tetapi juga bagi planet kita. Mari kita mulai dari diri sendiri dan lingkungan terdekat untuk membuat perubahan positif yang signifikan.</p>

                        </div>
                        <div class="single-tags">
                            <a href="">Nasional</a>
                            <a href="">Internasional</a>
                            <a href="">Gaya Hidup</a>
                            <a href="">Lingkungan</a>
                            <a href="">Sampah</a>
                            <a href="">Kebersihan</a>
                            <a href="">Teknologi</a>
                        </div>
                        <div class="single-bio">
                            <div class="single-bio-img">
                                <img src="img/user.jpg" />
                            </div>
                            <div class="single-bio-text">
                                <p>author</p>
                                <h3>Galatama</h3>
                                <p>
                                    Merupakan seorang dosen biologi yang aktif untuk membuat artikel lingkungan.
                                </p>
                            </div>
                        </div>
                        <div class="single-related">
                            <<h2>Postingan Serupa</h2>
                            <div class="owl-carousel related-slider">
                                <div class="post-item">
                                    <div class="post-img">
                                        <img src="img/blog1.jpg" />
                                    </div>
                                    <div class="post-text">
                                        <a href="">Mengapa Kebersihan Lingkungan Penting dan Bagaimana Kita Bisa Berkontribusi</a>
                                        <div class="post-meta">
                                            <p>By<a href="">Muhammad Thohir</a></p>
                                            <p>In<a href="">Makassar</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-item">
                                    <div class="post-img">
                                        <img src="img/blog3.jpg" />
                                    </div>
                                    <div class="post-text">
                                        <a href="">Mengelola Sampah Rumah Tangga Secara Efektif</a>
                                        <div class="post-meta">
                                            <p>By<a href="">Effendi</a></p>
                                            <p>In<a href="">Jember</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-item">
                                    <div class="post-img">
                                        <img src="img/blog4.jpg" />
                                    </div>
                                    <div class="post-text">
                                        <a href="">Tips Mengurangi Penggunaan Energi di Rumah</a>
                                        <div class="post-meta">
                                            <p>By<a href="">Galatama</a></p>
                                            <p>In<a href="">Surabaya</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-item">
                                    <div class="post-img">
                                        <img src="img/blog5.jpg" />
                                    </div>
                                    <div class="post-text">
                                        <a href="">Menjaga Kebersihan dan Kelestarian Air</a>
                                        <div class="post-meta">
                                            <p>By<a href="">Bambang</a></p>
                                            <p>In<a href="">Medan</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="single-comment">
                     <h2>Komentar Terbaru</h2>
                        @foreach ($comments as $comment )
                            <ul class="comment-list">
                                <li class="comment-item">
                                    <div class="comment-body">
                                        <div class="comment-img">
                                            <img src="http://bootdey.com/img/Content/user_1.jpg" />
                                        </div>
                                        <div class="comment-text">
                                            <h3><a>{{ $comment->nama }}</a></h3>
                                            <p><span></span>{{ $comment->created_at }}</p>
                                            <span>{{ $comment->komentar }}</span>
                                            <p> </p>
                                            <a class="btn" href="">Jawab</a>
                                        </div>
                                    </div>
                                </li>
                        @endforeach
                    </div>

                        <div class="comment-form">
                            <h2>Komentar</h2>
                            <form action="/detail/komen/store" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" name="origin" value="detail4">
                                    <label for="name">Nama *</label>
                                    <input type="text" name="nama" class="form-control" id="name">
                                    @error('nama')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="message">Pesan *</label>
                                    <textarea id="message" name="komentar" cols="30" rows="5" class="form-control"></textarea>
                                    @error('komentar')
                                    <small class="text-danger">{{ $message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-custom">Kirim komentar</button>
                                    <!-- <input type="submit" value="Post Comment" class="btn btn-custom"> -->
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="sidebar">
                            <div class="sidebar-widget">
                                <div class="search-widget">
                                    <form>
                                        <input class="form-control" type="text" placeholder="Search Keyword">
                                        <button class="btn"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                            </div>

                            <div class="sidebar-widget">
                                <h2 class="widget-title">Artikel Terbaru</h2>
                                <div class="recent-post">
                                    <div class="post-item">
                                        <div class="post-img">
                                            <img src="img/blog2.jpg" />
                                        </div>
                                        <div class="post-text">
                                            <a href="">Meningkatkan Kesadaran Lingkungan Melalui Pendidikan</a>
                                            <div class="post-meta">
                                                <p>By<a href="">Muhammad Galang</a></p>
                                                <p>In<a href="">Jakarta</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post-item">
                                        <div class="post-img">
                                            <img src="img/blog3.jpg" />
                                        </div>
                                        <div class="post-text">
                                            <a href="">Mengelola Sampah Rumah Tangga Secara Efektif</a>
                                            <div class="post-meta">
                                                <p>By<a href="">Galatama</a></p>
                                                <p>In<a href="">Surabaya</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post-item">
                                        <div class="post-img">
                                            <img src="img/blog1.jpg" />
                                        </div>
                                        <div class="post-text">
                                            <a href="">Mengapa Kebersihan Lingkungan Penting dan Bagaimana Kita Bisa Berkontribusi</a>
                                            <div class="post-meta">
                                                <p>By<a href="">Bambang</a></p>
                                                <p>In<a href="">Medan</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post-item">
                                        <div class="post-img">
                                            <img src="img/blog4.jpg" />
                                        </div>
                                        <div class="post-text">
                                            <a href="">Tips Mengurangi Penggunaan Energi di Rumah</a>
                                            <div class="post-meta">
                                                <p>By<a href="">Reyhan</a></p>
                                                <p>In<a href="">Tulungagung</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post-item">
                                        <div class="post-img">
                                            <img src="img/blog5.jpg" />
                                        </div>
                                        <div class="post-text">
                                            <a href="">Menjaga Kebersihan dan Kelestarian Sumber Air</a>
                                            <div class="post-meta">
                                                <p>By<a href="">Effendi</a></p>
                                                <p>In<a href="">Jember</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="sidebar-widget">
                                <div class="image-widget">
                                    <a href="#"><img src="img/blog1.jpg" alt="Image"></a>
                                </div>
                            </div>

                            <div class="sidebar-widget">
                                <div class="tab-post">
                                    <ul class="nav nav-pills nav-justified">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="pill" href="#featured">Sorotan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#popular">Populer</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#latest">Terbaru</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div id="featured" class="container tab-pane active">
                                            <div class="post-item">
                                                <div class="post-img">
                                                    <img src="img/blog2.jpg" />
                                                </div>
                                                <div class="post-text">
                                                    <a href="">Meningkatkan Kesadaran Lingkungan Melalui Pendidikan</a>
                                                    <div class="post-meta">
                                                        <p>By<a href="">Muhammad Galang</a></p>
                                                        <p>In<a href="">Jakarta</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-item">
                                                <div class="post-img">
                                                    <img src="img/blog4.jpg" />
                                                </div>
                                                <div class="post-text">
                                                    <a href="">Tips Mengurangi Penggunaan Energi di Rumah</a>
                                                    <div class="post-meta">
                                                        <p>By<a href="">Galatama</a></p>
                                                        <p>In<a href="">Surabaya</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-item">
                                                <div class="post-img">
                                                    <img src="img/blog5.jpg" />
                                                </div>
                                                <div class="post-text">
                                                    <a href="">Menjaga Kebersihan dan Kelestarian Sumber Air</a>
                                                    <div class="post-meta">
                                                        <p>By<a href="">Bambang</a></p>
                                                        <p>In<a href="">Medan</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-item">
                                                <div class="post-img">
                                                    <img src="img/blog6.jpg" />
                                                </div>
                                                <div class="post-text">
                                                    <a href="">Tips Mengelola Sampah Elektronik Dengan Bijak</a>
                                                    <div class="post-meta">
                                                        <p>By<a href="">Reyhan</a></p>
                                                        <p>In<a href="">Tulungagung</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-item">
                                                <div class="post-img">
                                                    <img src="img/blog3.jpg" />
                                                </div>
                                                <div class="post-text">
                                                    <a href="">Mengelola Sampah Rumah Tangga Secara Efektif</a>
                                                    <div class="post-meta">
                                                        <p>By<a href="">Effendi</a></p>
                                                        <p>In<a href="">Jember</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="popular" class="container tab-pane fade">
                                            <div class="post-item">
                                                <div class="post-img">
                                                    <img src="img/blog1.jpg" />
                                                </div>
                                                <div class="post-text">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                    <div class="post-meta">
                                                        <p>By<a href="">Admin</a></p>
                                                        <p>In<a href="">Web Design</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-item">
                                                <div class="post-img">
                                                    <img src="img/blog2.jpg" />
                                                </div>
                                                <div class="post-text">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                    <div class="post-meta">
                                                        <p>By<a href="">Admin</a></p>
                                                        <p>In<a href="">Web Design</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-item">
                                                <div class="post-img">
                                                    <img src="img/blog5.jpg" />
                                                </div>
                                                <div class="post-text">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                    <div class="post-meta">
                                                        <p>By<a href="">Admin</a></p>
                                                        <p>In<a href="">Web Design</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-item">
                                                <div class="post-img">
                                                    <img src="img/blog6.jpg" />
                                                </div>
                                                <div class="post-text">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                    <div class="post-meta">
                                                        <p>By<a href="">Admin</a></p>
                                                        <p>In<a href="">Web Design</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-item">
                                                <div class="post-img">
                                                    <img src="img/blog3.jpg" />
                                                </div>
                                                <div class="post-text">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                    <div class="post-meta">
                                                        <p>By<a href="">Admin</a></p>
                                                        <p>In<a href="">Web Design</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="latest" class="container tab-pane fade">
                                            <div class="post-item">
                                                <div class="post-img">
                                                    <img src="img/blog4.jpg" />
                                                </div>
                                                <div class="post-text">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                    <div class="post-meta">
                                                        <p>By<a href="">Admin</a></p>
                                                        <p>In<a href="">Web Design</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-item">
                                                <div class="post-img">
                                                    <img src="img/blog3.jpg" />
                                                </div>
                                                <div class="post-text">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                    <div class="post-meta">
                                                        <p>By<a href="">Admin</a></p>
                                                        <p>In<a href="">Web Design</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-item">
                                                <div class="post-img">
                                                    <img src="img/blog1.jpg" />
                                                </div>
                                                <div class="post-text">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                    <div class="post-meta">
                                                        <p>By<a href="">Admin</a></p>
                                                        <p>In<a href="">Web Design</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-item">
                                                <div class="post-img">
                                                    <img src="img/blog5.jpg" />
                                                </div>
                                                <div class="post-text">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                    <div class="post-meta">
                                                        <p>By<a href="">Admin</a></p>
                                                        <p>In<a href="">Web Design</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-item">
                                                <div class="post-img">
                                                    <img src="img/blog1.jpg" />
                                                </div>
                                                <div class="post-text">
                                                    <a href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                                                    <div class="post-meta">
                                                        <p>By<a href="">Admin</a></p>
                                                        <p>In<a href="">Web Design</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="sidebar-widget">
                                <div class="image-widget">
                                    <a href="#"><img src="img/blog3.jpg" alt="Image"></a>
                                </div>
                            </div>

                            <div class="sidebar-widget">
                                <h2 class="widget-title">Kategori</h2>
                                <div class="category-widget">
                                    <ul>
                                        <li><a href="">Nasional</a><span>(98)</span></li>
                                        <li><a href="">Internasional</a><span>(87)</span></li>
                                        <li><a href="">Gaya Hidup</a><span>(76)</span></li>
                                        <li><a href="">Lingkungan</a><span>(65)</span></li>
                                        <li><a href="">Sampah</a><span>(54)</span></li>
                                        <li><a href="">Kebersihan</a><span>(43)</span></li>
                                        <li><a href="">Teknologi</a><span>(32)</span></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="sidebar-widget">
                                <div class="image-widget">
                                    <a href="#"><img src="img/blog4.jpg" alt="Image"></a>
                                </div>
                            </div>

                            <div class="sidebar-widget">
                                <h2 class="widget-title">Tag</h2>
                                <div class="tag-widget">
                                    <li><a href="">Nasional</a><span>(98)</span></li>
                                        <li><a href="">Internasional</a><span>(87)</span></li>
                                        <li><a href="">Gaya Hidup</a><span>(76)</span></li>
                                        <li><a href="">Lingkungan</a><span>(65)</span></li>
                                        <li><a href="">Sampah</a><span>(54)</span></li>
                                        <li><a href="">Kebersihan</a><span>(43)</span></li>
                                        <li><a href="">Teknologi</a><span>(32)</span></li>
                                </div>
                            </div>

                            <div class="sidebar-widget">
                                <h2 class="widget-title">Tentang Kami</h2>
                                <div class="text-widget">
                                    <p>
                                        Green Ranger merupakan Sebuah website perekrutan relawan kebersihan dan pengumpulan donasi.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Post End-->


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
