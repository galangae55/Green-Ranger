<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>{{ $product->name }} - Green Ranger</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Favicon -->
        <link href="{{ asset('img/favicon.ico') }}" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.google.com/share?selection.family=Montserrat:ital,wght@0,100..900;1,100..900|
                    Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1
                    ,400;1,500;1,600;1,700;1,800;1,900|Quicksand:wght@300..700|Roboto:ital,wght@0,100;0,300;0,400
                    ;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="{{ asset('lib/flaticon/font/flaticon.css') }}" rel="stylesheet">
        <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

        <!-- Template Stylesheet -->
        <link href="{{ asset('css/style3.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/font-icons.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/sliders.css') }}" />
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
                            @if (session('user_name'))
                            <div class="social">
                                <a href="#" onclick="showNotification('Twitter')"><i class="fab fa-twitter"></i></a>
                                <a href="#" onclick="showNotification('Facebook')"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" onclick="showNotification('LinkedIn')"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#" onclick="showNotification('Instagram')"><i class="fab fa-instagram"></i></a>
                                <a href="/shop_cart" title="Belanja"><i class="fas fa-shopping-cart"></i></a>
                                <p style="margin-bottom: 0px; display: flex; align-items: center; color: #dfae42; padding: 0px 20px;">{{ session('user_name') }}</p>
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

                            @else
                            <div class="social">
                                <a href="#" onclick="showNotification('Twitter')"><i class="fab fa-twitter"></i></a>
                                <a href="#" onclick="showNotification('Facebook')"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" onclick="showNotification('LinkedIn')"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#" onclick="showNotification('Instagram')"><i class="fab fa-instagram"></i></a>
                                <a href="/shop_cart" title="Belanja"><i class="fas fa-shopping-cart"></i></a>
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
                            @endif
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



        <div class="content-wrapper oh">

<!-- Single Product -->
<section class="section-wrap pb-40 single-product">
  <div class="container-fluid semi-fluid">
    <div class="row">

      <div class="col-md-6 col-xs-12 product-slider mb-60">

        <div class="flickity flickity-slider-wrap mfp-hover" id="gallery-main">

          <div class="gallery-cell">
            <a href="{{ asset($product->image) }}" class="lightbox-img">
              <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" />
              <i class="ui-zoom zoom-icon"></i>
            </a>
          </div>
          <div class="gallery-cell">
            <a href="{{ asset($product->image) }}" class="lightbox-img">
              <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" />
              <i class="ui-zoom zoom-icon"></i>
            </a>
          </div>
          <div class="gallery-cell">
            <a href="{{ asset($product->image) }}" class="lightbox-img">
              <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" />
              <i class="ui-zoom zoom-icon"></i>
            </a>
          </div>
          <div class="gallery-cell">
            <a href="{{ asset($product->image) }}" class="lightbox-img">
              <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" />
              <i class="ui-zoom zoom-icon"></i>
            </a>
          </div>
          <div class="gallery-cell">
            <a href="{{ asset($product->image) }}" class="lightbox-img">
              <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" />
              <i class="ui-zoom zoom-icon"></i>
            </a>
          </div>
        </div> <!-- end gallery main -->

        <div class="gallery-thumbs">
          <div class="gallery-cell">
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" />
          </div>
          <div class="gallery-cell">
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" />
          </div>
          <div class="gallery-cell">
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" />
          </div>
          <div class="gallery-cell">
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" />
          </div>
          <div class="gallery-cell">
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" />
          </div>
        </div> <!-- end gallery thumbs -->

      </div> <!-- end col img slider -->

      <div class="col-md-6 col-xs-12 product-description-wrap">
    <h1 class="product-title">{{ $product->name }}</h1>
    <span class="price">
        @if($product->detail && $product->detail->discount_price)
            <del><span>Rp {{ number_format($product->price, 0, ',', '.') }}</span></del>
            <ins><span class="amount">Rp {{ number_format($product->detail->discount_price, 0, ',', '.') }}</span></ins>
        @else
            <ins><span class="amount">Rp {{ number_format($product->price, 0, ',', '.') }}</span></ins>
        @endif
    </span>
    <p class="short-description">
        {{ $product->detail->description ?? 'Deskripsi produk tidak tersedia.' }}
    </p>

    <div class="product-actions">
        <form action="{{ route('cart.add') }}" method="POST" style="display: flex; align-items: center;">
            @csrf
            <!-- Input jumlah (quantity) -->
            <div style="display: flex; align-items: center; margin-right: 10px;">
                <span style="margin-right: 10px;">Jumlah:</span>
                <div class="quantity buttons_added" style="display: flex; align-items: center;">
                    <input type="number" name="quantity" step="1" min="1" value="1" title="jumlah" class="input-text qty text" required style="width: 50px; text-align: center;">
                    <div class="quantity-adjust" style="display: flex; flex-direction: column; margin-left: 5px;">
                        <a href="#" class="plus" onclick="event.preventDefault(); document.querySelector('.qty').stepUp();">
                            <i class="fa fa-angle-up"></i>
                        </a>
                        <a href="#" class="minus" onclick="event.preventDefault(); document.querySelector('.qty').stepDown();">
                            <i class="fa fa-angle-down"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Input tersembunyi untuk product_id -->
            <input type="hidden" name="product_id" value="{{ $product->id }}">

            <!-- Tombol submit -->
            <button type="submit" class="btn btn-dark btn-lg add-to-cart">
                <span>Tambahkan Keranjang</span>
            </button>
        </form>
        @if(session('error'))
            <script>
                window.addEventListener('load', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: "{{ session('error') }}",
                        confirmButtonColor: '#d33',
                        confirmButtonText: 'OK',
                    });
                });
            </script>
        @endif
        @if(session('success'))
            <script>
                window.addEventListener('load', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: "{{ session('success') }}",
                        confirmButtonColor: '#9d1f1f',
                        confirmButtonText: 'OK',
                    });
                });
            </script>
        @endif
    </div>





        <a href="#" class="product-add-to-wishlist"><i class="fa fa-heart"></i></a>
    </div>
