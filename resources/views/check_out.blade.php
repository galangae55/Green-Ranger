<!-- resources/views/checkout.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Check Out</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&family=Poppins:wght@100..900&family=Quicksand:wght@300..700&family=Roboto:wght@100..900&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

    <!-- Template Stylesheet -->
    <link href="css/style3.css" rel="stylesheet">
    <link href="css/style2.css" rel="stylesheet">

</head>

<body>
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

    <!-- Form Checkout -->
    <section class="section-wrap checkout pb-70">
        <div class="container relative">
            <div class="row">
                <div class="ecommerce col-xs-12">
                    <form name="checkout" action="{{ route('checkout.store') }}" method="POST" class="checkout ecommerce-checkout row">
                        @csrf
                        <div class="col-md-8" id="customer_details">
                            <div>
                                <h2 class="heading uppercase bottom-line full-grey mb-30">Detail Check Out</h2>

                                <!-- First Name -->
                                <p class="form-row form-row-first validate-required" id="billing_first_name_field" style="margin-top: 15px">
                                    <label for="first_name">First Name
                                        <abbr class="required" title="required">*</abbr>
                                    </label>
                                    <input type="text" name="first_name" class="input-text" id="first_name" required>
                                </p>

                                <!-- Last Name -->
                                <p class="form-row form-row-last validate-required" id="billing_last_name_field">
                                    <label for="last_name">Last Name
                                        <abbr class="required" title="required">*</abbr>
                                    </label>
                                    <input type="text" name="last_name" class="input-text" id="last_name" required>
                                </p>

                                <!-- Billing Address -->
                                <p class="form-row form-row-wide address-field validate-required" id="billing_address_1_field">
                                    <label for="billing_address_1">Address
                                        <abbr class="required" title="required">*</abbr>
                                    </label>
                                    <input type="text" name="billing_address_1" class="input-text" id="billing_address_1" required>
                                </p>

                                <!-- Billing Address -->
                                <p class="form-row form-row-wide address-field validate-required" id="billing_address_2_field">
                                    <label for="billing_address_2">Detail Address
                                        <abbr class="required" title="required">*</abbr>
                                    </label>
                                    <input type="text" name="billing_address_2" class="input-text" id="billing_address_2" required>
                                </p>

                                <!-- Billing City -->
                                <p class="form-row form-row-wide validate-required" id="billing_city_field">
                                    <label for="billing_city">Town / City
                                        <abbr class="required" title="required">*</abbr>
                                    </label>
                                    <input type="text" name="billing_city" class="input-text" id="billing_city" required>
                                </p>

                                <!-- Billing Postcode -->
                                <p class="form-row form-row-last validate-required" id="billing_postcode_field">
                                    <label for="billing_postcode">Postcode
                                        <abbr class="required" title="required">*</abbr>
                                    </label>
                                    <input type="text" name="billing_postcode" class="input-text" id="billing_postcode" required>
                                </p>

                                <!-- Billing Phone -->
                                <p class="form-row form-row-last validate-required" id="billing_phone_field">
                                    <label for="billing_phone">Phone
                                        <abbr class="required" title="required">*</abbr>
                                    </label>
                                    <input type="text" name="billing_phone" class="input-text" id="billing_phone" required>
                                </p>

                                <!-- Metode Pengiriman -->
                                <p class="form-row form-row-wide" id="shipping_method_field">
                                    <label for="metode_pengiriman_id">Shipping Method:</label>
                                    <select name="metode_pengiriman_id" id="metode_pengiriman_id" class="input-text" onchange="updateShippingCost()">
                                        @foreach($metode_pengiriman as $method)
                                            <option value="{{ $method->id }}" data-price="{{ $method->price }}">
                                                {{ $method->name }} - Rp{{ number_format($method->price, 2, ',', '.') }}
                                            </option>
                                        @endforeach
                                    </select>
                                </p>

                                <!-- Order Notes -->
                                <p class="form-row notes ecommerce-validated" id="order_comments_field">
                                    <label for="order_comments">Order Notes</label>
                                    <textarea name="order_comments" class="input-text" id="order_comments" placeholder="Notes about your order, e.g. special notes for delivery. ( Optional )" rows="2" cols="6"></textarea>
                                </p>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-lg btn-dark" id="place_order" style="margin-top: 15px">Check Out</button>
                            </div>
                        </div>
                        <div class="col-md-4" style="padding-left: 0; padding-right: 0;">
                            <div class="order-review-wrap ecommerce-checkout-review-order" id="order_review">
                                <h2 class="heading uppercase bottom-line full-grey">Your Order</h2>
                                <table class="table shop_table ecommerce-checkout-review-order-table">
                                    <tbody>
                                        @foreach($keranjangs as $keranjang)
                                            <tr>
                                                <th>{{ $keranjang->product->name }}<span class="count"> x {{ $keranjang->quantity }}</span></th>
                                                <td>
                                                    <span class="amount">Rp{{ number_format($keranjang->product->price * $keranjang->quantity, 2, ',', '.') }}</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr class="cart-subtotal">
                                            <th>Cart Subtotal</th>
                                            <td><span class="amount">Rp{{ number_format($subtotal, 2, ',', '.') }}</span></td>
                                        </tr>
                                        <tr class="shipping">
                                            <th>Shipping</th>
                                            <td>
                                                <span id="shipping_cost_display">Rp{{ number_format($selectedShippingCost ?? 0, 2, ',', '.') }}</span>
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th><strong>Order Total</strong></th>
                                            <td>
                                                <strong>
                                                    <span id="order_total_display">Rp{{ number_format($subtotal + ($selectedShippingCost ?? 79900), 2, ',', '.') }}</span>
                                                </strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
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
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/parallax/parallax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    @if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            html: `
                <ul style="text-align: left;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            `,
        });
    </script>
    @endif

    @if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
        });
    </script>
    @endif


    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script>
        AOS.init();
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ambil elemen-elemen yang dibutuhkan
            var subtotal = parseFloat("{{ $subtotal }}"); // Ambil subtotal dari PHP
            var shippingSelect = document.getElementById('metode_pengiriman_id'); // Pastikan ID sesuai
            var shippingCostDisplay = document.getElementById("shipping_cost_display");
            var orderTotalDisplay = document.getElementById("order_total_display");

            // Fungsi untuk menghitung dan menampilkan total
            function updateShippingCost() {
                var selectedOption = shippingSelect.options[shippingSelect.selectedIndex];
                var shippingPrice = parseFloat(selectedOption.getAttribute("data-price")) || 0;

                // Hitung Order Total
                var orderTotal = subtotal + shippingPrice;

                // Update tampilan biaya pengiriman
                shippingCostDisplay.innerText = "Rp " + shippingPrice.toLocaleString("id-ID", { minimumFractionDigits: 2 });

                // Update tampilan Order Total
                orderTotalDisplay.innerText = "Rp " + orderTotal.toLocaleString("id-ID", { minimumFractionDigits: 2 });
            }

            // Tambahkan harga pengiriman pada setiap opsi pengiriman jika belum
            Array.from(shippingSelect.options).forEach(function(option) {
                if (!option.getAttribute('data-price')) {
                    var priceText = option.text.split(' - ')[1];
                    var price = parseFloat(priceText.replace('Rp', '').replace(/\./g, '').replace(',', '.')) || 0;
                    option.setAttribute('data-price', price);
                }
            });

            // Update shipping cost saat dropdown pengiriman berubah
            shippingSelect.addEventListener('change', updateShippingCost);

            // Set initial shipping cost saat halaman dimuat
            updateShippingCost();
        });
    </script>




</body>
</html>
