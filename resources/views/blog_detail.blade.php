<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ $blog->title }} - Green Ranger</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ Str::limit(strip_tags($blog->excerpt), 160) }}">
    <meta name="keywords" content="blog, lingkungan, kebersihan, artikel, green ranger">
    <meta name="author" content="{{ $blog->author }}">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>
        :root {
            --primary-green: #3a5f4c;
            --secondary-green: #4a7c59;
            --light-green: #e9f5ee;
            --accent-yellow: #F8B739;
            --light-yellow: #fff9e6;
            --dark-gray: #333333;
            --medium-gray: #666666;
            --light-gray: #f8f9fa;
            --white: #ffffff;
        }

        /* Global Styles */
        body {
            font-family: 'Quicksand', sans-serif;
            color: var(--dark-gray);
            /* line-height: 1; */
        }

        .btn-custom {
            background: var(--primary-green);
            color: var(--white);
            border: none;
            padding: 10px 25px;
            border-radius: 5px;
            transition: all 0.3s ease;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-custom:hover {
            background: var(--secondary-green);
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(58, 95, 76, 0.2);
        }

        .btn-yellow {
            background: var(--accent-yellow);
            color: var(--dark-gray);
            border: none;
            padding: 10px 25px;
            border-radius: 5px;
            transition: all 0.3s ease;
            font-weight: 600;
        }

        .btn-yellow:hover {
            background: #e0a32d;
            color: var(--dark-gray);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(248, 183, 57, 0.2);
        }

        /* Single Post Container */
        .single {
            padding: 80px 0 60px;
            background: var(--light-gray);
        }

        /* Single Content Styles */
        .single-content {
            background: var(--white);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            margin-bottom: 40px;
        }

        .single-content img.featured-image {
            width: 100%;
            height: 500px;
            object-fit: cover;
            border-radius: 12px;
            margin-bottom: 30px;
            border: 5px solid var(--light-green);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .single-content h1 {
            color: var(--primary-green);
            margin-bottom: 20px;
            font-weight: 700;
            font-size: 2.5rem;
            line-height: 1.3;
        }

        .single-content h2 {
            color: var(--primary-green);
            margin: 30px 0 15px;
            font-weight: 600;
            font-size: 1.8rem;
            border-left: 4px solid var(--accent-yellow);
            padding-left: 15px;
        }

        .single-content h3 {
            color: var(--secondary-green);
            margin: 25px 0 15px;
            font-weight: 600;
            font-size: 1.5rem;
        }

        .single-content p {
            line-height: 1.8;
            margin-bottom: 20px;
            color: var(--medium-gray);
            font-size: 1.1rem;
        }

        .single-content blockquote {
            border-left: 4px solid var(--accent-yellow);
            padding: 20px 30px;
            margin: 30px 0;
            background: var(--light-yellow);
            border-radius: 0 8px 8px 0;
            font-style: italic;
            color: var(--primary-green);
            font-size: 1.2rem;
        }

        .single-content ul, .single-content ol {
            padding-left: 20px;
            margin-bottom: 20px;
        }

        .single-content li {
            margin-bottom: 10px;
            color: var(--medium-gray);
        }

        /* Blog Meta Information */
        .blog-meta {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid var(--light-green);
            flex-wrap: wrap;
            gap: 20px;
        }

        .blog-meta-item {
            display: flex;
            align-items: center;
            color: var(--medium-gray);
            font-size: 0.95rem;
            background: var(--light-green);
            padding: 8px 15px;
            border-radius: 25px;
        }

        .blog-meta-item i {
            margin-right: 8px;
            color: var(--primary-green);
            font-size: 1rem;
        }

        .blog-meta-item a {
            color: var(--primary-green);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .blog-meta-item a:hover {
            color: var(--accent-yellow);
        }

        /* Tags Styles */
        .single-tags {
            margin: 30px 0;
            padding: 25px;
            background: var(--light-green);
            border-radius: 10px;
        }

        .single-tags h4 {
            color: var(--primary-green);
            margin-bottom: 15px;
            font-weight: 600;
        }

        .single-tags a {
            display: inline-block;
            background: var(--white);
            color: var(--primary-green);
            padding: 8px 20px;
            margin: 0 8px 12px 0;
            border-radius: 25px;
            text-decoration: none;
            border: 2px solid var(--primary-green);
            transition: all 0.3s ease;
            font-weight: 500;
            font-size: 0.9rem;
        }

        .single-tags a:hover {
            background: var(--primary-green);
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(58, 95, 76, 0.2);
        }

        /* Author Bio */
        .single-bio {
            background: linear-gradient(135deg, var(--light-green) 0%, var(--white) 100%);
            padding: 30px;
            border-radius: 15px;
            margin: 40px 0;
            display: flex;
            align-items: center;
            border: 2px solid var(--primary-green);
        }

        .single-bio-img {
            margin-right: 25px;
            flex-shrink: 0;
        }

        .single-bio-img img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid var(--accent-yellow);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .single-bio-text p.author-label {
            color: var(--accent-yellow);
            font-weight: 600;
            margin-bottom: 5px;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.9rem;
        }

        .single-bio-text h3 {
            color: var(--primary-green);
            margin-bottom: 10px;
            font-weight: 700;
        }

        .single-bio-text > p {
            color: var(--medium-gray);
            margin-bottom: 0;
        }

        /* Related Posts */
        .single-related {
            margin: 50px 0 40px;
        }

        .single-related h2 {
            color: var(--primary-green);
            margin-bottom: 30px;
            font-weight: 700;
            text-align: center;
            position: relative;
            padding-bottom: 15px;
        }

        .single-related h2:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: var(--accent-yellow);
        }

        .related-post-item {
            background: var(--white);
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
            height: 100%;
            border: 1px solid var(--light-green);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .related-post-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
        }

        .related-post-img {
            height: 200px;
            overflow: hidden;
        }

        .related-post-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .related-post-item:hover .related-post-img img {
            transform: scale(1.05);
        }

        .related-post-content {
            padding: 20px;
        }

        .related-post-content h4 {
            margin-bottom: 10px;
        }

        .related-post-content h4 a {
            color: var(--primary-green);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
            display: block;
            line-height: 1.4;
        }

        .related-post-content h4 a:hover {
            color: var(--accent-yellow);
        }

        .related-post-meta {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .related-post-meta span {
            color: var(--medium-gray);
            font-size: 0.85rem;
            display: flex;
            align-items: center;
        }

        .related-post-meta span i {
            margin-right: 5px;
            color: var(--primary-green);
        }

        .category-badge {
            background: var(--primary-green);
            color: var(--white);
            padding: 4px 12px;
            border-radius: 15px;
            font-size: 0.8rem;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .category-badge:hover {
            background: var(--accent-yellow);
            color: var(--dark-gray);
            text-decoration: none;
        }

        /* Comments Section */
        .comments-section {
            background: var(--white);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            margin-top: 40px;
        }

        .section-title {
            color: var(--primary-green);
            margin-bottom: 25px;
            font-weight: 700;
            position: relative;
            padding-bottom: 10px;
        }

        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: var(--accent-yellow);
        }

        .comment-count {
            background: var(--light-yellow);
            color: var(--primary-green);
            padding: 10px 20px;
            border-radius: 8px;
            margin-bottom: 25px;
            font-weight: 600;
            display: inline-block;
            border-left: 4px solid var(--accent-yellow);
        }

        .comment-item {
            display: flex;
            padding: 25px 0;
            border-bottom: 1px solid var(--light-green);
        }

        .comment-item:last-child {
            border-bottom: none;
        }

        .comment-avatar {
            margin-right: 20px;
            flex-shrink: 0;
        }

        .comment-avatar img {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--accent-yellow);
        }

        .comment-details {
            flex: 1;
        }

        .comment-details h5 {
            color: var(--primary-green);
            margin-bottom: 5px;
            font-weight: 600;
        }

        .comment-date {
            color: var(--medium-gray);
            font-size: 0.85rem;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .comment-date i {
            margin-right: 5px;
            color: var(--primary-green);
        }

        .comment-text {
            color: var(--dark-gray);
            line-height: 1.6;
            background: var(--light-gray);
            padding: 15px;
            border-radius: 8px;
            border-left: 3px solid var(--primary-green);
        }

        /* Comment Form */
        .comment-form {
            margin-top: 40px;
            padding: 30px;
            background: var(--light-green);
            border-radius: 12px;
        }

        .comment-form .form-group {
            margin-bottom: 20px;
        }

        .comment-form label {
            color: var(--primary-green);
            font-weight: 600;
            margin-bottom: 8px;
            display: block;
        }

        .comment-form .form-control {
            border: 2px solid var(--light-green);
            border-radius: 8px;
            padding: 12px 15px;
            transition: all 0.3s ease;
            font-size: 1rem;
        }

        .comment-form .form-control:focus {
            border-color: var(--accent-yellow);
            box-shadow: 0 0 0 0.2rem rgba(248, 183, 57, 0.25);
        }

        /* Sidebar Styles */
        .sidebar {
            position: sticky;
            top: 100px;
        }

        .sidebar-widget {
            background: var(--white);
            padding: 25px;
            border-radius: 12px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            border: 1px solid var(--light-green);
        }

        .widget-title {
            color: var(--primary-green);
            font-weight: 700;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--accent-yellow);
            position: relative;
        }

        .widget-title:after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 40px;
            height: 2px;
            background: var(--primary-green);
        }

        /* Search Widget */
        .search-widget form {
            position: relative;
        }

        .search-widget .form-control {
            border: 2px solid var(--primary-green);
            border-radius: 25px;
            padding: 12px 20px;
            font-size: 1rem;
        }

        .search-widget .btn {
            position: absolute;
            right: 5px;
            top: 5px;
            background: var(--primary-green);
            color: var(--white);
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .search-widget .btn:hover {
            background: var(--accent-yellow);
        }

        /* Recent Posts Widget */
        .post-item {
            display: flex;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--light-green);
            transition: transform 0.3s ease;
        }

        .post-item:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }

        .post-item:hover {
            transform: translateX(5px);
        }

        .post-img {
            flex: 0 0 80px;
            margin-right: 15px;
        }

        .post-img img {
            width: 100%;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
            border: 2px solid var(--light-green);
        }

        .post-text h5 {
            margin-bottom: 5px;
        }

        .post-text h5 a {
            color: var(--primary-green);
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            transition: color 0.3s ease;
        }

        .post-text h5 a:hover {
            color: var(--accent-yellow);
        }

        .post-meta {
            color: var(--medium-gray);
            font-size: 0.85rem;
        }

        .post-meta a {
            color: var(--accent-yellow);
            font-weight: 500;
            text-decoration: none;
        }

        .post-meta a:hover {
            text-decoration: underline;
        }

        /* Category Widget */
        .category-widget ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .category-widget li {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid var(--light-green);
            transition: all 0.3s ease;
        }

        .category-widget li:last-child {
            border-bottom: none;
        }

        .category-widget li:hover {
            padding-left: 10px;
            background: var(--light-green);
            border-radius: 5px;
        }

        .category-widget li:hover a {
            color: var(--accent-yellow);
        }

        .category-widget a {
            color: var(--primary-green);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .category-widget span {
            background: var(--light-yellow);
            color: var(--primary-green);
            padding: 3px 10px;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        /* Tag Widget */
        .tag-widget a {
            display: inline-block;
            background: var(--light-green);
            color: var(--primary-green);
            padding: 8px 16px;
            margin: 0 8px 12px 0;
            border-radius: 20px;
            text-decoration: none;
            border: 1px solid var(--light-green);
            transition: all 0.3s ease;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .tag-widget a:hover {
            background: var(--primary-green);
            color: var(--white);
            border-color: var(--primary-green);
            transform: translateY(-2px);
        }

        /* Image Widget */
        .image-widget {
            overflow: hidden;
            border-radius: 10px;
        }

        .image-widget img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.5s ease;
            border: 3px solid var(--light-green);
        }

        .image-widget:hover img {
            transform: scale(1.05);
        }

        /* Text Widget */
        .text-widget p {
            color: var(--medium-gray);
            line-height: 1.7;
            margin-bottom: 0;
        }

        /* Responsive Styles */
        @media (max-width: 991px) {
            .single-content {
                padding: 30px;
            }
            
            .single-content h1 {
                font-size: 2rem;
            }
            
            .single-bio {
                flex-direction: column;
                text-align: center;
            }
            
            .single-bio-img {
                margin-right: 0;
                margin-bottom: 20px;
            }
            
            .sidebar {
                margin-top: 40px;
            }
        }

        @media (max-width: 767px) {
            .single {
                padding: 60px 0 40px;
            }
            
            .single-content {
                padding: 20px;
            }
            
            .single-content h1 {
                font-size: 1.8rem;
            }
            
            .blog-meta {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
            
            .comments-section,
            .comment-form {
                padding: 20px;
            }
            
            .comment-item {
                flex-direction: column;
            }
            
            .comment-avatar {
                margin-right: 0;
                margin-bottom: 15px;
            }
        }

        /* Loading Image Placeholder */
        .img-placeholder {
            background: linear-gradient(45deg, var(--light-green) 25%, var(--light-gray) 25%, var(--light-gray) 50%, var(--light-green) 50%, var(--light-green) 75%, var(--light-gray) 75%, var(--light-gray));
            background-size: 50px 50px;
            animation: loading 1s infinite linear;
        }

        @keyframes loading {
            0% { background-position: 0 0; }
            100% { background-position: 50px 50px; }
        }
    </style>
</head>

<body>
    <!-- SweetAlert Notifications -->
    @if(session('success'))
    <script>
        window.addEventListener('load', function() {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                confirmButtonColor: '#3a5f4c',
            });
        });
    </script>
    @endif

    @if(session('error'))
    <script>
        window.addEventListener('load', function() {
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: "{{ session('error') }}",
                confirmButtonColor: '#d33',
            });
        });
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
                            <p style="margin-bottom: 0px;display: flex;align-items: center;color: #F8B739;padding: 0px 20px;font-weight: 600;">
                                <i class="fas fa-user-circle mr-2"></i> {{ session('user_name') }}
                            </p>
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

    <!-- Breadcrumb Section -->
    <div class="breadcrumb-section" style="background: linear-gradient(rgba(58, 95, 76, 0.9), rgba(58, 95, 76, 0.9)), url('{{ asset('img/blog-bg.jpg') }}'); background-size: cover; background-position: center; padding: 40px 0; color: white;">
        <div class="container">
            <div class="row"style="margin-top:70px;">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb" style="background: transparent; margin-bottom: 0;">
                            <li class="breadcrumb-item"><a href="/" style="color: #F8B739;">Home</a></li>
                            <li class="breadcrumb-item"><a href="/blog" style="color: #F8B739;">Blog</a></li>
                            @if($blog->category)
                            <li class="breadcrumb-item"><a href="{{ route('blog.category', $blog->category->slug) }}" style="color: #F8B739;">{{ $blog->category->name }}</a></li>
                            @endif
                            <li class="breadcrumb-item active" aria-current="page" style="color: white;">{{ Str::limit($blog->title, 50) }}</li>
                        </ol>
                    </nav>
                    <h1 class="mt-3" style="color: white; font-size: 2rem;">Detail Artikel</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Single Post Start-->
    <div class="single">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Blog Content -->
                    <article class="single-content">
                        <!-- Featured Image -->
                        <div class="featured-image-container">
                            <img src="{{ Storage::exists('public/' . $blog->image) ? asset('storage/' . $blog->image) : asset('img/' . $blog->image) }}" 
                                 alt="{{ $blog->title }}"
                                 class="featured-image"
                                 onerror="this.src='https://via.placeholder.com/1200x500/3a5f4c/ffffff?text='+encodeURIComponent('{{ $blog->title }}')"
                                 loading="lazy">
                        </div>

                        <h1>{{ $blog->title }}</h1>
                        
                        <!-- Blog Meta Information -->
                        <div class="blog-meta">
                            @if($blog->category)
                            <div class="blog-meta-item">
                                <i class="fas fa-folder"></i>
                                <a href="{{ route('blog.category', $blog->category->slug) }}">{{ $blog->category->name }}</a>
                            </div>
                            @endif
                            <div class="blog-meta-item">
                                <i class="far fa-calendar"></i>
                                <span>{{ $blog->created_at->translatedFormat('d F Y') }}</span>
                            </div>
                            <div class="blog-meta-item">
                                <i class="fas fa-user"></i>
                                <span>{{ $blog->author }}</span>
                            </div>
                            <div class="blog-meta-item">
                                <i class="far fa-clock"></i>
                                <span>{{ ceil(str_word_count(strip_tags($blog->content)) / 200) }} min read</span>
                            </div>
                        </div>

                        <!-- Blog Content -->
                        <div class="blog-content">
                            {!! $blog->content !!}
                        </div>

                        <!-- Tags -->
                        <div class="single-tags">
                            <h4><i class="fas fa-tags mr-2"></i>Tags:</h4>
                            @forelse($blog->tags as $tag)
                                <a href="{{ route('blog.tag', $tag->slug) }}">#{{ $tag->name }}</a>
                            @empty
                                <span class="text-muted">Tidak ada tags</span>
                            @endforelse
                        </div>

                        <!-- Share Buttons -->
                        <div class="share-buttons d-flex align-items-center mt-4">
                            <span class="mr-3" style="color: var(--primary-green); font-weight: 600;">Bagikan:</span>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" 
                               target="_blank" 
                               class="btn btn-sm mr-2" 
                               style="background: #3b5998; color: white; border-radius: 5px;">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($blog->title) }}" 
                               target="_blank" 
                               class="btn btn-sm mr-2" 
                               style="background: #1da1f2; color: white; border-radius: 5px;">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="https://wa.me/?text={{ urlencode($blog->title . ' - ' . url()->current()) }}" 
                               target="_blank" 
                               class="btn btn-sm mr-2" 
                               style="background: #25d366; color: white; border-radius: 5px;">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                            <a href="mailto:?subject={{ urlencode($blog->title) }}&body={{ urlencode(url()->current()) }}" 
                               class="btn btn-sm" 
                               style="background: #ea4335; color: white; border-radius: 5px;">
                                <i class="fas fa-envelope"></i>
                            </a>
                        </div>
                    </article>

                    <!-- Author Bio -->
                    <div class="single-bio">
                        <div class="single-bio-img">
                            <img src="{{ asset('img/user.jpg') }}" alt="{{ $blog->author }}"
                                 onerror="this.src='https://ui-avatars.com/api/?name='+encodeURIComponent('{{ $blog->author }}')+'&background=3a5f4c&color=ffffff&size=100'">
                        </div>
                        <div class="single-bio-text">
                            <p class="author-label">Tentang Penulis</p>
                            <h3>{{ $blog->author }}</h3>
                            <p>
                                Penulis aktif di Green Ranger yang berfokus pada konten lingkungan dan keberlanjutan.
                                Dengan pengalaman lebih dari 5 tahun di bidang lingkungan, penulis berdedikasi untuk
                                menyebarkan informasi dan edukasi tentang pelestarian lingkungan.
                            </p>
                        </div>
                    </div>

                    <!-- Related Posts -->
                    @if($relatedBlogs->count() > 0)
                    <div class="single-related">
                        <h2>Artikel Terkait</h2>
                        <div class="row">
                            @foreach($relatedBlogs as $relatedBlog)
                            <div class="col-md-6 mb-4">
                                <div class="related-post-item">
                                    <div class="related-post-img">
                                        <img src="{{ Storage::exists('public/' . $relatedBlog->image) ? asset('storage/' . $relatedBlog->image) : asset('img/' . $relatedBlog->image) }}" 
                                             alt="{{ $relatedBlog->title }}"
                                             onerror="this.src='https://via.placeholder.com/400x200/3a5f4c/ffffff?text='+encodeURIComponent('{{ Str::limit($relatedBlog->title, 30) }}')"
                                             loading="lazy">
                                    </div>
                                    <div class="related-post-content">
                                        <h4>
                                            <a href="{{ route('blog.show', $relatedBlog->slug) }}">
                                                {{ Str::limit($relatedBlog->title, 60) }}
                                            </a>
                                        </h4>
                                        <div class="related-post-meta">
                                            @if($relatedBlog->category)
                                            <a href="{{ route('blog.category', $relatedBlog->category->slug) }}" class="category-badge">
                                                {{ $relatedBlog->category->name }}
                                            </a>
                                            @endif
                                            <span>
                                                <i class="far fa-calendar"></i> 
                                                {{ $relatedBlog->created_at->format('d M Y') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Comments Section -->
                    <div class="comments-section">
                        <h3 class="section-title">Komentar</h3>
                        <div class="comment-count">
                            <i class="fas fa-comments mr-2"></i> {{ $blog->comments->count() }} Komentar
                        </div>
                        
                        @if($blog->comments->count() > 0)
                            @foreach($blog->comments as $comment)
                            <div class="comment-item">
                                <div class="comment-avatar">
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($comment->nama) }}&background=3a5f4c&color=ffffff&size=70" 
                                         alt="{{ $comment->nama }}">
                                </div>
                                <div class="comment-details">
                                    <h5>{{ $comment->nama }}</h5>
                                    <div class="comment-date">
                                        <i class="far fa-clock mr-1"></i> {{ $comment->created_at->translatedFormat('d F Y, H:i') }}
                                    </div>
                                    <div class="comment-text">
                                        {{ $comment->komentar }}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <div class="alert alert-info" style="background: var(--light-yellow); border-color: var(--accent-yellow); color: var(--dark-gray);">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-info-circle mr-2" style="color: var(--accent-yellow); font-size: 1.2rem;"></i>
                                    <p class="mb-0">Belum ada komentar. Jadilah yang pertama berkomentar!</p>
                                </div>
                            </div>
                        @endif

                        <!-- Comment Form -->
                        <div class="comment-form">
                            <h3 class="section-title">Tinggalkan Komentar</h3>
                            <form method="POST" action="{{ route('blog.comment.store') }}">
                                @csrf
                                <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Nama *</label>
                                            <input type="text" id="name" name="nama" class="form-control" value="{{ old('nama') }}" required>
                                            @error('nama')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email *</label>
                                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                                            @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="message">Komentar *</label>
                                    <textarea id="message" name="komentar" rows="5" class="form-control" required>{{ old('komentar') }}</textarea>
                                    @error('komentar')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-custom">
                                        <i class="fas fa-paper-plane mr-2"></i> Kirim Komentar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="sidebar">
                        <!-- Search Widget -->
                        <div class="sidebar-widget">
                            <div class="search-widget">
                                <form action="{{ route('blog.index') }}" method="GET">
                                    <input class="form-control" type="text" name="search" placeholder="Cari artikel..." value="{{ request('search') }}">
                                    <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>

                        <!-- Recent Posts Widget -->
                        <div class="sidebar-widget">
                            <h2 class="widget-title">Artikel Terbaru</h2>
                            <div class="recent-post">
                                @forelse($recentBlogs as $recentBlog)
                                <div class="post-item">
                                    <div class="post-img">
                                        <img src="{{ Storage::exists('public/' . $recentBlog->image) ? asset('storage/' . $recentBlog->image) : asset('img/' . $recentBlog->image) }}" 
                                             alt="{{ $recentBlog->title }}"
                                             onerror="this.src='https://via.placeholder.com/80x80/3a5f4c/ffffff?text='+encodeURIComponent(Str::limit($recentBlog->title, 10))"
                                             loading="lazy">
                                    </div>
                                    <div class="post-text">
                                        <h5>
                                            <a href="{{ route('blog.show', $recentBlog->slug) }}">
                                                {{ Str::limit($recentBlog->title, 50) }}
                                            </a>
                                        </h5>
                                        <div class="post-meta">
                                            <i class="far fa-calendar mr-1"></i> {{ $recentBlog->created_at->format('d M') }}
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <p class="text-muted">Tidak ada artikel terbaru</p>
                                @endforelse
                            </div>
                        </div>

                        <!-- Image Widget -->
                        <div class="sidebar-widget">
                            <div class="image-widget">
                                <a href="/volunteer">
                                    <img src="{{ asset('img/becomevolunteer.jpeg') }}" alt="Bergabung dengan Green Ranger"
                                         onerror="this.src='https://via.placeholder.com/300x200/3a5f4c/ffffff?text=Green+Ranger'">
                                    <div class="image-overlay" style="position: absolute; bottom: 0; left: 0; right: 0; background: rgba(58, 95, 76, 0.8); color: white; padding: 15px; text-align: center;">
                                        <h5 class="mb-1" style="color: #F8B739;">Bergabung Dengan Kami</h5>
                                        <p class="mb-0" style="font-size: 0.9rem;">Jadi bagian dari perubahan!</p>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- Category Widget -->
                        <div class="sidebar-widget">
                            <h2 class="widget-title">Kategori</h2>
                            <div class="category-widget">
                                <ul>
                                    @forelse($categories as $category)
                                    <li>
                                        <a href="{{ route('blog.category', $category->slug) }}">{{ $category->name }}</a>
                                        <span>{{ $category->blogs_count }}</span>
                                    </li>
                                    @empty
                                    <li class="text-muted">Tidak ada kategori</li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>

                        <!-- Tags Widget -->
                        <div class="sidebar-widget">
                            <h2 class="widget-title">Tags Populer</h2>
                            <div class="tag-widget">
                                @forelse($tags as $tag)
                                    <a href="{{ route('blog.tag', $tag->slug) }}">{{ $tag->name }}</a>
                                @empty
                                    <p class="text-muted mb-0">Belum ada tags</p>
                                @endforelse
                            </div>
                        </div>

                        <!-- About Widget -->
                        <div class="sidebar-widget">
                            <h2 class="widget-title">Tentang Kami</h2>
                            <div class="text-widget">
                                <p>
                                    <strong>Green Ranger</strong> merupakan platform edukasi lingkungan yang berfokus pada pelestarian alam, 
                                    kebersihan, dan gaya hidup berkelanjutan. Kami menyediakan informasi, artikel, dan tips praktis 
                                    untuk membantu masyarakat dalam menjaga lingkungan.
                                </p>
                                <a href="/contact" class="btn btn-yellow btn-sm mt-2">Hubungi Kami</a>
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
                            <a class="btn btn-custom" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-custom" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-custom" href="#"><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-custom" href="#"><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-custom" href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-link">
                        <h2>Tautan Populer</h2>
                        <a href="/volunteer">Menjadi Sukarelawan</a>
                        <a href="/contact">Hubungi Kami</a>
                        <a href="/event">Acara Mendatang</a>
                        <a href="/blog">Artikel Terbaru</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-link">
                        <h2>Tautan Berguna</h2>
                        <a href="/terms">Syarat Penggunaan</a>
                        <a href="/privacy">Kebijakan Privasi</a>
                        <a href="/cookies">Kuki</a>
                        <a href="/help">Bantuan</a>
                        <a href="/faq">Pertanyaan Umum</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-newsletter">
                        <h2>Kritik & Saran</h2>
                        <form>
                            <input class="form-control" placeholder="Email anda">
                            <button class="btn btn-custom">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container copyright">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; <a href="#" style="color: #F8B739; text-decoration: none;">Green Ranger</a>, copyright {{ date('Y') }}.</p>
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

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('lib/parallax/parallax.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('mail/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ asset('mail/contact.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>

    <script>
        // Back to top button
        $(document).ready(function(){
            $(window).scroll(function(){
                if ($(this).scrollTop() > 100) {
                    $('.back-to-top').fadeIn();
                } else {
                    $('.back-to-top').fadeOut();
                }
            });
            
            $('.back-to-top').click(function(){
                $("html, body").animate({ scrollTop: 0 }, 600);
                return false;
            });

            // Initialize AOS animations
            AOS.init({
                duration: 1000,
                once: true
            });

            // Image loading fallback
            $('img').on('error', function() {
                var altText = $(this).attr('alt') || 'Image';
                var placeholderColor = '3a5f4c';
                var textColor = 'ffffff';
                var width = $(this).width() || 400;
                var height = $(this).height() || 300;
                
                // Create a better placeholder with text
                var encodedText = encodeURIComponent(altText.substring(0, 30));
                var placeholderUrl = `https://via.placeholder.com/${width}x${height}/${placeholderColor}/${textColor}?text=${encodedText}`;
                
                $(this).attr('src', placeholderUrl);
            });
        });
    </script>
</body>
</html>