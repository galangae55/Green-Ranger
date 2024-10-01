<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>belanja</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">


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
        <link href="css/style.css" rel="stylesheet">
        <link href="css/style2.css" rel="stylesheet">
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
                            <div class="social">
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-linkedin-in"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
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

              <!-- Catalogue -->
      <section class="section-wrap pt-80 pb-40 catalogue">
        <div class="container relative">

          <!-- Filter -->
          <div class="shop-filter">
            <div class="view-mode hidden-xs">
              <span>View:</span>
              <a class="grid grid-active" id="grid"></a>
              <a class="list" id="list"></a>
            </div>
            <div class="filter-show hidden-xs">
              <span>Show:</span>
              <a href="#" class="active">12</a>
              <a href="#">24</a>
              <a href="#">all</a>
            </div>
            <form class="ecommerce-ordering">
              <select>
                <option value="default-sorting">Default Sorting</option>
                <option value="price-low-to-high">Price: high to low</option>
                <option value="price-high-to-low">Price: low to high</option>
                <option value="by-popularity">By Popularity</option>
                <option value="date">By Newness</option>
                <option value="rating">By Rating</option>
              </select>
            </form>
          </div>

          <div class="row">
            <div class="col-md-12 catalogue-col right mb-50">
              <div class="shop-catalogue grid-view">

                <div class="row items-grid">

                  <div class="col-md-4 col-xs-6 product product-grid">
                    <div class="product-item clearfix">
                      <div class="product-img hover-trigger">
                          <a href="/shop_single">
                          <img src="img/shop/shop_item_1.jpg" alt="">
                          <img src="img/shop/shop_item_back_1.jpg" alt="" class="back-img">
                        </a>
                        <div class="product-label">
                          <span class="sale">sale</span>
                        </div>
                        <div class="hover-2">
                          <div class="product-actions">
                            <a href="#" class="product-add-to-wishlist">
                              <i class="fa fa-heart"></i>
                            </a>
                          </div>
                        </div>
                        <a href="#" class="product-quickview">Quick View</a>
                      </div>

                      <div class="product-details">
                        <h3 class="product-title">
                          <a href="/shop_single">Drawstring Dress</a>
                        </h3>
                        <span class="category">
                          <a href="catalogue-grid.html">Women</a>
                        </span>
                      </div>

                      <span class="price">
                        <del>
                          <span>$730.00</span>
                        </del>
                        <ins>
                          <span class="amount">$159.99</span>
                        </ins>
                      </span>

                      <div class="product-description">
                        <h3 class="product-title">
                          <a href="/shop_single">Drawstring Dress</a>
                        </h3>
                        <span class="price">
                          <del>
                            <span>$730.00</span>
                          </del>
                          <ins>
                            <span class="amount">$159.99</span>
                          </ins>
                        </span>
                        <span class="rating">
                          <a href="#">3 Reviews</a>
                        </span>
                        <div class="clear"></div>
                        <p>Zenna Shop is a very slick and clean e-commerce template with endless possibilities. Creating an awesome clothes store with this Theme is easy than you can imagine. Grab this theme now.</p>
                        <a href="#" class="btn btn-dark btn-md left"><span>Add to Cart</span></a>
                        <div class="product-add-to-wishlist">
                          <a href="#"><i class="fa fa-heart"></i></a>
                        </div>
                      </div>

                    </div>
                  </div> <!-- end product -->


                  <div class="col-md-4 col-xs-6 product product-grid">
                    <div class="product-item clearfix">
                      <div class="product-img hover-trigger">
                        <a href="/shop_single">
                          <img src="img/shop/shop_item_2.jpg" alt="">
                          <img src="img/shop/shop_item_back_2.jpg" alt="" class="back-img">
                        </a>
                        <div class="hover-2">
                          <div class="product-actions">
                            <a href="#" class="product-add-to-wishlist">
                              <i class="fa fa-heart"></i>
                            </a>
                          </div>
                        </div>
                        <a href="#" class="product-quickview">Quick View</a>
                      </div>

                      <div class="product-details">
                        <h3 class="product-title">
                          <a href="/shop_single">Mesh Brown Sandal</a>
                        </h3>
                        <span class="category">
                          <a href="catalogue-grid.html">Accessories</a>
                        </span>
                      </div>

                      <span class="price">
                        <ins>
                          <span class="amount">$190.00</span>
                        </ins>
                      </span>

                      <div class="product-description">
                        <h3 class="product-title">
                          <a href="/shop_single">Mesh Brown Sandal</a>
                        </h3>
                        <span class="price">
                          <ins>
                            <span class="amount">$190.00</span>
                          </ins>
                        </span>
                        <span class="rating">
                          <a href="#">3 Reviews</a>
                        </span>
                        <div class="clear"></div>
                        <p>Zenna Shop is a very slick and clean e-commerce template with endless possibilities. Creating an awesome clothes store with this Theme is easy than you can imagine. Grab this theme now.</p>
                        <a href="#" class="btn btn-dark btn-md left"><span>Add to Cart</span></a>
                        <div class="product-add-to-wishlist">
                          <a href="#"><i class="fa fa-heart"></i></a>
                        </div>
                      </div>

                    </div>
                  </div> <!-- end product -->


                  <div class="col-md-4 col-xs-6 product product-grid">
                    <div class="product-item clearfix">
                      <div class="product-img hover-trigger">
                        <a href="/shop_single">
                          <img src="img/shop/shop_item_3.jpg" alt="">
                          <img src="img/shop/shop_item_back_3.jpg" alt="" class="back-img">
                        </a>
                        <div class="hover-2">
                          <div class="product-actions">
                            <a href="#" class="product-add-to-wishlist">
                              <i class="fa fa-heart"></i>
                            </a>
                          </div>
                        </div>
                        <a href="#" class="product-quickview">Quick View</a>
                      </div>

                      <div class="product-details">
                        <h3 class="product-title">
                          <a href="/shop_single">Tribal Grey Blazer</a>
                        </h3>
                        <span class="category">
                          <a href="catalogue-grid.html">Women</a>
                        </span>
                      </div>

                      <span class="price">
                        <ins>
                          <span class="amount">$330.00</span>
                        </ins>
                      </span>

                      <div class="product-description">
                        <h3 class="product-title">
                          <a href="/shop_single">Tribal Grey Blazer</a>
                        </h3>
                        <span class="price">
                          <ins>
                            <span class="amount">$330.00</span>
                          </ins>
                        </span>
                        <span class="rating">
                          <a href="#">3 Reviews</a>
                        </span>
                        <div class="clear"></div>
                        <p>Zenna Shop is a very slick and clean e-commerce template with endless possibilities. Creating an awesome clothes store with this Theme is easy than you can imagine. Grab this theme now.</p>
                        <a href="#" class="btn btn-dark btn-md left"><span>Add to Cart</span></a>
                        <div class="product-add-to-wishlist">
                          <a href="#"><i class="fa fa-heart"></i></a>
                        </div>
                      </div>

                    </div>
                  </div> <!-- end product -->


                  <div class="col-md-4 col-xs-6 product product-grid">
                    <div class="product-item clearfix">
                      <div class="product-img hover-trigger">
                        <a href="/shop_single">
                          <img src="img/shop/shop_item_4.jpg" alt="">
                          <img src="img/shop/shop_item_back_4.jpg" alt="" class="back-img">
                        </a>
                        <div class="hover-2">
                          <div class="product-actions">
                            <a href="#" class="product-add-to-wishlist">
                              <i class="fa fa-heart"></i>
                            </a>
                          </div>
                        </div>
                        <a href="#" class="product-quickview">Quick View</a>
                      </div>

                      <div class="product-details">
                        <h3 class="product-title">
                          <a href="/shop_single">Sweater w/ Colar</a>
                        </h3>
                        <span class="category">
                          <a href="catalogue-grid.html">Men</a>
                        </span>
                      </div>

                      <span class="price">
                        <ins>
                          <span class="amount">$299.00</span>
                        </ins>
                      </span>

                      <div class="product-description">
                        <h3 class="product-title">
                          <a href="/shop_single">Sweater w/ Colar</a>
                        </h3>
                        <span class="price">
                          <ins>
                            <span class="amount">$299.00</span>
                          </ins>
                        </span>
                        <span class="rating">
                          <a href="#">3 Reviews</a>
                        </span>
                        <div class="clear"></div>
                        <p>Zenna Shop is a very slick and clean e-commerce template with endless possibilities. Creating an awesome clothes store with this Theme is easy than you can imagine. Grab this theme now.</p>
                        <a href="#" class="btn btn-dark btn-md left"><span>Add to Cart</span></a>
                        <div class="product-add-to-wishlist">
                          <a href="#"><i class="fa fa-heart"></i></a>
                        </div>
                      </div>

                    </div>
                  </div> <!-- end product -->


                  <div class="col-md-4 col-xs-6 product product-grid">
                    <div class="product-item clearfix">
                      <div class="product-img hover-trigger">
                        <a href="/shop_single">
                          <img src="img/shop/shop_item_5.jpg" alt="">
                          <img src="img/shop/shop_item_back_5.jpg" alt="" class="back-img">
                        </a>
                        <div class="hover-2">
                          <div class="product-actions">
                            <a href="#" class="product-add-to-wishlist">
                              <i class="fa fa-heart"></i>
                            </a>
                          </div>
                        </div>
                        <a href="#" class="product-quickview">Quick View</a>
                      </div>

                      <div class="product-details">
                        <h3 class="product-title">
                          <a href="/shop_single">Lola May Crop Blazer</a>
                        </h3>
                        <span class="category">
                          <a href="catalogue-grid.html">Women</a>
                        </span>
                      </div>

                      <span class="price">
                        <ins>
                          <span class="amount">$42.00</span>
                        </ins>
                      </span>

                      <div class="product-description">
                        <h3 class="product-title">
                          <a href="/shop_single">Lola May Crop Blazer</a>
                        </h3>
                        <span class="price">
                          <ins>
                            <span class="amount">$42.00</span>
                          </ins>
                        </span>
                        <span class="rating">
                          <a href="#">3 Reviews</a>
                        </span>
                        <div class="clear"></div>
                        <p>Zenna Shop is a very slick and clean e-commerce template with endless possibilities. Creating an awesome clothes store with this Theme is easy than you can imagine. Grab this theme now.</p>
                        <a href="#" class="btn btn-dark btn-md left"><span>Add to Cart</span></a>
                        <div class="product-add-to-wishlist">
                          <a href="#"><i class="fa fa-heart"></i></a>
                        </div>
                      </div>

                    </div>
                  </div> <!-- end product -->


                  <div class="col-md-4 col-xs-6 product product-grid">
                    <div class="product-item clearfix">
                      <div class="product-img hover-trigger">
                        <a href="/shop_single">
                          <img src="img/shop/shop_item_6.jpg" alt="">
                          <img src="img/shop/shop_item_back_6.jpg" alt="" class="back-img">
                        </a>
                        <div class="product-label">
                          <span class="sale">sale</span>
                        </div>
                        <div class="hover-2">
                          <div class="product-actions">
                            <a href="#" class="product-add-to-wishlist">
                              <i class="fa fa-heart"></i>
                            </a>
                          </div>
                        </div>
                        <a href="#" class="product-quickview">Quick View</a>
                      </div>

                      <div class="product-details">
                        <h3 class="product-title">
                          <a href="/shop_single">Faux Suits</a>
                        </h3>
                        <span class="category">
                          <a href="catalogue-grid.html">Men</a>
                        </span>
                      </div>

                      <span class="price">
                        <del>
                          <span>$500.00</span>
                        </del>
                        <ins>
                          <span class="amount">$233.00</span>
                        </ins>
                      </span>

                      <div class="product-description">
                        <h3 class="product-title">
                          <a href="/shop_single">Faux Suits</a>
                        </h3>
                        <span class="price">
                          <del>
                            <span>$500.00</span>
                          </del>
                          <ins>
                            <span class="amount">$233.00</span>
                          </ins>
                        </span>
                        <span class="rating">
                          <a href="#">3 Reviews</a>
                        </span>
                        <div class="clear"></div>
                        <p>Zenna Shop is a very slick and clean e-commerce template with endless possibilities. Creating an awesome clothes store with this Theme is easy than you can imagine. Grab this theme now.</p>
                        <a href="#" class="btn btn-dark btn-md left"><span>Add to Cart</span></a>
                        <div class="product-add-to-wishlist">
                          <a href="#"><i class="fa fa-heart"></i></a>
                        </div>
                      </div>

                    </div>
                  </div> <!-- end product -->


                  <div class="col-md-4 col-xs-6 product product-grid">
                    <div class="product-item clearfix">
                      <div class="product-img hover-trigger">
                        <a href="/shop_single">
                          <img src="img/shop/shop_item_7.jpg" alt="">
                          <img src="img/shop/shop_item_back_7.jpg" alt="" class="back-img">
                        </a>
                        <div class="hover-2">
                          <div class="product-actions">
                            <a href="#" class="product-add-to-wishlist">
                              <i class="fa fa-heart"></i>
                            </a>
                          </div>
                        </div>
                        <a href="#" class="product-quickview">Quick View</a>
                      </div>

                      <div class="product-details">
                        <h3 class="product-title">
                          <a href="/shop_single">Crew Watch</a>
                        </h3>
                        <span class="category">
                          <a href="catalogue-grid.html">Accessories</a>
                        </span>
                      </div>

                      <span class="price">
                        <ins>
                          <span class="amount">$280.00</span>
                        </ins>
                      </span>

                      <div class="product-description">
                        <h3 class="product-title">
                          <a href="/shop_single">Crew Watch</a>
                        </h3>
                        <span class="price">
                          <ins>
                            <span class="amount">$280.00</span>
                          </ins>
                        </span>
                        <span class="rating">
                          <a href="#">3 Reviews</a>
                        </span>
                        <div class="clear"></div>
                        <p>Zenna Shop is a very slick and clean e-commerce template with endless possibilities. Creating an awesome clothes store with this Theme is easy than you can imagine. Grab this theme now.</p>
                        <a href="#" class="btn btn-dark btn-md left"><span>Add to Cart</span></a>
                        <div class="product-add-to-wishlist">
                          <a href="#"><i class="fa fa-heart"></i></a>
                        </div>
                      </div>

                    </div>
                  </div> <!-- end product -->


                  <div class="col-md-4 col-xs-6 product product-grid">
                    <div class="product-item clearfix">
                      <div class="product-img hover-trigger">
                        <a href="/shop_single">
                          <img src="img/shop/shop_item_8.jpg" alt="">
                          <img src="img/shop/shop_item_back_8.jpg" alt="" class="back-img">
                        </a>
                        <div class="hover-2">
                          <div class="product-actions">
                            <a href="#" class="product-add-to-wishlist">
                              <i class="fa fa-heart"></i>
                            </a>
                          </div>
                        </div>
                        <a href="#" class="product-quickview">Quick View</a>
                      </div>

                      <div class="product-details">
                        <h3 class="product-title">
                          <a href="/shop_single">Jersey Stylish</a>
                        </h3>
                        <span class="category">
                          <a href="catalogue-grid.html">Women</a>
                        </span>
                      </div>

                      <span class="price">
                        <ins>
                          <span class="amount">$298.00</span>
                        </ins>
                      </span>

                      <div class="product-description">
                        <h3 class="product-title">
                          <a href="/shop_single">Jersey Stylish</a>
                        </h3>
                        <span class="price">
                          <ins>
                            <span class="amount">$298.00</span>
                          </ins>
                        </span>
                        <span class="rating">
                          <a href="#">3 Reviews</a>
                        </span>
                        <div class="clear"></div>
                        <p>Zenna Shop is a very slick and clean e-commerce template with endless possibilities. Creating an awesome clothes store with this Theme is easy than you can imagine. Grab this theme now.</p>
                        <a href="#" class="btn btn-dark btn-md left"><span>Add to Cart</span></a>
                        <div class="product-add-to-wishlist">
                          <a href="#"><i class="fa fa-heart"></i></a>
                        </div>
                      </div>

                    </div>
                  </div> <!-- end product -->


                  <div class="col-md-4 col-xs-6 product product-grid">
                    <div class="product-item clearfix">
                      <div class="product-img hover-trigger">
                        <a href="/shop_single">
                          <img src="img/shop/shop_item_9.jpg" alt="">
                          <img src="img/shop/shop_item_back_9.jpg" alt="" class="back-img">
                        </a>
                        <div class="hover-2">
                          <div class="product-actions">
                            <a href="#" class="product-add-to-wishlist">
                              <i class="fa fa-heart"></i>
                            </a>
                          </div>
                        </div>
                        <a href="#" class="product-quickview">Quick View</a>
                      </div>

                      <div class="product-details">
                        <h3 class="product-title">
                          <a href="/shop_single">Camo Belt</a>
                        </h3>
                        <span class="category">
                          <a href="catalogue-grid.html">Accessories</a>
                        </span>
                      </div>

                      <span class="price">
                        <ins>
                          <span class="amount">$33.00</span>
                        </ins>
                      </span>

                      <div class="product-description">
                        <h3 class="product-title">
                          <a href="/shop_single">Camo Belt</a>
                        </h3>
                        <span class="price">
                          <ins>
                            <span class="amount">$33.00</span>
                          </ins>
                        </span>
                        <span class="rating">
                          <a href="#">3 Reviews</a>
                        </span>
                        <div class="clear"></div>
                        <p>Zenna Shop is a very slick and clean e-commerce template with endless possibilities. Creating an awesome clothes store with this Theme is easy than you can imagine. Grab this theme now.</p>
                        <a href="#" class="btn btn-dark btn-md left"><span>Add to Cart</span></a>
                        <div class="product-add-to-wishlist">
                          <a href="#"><i class="fa fa-heart"></i></a>
                        </div>
                      </div>

                    </div>
                  </div> <!-- end product -->


                  <div class="col-md-4 col-xs-6 product product-grid">
                    <div class="product-item clearfix">
                      <div class="product-img hover-trigger">
                        <a href="/shop_single">
                          <img src="img/shop/shop_item_10.jpg" alt="">
                          <img src="img/shop/shop_item_back_10.jpg" alt="" class="back-img">
                        </a>
                        <div class="hover-2">
                          <div class="product-actions">
                            <a href="#" class="product-add-to-wishlist">
                              <i class="fa fa-heart"></i>
                            </a>
                          </div>
                        </div>
                        <a href="#" class="product-quickview">Quick View</a>
                      </div>

                      <div class="product-details">
                        <h3 class="product-title">
                          <a href="/shop_single">Heathered Scarf</a>
                        </h3>
                        <span class="category">
                          <a href="catalogue-grid.html">Accessories</a>
                        </span>
                      </div>

                      <span class="price">
                        <ins>
                          <span class="amount">$180.00</span>
                        </ins>
                      </span>

                      <div class="product-description">
                        <h3 class="product-title">
                          <a href="/shop_single">Heathered Scarf</a>
                        </h3>
                        <span class="price">
                          <ins>
                            <span class="amount">$180.00</span>
                          </ins>
                        </span>
                        <span class="rating">
                          <a href="#">3 Reviews</a>
                        </span>
                        <div class="clear"></div>
                        <p>Zenna Shop is a very slick and clean e-commerce template with endless possibilities. Creating an awesome clothes store with this Theme is easy than you can imagine. Grab this theme now.</p>
                        <a href="#" class="btn btn-dark btn-md left"><span>Add to Cart</span></a>
                        <div class="product-add-to-wishlist">
                          <a href="#"><i class="fa fa-heart"></i></a>
                        </div>
                      </div>

                    </div>
                  </div> <!-- end product -->


                  <div class="col-md-4 col-xs-6 product product-grid">
                    <div class="product-item clearfix">
                      <div class="product-img hover-trigger">
                        <a href="/shop_single">
                          <img src="img/shop/shop_item_11.jpg" alt="">
                          <img src="img/shop/shop_item_back_11.jpg" alt="" class="back-img">
                        </a>
                        <div class="hover-2">
                          <div class="product-actions">
                            <a href="#" class="product-add-to-wishlist">
                              <i class="fa fa-heart"></i>
                            </a>
                          </div>
                        </div>
                        <a href="#" class="product-quickview">Quick View</a>
                      </div>

                      <div class="product-details">
                        <h3 class="product-title">
                          <a href="/shop_single">Mantle Brown Bag</a>
                        </h3>
                        <span class="category">
                          <a href="catalogue-grid.html">Accessories</a>
                        </span>
                      </div>

                      <span class="price">
                        <ins>
                          <span class="amount">$150.00</span>
                        </ins>
                      </span>

                      <div class="product-description">
                        <h3 class="product-title">
                          <a href="/shop_single">Mantle Brown Bag</a>
                        </h3>
                        <span class="price">
                          <ins>
                            <span class="amount">$150.00</span>
                          </ins>
                        </span>
                        <span class="rating">
                          <a href="#">3 Reviews</a>
                        </span>
                        <div class="clear"></div>
                        <p>Zenna Shop is a very slick and clean e-commerce template with endless possibilities. Creating an awesome clothes store with this Theme is easy than you can imagine. Grab this theme now.</p>
                        <a href="#" class="btn btn-dark btn-md left"><span>Add to Cart</span></a>
                        <div class="product-add-to-wishlist">
                          <a href="#"><i class="fa fa-heart"></i></a>
                        </div>
                      </div>

                    </div>
                  </div> <!-- end product -->


                  <div class="col-md-4 col-xs-6 product product-grid">
                    <div class="product-item clearfix">
                      <div class="product-img hover-trigger">
                        <a href="/shop_single">
                          <img src="img/shop/shop_item_12.jpg" alt="">
                          <img src="img/shop/shop_item_back_12.jpg" alt="" class="back-img">
                        </a>
                        <div class="product-label">
                          <span class="sale">sale</span>
                        </div>
                        <div class="hover-2">
                          <div class="product-actions">
                            <a href="#" class="product-add-to-wishlist">
                              <i class="fa fa-heart"></i>
                            </a>
                          </div>
                        </div>
                        <a href="#" class="product-quickview">Quick View</a>
                      </div>

                      <div class="product-details">
                        <h3 class="product-title">
                          <a href="/shop_single">Sport T-shirt</a>
                        </h3>
                        <span class="category">
                          <a href="catalogue-grid.html">Men</a>
                        </span>
                      </div>

                      <span class="price">
                        <del>
                          <span>$500.00</span>
                        </del>
                        <ins>
                          <span class="amount">$230.00</span>
                        </ins>
                      </span>

                      <div class="product-description">
                        <h3 class="product-title">
                          <a href="/shop_single">Sport T-shirt</a>
                        </h3>
                        <span class="price">
                          <del>
                            <span>$500.00</span>
                          </del>
                          <ins>
                            <span class="amount">$230.00</span>
                          </ins>
                        </span>
                        <span class="rating">
                          <a href="#">3 Reviews</a>
                        </span>
                        <div class="clear"></div>
                        <p>Zenna Shop is a very slick and clean e-commerce template with endless possibilities. Creating an awesome clothes store with this Theme is easy than you can imagine. Grab this theme now.</p>
                        <a href="#" class="btn btn-dark btn-md left"><span>Add to Cart</span></a>
                        <div class="product-add-to-wishlist">
                          <a href="#"><i class="fa fa-heart"></i></a>
                        </div>
                      </div>

                    </div>
                  </div> <!-- end product -->

                </div> <!-- end row -->
              </div> <!-- end grid mode -->

              <!-- Pagination -->
              <div class="pagination-wrap clearfix">
                <p class="result-count">Showing: 12 of 80 results</p>
                <nav class="pagination right clearfix">
                  <a href="#"><i class="fa fa-angle-left"></i></a>
                  <span class="page-numbers current">1</span>
                  <a href="#">2</a>
                  <a href="#">3</a>
                  <a href="#">4</a>
                  <a href="#"><i class="fa fa-angle-right"></i></a>
                </nav>
              </div>

            </div> <!-- end col -->

          </div> <!-- end row -->
        </div> <!-- end container -->
      </section> <!-- end catalog -->



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
</body>
</html>
