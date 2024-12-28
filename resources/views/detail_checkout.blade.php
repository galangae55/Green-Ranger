<!-- resources/views/detail_checkout.blade.php -->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Detail Checkout</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&family=Poppins:wght@100..900&family=Quicksand:wght@300..700&family=Roboto:wght@100..900&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('lib/flaticon/font/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

    <link href="{{ asset('css/style2.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style3.css') }}" rel="stylesheet">


    <script type="text/javascript"
    src="https:/app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{config('midtrans.client_key')}} "></script>

    <style>
        element.style {
            padding-top: 53px;
            padding-left: 0;
            padding-right: 0;
        }
        /* Pastikan container memiliki margin auto untuk keseimbangan */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 5%; /* Tambahkan padding kiri dan kanan */
        }

        /* Styling untuk row */
        .row {
            display: revert;
        }

        .row::after {
            content: "";
            display: table;
            clear: both; /* Membersihkan float */
        }

        /* Kolom */
        .col-md-8 {
            width: 66.6667%; /* 8/12 kolom */
            float: left;
            padding: 15px;
        }

        .col-md-4 {
            width: 33.3333%; /* 4/12 kolom */
            float: left;
            padding: 15px;
        }

        /* Styling untuk card wrapper */
        .card {
            border: 2px solid #ddd; /* Border lebih tebal */
            border-radius: 10px; /* Membuat border sedikit melengkung */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Menambahkan shadow */
            margin-bottom: 20px;
            background-color: #ffffff; /* Warna latar */
        }

        /* Heading card */
        .card-header {
            background-color: #ffffff; /* Warna latar header */
            border-bottom: 2px solid #ffffff; /* Warna border bawah header */
            font-weight: bold;
            color: #fff; /* Warna teks header */
            padding: 10px;
            text-align: center; /* Tengah header */
        }

        /* Content dalam card */
        .card-body {
            padding: 20px;
        }

        /* Styling untuk baris informasi pelanggan */
        .card-body p {
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ddd; /* Border untuk setiap baris */
            border-radius: 5px; /* Melengkungkan sedikit border */
            background-color: #f9f9f9; /* Memberikan warna latar untuk baris */
        }

        /* Styling table pada "Your Order" */
        .table.shop_table {
            width: 100%;
            margin-bottom: 15px;
            border: 2px solid #ffffff; /* Border lebih tebal */
            border-radius: 8px;
            overflow: hidden; /* Untuk border yang lebih rapi */
        }

        .table th,
        .table td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .table th {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        /* Responsivitas */
        @media (max-width: 768px) {
            .col-md-8, .col-md-4 {
                width: 100%; /* Kolom full-width di layar kecil */
                float: none;
                padding: 0;
            }

            #customer_details {
                margin-bottom: 20px;
            }
        }
    </style>


</head>

