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
    
    <style>
        /* Filter Bar Styles */
        .filter-bar {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .search-box {
            position: relative;
        }
        
        .search-box input {
            width: 100%;
            padding: 12px 50px 12px 15px;
            border: 2px solid #e9ecef;
            border-radius: 25px;
            font-size: 14px;
            transition: all 0.3s;
        }
        
        .search-box input:focus {
            outline: none;
            border-color: #3a5f4c;
            box-shadow: 0 0 0 3px rgba(58, 95, 76, 0.1);
        }
        
        .search-box button {
            position: absolute;
            right: 5px;
            top: 5px;
            background: #3a5f4c;
            color: white;
            border: none;
            border-radius: 20px;
            padding: 8px 20px;
            cursor: pointer;
        }
        
        .sort-dropdown {
            position: relative;
        }
        
        .sort-dropdown select {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e9ecef;
            border-radius: 25px;
            font-size: 14px;
            background: white;
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 15px;
        }
        
        .sort-dropdown select:focus {
            outline: none;
            border-color: #3a5f4c;
            box-shadow: 0 0 0 3px rgba(58, 95, 76, 0.1);
        }
        
        /* Sidebar Styles */
        .blog-sidebar {
            background: #f8f9fa;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-top: 30px;
        }
        
        .sidebar-title {
            font-size: 18px;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #3a5f4c;
        }
        
        .category-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .category-list li {
            margin-bottom: 10px;
        }
        
        .category-list a {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #555;
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 5px;
            transition: all 0.3s;
            background: white;
        }
        
        .category-list a:hover,
        .category-list a.active {
            background: #3a5f4c;
            color: white;
            transform: translateX(5px);
        }
        
        .category-count {
            background: #f8f9fa;
            padding: 2px 8px;
            border-radius: 10px;
            font-size: 12px;
            color: #666;
        }
        
        .category-list a:hover .category-count,
        .category-list a.active .category-count {
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }
        
        .tag-cloud {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }
        
        .tag-cloud a {
            background: white;
            color: #555;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 13px;
            text-decoration: none;
            transition: all 0.3s;
            border: 1px solid #e9ecef;
        }
        
        .tag-cloud a:hover,
        .tag-cloud a.active {
            background: #3a5f4c;
            color: white;
            border-color: #3a5f4c;
        }
        
        /* Recent Posts */
        .recent-post {
            display: flex;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px dashed #e9ecef;
        }
        
        .recent-post:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }
        
        .recent-post-img {
            width: 60px;
            height: 60px;
            border-radius: 5px;
            overflow: hidden;
            margin-right: 15px;
            flex-shrink: 0;
        }
        
        .recent-post-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .recent-post-content h6 {
            font-size: 14px;
            margin-bottom: 5px;
            line-height: 1.4;
        }
        
        .recent-post-content h6 a {
            color: #333;
            text-decoration: none;
        }
        
        .recent-post-content h6 a:hover {
            color: #3a5f4c;
        }
        
        .recent-post-content span {
            font-size: 12px;
            color: #888;
        }
        
        /* Active Filter Tags */
        .active-filters {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 20px;
        }
        
        .filter-tag {
            background: #3a5f4c;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .filter-tag .remove {
            cursor: pointer;
            font-size: 16px;
            opacity: 0.8;
        }
        
        .filter-tag .remove:hover {
            opacity: 1;
        }
        
        /* Blog Item Styles (Maintain Original) */
        .blog-item {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            height: 100%;
            margin-bottom: 30px;
        }
        
        .blog-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        
        .blog-img {
            height: 220px;
            overflow: hidden;
        }
        
        .blog-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .blog-item:hover .blog-img img {
            transform: scale(1.05);
        }
        
        .blog-text {
            padding: 20px;
        }
        
        .blog-text h3 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 10px;
            line-height: 1.4;
        }
        
        .blog-text h3 a {
            color: #333;
            text-decoration: none;
        }
        
        .blog-text h3 a:hover {
            color: #3a5f4c;
        }
        
        .blog-text p {
            color: #666;
            line-height: 1.6;
            margin-bottom: 15px;
        }
        
        .blog-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            border-top: 1px solid #eee;
            font-size: 14px;
            color: #888;
        }
        
        .blog-meta p {
            margin: 0;
        }
        
        .blog-meta i {
            margin-right: 5px;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .filter-bar .row > div {
                margin-bottom: 15px;
            }
            
            .blog-sidebar {
                margin-top: 30px;
            }
        }

