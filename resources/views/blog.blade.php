<!DOCTYPE html>
<html lang="en">
    <head>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Blog - Green Ranger</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="Blog artikel dan tips kebersihan lingkungan - Green Ranger">
    <meta name="keywords" content="blog, lingkungan, kebersihan, tips, artikel, green ranger">
    <meta name="author" content="Green Ranger Team">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- CSS Libraries - All from CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
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
                                <a href="#" onclick="showNotification('Twitter')"><i class="fab fa-twitter"></i></a>
                                <a href="#" onclick="showNotification('Facebook')"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" onclick="showNotification('LinkedIn')"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#" onclick="showNotification('Instagram')"><i class="fab fa-instagram"></i></a>
                            </div>
                            <script>
                                function showNotification(platform) {
                                    Swal.fire({
                                        icon: 'info',
                                        title: 'Informasi',
                                        text: `Maaf, ${platform} belum tersedia.`,
                                        confirmButtonText: 'OK'
                                    });
                                }
                            </script>
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


        <!-- Blog Start -->
        <div class="blog">
            <div class="container">
                <div class="section-header text-center">
                    <p>Blog kami</p>
                    <h2>Artikel dan tips kebersihan terbaru</h2>
                </div>
                <div class="row">
                    @forelse($blogs as $blog)
                    <div class="col-lg-4 mb-4">
                        <div class="blog-item">
                            <div class="blog-img">
                                <img src="{{ asset('img/' . $blog->image) }}" alt="{{ $blog->title }}"
                                    onerror="this.src='https://via.placeholder.com/400x300/3a5f4c/ffffff?text=Blog+Image'">
                            </div>
                            <div class="blog-text">
                                <h3><a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a></h3>
                                <p>{{ $blog->excerpt }}</p>
                            </div>
                            <div class="blog-meta">
                                @if($blog->author)
                                <p><i class="fa fa-user"></i><a href="#">{{ $blog->author }}</a></p>
                                @endif
                                @if($blog->comment_count > 0)
                                <p><i class="fa fa-comments"></i><a href="#">{{ $blog->comment_count }} komentar</a></p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 text-center">
                        <div class="alert alert-info">
                            <h4>Belum ada artikel blog</h4>
                            <p>Silakan kembali lagi nanti untuk membaca artikel terbaru kami.</p>
                        </div>
                    </div>
                    @endforelse
                </div>

                 {{-- Pagination --}}
                <style>
                <style>
                /* Tombol Previous/Next */
                nav[role="navigation"] a[rel="prev"],
                nav[role="navigation"] a[rel="next"],
                nav[role="navigation"] span[aria-label*="Previous"],
                nav[role="navigation"] span[aria-label*="Next"] {
                    display: flex;
                    align-items: center;
                    gap: 6px;
                    padding: 8px 12px !important;
                    background: white;
                    border: 1px solid #e9ecef;
                    border-radius: 6px;
                    color: #495057 !important;
                    text-decoration: none;
                    font-size: 14px !important;
                    font-weight: 500;
                    transition: all 0.2s ease;
                }

                nav[role="navigation"] a[rel="prev"]:hover,
                nav[role="navigation"] a[rel="next"]:hover {
                    background: #ffd43b !important;
                    color: #495057 !important;
                    border-color: #ffd43b;
                    transform: translateY(-1px);
                }

                /* Ikon panah */
                nav[role="navigation"] svg {
                    width: 16px !important;
                    height: 16px !important;
                    transition: transform 0.2s ease;
                }

                nav[role="navigation"] a[rel="prev"]:hover svg {
                    transform: translateX(-2px);
                }

                nav[role="navigation"] a[rel="next"]:hover svg {
                    transform: translateX(2px);
                }

                nav[role="navigation"] a:not([rel="prev"]):not([rel="next"]):hover {
                    background: #ffd43b !important;
                    color: #495057 !important;
                    border-color: #ffd43b;
                    transform: translateY(-1px);
                }

                /* Active page */
                nav[role="navigation"] span[aria-current="page"] {
                    background: #ffd43b !important;
                    color: #495057 !important;
                    border-color: #ffd43b !important;
                    font-weight: 600;
                }

                /* Disabled state */
                nav[role="navigation"] span[aria-label*="Previous"],
                nav[role="navigation"] span[aria-label*="Next"] {
                    background: #f8f9fa !important;
                    color: #adb5bd !important;
                    border-color: #e9ecef !important;
                    cursor: not-allowed;
                }

                /* Hide "Showing results" text */
                nav[role="navigation"] > div:first-child {
                    display: none !important;
                }
                </style>

                <div class="d-flex justify-content-center mt-4">
                    {{ $blogs->links() }}
                </div>
            </div>
        </div>
        <!-- Blog End -->
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
        <!-- Footer End -->

        <!-- Back to top button -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

        <!-- Pre Loader -->
        <div id="loader" class="show">
            <div class="loader"></div>
        </div>

        <!-- JavaScript Libraries - All from CDN -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Template Javascript -->
        <script src="{{ asset('js/main.js') }}" onerror="console.log('Main.js not found, continuing without it')"></script>

        <script>
            // Initialize everything when document is ready
            $(document).ready(function() {
                console.log('Document ready, initializing components...');

                // Initialize Owl Carousel
                if (typeof $.fn.owlCarousel !== 'undefined') {
                    $('.owl-carousel').owlCarousel({
                        items: 1,
                        loop: true,
                        nav: true,
                        dots: true,
                        autoplay: true,
                        autoplayTimeout: 5000,
                        autoplayHoverPause: true,
                        responsive: {
                            0: {
                                items: 1,
                                nav: false
                            },
                            600: {
                                items: 1,
                                nav: false
                            },
                            1000: {
                                items: 1,
                                nav: true
                            }
                        }
                    });
                    console.log('Owl Carousel initialized successfully');
                }

                // Initialize AOS
                if (typeof AOS !== 'undefined') {
                    AOS.init({
                        duration: 1000,
                        once: true,
                        offset: 100
                    });
                    console.log('AOS initialized successfully');
                }

                // Back to top button
                $(window).scroll(function() {
                    if ($(this).scrollTop() > 100) {
                        $('.back-to-top').fadeIn('slow');
                    } else {
                        $('.back-to-top').fadeOut('slow');
                    }
                });

                $('.back-to-top').click(function() {
                    $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
                    return false;
                });
            });

            // Global function for social media notifications
            function showNotification(platform) {
                Swal.fire({
                    icon: 'info',
                    title: 'Informasi',
                    text: `Maaf, ${platform} belum tersedia.`,
                    confirmButtonText: 'OK'
                });
            }
        </script>
    </body>
</html>
