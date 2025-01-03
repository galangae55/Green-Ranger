<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Daftar Transaksi</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap JS and dependencies -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>


        <!-- Google Font -->
        <link href="https://fonts.google.com/share?selection.family=Montserrat:ital,wght@0,100..900;1,100..900|
                    Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1
                    ,400;1,500;1,600;1,700;1,800;1,900|Quicksand:wght@300..700|Roboto:ital,wght@0,100;0,300;0,400
                    ;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

        <!-- Template Stylesheet -->
        {{-- <link href="css/style.css" rel="stylesheet"> --}}
        <link href="css/style3.css" rel="stylesheet">
        {{-- <link rel="stylesheet" href="css/bootstrap.min.css" /> --}}
        <link rel="stylesheet" href="css/magnific-popup.css" />
        <link rel="stylesheet" href="css/font-icons.css" />
        <link rel="stylesheet" href="css/sliders.css" />

        <style>
            body.modal-open {
                padding-right: 0 !important;
            }
        </style>
    </head>

    <body>
        @if(session('successSlskn'))
            <script>
                window.addEventListener('load', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: "{{ session('successSlskn') }}",
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

         <!-- Page Title -->
    <section class="page-title text-center bg-light">
      <div class="container relative clearfix">
        <div class="title-holder">
          <div class="title-text">
            <h1 class="uppercase">Daftar Transaksi</h1>
          </div>
        </div>
      </div>
    </section>

    <div class="content-wrapper oh">

    <!-- Cart -->
    <section class="section-wrap shopping-cart">
        <div class="container relative">
            <div class="row">
                <div class="col-md-12" style="text-align: center;">
                        <div class="table-wrap mb-30">
                            <table class="shop_table cart table">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">Gambar</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                        <th class="product-Status">Status</th>
                                        <th class="product-Viewdetail">View Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $keranjang)
                                        <tr class="cart_item">
                                            <td class="product-thumbnail">
                                                <a href="#">
                                                    <img src="{{ asset($keranjang->product->image) }}" alt="{{ $keranjang->product->name }}" style="width: 100px; height: auto;">
                                                </a>
                                            </td>
                                            <td class="product-name">
                                                <a href="#">{{ $keranjang->product->name }}</a>
                                            </td>
                                            <td class="product-price">
                                                <span class="amount">Rp. {{ number_format($keranjang->product->price) }}</span>
                                            </td>
                                            <td class="product-quantity">
                                                    <span class="amount">{{ ($keranjang->quantity) }}</span>
                                            </td>
                                            <td class="product-subtotal">
                                                <span class="amount">Rp. {{ number_format($keranjang->product->price * $keranjang->quantity) }}</span>
                                            </td>
                                            @foreach($keranjang->checkouts as $checkout)
                                            <td class="product-status">
                                                @if($checkout->status == 'Sedang Dikirim')
                                                    <form action="{{ route('update.pesanan', $checkout->id) }}" method="POST" id="form-{{ $checkout->id }}" style="display:inline;">
                                                        @csrf
                                                        <button
                                                            type="button"
                                                            class="btn btn-success"
                                                            style="padding: 10px 13px;"
                                                            onclick="confirmCompletion({{ $checkout->id }})"
                                                        >
                                                            Selesaikan Pesanan
                                                        </button>
                                                    </form>
                                                @elseif($checkout->status == 'Belum Dibayar')
                                                    <span class="badge badge-secondary">Belum Dibayar</span>
                                                @elseif($checkout->status == 'Sedang Diproses')
                                                    <span class="badge badge-secondary">Sedang Diproses</span>
                                                @elseif($checkout->status == 'Gagal')
                                                    <span class="badge badge-secondary">Gagal</span>
                                                @elseif($checkout->status == 'Diterima')
                                                    <span class="badge badge-success">Pesanan Selesai</span>
                                                @else
                                                    <span class="badge badge-secondary">Status Tidak Diketahui</span>
                                                @endif
                                            </td>
                                            @endforeach
                                            <td class="product-Viewdetail">
                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detailModal{{ $keranjang->id }}" style="padding: 10px 5px">
                                                    View Detail
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="detailModal{{ $keranjang->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Detail Pesanan</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            @foreach($keranjang->checkouts as $checkout)
                                                            <div class="modal-body">
                                                                <p><strong>Nama Produk:</strong> {{ $keranjang->product->name }}</p>
                                                                <p><strong>Jumlah:</strong> {{ $keranjang->quantity }}</p>
                                                                <p><strong>Harga:</strong> Rp. {{ number_format($keranjang->product->price, 2) }}</p>
                                                                <p><strong>Metode Pengiriman:</strong> {{ $checkout->metode_pengiriman->name}}</p>
                                                                <p><strong>Biaya Pengiriman:</strong>Rp. {{ number_format($checkout->metode_pengiriman->price, 2) }}</p>
                                                                <p><strong>Total:</strong> Rp. {{ number_format($keranjang->product->price * $keranjang->quantity, 2) }}</p>
                                                                <p><strong>ID Checkout:</strong> {{ $checkout->id }}</p>
                                                                <p><strong>Status:</strong> {{ $checkout->status }}</p>
                                                                <p><strong>Tanggal Checkout:</strong> {{ $checkout->created_at }}</p>
                                                            </div>
                                                            @endforeach
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

            <div class="col-md-6">
              <div class="cart_totals">
                <h2 class="heading relative bottom-line full-grey uppercase mb-30"></h2>
              </div>
            </div> <!-- end col cart totals -->

          </div> <!-- end row -->


        </div> <!-- end container -->
      </section> <!-- end cart -->


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

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/plugins.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>



    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script>
        AOS.init();
    </script>

    <script>
        $(document).on('hidden.bs.modal', function () {
            $('body').css('padding-right', '0');
        });
    </script>

<script>
    function confirmCompletion(orderId) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Pesanan akan ditandai sebagai selesai!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, selesaikan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit form jika pengguna mengkonfirmasi
                document.getElementById(`form-${orderId}`).submit();
            }
        });
    }
</script>

</body>
</html>
