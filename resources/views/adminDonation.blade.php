<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
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


	<title>Admin Donation</title>
</head>
<body>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
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
			<li class="active">
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
            <li>
				<a href="/admin/belanja">
					<i class='bx bxs-cart' ></i>
					<span class="text">Belanja</span>
				</a>
			</li>
            <li>
                <a href="/admin/produk">
                    <i class='bx bxs-package' ></i>
                    <span class="text">Produk</span>
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
			<label for="switch-mode" class="switch-mode"></label>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Daftar Donasi</h1>
					<ul class="breadcrumb">
						<li>
							<a href="">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="">Donation</a>
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
                        <h3>Recent Donations</h3>
                        <i class='bx bx-search'></i>
                        <input type="text" id="search-input" placeholder="Search Donations..." onkeyup="searchTable()" style="padding: 5px; width: 25%; font-family: 'Quicksand', sans-serif;">
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Name</th>
                                <th>No Telepon</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Jumlah Donasi</th>
                                <th>Tanggal Dibuat</th>
                                <th>Tanggal Diperbarui</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($donationsss as $donationsss)
                                <tr>
                                    <td>{{ $donationsss->order_id }}</td>
                                    <td>{{ $donationsss->name }}</td>
                                    <td>{{ $donationsss->phone }}</td>
                                    <td>{{ $donationsss->email }}</td>
                                    <td>
                                        <span class="status {{ $donationsss->status == 'accepted' ? 'completed' : 'pending' }}">
                                            {{ ucfirst($donationsss->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $donationsss->amount }}</td>
                                    <td>{{ $donationsss->created_at->format('d-m-Y H:i') }}</td>
                                    <td>{{ $donationsss->updated_at->format('d-m-Y H:i') }}</td>
                                    <td>
                                        <form action="{{ route('admin.updateStatusDonasi', $donationsss->id) }}" method="POST" style="display: flex;justify-content:center; margin-bottom:7px">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn {{ $donationsss->status == 'accepted' ? 'btn-warning' : 'btn-success' }}">
                                                {{ $donationsss->status == 'accepted' ? 'Set to Pending' : 'Set to Accept' }}
                                            </button>
                                        </form>

                                        <!-- Form hapus volunteer -->
                                        {{-- <form action="{{ route('admin.deleteVolunteer', $donationsss->id) }}" method="POST" style="display: flex; justify-content:center">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this volunteer?')" style="background-color: #b61e1e;">
                                                Delete
                                            </button>
                                        </form> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if(session('successking'))
                        <script>
                            window.addEventListener('load', function() {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!',
                                    text: "{{ session('successking') }}",
                                    confirmButtonColor: '#b61e1e',
                                });
                            });
                        </script>
                    @endif
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
