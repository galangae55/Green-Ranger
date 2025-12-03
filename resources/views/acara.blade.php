<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Event - {{ $event->title ?? 'Green Ranger' }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- CSS Libraries - All from CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>
        .custom-table {
            width: 100%;
            border-collapse: collapse;
            background-color: #F8B739;
            color: white;
            margin: 20px 0;
        }

        .custom-table th, .custom-table td {
            padding: 12px;
            text-align: left;
            border: 1px solid white;
        }

        .custom-table th {
            background-color: #f2f2f2;
            color: #000;
        }

        .custom-table tr:nth-child(even) {
            background-color: #FFCC66;
        }

        .custom-table tr:hover {
            background-color: #FFC107;
            transition: background-color 0.3s ease;
        }

        /* Schedule Item Styling */
        .schedule-item {
            background: linear-gradient(135deg, #3a5f4c, #4a7c59);
            color: white;
            border: none;
            height: 100%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .schedule-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }

        .schedule-item h4 {
            color: #F8B739;
            margin-bottom: 15px;
        }

        .schedule-item i {
            color: #F8B739;
            margin-right: 8px;
        }

        /* Event Info Styling */
        .event-info h2 {
            color: #3a5f4c;
            font-weight: 700;
        }

        .date-time, .location {
            color: #666;
            margin-bottom: 10px;
        }

        .date-time i, .location i {
            color: #F8B739;
            margin-right: 10px;
        }

        .description {
            color: #333;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .register-button {
            background: linear-gradient(135deg, #3a5f4c, #4a7c59);
            border: none;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .register-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(58, 95, 76, 0.4);
        }

        /* Carousel Image Fallback */
        .carousel-img img {
            width: 100%;
            height: 500px;
            object-fit: cover;
            background: linear-gradient(135deg, #3a5f4c, #4a7c59);
        }

        /* Fallback for missing images */
        .carousel-img img[src=""],
        .carousel-img img:not([src]) {
            background: linear-gradient(135deg, #3a5f4c, #4a7c59);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 18px;
        }

        .carousel-img img[src=""]::after,
        .carousel-img img:not([src])::after {
            content: "Image not found";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
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

            .carousel-img img {
                height: 300px;
            }
        }
        /* Volunteer Carousel Styles */
.volunteer-carousel .owl-stage {
    padding: 20px 0;
}

.volunteer-card {
    padding: 10px;
}

.volunteer-item {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border: none;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    height: 250px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.volunteer-item:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.2);
    background: linear-gradient(135deg, #3a5f4c 0%, #4a7c59 100%);
    color: white;
}

.volunteer-item:hover .volunteer-name,
.volunteer-item:hover .volunteer-join-date,
.volunteer-item:hover .volunteer-age,
.volunteer-item:hover .join-time {
    color: white;
}

.volunteer-avatar {
    width: 70px;
    height: 70px;
    margin: 0 auto;
    background: linear-gradient(135deg, #3a5f4c 0%, #4a7c59 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 28px;
    font-weight: bold;
    box-shadow: 0 5px 15px rgba(58, 95, 76, 0.3);
}

.volunteer-name {
    font-weight: 600;
    color: #3a5f4c;
    margin-bottom: 5px;
    font-size: 18px;
}

.volunteer-join-date {
    color: #666;
    font-size: 14px;
    margin-bottom: 5px;
}

.volunteer-age {
    color: #666;
    font-size: 14px;
    margin-bottom: 10px;
}

.join-time {
    display: inline-block;
    background: #F8B739;
    color: white;
    padding: 5px 15px;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 500;
    margin-top: 10px;
}

.empty-volunteer {
    background: #f8f9fa;
    padding: 40px;
    border-radius: 15px;
    border: 2px dashed #ddd;
    color: #666;
}

/* Owl Carousel Navigation for Volunteer */
.volunteer-carousel .owl-nav {
    position: absolute;
    top: 50%;
    width: 100%;
    transform: translateY(-50%);
    display: flex;
    justify-content: space-between;
    pointer-events: none;
}

.volunteer-carousel .owl-nav button {
    pointer-events: all;
    background: rgba(58, 95, 76, 0.8) !important;
    color: white !important;
    width: 40px;
    height: 40px;
    border-radius: 50% !important;
    display: flex !important;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.volunteer-carousel .owl-nav button:hover {
    background: rgba(58, 95, 76, 1) !important;
    transform: scale(1.1);
}

.volunteer-carousel .owl-nav button span {
    font-size: 24px !important;
    line-height: 1;
}

.volunteer-carousel .owl-dots {
    margin-top: 20px;
}

.volunteer-carousel .owl-dots button.owl-dot {
    background: #ddd !important;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    margin: 0 5px;
}

.volunteer-carousel .owl-dots button.owl-dot.active {
    background: #3a5f4c !important;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .volunteer-item {
        height: 220px;
    }
    
    .volunteer-avatar {
        width: 60px;
        height: 60px;
        font-size: 24px;
    }
    
    .volunteer-name {
        font-size: 16px;
    }
    
    .volunteer-join-date,
    .volunteer-age {
        font-size: 13px;
    }
    
    .volunteer-carousel .owl-nav {
        display: none;
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
                        alert('Anda telah berhasil logout.');
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

                    @if (session('user_name'))
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: flex;">
                            @csrf
                            <button type="submit" title="Log Out" style="background: none;border: none;cursor: pointer;color: rgb(255, 255, 255);display: flex;align-items: center;padding-right: 15px;">
                                <i class="fas fa-sign-out-alt" style="font-size: 20px;"></i>
                            </button>
                        </form>
                    @else
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
                        <img src="{{ asset('img/ss2.jpg') }}" alt="Bersama menjaga kebersihan" onerror="this.style.background='linear-gradient(135deg, #3a5f4c, #4a7c59)'; this.alt='Image not available';">
                    </div>
                    <div class="carousel-text">
                        <h1>Bersama menjaga kebersihan, bersama membuat perubahan</h1>
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
                        <img src="{{ asset('img/ss1.jpg') }}" alt="Media kebersihan informatif" onerror="this.style.background='linear-gradient(135deg, #3a5f4c, #4a7c59)'; this.alt='Image not available';">
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
                        <img src="{{ asset('img/ss3.jpg') }}" alt="Mari bergabung" onerror="this.style.background='linear-gradient(135deg, #3a5f4c, #4a7c59)'; this.alt='Image not available';">
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
                @if($event->image)
                    <img src="{{ asset('storage/' . $event->image) }}" 
                         alt="{{ $event->title }}" 
                         class="img-fluid rounded shadow"
                         onerror="this.src='https://via.placeholder.com/600x400/3a5f4c/ffffff?text=Event+Image'">
                @else
                    <img src="https://via.placeholder.com/600x400/3a5f4c/ffffff?text=Event+Image" 
                         alt="Event Image" 
                         class="img-fluid rounded shadow">
                @endif
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-left">
            <div class="event-info">
                <h2 class="my-4">{{ $event->title ?? 'Event Title' }}</h2>
                <p class="date-time">
                    <i class="fas fa-calendar-alt"></i> 
                    {{ isset($event->date) ? \Carbon\Carbon::parse($event->date)->format('d F Y') : 'Date not set' }} | 
                    {{ $event->time ?? 'Time not set' }} WIB
                </p>
                <p class="location">
                    <i class="fas fa-map-marker-alt"></i> 
                    {{ $event->location ?? 'Location not set' }}
                </p>
                <p class="description">{{ $event->description ?? 'Description not available' }}</p>
                <button class="btn btn-primary mt-3 register-button">
                    <a href="/volunteer?event={{ urlencode($event->title ?? '') }}" 
                       style="color: aliceblue; text-decoration: none;">Daftar sekarang</a>
                </button>
            </div>
        </div>
        </section>

        {{-- Dynamic Schedule Section --}}
        @if(isset($detail) && isset($detail->schedule) && count($detail->schedule) > 0)
        <section class="event-schedule my-5">
            <div class="text-center" data-aos="fade-up">
                <h2 class="my-4">Susunan Acara</h2>
            </div>
            <div class="row">
                @foreach($detail->schedule as $index => $schedule)
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                    <div class="schedule-item p-3 rounded shadow d-flex flex-column">
                        <h4>{{ $schedule['title'] ?? 'Schedule Title' }}</h4>
                        <p><i class="fas fa-clock"></i> {{ $schedule['time'] ?? 'Time not set' }}</p>
                        <p>{{ $schedule['description'] ?? 'Description not available' }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        @endif

        {{-- Dynamic Gallery Section --}}
            @if(isset($detail) && !empty($detail->gallery))
            <section class="event-gallery my-5">
                <div class="text-center" data-aos="fade-up">
                    <h2 class="my-4">Galeri</h2>
                </div>
                <div class="row">
                    @foreach($detail->gallery as $index => $gallery)
                    <div class="col-md-4 mb-4" data-aos="zoom-in" data-aos-delay="{{ ($index + 1) * 100 }}">
                        {{-- GALLERY - PERBAIKAN DI SINI --}}
                        @if($gallery)
                            <img src="{{ asset('storage/' . $gallery) }}" 
                                alt="Gallery Image {{ $index + 1 }}" 
                                class="img-fluid rounded shadow" 
                                onerror="this.src='https://via.placeholder.com/400x300/4a7c59/ffffff?text=Gallery+Image'">
                        @else
                            <img src="https://via.placeholder.com/400x300/4a7c59/ffffff?text=Gallery+Image" 
                                alt="Gallery Image {{ $index + 1 }}" 
                                class="img-fluid rounded shadow">
                        @endif
                    </div>
                    @endforeach
                </div>
            </section>
            @endif
        </main>
    <!-- Event detail end -->

    <<!-- Volunteer List Start -->
@if(!empty($volunteers) && $volunteers->count() > 0)
<div class="container my-5">
    <div class="text-center" data-aos="fade-up">
        <h2 style="color: #3a5f4c;">Volunteer yang Telah Bergabung</h2>
        <p class="text-muted mb-4"> {{ count($volunteers) }} orang telah mendaftar</p>
    </div>
    
    <!-- Volunteer Carousel -->
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="volunteer-carousel owl-carousel owl-theme">
                @foreach ($volunteers as $volunteer)
                <div class="volunteer-card" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="card volunteer-item">
                        <div class="card-body text-center">
                            <!-- Avatar/Initial -->
                            <div class="volunteer-avatar mb-3">
                                <span>{{ strtoupper(substr($volunteer->username, 0, 1)) }}</span>
                            </div>
                            
                            <!-- Volunteer Info -->
                            <h5 class="volunteer-name">{{ $volunteer->username }}</h5>
                            <p class="volunteer-join-date">
                                <i class="fas fa-calendar-alt mr-2"></i>
                                Bergabung: {{ \Carbon\Carbon::parse($volunteer->created_at)->format('d M Y') }}
                            </p>
                            <!-- Join Time -->
                            <div class="join-time">
                                <i class="fas fa-clock"></i>
                                {{ \Carbon\Carbon::parse($volunteer->created_at)->format('H:i') }}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@else
<div class="container my-5">
    <div class="text-center" data-aos="fade-up">
        <h2 style="color: #3a5f4c;">Volunteer yang Telah Bergabung</h2>
        <div class="empty-volunteer">
            <i class="fas fa-users fa-3x mb-3" style="color: #ddd;"></i>
            <p>Belum ada volunteer yang mendaftar untuk event ini.</p>
            <a href="/volunteer?event={{ urlencode($event->title ?? '') }}" class="btn btn-primary mt-2">
                <i class="fas fa-user-plus mr-2"></i>Jadilah yang pertama!
            </a>
        </div>
    </div>
</div>
@endif
<!-- Volunteer List End -->

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
                    <p>Designed By Green Ranger Team</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to top button -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries - All from CDN -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Template Javascript - Fallback if local file doesn't exist -->
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
            } else {
                console.error('Owl Carousel not available');
                initSimpleCarousel();
            }

            // Initialize AOS
            if (typeof AOS !== 'undefined') {
                AOS.init({
                    duration: 1000,
                    once: true,
                    offset: 100
                });
                console.log('AOS initialized successfully');
            } else {
                console.error('AOS not available');
            }

             if ($('.volunteer-carousel').length > 0) {
                initVolunteerCarousel();
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

        // Fallback simple carousel if Owl Carousel fails
        function initSimpleCarousel() {
            console.log('Initializing simple carousel fallback...');
            const $carousel = $('.owl-carousel');
            const $items = $carousel.find('.carousel-item');
            let currentIndex = 0;

            if ($items.length === 0) return;

            // Hide all items except first
            $items.hide().eq(0).show();

            // Auto rotate every 5 seconds
            setInterval(() => {
                $items.eq(currentIndex).fadeOut(500);
                currentIndex = (currentIndex + 1) % $items.length;
                $items.eq(currentIndex).fadeIn(500);
            }, 5000);
        }

        // Global function for social media notifications
        function showNotification(platform) {
            Swal.fire({
                icon: 'info',
                title: 'Informasi',
                text: `Maaf, ${platform} belum tersedia.`,
                confirmButtonText: 'OK'
            });
        }

        // Initialize Volunteer Carousel
function initVolunteerCarousel() {
    if (typeof $.fn.owlCarousel !== 'undefined') {
        $('.volunteer-carousel').owlCarousel({
            loop: true,
            margin: 20,
            nav: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                576: {
                    items: 2,
                    nav: false
                },
                768: {
                    items: 3,
                    nav: true
                },
                992: {
                    items: 4,
                    nav: true
                }
            },
            navText: [
                '<i class="fas fa-chevron-left"></i>',
                '<i class="fas fa-chevron-right"></i>'
            ]
        });
        console.log('Volunteer Carousel initialized successfully');
    }
}


    </script>
</body>
</html>
