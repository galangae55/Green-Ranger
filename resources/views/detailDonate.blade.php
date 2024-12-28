<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Detail Donasi</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link href="{{ asset('lib/flaticon/font/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style3.css') }}" rel="stylesheet">

    <!-- Midtrans Snap JS -->
    <script type="text/javascript"
        src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>

    <style>
/* Mengatur area latar belakang dengan gambar */
        .donate {
            position: relative;
            background-size: cover;
            background-position: center;
            padding: 50px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden; /* Pastikan overlay tidak keluar dari kontainer */
            color: #fff; /* Warna teks default */
        }
                /* Overlay hitam */
        .donate .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.7); /* Warna hitam transparan */
            z-index: 0; /* Overlay berada di belakang konten */
        }

        /* Konten di atas overlay */
        .donate-content, .table-wrapper {
            position: relative;
            z-index: 2; /* Pastikan konten berada di atas overlay */
            color: #ffffff; /* Warna teks tetap terlihat di atas overlay */
        }


        /* Header dan teks */
        .section-header p {
            color: #ffd700; /* Warna emas untuk teks kecil */
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .section-header h2 {
            color: #ffffff; /* Warna putih untuk heading utama */
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.4;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.6); /* Menambahkan bayangan teks */
        }

        .donate-text p {
            color: #e0e0e0; /* Warna abu terang untuk deskripsi */
            font-size: 18px;
            line-height: 1.8;
            margin-bottom: 20px;
        }

        /* Tabel */
        .table-wrapper {
            background-color: #ffffff; /* Warna putih untuk area tabel */
            padding: 20px;
            border-radius: 10px; /* Membuat sudut melengkung */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Menambahkan bayangan */
            margin-top: 20px;
        }

        .table th, .table td {
            text-align: center; /* Meratakan teks di tengah */
            padding: 15px;
            border: 1px solid #ddd; /* Warna border */
        }

        .table th {
            background-color: #f8f9fa; /* Warna abu-abu terang */
            font-weight: 600;
            color: #333; /* Warna teks header */
        }

        /* Tombol aksi */
        .btn-success {
            display: block;
            width: 100%;
            padding: 12px;
            font-size: 18px;
            font-weight: 700;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        /* Responsivitas */
        @media (max-width: 768px) {
            .donate {
                padding: 30px 20px;
            }

            .section-header h2 {
                font-size: 28px;
            }

            .section-header p {
                font-size: 16px;
            }

            .table-wrapper {
                padding: 15px;
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
                            <p>082233853635</p>
                        </div>
                        <div class="text">
                            <i class="fa fa-envelope"></i>
                            <p>sagegreat00@gmail.com</p>
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

    <!-- Donate Start -->
    <div class="container">
        <div class="donate" data-parallax="scroll" data-image-src="{{ asset('img/donate1.jpg') }}">
            <!-- Overlay untuk latar belakang -->
            <div class="overlay"></div>

            <div class="row align-items-center" data-aos="fade-right">
                <div class="col-lg-7">
                    <div class="donate-content">
                        <div class="section-header">
                            <p>Donasi Sekarang</p>
                            <h2>Kontribusi Anda Sangat Berarti Bagi Kami</h2>
                        </div>
                        <div class="donate-text">
                            <p>
                                Donasi yang Anda keluarkan akan kami gunakan untuk membantu proyek-proyek kebersihan Green Ranger. Kami sangat berterima kasih atas donasi yang Anda berikan.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="table-wrapper">
                        <h2 class="text-center">Detail Donasi</h2>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Informasi</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>Nama</strong></td>
                                    <td>{{ $donation->name }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Nomor Telepon</strong></td>
                                    <td>{{ $donation->phone }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Email</strong></td>
                                    <td>{{ $donation->email }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Nominal Donasi</strong></td>
                                    <td>Rp{{ number_format($donation->amount, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <button id="pay-button" class="btn btn-success">Lanjutkan Bayar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Donate End -->

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
                        <h2>Kritik & saran</h2>
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
        @if(session('error'))
            alert("{{ session('error') }}");
        @endif

        @if(session('success'))
            alert("{{ session('success') }}");
        @endif
    </script>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            var payButton = document.getElementById('pay-button');

            payButton.addEventListener('click', function (e) {
                e.preventDefault(); // Mencegah perilaku default tombol

                var snapToken = "{{ $snapToken }}";
                if (snapToken) {
                    window.snap.pay(snapToken, {
                        onSuccess: function (result) {
                            // Jika pembayaran berhasil
                            Swal.fire({
                                icon: 'success',
                                title: 'Pembayaran Berhasil!',
                                text: 'Terima kasih atas donasi Anda. Anda akan diarahkan kembali ke halaman donasi.',
                                confirmButtonText: 'OK',
                            }).then(() => {
                                // Kirim permintaan AJAX ke server untuk memperbarui status
                                $.ajax({
                                    url: "{{ route('donation.updateStatus', ['id' => $donation->id]) }}",
                                    type: "POST",
                                    data: {
                                        status: 'settlement',
                                        _token: "{{ csrf_token() }}",
                                    },
                                    success: function (response) {
                                        // Redirect ke halaman donate setelah status diperbarui
                                        if (response.success) {
                                            window.location.href = "{{ route('donation.form') }}";
                                        } else {
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Gagal Memperbarui Status',
                                                text: response.message || 'Terjadi kesalahan, silakan coba lagi.',
                                            });
                                        }
                                    },
                                    error: function (xhr, status, error) {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Terjadi Kesalahan',
                                            text: 'Gagal memperbarui status donasi.',
                                        });
                                        console.error(xhr.responseText);
                                    },
                                });
                            });
                        },
                        onPending: function (result) {
                            // Jika pembayaran belum selesai
                            Swal.fire({
                                icon: 'info',
                                title: 'Menunggu Pembayaran',
                                text: 'Silakan selesaikan pembayaran Anda.',
                                confirmButtonText: 'OK',
                            });
                            console.log(result);
                        },
                        onError: function (result) {
                            // Jika terjadi kesalahan
                            Swal.fire({
                                icon: 'error',
                                title: 'Pembayaran Gagal',
                                text: 'Terjadi kesalahan, silakan coba lagi.',
                                confirmButtonText: 'OK',
                            });
                            console.log(result);
                        },
                        onClose: function () {
                            // Jika popup pembayaran ditutup
                            Swal.fire({
                                icon: 'warning',
                                title: 'Popup Ditutup',
                                text: 'Anda menutup popup tanpa menyelesaikan pembayaran.',
                                confirmButtonText: 'OK',
                            });
                        },
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Token Tidak Tersedia',
                        text: 'Snap token tidak ditemukan.',
                        confirmButtonText: 'OK',
                    });
                }
            });
        });
    </script>


    <script>
        AOS.init();
    </script>
</body>
</html>