/* Tambahkan ke style yang sudah ada */

/* Blog Item untuk 2 kolom */
.blog-item {
    height: 100%;
    display: flex;
    flex-direction: column;
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
}

.blog-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

.blog-img {
    height: 200px;
    overflow: hidden;
    flex-shrink: 0;
}

.blog-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.blog-item:hover .blog-img img {
    transform: scale(1.05);
}

.blog-text {
    padding: 20px;
    flex-grow: 1;
}

.blog-text h3 {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 10px;
    line-height: 1.4;
}

.blog-text h3 a {
    color: #333;
    text-decoration: none;
}

.blog-text h3 a:hover {
    color: #3a5f4c;
}

.blog-text p {
    color: #666;
    line-height: 1.6;
    margin-bottom: 15px;
    font-size: 14px;
}

.blog-meta {
    padding: 15px 20px;
    border-top: 1px solid #eee;
    background: #f8f9fa;
    font-size: 13px;
    color: #666;
    flex-shrink: 0;
}

.blog-meta p {
    margin: 0;
    display: flex;
    align-items: center;
    gap: 5px;
}

.blog-meta i {
    color: #3a5f4c;
    font-size: 12px;
}

/* Responsive untuk mobile */
@media (max-width: 768px) {
    .blog-img {
        height: 180px;
    }
    
    .blog-text h3 {
        font-size: 16px;
    }
    
    .blog-text p {
        font-size: 13px;
    }
    
    .blog-meta {
        padding: 12px 15px;
        font-size: 12px;
    }
}
/* Pagination Styles */
.pagination {
    justify-content: center;
    margin-top: 40px;
}

.page-link {
    border: 1px solid #e9ecef;
    color: #495057;
    font-weight: 500;
    padding: 8px 15px;
    margin: 0 3px;
    border-radius: 6px;
    transition: all 0.2s ease;
}

.page-link:hover {
    background: #ffd43b;
    color: #495057;
    border-color: #ffd43b;
    transform: translateY(-1px);
    text-decoration: none;
}

.page-item.active .page-link {
    background: #ffd43b;
    color: #495057;
    border-color: #ffd43b;
    font-weight: 600;
}

.page-item.disabled .page-link {
    background: #f8f9fa;
    color: #adb5bd;
    border-color: #e9ecef;
    cursor: not-allowed;
}

/* Previous/Next buttons */
.page-item:first-child .page-link,
.page-item:last-child .page-link {
    display: flex;
    align-items: center;
    gap: 6px;
}

.page-item:first-child .page-link:before {
    content: "←";
    font-weight: bold;
}

.page-item:last-child .page-link:after {
    content: "→";
    font-weight: bold;
}