<body>
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

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    {{-- Notifikasi Login Sukses (Jika Diperlukan) --}}
    {{--
    @if(session('middlewareLogin'))
        <script>
            window.addEventListener('load', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: "{{ session('middlewareLogin') }}",
                    confirmButtonColor: '#3085d6',
                });
            });
        </script>
    @endif
    --}}

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
                        @if (session('user_name'))
                            <p style="margin-bottom: 0px; display: flex; align-items: center; color: #dfae42; padding: 0px 20px;">
                                {{ session('user_name') }}
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
                            <button type="submit" title="Log Out" style="background: none; border: none; cursor: pointer; color: rgb(255, 255, 255); display: flex; align-items: center; padding-right: 15px;">
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

    @if(session('success'))
        <script>
            window.addEventListener('load', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: "{{ session('success') }}",
                    confirmButtonColor: '#9d1f1f',
                });
            });
        </script>
    @endif

    <!-- Detail Checkout -->
    <section class="section-wrap checkout pb-70">
        <div class="container relative">
            <div class="row">
                <div class="ecommerce col-xs-12">
                    <div class="row">
                        <!-- Informasi Pelanggan -->
                        <div class="col-md-8" id="customer_details">
                            <div>
                                <h2 class="heading uppercase bottom-line full-grey mb-30">Detail Checkout</h2>

                                <!-- Informasi Pelanggan -->
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h4>Informasi Pelanggan</h4>
                                    </div>
                                    <div class="card-body">
                                        <p><strong>Nama Depan:</strong> {{ $checkout->first_name }}</p>
                                        <p><strong>Nama Belakang:</strong> {{ $checkout->last_name }}</p>
                                        <p><strong>Alamat:</strong> {{ $checkout->billing_address_1 }}, {{ $checkout->billing_address_2 }}, {{ $checkout->billing_city }}, {{ $checkout->billing_postcode }}</p>
                                        <p><strong>Telepon:</strong> {{ $checkout->billing_phone }}</p>
                                        @if($checkout->order_comments)
                                            <p><strong>Komentar Order:</strong> {{ $checkout->order_comments }}</p>
                                        @endif
                                    </div>
                                </div>

                                <!-- Metode Pengiriman -->
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h4>Metode Pengiriman</h4>
                                    </div>
                                    <div class="card-body">
                                        <p><strong>Metode Pengiriman:</strong> {{ $checkout->metode_pengiriman->name }}</p>
                                        <p><strong>Biaya Pengiriman:</strong> Rp{{ number_format($checkout->metode_pengiriman->price, 2, ',', '.') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Detail Order -->
                        <div class="col-md-4" style="padding-left: 0; padding-right: 0; padding-top:53px;">
                            <div class="order-review-wrap ecommerce-checkout-review-order" id="order_review">
                                <h2 class="heading uppercase bottom-line full-grey">Your Order</h2>
                                <table class="table shop_table ecommerce-checkout-review-order-table">
                                    <tbody>
                                        @foreach($checkout->keranjangs as $keranjang)
                                            <tr>
                                                <th>{{ $keranjang->product->name }}<span class="count"> x {{ $keranjang->quantity }}</span></th>
                                                <td>
                                                    <span class="amount">Rp{{ number_format($keranjang->product->price * $keranjang->quantity, 2, ',', '.') }}</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr class="cart-subtotal">
                                            <th>Cart Subtotal</th>
                                            <td><span class="amount">Rp{{ number_format($checkout->subtotal, 2, ',', '.') }}</span></td>
                                        </tr>
                                        <tr class="shipping">
                                            <th>Shipping</th>
                                            <td>
                                                <span id="shipping_cost_display">Rp{{ number_format($checkout->metode_pengiriman->price, 2, ',', '.') }}</span>
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th><strong>Order Total</strong></th>
                                            <td>
                                                <strong>
                                                    <span id="order_total_display">Rp{{ number_format($checkout->total_akhir, 2, ',', '.') }}</span>
                                                </strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                {{-- <div id="snap-container"> --}}
                                </div>
                            </div>


                            <!-- Tombol Aksi -->
                            <div class="text-right mt-3">
                                <button id="pay-button" class="btn btn-primary">Pay Now</button>
                                <!-- Tambahkan tombol lain jika diperlukan, seperti cetak invoice -->
                                <div id="snap-container">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Start -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <!-- Konten Footer -->
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
                        <a href="/detail">Artikel Terbaru</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-link">
                        <h2>Tautan Berguna</h2>
                        <a href="#">Syarat Penggunaan</a>
                        <a href="#">Kebijakan Privasi</a>
                        <a href="#">Kuki</a>
                        <a href="#">Bantuan</a>
                        <a href="#">Pertanyaan Umum</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-newsletter">
                        <h2>Kritik & Saran</h2>
                        <form>
                            <input class="form-control" type="email" placeholder="Email Anda" required>
                            <button class="btn btn-custom" type="submit">Kirim</button>
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
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
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
        AOS.init();
    </script>

    {{-- <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token.
        // Also, use the embedId that you defined in the div above, here.
        var snapToken = "{{$snapToken}}";
        var redirectUrl = "https://app.sandbox.midtrans.com/snap/v4/redirection/" + snapToken;

        window.snap.embed('{{$snapToken}}',{
            embedId: 'snap-container',
            onSuccess: function (result) {
            /* You may add your own implementation here */
            alert("payment success!"); console.log(result);
            },
            onPending: function (result) {
            /* You may add your own implementation here */
            alert("wating your payment!"); console.log(result);
            },
            onError: function (result) {
            /* You may add your own implementation here */
            alert("payment failed!"); console.log(result);
            },
            onClose: function () {
            /* You may add your own implementation here */
            alert('you closed the popup without finishing the payment');
            }
        });
        });
    </script> --}}

    <script type="text/javascript">
        // Ambil elemen tombol bayar
        var payButton = document.getElementById('pay-button');

        payButton.addEventListener('click', function () {
            // Ambil Snap Token dari server
            var snapToken = "{{$snapToken}}";

            // Trigger Snap popup
            window.snap.embed('{{$snapToken}}', {
                embedId: 'snap-container',
                onSuccess: function (result) {
                    // Tampilkan notifikasi sukses
                    Swal.fire({
                        icon: 'success',
                        title: 'Pembayaran Berhasil!',
                        text: 'Terima kasih telah melakukan pembayaran. Anda akan diarahkan kembali ke halaman belanja.',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        // Kirim permintaan ke backend untuk memperbarui status checkout
                        fetch('{{ route("checkout.updateStatus", ["id" => $checkout->id]) }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                status: 'Sedang Dikirim'
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Redirect ke halaman belanja
                                window.location.href = '/belanja';
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal Memperbarui Status',
                                    text: 'Silakan coba lagi atau hubungi admin.',
                                    confirmButtonText: 'OK'
                                });
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            Swal.fire({
                                icon: 'error',
                                title: 'Terjadi Kesalahan',
                                text: 'Tidak dapat memperbarui status checkout.',
                                confirmButtonText: 'OK'
                            });
                        });
                    });
                },
                onPending: function (result) {
                    Swal.fire({
                        icon: 'info',
                        title: 'Menunggu Pembayaran',
                        text: 'Silakan selesaikan pembayaran Anda.',
                        confirmButtonText: 'OK'
                    });
                    console.log(result);
                },
                onError: function (result) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Pembayaran Gagal',
                        text: 'Silakan coba lagi.',
                        confirmButtonText: 'OK'
                    });
                    console.log(result);
                },
                onClose: function () {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Popup Ditutup',
                        text: 'Anda menutup popup tanpa menyelesaikan pembayaran.',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });
    </script>


</body>
</html>
