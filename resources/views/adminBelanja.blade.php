<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
	<link href="{{ asset('css/adminStyle.css') }}" rel="stylesheet">

    <style>

        /* Style umum untuk tombol */
        button {
            font-size: 10px;
            padding: 6px 16px;
            color: #ffffff;
            border-radius: 20px;
            font-weight: 700;
        }

        /* Tombol Accept */
        button.btn-success {
            background-color: #3a5f4c; /* Warna hijau */
        }

        button.btn-success:hover {
            background-color: #3a5f4c; /* Warna hijau lebih gelap saat di-hover */
        }

        /* Tombol Set to Pending */
        button.btn-warning {
            background-color: var(--orange);; /* Warna kuning */
        }

        button.btn-warning:hover {
            background-color: var(--orange);; /* Warna kuning lebih gelap saat di-hover */
        }

        /* Tambahan gaya untuk ikon */
        button i {
            margin-right: 5px;
        }

    </style>

	<!-- My CSS -->


	<title>Admin Belanja</title>
</head>
<body>
    @if(session('success'))
    <script>
        window.addEventListener('load', function() {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                confirmButtonColor: '#721c24',
            });
        });
        </script>
    @endif



    <!-- SIDEBAR -->
	<section id="sidebar">
		<a href="/admin" class="brand">
            <i class='bx bxs-smile'></i>
            <span class="text">{{ Auth::user()->name ?? 'AdminHub' }}</span>
        </a>
		<ul class="side-menu top">
			<li>
				<a href="/admin">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="/admin/volunteer">
					<i class='bx bxs-group' ></i>
					<span class="text">Volunteer</span>
				</a>
			</li>
			<li>
                <a href="/admin/donation">
                    <i class='bx bxs-wallet' ></i>
                    <span class="text">Donation</span>
                </a>
            </li>
			<li>
				<a href="/admin/kontak">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Kontak</span>
				</a>
			</li>
			<li class="active">
				<a href="/admin/belanja">
					<i class='bx bxs-cart' ></i>
					<span class="text">Belanja</span>
				</a>
			</li>
            <li>
				<a href="/admin/akun">
					<i class='bx bxs-lock-alt' ></i>
					<span class="text">Akun</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">

			<li>
                <a href="#" class="logout" id="admin-logout-button">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Logout</span>
                </a>
            </li>

            <!-- Form logout tersembunyi untuk admin -->
            <form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
		</ul>
	</section>
	<!-- SIDEBAR -->

	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
            <i class='bx bx-menu' ></i>
			<input type="checkbox" id="switch-mode" hidden>
			{{-- <label for="switch-mode" class="switch-mode"></label> --}}
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Daftar Pesanan & Data Data Produk Green Ranger</h1>
					<ul class="breadcrumb">
						<li>
							<a href="">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="">Belanja</a>
						</li>
					</ul>
				</div>
				{{-- <a href="#" class="btn-download">
                    <i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a> --}}
			</div>

			<div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Daftar Pesanan</h3>
                        <i class='bx bx-search'></i>
                        <input type="text" id="search-input" placeholder="Search Data Checkout..." onkeyup="searchTable()" style="padding: 5px; width: 25%; font-family: 'Quicksand', sans-serif;">
                    </div>
                    <table class="shop_table cart table" style="text-align: center">
                        <thead>
                            <tr>
                                <th class="product-id_co">ID Checkout</th>
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
                            @php
                                $shownCheckouts = []; // Array untuk menyimpan checkout_id yang sudah ditampilkan
                            @endphp
                            @foreach($products as $keranjang)
                                @foreach($keranjang->checkouts as $checkout)
                                    @php
                                        $isFirstRow = !in_array($checkout->id, $shownCheckouts); // Cek apakah checkout_id sudah ditampilkan
                                    @endphp
                                    <tr class="cart_item">
                                        <td class="product-id_co">
                                            <span class="amount">{{ $checkout->id }}</span>
                                        </td>
                                        <td class="product-thumbnail">
                                            <a href="">
                                                <img src="{{ asset($keranjang->product->image) }}" alt="{{ $keranjang->product->name }}" style="width: 100px; height: auto;">
                                            </a>
                                        </td>
                                        <td class="product-name">
                                            <span class="amount">{{ $keranjang->product->name }}</span>
                                        </td>
                                        <td class="product-price">
                                            <span class="amount">Rp. {{ number_format($keranjang->product->price, 2) }}</span>
                                        </td>
                                        <td class="product-quantity">
                                            <span class="amount">{{ $keranjang->quantity }}</span>
                                        </td>
                                        <td class="product-subtotal">
                                            <span class="amount">Rp. {{ number_format($keranjang->product->price * $keranjang->quantity, 2) }}</span>
                                        </td>

                                        <!-- Hanya tampilkan tombol jika ini baris pertama untuk checkout_id -->
                                        @if($isFirstRow)
                                            <td class="product-status">
                                                <form action="{{ route('admin.updatepesanan', $checkout->id) }}" method="POST" id="form-status-{{ $checkout->id }}">
                                                    @csrf
                                                    <select
                                                        name="status"
                                                        class="form-control"
                                                        onchange="document.getElementById('form-status-{{ $checkout->id }}').submit()"
                                                    >
                                                        <option value="Belum Dibayar" {{ $checkout->status == 'Belum Dibayar' ? 'selected' : '' }}>Belum Dibayar</option>
                                                        <option value="Sedang Dikirim" {{ $checkout->status == 'Sedang Dikirim' ? 'selected' : '' }}>Sedang Dikirim</option>
                                                        <option value="Sedang Diproses" {{ $checkout->status == 'Sedang Diproses' ? 'selected' : '' }}>Sedang Diproses</option>
                                                        <option value="Diterima" {{ $checkout->status == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                                                        <option value="Gagal" {{ $checkout->status == 'Gagal' ? 'selected' : '' }}>Gagal</option>
                                                    </select>
                                                </form>
                                            </td>
                                            <td class="product-Viewdetail">
                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detailModal{{ $keranjang->id }}">
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
                                                            <div class="modal-body">
                                                                <p><strong>ID Checkout :</strong> {{ $checkout->id }}</p>
                                                                <p><strong>ID User :</strong> {{ $checkout->user_id }}</p>
                                                                <p><strong>Alamat 1 :</strong> {{ $checkout->billing_address_1 }}</p>
                                                                <p><strong>Alamat 2 :</strong> {{ $checkout->billing_address_2 }}</p>
                                                                <p><strong>Kota :</strong> {{ $checkout->billing_city }}</p>
                                                                <p><strong>No. Telepon :</strong> {{ $checkout->billing_phone }}</p>
                                                                <p><strong>Kode Pos :</strong> {{ $checkout->billing_postcode }}</p>
                                                                <p><strong>Catatan Pesanan :</strong> {{ $checkout->order_comments }}</p>
                                                                <p><strong>Status :</strong> {{ $checkout->status }}</p>
                                                                <p><strong>Metode Pengiriman :</strong> {{ $checkout->metode_pengiriman->name }}</p>
                                                                <p><strong>Tanggal Checkout :</strong> {{ $checkout->created_at }}</p>
                                                                <hr>
                                                                <h5>Produk yang Dipesan:</h5>
                                                                <ul>
                                                                    @foreach($checkout->keranjangs as $keranjang)
                                                                        <li>
                                                                            <strong>Nama Produk:</strong> {{ $keranjang->product->name }}<br>
                                                                            <strong>Jumlah:</strong> {{ $keranjang->quantity }}<br>
                                                                            <strong>Total:</strong> Rp. {{ number_format($keranjang->product->price * $keranjang->quantity, 2) }}<br>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                                <hr>
                                                                <p><strong>Total Pembayaran:</strong> Rp. {{ number_format($checkout->keranjangs->sum(function($keranjang) { return $keranjang->product->price * $keranjang->quantity; }), 2) }}</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                        @endif

                                        @php
                                            $shownCheckouts[] = $checkout->id; // Tambahkan checkout_id ke array
                                        @endphp
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->

    <script>
        document.getElementById('admin-logout-button').addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah navigasi link
            document.getElementById('admin-logout-form').submit(); // Kirim form logout
        });
    </script>

    <script>
        function searchTable() {
            // Ambil nilai dari input
            let input = document.getElementById("search-input").value.toLowerCase();
            // Ambil tabel
            let table = document.querySelector(".table-data table tbody");
            // Ambil semua baris dalam tabel
            let rows = table.getElementsByTagName("tr");

            // Loop setiap baris di dalam tabel
            for (let i = 0; i < rows.length; i++) {
                let cells = rows[i].getElementsByTagName("td");
                let matchFound = false;

                // Loop setiap kolom (sel) di dalam baris
                for (let j = 0; j < cells.length; j++) {
                    let cellValue = cells[j].textContent || cells[j].innerText;

                    // Cek jika nilai sel sesuai dengan input
                    if (cellValue.toLowerCase().indexOf(input) > -1) {
                        matchFound = true;
                        break; // Jika ada yang cocok, tidak perlu mengecek kolom selanjutnya
                    }
                }

                // Jika cocok, tampilkan baris; jika tidak, sembunyikan
                if (matchFound) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        }
    </script>

	<script src="/js/admin.js"></script>
</body>
</html>
