<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Custom CSS -->
    <link href="{{ asset('css/adminStyle.css') }}" rel="stylesheet">

    <style>
        button {
            font-size: 10px;
            padding: 6px 16px;
            color: #ffffff;
            border-radius: 20px;
            font-weight: 700;
        }

        button.btn-success {
            background-color: #3a5f4c;
        }

        button.btn-success:hover {
            background-color: #324a3c;
        }

        button.btn-warning {
            background-color: var(--orange);
        }

        button.btn-warning:hover {
            background-color: #e69b00;
        }

        button i {
            margin-right: 5px;
        }

        .delete-button:hover {
            cursor: pointer;
            background-color: #a00d0d;
            color: #fff;
            transform: scale(1.05);
            transition: all 0.3s ease;
        }
    </style>

    <title>Admin Kontak</title>
</head>
<body>
    {{-- @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif --}}

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


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="/admin" class="brand">
            <i class='bx bxs-smile'></i>
            <span class="text">{{ Auth::user()->name ?? 'AdminHub' }}</span>
        </a>
        <ul class="side-menu top">
            <li><a href="/admin"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
            <li><a href="/admin/volunteer"><i class='bx bxs-group'></i>Volunteer</a></li>
            <li><a href="/admin/donation"><i class='bx bxs-wallet'></i>Donation</a></li>
            <li class="active"><a href="/admin/kontak"><i class='bx bxs-message-dots'></i>Kontak</a></li>
            <li><a href="/admin/belanja"><i class='bx bxs-cart'></i>Belanja</a></li>
            <li><a href="/admin/akun"><i class='bx bxs-lock-alt'></i>Akun</a></li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="#" class="logout" id="admin-logout-button">
                    <i class='bx bxs-log-out-circle'></i>Logout
                </a>
            </li>
            <form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </ul>
    </section>

    <!-- CONTENT -->
    <section id="content">
        <nav>
            <i class='bx bx-menu'></i>
            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode"></label>
        </nav>

        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Daftar Kontak</h1>
                    <ul class="breadcrumb">
                        <li><a href="">Dashboard</a></li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li><a class="active" href="">Kontak</a></li>
                    </ul>
                </div>
            </div>

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Recent Kontak</h3>
                        <input type="text" id="search-input" placeholder="Search Kontak..." onkeyup="searchTable()" style="padding: 5px; width: 25%;">
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Tanggal Dibuat</th>
                                <th>Tanggal Diperbarui</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kontak as $kontak)
                                <tr>
                                    <td>{{ $kontak->id }}</td>
                                    <td>{{ $kontak->name }}</td>
                                    <td>{{ $kontak->email }}</td>
                                    <td>{{ $kontak->subject }}</td>
                                    <td>{{ $kontak->message }}</td>
                                    <td>{{ $kontak->created_at->format('d-m-Y H:i') }}</td>
                                    <td>{{ $kontak->updated_at->format('d-m-Y H:i') }}</td>
                                    <td>
                                        <form action="{{ route('admin.deleteKontak', $kontak->id) }}" method="POST" class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger delete-button" data-action="{{ route('admin.deleteKontak', $kontak->id) }}" style="background-color:#a00d0d">
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
    </section>

    <script>
        document.getElementById('admin-logout-button').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('admin-logout-form').submit();
        });

        document.addEventListener('DOMContentLoaded', function () {
            const deleteButtons = document.querySelectorAll('.delete-button');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const form = this.closest('form');
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
                            form.submit();
                        }
                    });
                });
            });
        });

        function searchTable() {
            const input = document.getElementById("search-input").value.toLowerCase();
            const rows = document.querySelectorAll("tbody tr");
            rows.forEach(row => {
                const cells = Array.from(row.cells);
                const match = cells.some(cell => cell.textContent.toLowerCase().includes(input));
                row.style.display = match ? "" : "none";
            });
        }
    </script>
</body>
</html>
