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
                            <img src="img/blog3.jpg" />
                            <h2>Mengelola Sampah Rumah Tangga Secara Efektif</h2>
                            <h3>Deskripsi</h3>
                            <p>
                                Mengelola sampah rumah tangga secara efektif adalah langkah penting dalam menjaga kebersihan lingkungan dan kesehatan masyarakat. Dengan penerapan metode yang tepat,
                                kita bisa mengurangi dampak negatif sampah terhadap lingkungan dan memanfaatkan sumber daya dengan lebih baik. Berikut adalah beberapa strategi untuk mengelola sampah rumah tangga secara efektif.
                            </p>

                            <h6>1. Penerapan Prinsip 3R (Reduce, Reuse, Recycle)</h6>
                            <p>Penerapan prinsip 3R (Reduce, Reuse, Recycle) adalah langkah awal yang efektif dalam mengelola sampah rumah tangga. Reduce, atau mengurangi, mengharuskan kita untuk mengurangi penggunaan barang-barang sekali pakai dan memilih
                                produk dengan kemasan minimal. Misalnya, membeli barang dalam jumlah besar dapat mengurangi jumlah kemasan yang dihasilkan.
                                 Reuse, atau menggunakan kembali, mendorong kita untuk memanfaatkan kembali barang-barang yang masih bisa digunakan, seperti kantong belanja, botol kaca, dan pakaian. Sementara itu, Recycle, atau mendaur ulang, menuntut kita untuk memisahkan sampah berdasarkan jenisnya seperti plastik, kertas, logam, dan kaca, agar dapat didaur ulang dengan mudah.</p>
                            <h6>2. Pemilahan Sampah di Rumah</h6>
                            <p>
                                Pemilahan sampah adalah langkah penting dalam proses daur ulang. Di rumah, kita dapat memisahkan sampah organik, anorganik, dan berbahaya. Sampah organik termasuk sisa makanan, kulit buah, dan sayuran yang bisa diolah menjadi kompos. Sampah anorganik mencakup plastik, kertas, logam, dan kaca yang perlu dipisahkan berdasarkan jenisnya untuk memudahkan proses daur ulang.
                                 Sampah berbahaya seperti baterai, lampu neon, dan obat-obatan kadaluwarsa memerlukan penanganan khusus dan sebaiknya dibawa ke tempat pengolahan sampah berbahaya.
                            </p>
                            <h6>3. Pengomposan</h6>
                            <p>Pengomposan adalah cara efektif untuk mengubah sampah organik menjadi kompos, yang dapat digunakan sebagai pupuk alami untuk tanaman. Langkah-langkah dasar pengomposan meliputi pengumpulan sampah organik seperti sisa makanan, daun kering, dan potongan rumput, kemudian mencampurnya dengan tanah atau kompos lama untuk mempercepat proses dekomposisi.
                                Pastikan kompos mendapatkan cukup udara dengan mengaduknya secara berkala. Setelah beberapa minggu atau bulan, kompos siap digunakan sebagai pupuk untuk tanaman.</p>
                            <h6>4. Mengurangi Penggunaan Plastik</h6>
                            <p>Mengurangi penggunaan plastik adalah salah satu langkah penting dalam mengelola sampah rumah tangga. Plastik adalah salah satu jenis sampah yang paling sulit terurai. Untuk mengurangi penggunaannya, kita bisa menggunakan tas belanja yang dapat digunakan kembali,
                                menghindari membeli produk dengan kemasan plastik yang berlebihan, dan memilih produk yang dikemas dalam bahan yang ramah lingkungan seperti kertas atau kaca.</p>
                            <h6>5. Menggunakan Produk Ramah Lingkungan</h6>
                            <p>Memilih produk ramah lingkungan dapat membantu mengurangi jumlah sampah dan dampak negatif terhadap lingkungan. Produk-produk ini termasuk produk dengan kemasan biodegradable, produk yang dapat diisi ulang seperti botol air, tinta printer, dan sabun cair, serta produk yang dibuat dari bahan daur ulang.
                                 Dengan memilih produk-produk ini, kita dapat mengurangi jumlah sampah yang dihasilkan dan mendukung keberlanjutan lingkungan.</p>
                            <h6>6. Edukasi dan Kesadaran</h6>
                            <p>Meningkatkan kesadaran tentang pentingnya pengelolaan sampah yang efektif adalah langkah kunci. Edukasi dapat dilakukan dengan memberikan informasi kepada anggota keluarga tentang cara memisahkan sampah dan manfaat daur ulang. Selain itu, berpartisipasi dalam program komunitas yang mendukung pengelolaan sampah,
                                 serta mengajarkan anak-anak tentang pentingnya menjaga kebersihan dan merawat lingkungan sejak dini, adalah langkah penting lainnya.</p>
                            <h6>7. Pengolahan Sampah di Komunitas</h6>
                            <p>Selain pengelolaan sampah di rumah, pengolahan sampah di tingkat komunitas juga penting. Beberapa langkah yang bisa diambil antara lain menyediakan tempat sampah terpisah di area publik untuk sampah organik dan anorganik, mengadakan program pengumpulan sampah berbahaya secara berkala, dan membangun pusat daur ulang
                                komunitas untuk memproses sampah yang bisa didaur ulang. Pengolahan sampah di komunitas ini dapat membantu mengurangi volume sampah yang harus dibuang ke tempat pembuangan akhir dan memudahkan proses daur ulang.</p>
                            <h5>Kesimpulan</h5>
                            <p>Mengelola sampah rumah tangga secara efektif memerlukan komitmen dan kesadaran dari setiap individu. Dengan menerapkan prinsip 3R, memilah sampah, mengompos, mengurangi penggunaan plastik, memilih produk ramah lingkungan, meningkatkan edukasi, dan berpartisipasi dalam pengolahan sampah komunitas, kita dapat mengurangi dampak negatif
                                sampah terhadap lingkungan dan menciptakan lingkungan yang lebih bersih dan sehat. Mari kita mulai dari diri sendiri dan keluarga untuk membuat perubahan positif bagi lingkungan.</p>

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
                                <h3>Effendi</h3>
                                <p>
                                    Merupakan seorang jurnalis National Geographic.
                                </p>
                            </div>
                        </div>
                        <div class="single-related">
                            <h2>Postingan Serupa</h2>
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
                                    <input type="hidden" name="origin" value="detail3">
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
