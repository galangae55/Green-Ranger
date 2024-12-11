<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>belanja</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

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
        <link href="css/style3.css" rel="stylesheet">
        <link href="css/style2.css" rel="stylesheet">
    </head>

    <body>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        {{-- @if(session('middlewareLogin'))
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
                @endif --}}
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
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-linkedin-in"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                                <a href="/shop_cart" title="Belanja"><i class="fas fa-shopping-cart"></i></a>
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
             <!-- Page Title -->
    <section class="page-title text-center bg-light">
      <div class="container relative clearfix">
        <div class="title-holder">
          <div class="title-text">
            <h1 class="uppercase">Shopping Cart</h1>
          </div>
        </div>
      </div>
    </section>

    <div class="content-wrapper oh">

      <!-- Checkout -->
      <section class="section-wrap checkout pb-70">
        <div class="container relative">
          <div class="row">

            <div class="ecommerce col-xs-12">

              <form name="checkout" class="checkout ecommerce-checkout row">

                <div class="col-md-8" id="customer_details">
                  <div>
                    <h2 class="heading uppercase bottom-line full-grey mb-30">Detail Check Out</h2>

                    <p class="form-row form-row-wide address-field update_totals_on_change validate-required ecommerce-validated" id="billing_country_field">
                    </p>

                    <p class="form-row form-row-first validate-required ecommerce-invalid ecommerce-invalid-required-field" id="billing_first_name_field">
                      <label for="billing_first_name">First Name
                        <abbr class="required" title="required">*</abbr>
                      </label>
                      <input type="text" class="input-text" placeholder value name="billing_first_name" id="billing_first_name">
                    </p>

                    <p class="form-row form-row-last validate-required ecommerce-invalid ecommerce-invalid-required-field" id="billing_last_name_field">
                      <label for="billing_last_name">Last Name
                        <abbr class="required" title="required">*</abbr>
                      </label>
                      <input type="text" class="input-text" placeholder value name="billing_last_name" id="billing_last_name">
                    </p>

                    <p class="form-row form-row-wide address-field validate-required ecommerce-invalid ecommerce-invalid-required-field" id="billing_address_1_field">
                      <label for="billing_address_1">Address
                        <abbr class="required" title="required">*</abbr>
                      </label>
                      <input type="text" class="input-text" placeholder="Street address" value name="billing_address_1" id="billing_address_1">
                    </p>

                    <p class="form-row form-row-wide address-field" id="billing_address_2_field">
                      <input type="text" class="input-text" placeholder="Address Notes (optional)" value name="billing_address_2" id="billing_address_2">
                    </p>

                    <p class="form-row form-row-wide address-field validate-required" id="billing_city_field" data-o_class="form-row form-row-wide address-field validate-required">
                      <label for="billing_city">Town / City
                        <abbr class="required" title="required">*</abbr>
                      </label>
                      <input type="text" class="input-text" placeholder="Town / City" value name="billing_city" id="billing_city">
                    </p>

                    <p class="form-row form-row-last address-field validate-required validate-postcode ecommerce-invalid ecommerce-invalid-required-field" id="billing_postcode_field" data-o_class="form-row form-row-last address-field validate-required validate-postcode">
                      <label for="billing_postcode">Postcode
                        <abbr class="required" title="required">*</abbr>
                      </label>
                      <input type="text" class="input-text" placeholder="Postcode" value name="billing_postcode" id="billing_postcode">
                    </p>

                    <p class="form-row form-row-first validate-required validate-email" id="billing_email_field">
                      <label for="billing_email">Email Address
                        <abbr class="required" title="required">*</abbr>
                      </label>
                      <input type="text" class="input-text" placeholder value name="billing_email" id="billing_email">
                    </p>

                    <p class="form-row form-row-last validate-required validate-phone" id="billing_phone_field">
                      <label for="billing_phone">Phone
                        <abbr class="required" title="required">*</abbr>
                      </label>
                      <input type="text" class="input-text" placeholder value name="billing_phone" id="billing_phone">
                    </p>

                    <div class="clear"></div>

                  </div>

                  <div>
                    <p class="form-row notes ecommerce-validated" id="order_comments_field">
                      <label for="order_comments">Order Notes</label>
                      <textarea name="order_comments" class="input-text" id="order_comments" placeholder="Notes about your order, e.g. special notes for delivery." rows="2" cols="6"></textarea>
                    </p>
                  </div>

                  <div class="clear"></div>

                </div> <!-- end col -->

                <!-- Your Order -->
                <div class="col-md-4" style="padding-left: 0; padding-right: 0;">
                  <div class="order-review-wrap ecommerce-checkout-review-order" id="order_review">
                    <h2 class="heading uppercase bottom-line full-grey">Your Order</h2>
                    <table class="table shop_table ecommerce-checkout-review-order-table">
                        <tbody>
                            @foreach($keranjangs as $keranjang)
                                <tr>
                                    <th>{{ $keranjang->product->name }}<span class="count"> x {{ $keranjang->quantity }}</span></th>
                                    <td>
                                        <span class="amount">Rp. {{ ($keranjang->product->price * $keranjang->quantity) }}</span>
                                    </td>
                                </tr>
                            @endforeach
                            <tr class="cart-subtotal">
                                <th>Cart Subtotal</th>
                                <td>
                                    <span class="amount">Rp. {{ ($subtotal) }}</span>
                                </td>
                            </tr>

                            <tr class="shipping">
                                <th>Shipping</th>
                                <td>
                                    <span>
                                        <select name="shipping_method" id="shipping_method">
                                            @foreach($metode_pengiriman as $method)
                                            <option value="{{ $method->id }}">
                                                Rp. {{ ($method->price) }} - {{ $method->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </span>
                                </td>
                            </tr>

                            <tr class="order-total">
                                <th><strong>Order Total</strong></th>
                                <td>
                                    <strong><span class="amount">Rp. {{ ($subtotal) }}</span></strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div id="payment" class="ecommerce-checkout-payment">
                      <div class="form-row place-order">
                        <input type="submit" name="ecommerce_checkout_place_order" class="btn btn-lg btn-dark" id="place_order" value="Check Out">
                      </div>
                    </div>
                  </div>
                </div> <!-- end order review -->
              </form>

            </div> <!-- end ecommerce -->

          </div> <!-- end row -->
        </div> <!-- end container -->
      </section> <!-- end checkout -->


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

    <script>
        AOS.init();
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ambil elemen-elemen yang dibutuhkan
            var subtotal = parseFloat("{{ $subtotal }}"); // Ambil subtotal dari PHP
            var shippingSelect = document.getElementById('shipping_method'); // Dropdown untuk memilih pengiriman
            var totalAmountElem = document.querySelector('.order-total .amount'); // Elemen untuk menampilkan total order

            // Fungsi untuk menghitung dan menampilkan total
            function updateOrderTotal() {
                var shippingPrice = parseFloat(shippingSelect.options[shippingSelect.selectedIndex].getAttribute('data-price')) || 0; // Ambil harga pengiriman yang dipilih
                var total = subtotal + shippingPrice; // Total = Subtotal + Shipping

                // Update total di halaman tanpa angka desimal
                totalAmountElem.textContent = 'Rp. ' + Math.floor(total); // Gunakan Math.floor() untuk menghilangkan desimal
            }

            // Tambahkan harga pengiriman pada setiap opsi pengiriman
            Array.from(shippingSelect.options).forEach(function(option) {
                var price = parseFloat(option.text.split(' - ')[0].replace('Rp. ', '').trim().replace('.', '').replace(',', '.'));
                option.setAttribute('data-price', price); // Tambahkan atribut data-price pada setiap option
            });

            // Update total saat dropdown pengiriman berubah
            shippingSelect.addEventListener('change', updateOrderTotal);

            // Set initial order total saat halaman pertama kali dimuat
            updateOrderTotal();
        });
    </script>

</body>
</html>