/* Mobile responsive */
@media (max-width: 576px) {
    .pagination {
        flex-wrap: wrap;
    }
    
    .page-link {
        padding: 6px 12px;
        margin: 2px;
        font-size: 14px;
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
                    <a href="/blog" class="nav-item nav-link active">Blog</a>
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
        <!-- Default value untuk $sort jika tidak ada -->
        @php
            $sort = $sort ?? 'terbaru';
        @endphp
        
        <div class="section-header text-center">
            <p>Blog kami</p>
            <h2>Artikel dan tips kebersihan terbaru</h2>
        </div>
        
        <!-- Filter Bar -->
        <div class="filter-bar">
            <form action="{{ route('blog.index') }}" method="GET" id="filterForm">
                <div class="row">
                    <div class="col-md-8">
                        <div class="search-box">
                            <input type="text" name="search" 
                                   value="{{ request('search') }}" 
                                   placeholder="Cari artikel...">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="sort-dropdown">
                            <select name="sort" onchange="document.getElementById('filterForm').submit()">
                                <option value="terbaru" {{ $sort == 'terbaru' ? 'selected' : '' }}>Terbaru</option>
                                <option value="terlama" {{ $sort == 'terlama' ? 'selected' : '' }}>Terlama</option>
                                <option value="a-z" {{ $sort == 'a-z' ? 'selected' : '' }}>Judul A-Z</option>
                                <option value="z-a" {{ $sort == 'z-a' ? 'selected' : '' }}>Judul Z-A</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
            
            <!-- Active Filters -->
            @if(request('search') || request('category') || request('tag'))
            <div class="active-filters mt-3">
                @if(request('search'))
                <div class="filter-tag">
                    Pencarian: {{ request('search') }}
                    <span class="remove" onclick="removeFilter('search')">&times;</span>
                </div>
                @endif
                
                @if(request('category'))
                @php
                    $categoryName = $categories->where('slug', request('category'))->first()->name ?? '';
                @endphp
                <div class="filter-tag">
                    Kategori: {{ $categoryName }}
                    <span class="remove" onclick="removeFilter('category')">&times;</span>
                </div>
                @endif
                
                @if(request('tag'))
                @php
                    $tagName = $tags->where('slug', request('tag'))->first()->name ?? '';
                @endphp
                <div class="filter-tag">
                    Tag: {{ $tagName }}
                    <span class="remove" onclick="removeFilter('tag')">&times;</span>
                </div>
                @endif
                
                @if(request('search') || request('category') || request('tag'))
                <a href="{{ route('blog.index') }}" class="btn btn-sm btn-outline-secondary">
                    Hapus Semua Filter
                </a>
                @endif
            </div>
            @endif
        </div>
            
            <div class="row">
    <!-- Main Content -->
    <div class="col-lg-8">
        <div class="row">
            @forelse($blogs as $blog)
            <div class="col-md-6 col-lg-6 mb-4"> <!-- Responsif: md=2 kolom, lg=2 kolom -->
                <div class="blog-item h-100"> <!-- Tambah h-100 untuk tinggi seragam -->
                    <div class="blog-img" style="height: 200px;"> <!-- Fixed height untuk gambar -->
                        @if($blog->image && Storage::disk('public')->exists($blog->image))
                            <img src="{{ asset('storage/' . $blog->image) }}" 
                                 alt="{{ $blog->title }}"
                                 style="width: 100%; height: 100%; object-fit: cover;">
                        @elseif($blog->image)
                            <img src="{{ asset('storage/' . $blog->image) }}" 
                                 alt="{{ $blog->title }}"
                                 style="width: 100%; height: 100%; object-fit: cover;"
                                 onerror="this.onerror=null; this.src='https://via.placeholder.com/400x200/3a5f4c/ffffff?text=Blog+Image'">
                        @else
                            <img src="https://via.placeholder.com/400x200/3a5f4c/ffffff?text=Blog+Image" 
                                 alt="{{ $blog->title }}"
                                 style="width: 100%; height: 100%; object-fit: cover;">
                        @endif
                    </div>
                    <div class="blog-text">
                        <h3><a href="{{ route('blog.show', $blog->slug) }}">{{ Str::limit($blog->title, 50) }}</a></h3>
                        <p class="mb-3">{{ Str::limit($blog->excerpt, 100) }}</p>
                    </div>
                    <div class="blog-meta mt-auto"> <!-- mt-auto untuk push ke bawah -->
                        @if($blog->author)
                        <p class="mb-1"><i class="fa fa-user"></i> {{ $blog->author }}</p>
                        @endif
                        <p class="mb-1"><i class="fa fa-calendar"></i> {{ $blog->created_at->format('d M Y') }}</p>
                        @if($blog->comment_count > 0)
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- Untuk membuat 2 kolom, tambah clearfix setiap 2 item -->
            @if($loop->iteration % 2 == 0 && !$loop->last)
                <div class="w-100 d-none d-md-block"></div> <!-- Clearfix untuk desktop -->
            @endif
            
            @empty
            <div class="col-12 text-center">
                <div class="alert alert-info">
                    <h4>Tidak ada artikel ditemukan</h4>
                    <p>
                        @if(request('search'))
                            Tidak ditemukan artikel dengan kata kunci "{{ request('search') }}"
                        @else
                            Belum ada artikel blog yang tersedia.
                        @endif
                    </p>
                </div>
            </div>
            @endforelse
        </div>
        
        <!-- Pagination -->
        @if($blogs->count() > 0)
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-center mt-4">
                    <nav aria-label="Page navigation">
                        {{ $blogs->appends(request()->query())->links('pagination::bootstrap-4') }}
                    </nav>
                </div>
            </div>
        </div>
        @endif
    </div>
                
                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="blog-sidebar">
                        <!-- Categories -->
                        <div class="sidebar-section">
                            <h4 class="sidebar-title">Kategori</h4>
                            <ul class="category-list">
                                <li>
                                    <a href="{{ route('blog.index') }}" 
                                       class="{{ !request('category') ? 'active' : '' }}">
                                        Semua Kategori
                                        <span class="category-count">{{ \App\Models\Blog::published()->count() }}</span>
                                    </a>
                                </li>
                                @foreach($categories as $category)
                                <li>
                                    <a href="{{ route('blog.index', ['category' => $category->slug] + request()->except('page')) }}" 
                                       class="{{ request('category') == $category->slug ? 'active' : '' }}">
                                        {{ $category->name }}
                                        <span class="category-count">{{ $category->blogs_count }}</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        
                        <!-- Popular Tags -->
                        <div class="sidebar-section mt-4">
                            <h4 class="sidebar-title">Tag Populer</h4>
                            <div class="tag-cloud">
                                @foreach($tags as $tag)
                                <a href="{{ route('blog.index', ['tag' => $tag->slug] + request()->except('page')) }}" 
                                   class="{{ request('tag') == $tag->slug ? 'active' : '' }}">
                                    {{ $tag->name }} ({{ $tag->blogs_count }})
                                </a>
                                @endforeach
                            </div>
                        </div>
                        
                        <!-- Recent Posts -->
                        <div class="sidebar-section mt-4">
                            <h4 class="sidebar-title">Artikel Terbaru</h4>
                            @foreach($recentBlogs as $recent)
                            <div class="recent-post">
                                <div class="recent-post-img">
                                    @if($recent->image && Storage::disk('public')->exists($recent->image))
                                        <img src="{{ asset('storage/' . $recent->image) }}" alt="{{ $recent->title }}">
                                    @else
                                        <img src="https://via.placeholder.com/60x60/3a5f4c/ffffff?text=Blog" alt="{{ $recent->title }}">
                                    @endif
                                </div>
                                <div class="recent-post-content">
                                    <h6><a href="{{ route('blog.show', $recent->slug) }}">{{ Str::limit($recent->title, 40) }}</a></h6>
                                    <span>{{ $recent->created_at->format('d M Y') }}</span>
                                </div>
                            </div>
                            @endforeach
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

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}" onerror="console.log('Main.js not found, continuing without it')"></script>

    <script>
        // Initialize Owl Carousel
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                items: 1,
                loop: true,
                nav: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                responsive: {
                    0: { items: 1, nav: false },
                    600: { items: 1, nav: false },
                    1000: { items: 1, nav: true }
                }
            });
            
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
            
            // SweetAlert notifications
            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    confirmButtonColor: '#3a5f4c',
                    timer: 3000
                });
            @endif
        });
        
        // Remove filter function
        function removeFilter(filterType) {
            const url = new URL(window.location.href);
            url.searchParams.delete(filterType);
            window.location.href = url.toString();
        }
        
        // Social media notification
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