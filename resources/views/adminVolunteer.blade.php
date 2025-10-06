<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        .delete-volunteer:hover {
            cursor: pointer;
            background-color: #a00d0d; /* Warna tombol saat hover */
            color: #fff; /* Warna teks saat hover */
            transform: scale(1.05); /* Membesarkan tombol sedikit */
            transition: all 0.3s ease; /* Animasi halus */
        }

        .update-status-button:hover {
            cursor: pointer;
            background-color: #a00d0d; /* Warna tombol saat hover */
            color: #fff; /* Warna teks saat hover */
            transform: scale(1.05); /* Membesarkan tombol sedikit */
            transition: all 0.3s ease; /* Animasi halus */
        }

    </style>

	<!-- My CSS -->


	<title>Admin Volunteer</title>
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
			<li class="active">
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
            <li>
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
			<label for="switch-mode" class="switch-mode"></label>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Daftar Volunteer</h1>
					<ul class="breadcrumb">
						<li>
							<a href="">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="">Volunteer</a>
						</li>
					</ul>
				</div>
				{{-- <a href="#" class="btn-download">
                    <i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a> --}}
			</div>

            @if(session('success'))
                        <script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: "{{ session('success') }}",
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'OK'
                            });
                        </script>
                    @endif

			<div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Recent Volunteer</h3>
                        <i class='bx bx-search'></i>
                        <input type="text" id="search-input" placeholder="Search volunteer..." onkeyup="searchTable()" style="padding: 5px; width: 25%; font-family: 'Quicksand', sans-serif;">
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Umur</th>
                                <th>No Telepon</th>
                                <th>Email</th>
                                <th>Event</th>
                                <th>Status</th>
                                <th>Tanggal Dibuat</th>
                                <th>Tanggal Diperbarui</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($volunteers as $volunteer)
                                <tr>
                                    <td>{{ $volunteer->id }}</td>
                                    <td>{{ $volunteer->username }}</td>
                                    <td>{{ $volunteer->umur }}</td>
                                    <td>{{ $volunteer->no_telp }}</td>
                                    <td>{{ $volunteer->email }}</td>
                                    <td>{{ $volunteer->event }}</td>
                                    <td>
                                        <span class="status {{ $volunteer->status == 'accepted' ? 'completed' : 'pending' }}">
                                            {{ ucfirst($volunteer->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $volunteer->created_at->format('d-m-Y H:i') }}</td>
                                    <td>{{ $volunteer->updated_at->format('d-m-Y H:i') }}</td>
                                    <td>
                                        <form action="{{ route('admin.updateStatus', $volunteer->id) }}" method="POST" style="display: flex; justify-content:center; margin-bottom:7px">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn update-status-button {{ $volunteer->status == 'accepted' ? 'btn-warning' : 'btn-success' }}">
                                                {{ $volunteer->status == 'accepted' ? 'Set to Pending' : 'Set to Accept' }}
                                            </button>
                                        </form>
                                    </td>

                                    <td>
                                        <!-- Form hapus volunteer -->
                                        <form action="{{ route('admin.deleteVolunteer', $volunteer->id) }}" method="POST" class="delete-form" style="display: flex; justify-content:center; font-family: 'poppins', sans-serif">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger delete-volunteer"
                                                data-action="{{ route('admin.deleteVolunteer', $volunteer->id) }}"
                                                style="background-color: #b61e1e; font-family: 'poppins', sans-serif">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-volunteer');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const actionUrl = this.dataset.action; // Ambil URL dari atribut data-action

                // Tampilkan dialog konfirmasi SweetAlert2
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Buat form untuk mengirim permintaan DELETE
                        const form = document.createElement('form');
                        form.method = 'POST';
                        form.action = actionUrl;

                        // Tambahkan token CSRF dan metode DELETE
                        const csrfToken = document.querySelector('input[name="_token"]').value;
                        const methodField = document.createElement('input');
                        methodField.type = 'hidden';
                        methodField.name = '_method';
                        methodField.value = 'DELETE';

                        const csrfField = document.createElement('input');
                        csrfField.type = 'hidden';
                        csrfField.name = '_token';
                        csrfField.value = csrfToken;

                        form.appendChild(methodField);
                        form.appendChild(csrfField);

                        // Tambahkan form ke body dan submit
                        document.body.appendChild(form);
                        form.submit();
                    }
                });
            });
        });
    });
    </script>

	<script src="/js/admin.js"></script>
</body>
</html>