</div>


              </div>
            </div>
          </div>
        </div>

        <div class="socials-share clearfix">
          <span>Bagikan:</span>
          <div class="social-icons nobase">
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-google"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
          </div>
        </div>
      </div> <!-- end col product description -->
    </div> <!-- end row -->

  </div> <!-- end container -->
</section> <!-- end single product -->


<!-- Produk Serupa -->
<section class="section-wrap pt-0 shop-items-slider">
    <div class="container">
      <div class="row heading-row">
        <div class="col-md-12 text-center">
          <h2 class="heading bottom-line">
            Produk Serupa
          </h2>
        </div>
      </div>

      <div class="row">

        <div id="owl-related-items" class="owl-carousel owl-theme">
          @foreach($relatedProducts as $relatedProduct)
          <div class="product">
            <div class="product-item hover-trigger">
              <div class="product-img">
                <a href="/produk/{{ $relatedProduct->id }}">
                  <img src="{{ asset($relatedProduct->image) }}" alt="{{ $relatedProduct->name }}">
                  <img src="{{ asset($relatedProduct->image) }}" alt="{{ $relatedProduct->name }}" class="back-img">
                </a>
                @if($relatedProduct->detail && $relatedProduct->detail->discount_price)
                <div class="product-label">
                  <span class="sale">Diskon</span>
                </div>
                @endif
                <div class="hover-2">
                  <div class="product-actions">
                    <a href="#" class="product-add-to-wishlist">
                      <i class="fa fa-heart"></i>
                    </a>
                  </div>
                </div>
                <a href="/produk/{{ $relatedProduct->id }}" class="product-quickview">Lihat Sekilas</a>
              </div>
              <div class="product-details">
                <h3 class="product-title">
                  <a href="/produk/{{ $relatedProduct->id }}">{{ $relatedProduct->name }}</a>
                </h3>
                <span class="category">
                  <a href="#">{{ $relatedProduct->detail->category ?? 'Aksesoris' }}</a>
                </span>
              </div>
              <span class="price">
                @if($relatedProduct->detail && $relatedProduct->detail->discount_price)
                <del>
                  <span>Rp {{ number_format($relatedProduct->price, 0, ',', '.') }}</span>
                </del>
                <ins>
                  <span class="amount">Rp {{ number_format($relatedProduct->detail->discount_price, 0, ',', '.') }}</span>
                </ins>
                @else
                <ins>
                  <span class="amount">Rp {{ number_format($relatedProduct->price, 0, ',', '.') }}</span>
                </ins>
                @endif
              </span>
            </div>
          </div>
          @endforeach
        </div> <!-- end slider -->

    </div>
  </div>
</section> <!-- end Produk Serupa -->



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

    <!-- Pre Loader -->
    <div id="loader" class="show">
        <div class="loader"></div>
    </div>

    <!-- JavaScript Libraries -->
     <script>
      document.querySelector('.plus').addEventListener('click', function(event) {
        event.preventDefault();
        let qty = document.querySelector('.qty');
        qty.value = parseInt(qty.value) + 1;
      });

      document.querySelector('.minus').addEventListener('click', function(event) {
        event.preventDefault();
        let qty = document.querySelector('.qty');
        if (parseInt(qty.value) > 1) qty.value = parseInt(qty.value) - 1;
      });

      function showNotification(platform) {
        Swal.fire({
          icon: 'info',
          title: 'Informasi',
          text: `Maaf, ${platform} belum tersedia.`,
          confirmButtonText: 'OK'
        });
      }
     </script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('lib/parallax/parallax.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('mail/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ asset('mail/contact.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>

    <script>
        AOS.init();
    </script>
</body>
</html>