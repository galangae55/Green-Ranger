<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title> Green Ranger</title>
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
        .single-content img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .single-content h2 {
            color: #3a5f4c;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .single-content h3 {
            color: #4a7c59;
            margin-top: 30px;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .single-content h5, .single-content h6 {
            color: #3a5f4c;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .single-content p {
            line-height: 1.8;
            margin-bottom: 15px;
            color: #555;
        }

        .single-tags a {
            display: inline-block;
            background: #f8f9fa;
            color: #3a5f4c;
            padding: 5px 15px;
            margin: 0 5px 10px 0;
            border-radius: 20px;
            text-decoration: none;
            border: 1px solid #dee2e6;
            transition: all 0.3s ease;
        }

        .single-tags a:hover {
            background: #3a5f4c;
            color: white;
        }

        .single-bio {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin: 30px 0;
            display: flex;
            align-items: center;
        }

        .single-bio-img {
            margin-right: 20px;
        }

        .single-bio-img img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
        }

        .comment-body {
            border-bottom: 1px solid #eee;
            padding: 15px 0;
            display: flex;
        }

        .comment-img {
            margin-right: 15px;
        }

        .comment-img img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
        }

        .btn-custom {
            background: #3a5f4c;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            background: #4a7c59;
            color: white;
            transform: translateY(-2px);
        }

        .post-item {
            margin-bottom: 20px;
            transition: transform 0.3s ease;
            display: flex;
            align-items: center;
        }

        .post-item:hover {
            transform: translateY(-5px);
        }

        .post-img {
            flex: 0 0 80px;
            margin-right: 15px;
        }

        .post-img img {
            width: 100%;
            height: 80px;
            object-fit: cover;
            border-radius: 5px;
        }

        .post-text {
            flex: 1;
        }

        .sidebar-widget {
            margin-bottom: 30px;
        }

        .widget-title {
            color: #3a5f4c;
            font-weight: 600;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #3a5f4c;
        }

        .post-meta {
            color: #666;
            font-size: 0.9rem;
        }

        .category-badge {
            background: #3a5f4c;
            color: white;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 0.8rem;
        }

        .category-badge a {
            color: white;
            text-decoration: none;
        }

        .category-badge a:hover {
            color: #F8B739;
        }

        .category-widget ul {
            list-style: none;
            padding: 0;
        }

        .category-widget li {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #eee;
        }

        .category-widget li:last-child {
            border-bottom: none;
        }

        .category-widget a {
            color: #3a5f4c;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .category-widget a:hover {
            color: #F8B739;
        }

        .category-widget span {
            background: #f8f9fa;
            padding: 2px 8px;
            border-radius: 10px;
            font-size: 0.8rem;
            color: #666;
        }

        .tag-widget a {
            display: inline-block;
            background: #f8f9fa;
            color: #3a5f4c;
            padding: 5px 15px;
            margin: 0 5px 10px 0;
            border-radius: 20px;
            text-decoration: none;
            border: 1px solid #dee2e6;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        .tag-widget a:hover {
            background: #3a5f4c;
            color: white;
        }

        .blog-meta {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .blog-meta-item {
            margin-right: 15px;
            display: flex;
            align-items: center;
            color: #666;
            font-size: 0.9rem;
        }

        .blog-meta-item i {
            margin-right: 5px;
            color: #3a5f4c;
        }

        .blog-meta-item a {
            color: #3a5f4c;
            text-decoration: none;
        }

        .blog-meta-item a:hover {
            color: #F8B739;
        }

        .related-post-img {
            height: 120px;
            overflow: hidden;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .related-post-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .related-post-item:hover .related-post-img img {
            transform: scale(1.05);
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
                confirmButtonColor: '#3085d6',
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

    <!-- Single Post Start-->
    <div class="single">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-content">
                        <img src="{{ asset('img/' . $blog->image) }}" alt="{{ $blog->title }}"
                             onerror="this.src='https://via.placeholder.com/800x400/3a5f4c/ffffff?text=Blog+Image'">
                        <h2>{{ $blog->title }}</h2>
                        
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
                                <span>{{ $blog->created_at->format('d F Y') }}</span>
                            </div>
                            <div class="blog-meta-item">
                                <i class="fas fa-user"></i>
                                <span>{{ $blog->author }}</span>
                            </div>
                        </div>

                        {!! $blog->content !!}
                    </div>

                    <div class="single-tags">
                        @foreach($blog->tags as $tag)
                            <a href="{{ route('blog.tag', $tag->slug) }}">{{ $tag->name }}</a>
                        @endforeach
                    </div>

                    <div class="single-bio">
                        <div class="single-bio-img">
                            <img src="{{ asset('img/user.jpg') }}" alt="Author"
                                 onerror="this.src='https://via.placeholder.com/100x100/3a5f4c/ffffff?text=User'">
                        </div>
                        <div class="single-bio-text">
                            <p>Author</p>
                            <h3>{{ $blog->author }}</h3>
                            <p>
                                Penulis aktif di Green Ranger yang berfokus pada konten lingkungan dan keberlanjutan.
                            </p>
                        </div>
                    </div>

                    <div class="single-related">
                        <h2>Postingan Serupa</h2>
                        <div class="row">
                            @foreach($relatedBlogs as $relatedBlog)
                            <div class="col-md-6 mb-4">
                                <div class="related-post-item">
                                    <div class="related-post-img">
                                        <img src="{{ asset('img/' . $relatedBlog->image) }}" alt="{{ $relatedBlog->title }}"
                                             onerror="this.src='https://via.placeholder.com/300x200/3a5f4c/ffffff?text=Blog+Image'">
                                    </div>
                                    <div class="post-text">
                                        <a href="{{ route('blog.show', $relatedBlog->slug) }}">{{ $relatedBlog->title }}</a>
                                        <div class="post-meta">
                                            @if($relatedBlog->category)
                                            <span class="category-badge">
                                                <i class="fas fa-folder"></i>
                                                <a href="{{ route('blog.category', $relatedBlog->category->slug) }}">{{ $relatedBlog->category->name }}</a>
                                            </span>
                                            @endif
                                            <span class="mx-2">|</span>
                                            <span class="post-date">
                                                <i class="far fa-calendar"></i> {{ $relatedBlog->created_at->format('d F Y') }}
                                            </span>
                                        </div>
                                        <div class="post-meta">
                                            <p>By <a href="#">{{ $relatedBlog->author }}</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="single-comment">
                        <h2>Komentar ({{ $comments->count() }})</h2>
                        @forelse($comments as $comment)
                            <div class="comment-body">
                                <div class="comment-img">
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($comment->nama) }}&background=3a5f4c&color=ffffff" alt="{{ $comment->nama }}">
                                </div>
                                <div class="comment-text">
                                    <h5>{{ $comment->nama }}</h5>
                                    <p><small>{{ $comment->created_at->format('d F Y H:i') }}</small></p>
                                    <p>{{ $comment->komentar }}</p>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted">Belum ada komentar. Jadilah yang pertama berkomentar!</p>
                        @endforelse
                    </div>

                    <div class="comment-form">
                        <h2>Tinggalkan Komentar</h2>
                        <form action="{{ route('blog.comment.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                            <input type="hidden" name="origin" value="blog">

                            <div class="form-group">
                                <label for="name">Nama *</label>
                                <input type="text" name="nama" class="form-control" id="name" value="{{ old('nama') }}" required>
                                @error('nama')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="message">Pesan *</label>
                                <textarea id="message" name="komentar" cols="30" rows="5" class="form-control" required>{{ old('komentar') }}</textarea>
                                @error('komentar')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-custom">Kirim Komentar</button>
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
                                @foreach($recentBlogs as $recentBlog)
                                <div class="post-item">
                                    <div class="post-img">
                                        <img src="{{ asset('img/' . $recentBlog->image) }}" alt="{{ $recentBlog->title }}"
                                             onerror="this.src='https://via.placeholder.com/80x80/3a5f4c/ffffff?text=Blog'">
                                    </div>
                                    <div class="post-text">
                                        <a href="{{ route('blog.show', $recentBlog->slug) }}">{{ Str::limit($recentBlog->title, 50) }}</a>
                                        <div class="post-meta">
                                            <p>By <a href="#">{{ $recentBlog->author }}</a></p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="sidebar-widget">
                            <div class="image-widget">
                                <a href="#"><img src="{{ asset('img/blog1.jpg') }}" alt="Image"
                                    onerror="this.src='https://via.placeholder.com/300x200/3a5f4c/ffffff?text=Green+Ranger'"></a>
                            </div>
                        </div>

                        <!-- Widget Kategori -->
                        <div class="sidebar-widget">
                            <h2 class="widget-title">Kategori</h2>
                            <div class="category-widget">
                                <ul>
                                    @foreach($categories as $category)
                                    <li>
                                        <a href="{{ route('blog.category', $category->slug) }}">{{ $category->name }}</a>
                                        <span>({{ $category->blogs_count }})</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <!-- Widget Tags Populer -->
                        <div class="sidebar-widget">
                            <h2 class="widget-title">Tags Populer</h2>
                            <div class="tag-widget">
                                @foreach($popularTags as $tag)
                                    <a href="{{ route('blog.tag', $tag->slug) }}">{{ $tag->name }}</a>
                                @endforeach
                            </div>
                        </div>

                        <div class="sidebar-widget">
                            <h2 class="widget-title">Tentang Kami</h2>
                            <div class="text-widget">
                                <p>
                                    Green Ranger merupakan sebuah platform yang berfokus pada pelestarian lingkungan,
                                    kebersihan, dan keberlanjutan. Kami menyediakan informasi, artikel, dan tips
                                    untuk membantu masyarakat dalam menjaga lingkungan.
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
                        <a href="/blog">Artikel Terbaru</a>
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
</body>
</html>