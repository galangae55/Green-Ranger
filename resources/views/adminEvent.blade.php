<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Custom CSS -->
    <link href="{{ asset('css/adminStyle.css') }}" rel="stylesheet">

    <style>
        :root {
            --poppins: 'Poppins', sans-serif;
            --lato: 'Lato', sans-serif;
            --primary: #3a5f4c;
            --primary-dark: #2d4b3b;
            --gold: #d4af37;
            --light-bg: #f8f9fa;
            --text-dark: #333;
            --text-light: #666;
            --border-light: #e1e5e9;
        }

        /* Modal Overlay */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            z-index: 1000;
            font-family: var(--poppins) !important;
        }

        /* Modal Content - Posisikan di tengah area konten */
        #editEventModal .modal-content,
        #createEventModal .modal-content,
        #viewEventModal .modal-content {
            width: 900px;
            padding: 0;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
            background: white;
            position: fixed;
            top: 50%;
            left: calc(50% + 130px); /* Menyesuaikan dengan lebar sidebar */
            transform: translate(-50%, -50%);
            margin: 0;
            font-family: var(--poppins) !important;
            overflow-y: auto;
        }

        /* Responsive adjustment untuk sidebar yang mengecil */
        @media (max-width: 1200px) {
            #editEventModal .modal-content,
            #createEventModal .modal-content,
            #viewEventModal .modal-content {
                left: calc(50% + 30px); /* Untuk sidebar kecil */
            }
        }

        /* Untuk mobile, abaikan sidebar */
        @media (max-width: 768px) {
            #editEventModal .modal-content,
            #createEventModal .modal-content,
            #viewEventModal .modal-content {
                left: 50%; /* Tengah penuh di mobile */
                width: 95%;
                margin: 0 auto;
            }
        }

        .modal-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 25px 30px;
            position: relative;
            font-family: var(--poppins) !important;
        }

        .modal-header h2 {
            margin: 0;
            font-weight: 700;
            font-size: 28px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-family: var(--poppins) !important;
        }

        .modal-header h2 i {
            color: var(--gold);
        }

        .modal-close {
            position: absolute;
            top: 20px;
            right: 25px;
            color: white;
            font-size: 28px;
            font-weight: 300;
            opacity: 0.8;
            transition: opacity 0.2s;
            cursor: pointer;
            font-family: var(--poppins) !important;
            background: none;
            border: none;
        }

        .modal-close:hover {
            opacity: 1;
        }

        .event-detail-body,
        .event-create-body {
            padding: 30px;
            max-height: 70vh;
            overflow-y: auto;
            font-family: var(--poppins) !important;
        }

        /* Detail Sections */
        .detail-section {
            margin-bottom: 30px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            border: 1px solid var(--border-light);
            font-family: var(--poppins) !important;
        }

        .section-header {
            background: var(--light-bg);
            padding: 18px 25px;
            border-bottom: 1px solid var(--border-light);
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 600;
            color: var(--primary);
            font-size: 18px;
            font-family: var(--poppins) !important;
        }

        .section-header i {
            color: var(--gold);
            font-size: 22px;
        }

        .section-content {
            padding: 25px;
            background: white;
            font-family: var(--poppins) !important;
        }

        /* Event Info Grid */
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            font-family: var(--poppins) !important;
        }

        .info-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            padding: 15px;
            background: var(--light-bg);
            border-radius: 8px;
            transition: all 0.3s ease;
            font-family: var(--poppins) !important;
        }

        .info-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .info-icon {
            width: 46px;
            height: 46px;
            border-radius: 50%;
            background: var(--primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .info-content {
            flex: 1;
            font-family: var(--poppins) !important;
        }

        .info-label {
            font-size: 14px;
            color: var(--text-light);
            margin-bottom: 5px;
            font-weight: 500;
            font-family: var(--poppins) !important;
        }

        .info-value {
            font-size: 16px;
            color: var(--text-dark);
            font-weight: 600;
            font-family: var(--poppins) !important;
        }

        .info-value.empty {
            color: #999;
            font-style: italic;
            font-family: var(--poppins) !important;
        }

        /* Image Gallery */
        .image-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
            font-family: var(--poppins) !important;
        }

        .main-image-container {
            text-align: center;
            font-family: var(--poppins) !important;
        }

        .main-image-container h4 {
            margin-bottom: 15px;
            color: var(--primary);
            font-weight: 600;
            font-family: var(--poppins) !important;
        }

        .main-image {
            width: 100%;
            max-width: 350px;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .main-image:hover {
            transform: scale(1.02);
        }

        .gallery-container h4 {
            margin-bottom: 15px;
            color: var(--primary);
            font-weight: 600;
            font-family: var(--poppins) !important;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
            gap: 12px;
        }

        .gallery-img {
            width: 100%;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
            transition: all 0.3s ease;
            cursor: pointer;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
        }

        .gallery-img:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.12);
        }

        /* Schedule Items */
        .schedule-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
            font-family: var(--poppins) !important;
        }

        .schedule-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px 20px;
            background: var(--light-bg);
            border-radius: 10px;
            border-left: 4px solid var(--primary);
            transition: all 0.2s ease;
            font-family: var(--poppins) !important;
        }

        .schedule-item:hover {
            background: #f0f3f5;
            transform: translateX(5px);
        }

        .schedule-time {
            background: var(--primary);
            color: white;
            padding: 8px 12px;
            border-radius: 6px;
            font-weight: 600;
            min-width: 90px;
            text-align: center;
            font-family: var(--poppins) !important;
        }

        .schedule-activity {
            flex: 1;
            font-weight: 500;
            color: var(--text-dark);
            font-family: var(--poppins) !important;
        }

        /* Description Box */
        .description-box {
            background: var(--light-bg);
            padding: 20px;
            border-radius: 10px;
            line-height: 1.6;
            color: var(--text-dark);
            border-left: 4px solid var(--gold);
            font-family: var(--poppins) !important;
        }

        /* Empty States */
        .empty-state {
            text-align: center;
            padding: 30px;
            color: var(--text-light);
            background: var(--light-bg);
            border-radius: 10px;
            border: 2px dashed var(--border-light);
            font-family: var(--poppins) !important;
        }

        .empty-state i {
            font-size: 48px;
            margin-bottom: 15px;
            color: #ccc;
        }

        /* Create Event Modal Styles */
        .event-create-body {
            padding: 30px;
            max-height: 80vh;
            overflow-y: auto;
            font-family: var(--poppins) !important;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 20px;
            font-family: var(--poppins) !important;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--primary);
            font-family: var(--poppins) !important;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid var(--border-light);
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s;
            font-family: var(--poppins) !important;
            box-sizing: border-box;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(58, 95, 76, 0.1);
        }

        .form-row {
            display: flex;
            gap: 15px;
        }

        .form-row .form-group {
            flex: 1;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid var(--border-light);
        }

        /* Schedule Section in Create Form */
        .schedule-section {
            background: var(--light-bg);
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .schedule-item-create {
            display: flex;
            gap: 15px;
            align-items: flex-end;
            margin-bottom: 15px;
            padding: 15px;
            background: white;
            border-radius: 8px;
            border: 1px solid var(--border-light);
        }

        .schedule-item-create .form-group {
            flex: 1;
            margin-bottom: 0;
        }

        .remove-schedule {
            background: #e74c3c;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 6px;
            cursor: pointer;
            font-family: var(--poppins);
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .add-schedule {
            background: var(--primary);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-family: var(--poppins);
            display: flex;
            align-items: center;
            gap: 5px;
            margin-top: 10px;
        }

        /* Image Preview */
        .image-preview-container {
            margin-top: 10px;
        }

        .image-preview {
            max-width: 200px;
            max-height: 150px;
            border-radius: 8px;
            display: none;
        }

        .gallery-preview {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
        }

        .gallery-preview-item {
            position: relative;
            width: 100px;
            height: 100px;
        }

        .gallery-preview-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 8px;
        }

        .remove-gallery-item {
            position: absolute;
            top: -8px;
            right: -8px;
            background: #e74c3c;
            color: white;
            border: none;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .image-section {
                grid-template-columns: 1fr;
            }
            
            .info-grid {
                grid-template-columns: 1fr;
            }
            
            .form-row {
                flex-direction: column;
            }
            
            .schedule-item-create {
                flex-direction: column;
                align-items: stretch;
            }
        }

        /* Original styles for other elements */
        .btn {
            font-size: 14px;
            padding: 10px 20px;
            color: #ffffff;
            border-radius: 6px;
            font-weight: 500;
            border: none;
            cursor: pointer;
            transition: background-color 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-family: var(--poppins);
        }

        .btn-primary {
            background-color: #3a5f4c;
        }

        .btn-primary:hover {
            background-color: #2d4b3b;
        }

        .btn-warning {
            background-color: #e67e22;
        }

        .btn-warning:hover {
            background-color: #d35400;
        }

        .btn-danger {
            background-color: #e74c3c;
        }

        .btn-danger:hover {
            background-color: #c0392b;
        }

        .btn-success {
            background-color: #27ae60;
        }

        .btn-success:hover {
            background-color: #219653;
        }

        .btn-secondary {
            background-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .btn-info {
            background-color: #17a2b8;
        }

        .btn-info:hover {
            background-color: #138496;
        }

        .table-data {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .table-data table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        .table-data th {
            background-color: #f8f9fa;
            padding: 12px 15px;
            text-align: left;
            font-weight: 600;
            color: #333;
            border-bottom: 2px solid #e9ecef;
            font-family: var(--poppins);
        }

        .table-data td {
            padding: 12px 15px;
            border-bottom: 1px solid #e9ecef;
            font-family: var(--poppins);
        }

        .table-data tr:hover {
            background-color: #f8f9fa;
        }

        .table-data .head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .table-data .head h3 {
            margin: 0;
            color: #333;
            font-weight: 600;
        }

        .search-input {
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            width: 300px;
            font-family: var(--poppins);
            font-size: 14px;
        }

        .search-input:focus {
            outline: none;
            border-color: #3a5f4c;
            box-shadow: 0 0 0 2px rgba(58, 95, 76, 0.1);
        }

        .head-title h1 {
            font-family: var(--poppins);
            font-weight: 600;
        }

        .breadcrumb {
            font-family: var(--poppins);
        }

        .table-img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 4px;
        }

        .table-actions {
            white-space: nowrap;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .text-muted {
            color: #6c757d !important;
            font-size: 12px;
            margin-top: 5px;
            display: block;
        }
    </style>

    <title>Admin Events</title>
</head>
<body>

    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                confirmButtonColor: '#3a5f4c',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    @if($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                html: `@foreach($errors->all() as $error)<p>{{ $error }}</p>@endforeach`,
                confirmButtonColor: '#3a5f4c',
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
            <li>
                <a href="/admin">
                    <i class='bx bxs-dashboard' ></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="active">
                <a href="/admin/event">
                    <i class='bx bxs-calendar-event'></i>
                    <span class="text">Event</span>
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
            <li><a href="/admin/blog-management"><i class='bx bxs-news'></i>Blog Management</a></li>
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
                    <h1>Daftar Events</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li>
                            <a class="active" href="">Events</a>
                        </li>
                    </ul>
                </div>
                <button class="btn btn-primary" onclick="openCreateModal()">
                    <i class='bx bx-plus'></i>Tambah Event
                </button>
            </div>

            <div class="table-data">
                <div class="order" style="padding: 0px; background: #ffffffff;">
                    <div class="head">
                        <h3>Recent Events</h3>
                        <input type="text" id="search-input" class="search-input" placeholder="Search Events..." onkeyup="searchTable()">
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Gambar</th>
                                <th>Judul</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>Lokasi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($events as $event)
                                <tr>
                                    <td style="text-align: center;">{{ $event->id }}</td>
                                    <td style="text-align: center;">
                                        @if($event->image)
                                            <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="table-img">
                                        @else
                                            <div style="width: 50px; height: 50px; background: #f0f0f0; border-radius: 4px; display: flex; align-items: center; justify-content: center;">
                                                <i class='bx bx-image-alt' style="color: #999;"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td style="text-align: center;">{{ $event->title }}</td>
                                    <td style="text-align: center;">{{ \Carbon\Carbon::parse($event->date)->format('d-m-Y') }}</td>
                                    <td style="text-align: center;">{{ $event->time }}</td>
                                    <td style="text-align: center;">{{ $event->location }}</td>
                                    <td class="table-actions" style="justify-items: center;">
                                        <div class="action-buttons">
                                            <button class="btn btn-warning" onclick="viewEvent({{ $event->id }})">
                                                <i class='bx bx-show'></i>View
                                            </button>
                                            <button class="btn btn-info" onclick="openEditModal({{ $event->id }})">
                                                <i class='bx bx-edit'></i>Edit
                                            </button>
                                            <form action="{{ route('admin.deleteEvent', $event->id) }}" method="POST" class="delete-form" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger delete-button">
                                                    <i class='bx bx-trash'></i>Delete
                                                </button>
                                            </form>
                                        </div>
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

    <!-- View Event Modal -->
    <div id="viewEventModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2><i class='bx bx-calendar-event'></i> Detail Event</h2>
                <button class="modal-close" onclick="closeViewModal()">&times;</button>
            </div>
            <div class="event-detail-body" id="eventDetails">
                <!-- Content will be loaded via AJAX -->
            </div>
        </div>
    </div>

    <!-- Create Event Modal -->
    <div id="createEventModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2><i class='bx bx-calendar-plus'></i> Tambah Event Baru</h2>
                <button class="modal-close" onclick="closeCreateModal()">&times;</button>
            </div>
            <div class="event-create-body">
                <form action="{{ route('admin.createEvent') }}" method="POST" enctype="multipart/form-data" id="createEventForm">
                    @csrf
                    <div class="form-group">
                        <label for="title">Judul Event *</label>
                        <input type="text" id="title" name="title" required placeholder="Masukkan judul event">
                    </div>

                    <div class="form-group">
                        <label for="slug">Slug *</label>
                        <input type="text" id="slug" name="slug" required placeholder="Slug akan otomatis terisi">
                    </div>

                    <div class="form-group">
                        <label for="description">Deskripsi Event *</label>
                        <textarea id="description" name="description" rows="4" required placeholder="Deskripsikan event secara detail"></textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="date">Tanggal Event *</label>
                            <input type="date" id="date" name="date" required>
                        </div>
                        <div class="form-group">
                            <label for="time">Waktu Event *</label>
                            <input type="time" id="time" name="time" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="location">Lokasi Event *</label>
                        <input type="text" id="location" name="location" required placeholder="Tempat diselenggarakannya event">
                    </div>

                    <div class="form-group">
                        <label for="image">Gambar Utama Event</label>
                        <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(this, 'imagePreview')">
                        <div class="image-preview-container">
                            <img id="imagePreview" class="image-preview" src="" alt="Preview">
                        </div>
                    </div>

                    <div class="schedule-section">
                        <div class="section-header">
                            <i class='bx bx-time-five'></i>
                            <span>Jadwal Acara</span>
                        </div>
                        <div id="scheduleContainer">
                            <!-- Schedule items will be added here dynamically -->
                        </div>
                        <button type="button" class="add-schedule" onclick="addScheduleItem()">
                            <i class='bx bx-plus'></i>Tambah Sesi
                        </button>
                    </div>

                    <div class="form-group">
                        <label for="gallery">Galeri Foto Event (Bisa pilih multiple)</label>
                        <input type="file" id="gallery" name="gallery[]" multiple accept="image/*" onchange="previewGallery(this)">
                        <div class="gallery-preview" id="galleryPreview">
                            <!-- Gallery preview will be shown here -->
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="closeCreateModal()">Batal</button>
                        <button type="submit" class="btn btn-primary">
                            <i class='bx bx-save'></i>Simpan Event
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Event Modal -->
    <div id="editEventModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2><i class='bx bx-calendar-edit'></i> Edit Event</h2>
                <button class="modal-close" onclick="closeEditModal()">&times;</button>
            </div>
            <div class="event-create-body">
                <form action="" method="POST" enctype="multipart/form-data" id="editEventForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="event_id" id="edit_event_id">
                    
                    <div class="form-group">
                        <label for="edit_title">Judul Event *</label>
                        <input type="text" id="edit_title" name="title" required placeholder="Masukkan judul event">
                    </div>

                    <div class="form-group">
                        <label for="edit_slug">Slug *</label>
                        <input type="text" id="edit_slug" name="slug" required placeholder="Slug akan otomatis terisi">
                    </div>

                    <div class="form-group">
                        <label for="edit_description">Deskripsi Event *</label>
                        <textarea id="edit_description" name="description" rows="4" required placeholder="Deskripsikan event secara detail"></textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="edit_date">Tanggal Event *</label>
                            <input type="date" id="edit_date" name="date" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_time">Waktu Event *</label>
                            <input type="time" id="edit_time" name="time" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="edit_location">Lokasi Event *</label>
                        <input type="text" id="edit_location" name="location" required placeholder="Tempat diselenggarakannya event">
                    </div>

                    <div class="form-group">
                        <label for="edit_image">Gambar Utama Event</label>
                        <input type="file" id="edit_image" name="image" accept="image/*" onchange="previewImage(this, 'edit_imagePreview')">
                        <div class="image-preview-container">
                            <img id="edit_imagePreview" class="image-preview" src="" alt="Preview">
                        </div>
                        <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
                    </div>

                    <div class="schedule-section">
                        <div class="section-header">
                            <i class='bx bx-time-five'></i>
                            <span>Jadwal Acara</span>
                        </div>
                        <div id="edit_scheduleContainer">
                            <!-- Schedule items will be added here dynamically -->
                        </div>
                        <button type="button" class="add-schedule" onclick="addEditScheduleItem()">
                            <i class='bx bx-plus'></i>Tambah Sesi
                        </button>
                    </div>

                    <div class="form-group">
                        <label for="edit_gallery">Galeri Foto Event (Bisa pilih multiple)</label>
                        <input type="file" id="edit_gallery" name="gallery[]" multiple accept="image/*" onchange="previewEditGallery(this)">
                        <div class="gallery-preview" id="edit_galleryPreview">
                            <!-- Existing gallery preview will be shown here -->
                        </div>
                        <small class="text-muted">Pilih gambar baru untuk menambah ke galeri yang sudah ada</small>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="closeEditModal()">Batal</button>
                        <button type="submit" class="btn btn-primary">
                            <i class='bx bx-save'></i>Update Event
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Global variables
        let scheduleCount = 0;
        let galleryFiles = [];
        let editScheduleCount = 0;
        let editGalleryFiles = [];

        // Safe element access function
        function getElementSafe(id) {
            const element = document.getElementById(id);
            if (!element) {
                console.warn(`Element with id '${id}' not found`);
            }
            return element;
        }

        // Safe event listener attachment
        function safeAddEventListener(element, event, handler) {
            if (element && typeof handler === 'function') {
                element.addEventListener(event, handler);
            }
        }

        // Fungsi untuk menghitung posisi modal yang tepat
        function calculateModalPosition() {
            const sidebar = document.getElementById('sidebar');
            if (!sidebar) return '50%';
            
            const sidebarWidth = sidebar.offsetWidth;
            const isSidebarSmall = sidebarWidth < 100; // Jika sidebar dalam mode kecil
            
            if (window.innerWidth <= 768) {
                return '50%'; // Di mobile, tengah penuh
            } else if (isSidebarSmall) {
                return 'calc(50% + 30px)'; // Sidebar kecil
            } else {
                return 'calc(50% + 130px)'; // Sidebar normal
            }
        }

        // Fungsi untuk memposisikan modal di tengah area konten
        function positionModal(modalId) {
            const modal = document.getElementById(modalId);
            if (!modal) return;
            
            const modalContent = modal.querySelector('.modal-content');
            if (!modalContent) return;
            
            const leftPosition = calculateModalPosition();
            modalContent.style.left = leftPosition;
        }

        // Initialize when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Safe logout attach
            const logoutButton = getElementSafe('admin-logout-button');
            safeAddEventListener(logoutButton, 'click', function(event) {
                event.preventDefault();
                const form = getElementSafe('admin-logout-form');
                if (form) form.submit();
            });

            // Delete Confirmation
            const deleteButtons = document.querySelectorAll('.delete-button');
            deleteButtons.forEach(button => {
                safeAddEventListener(button, 'click', function() {
                    const form = this.closest('form');
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Data event akan dihapus permanen!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3a5f4c',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed && form) {
                            form.submit();
                        }
                    });
                });
            });

            // Auto-generate slug from title for create form
            const titleInput = getElementSafe('title');
            safeAddEventListener(titleInput, 'input', function() {
                const title = this.value;
                const slug = title.toLowerCase()
                    .replace(/[^\w ]+/g, '')
                    .replace(/ +/g, '-');
                const slugInput = getElementSafe('slug');
                if (slugInput) slugInput.value = slug;
            });

            // Auto-generate slug for edit form
            const editTitleInput = getElementSafe('edit_title');
            safeAddEventListener(editTitleInput, 'input', function() {
                const title = this.value;
                const slug = title.toLowerCase()
                    .replace(/[^\w ]+/g, '')
                    .replace(/ +/g, '-');
                const slugInput = getElementSafe('edit_slug');
                if (slugInput) slugInput.value = slug;
            });

            // Handle window resize untuk menyesuaikan posisi modal
            window.addEventListener('resize', function() {
                // Reposisikan modal yang sedang terbuka
                const modals = ['createEventModal', 'editEventModal', 'viewEventModal'];
                modals.forEach(modalId => {
                    const modal = document.getElementById(modalId);
                    if (modal && modal.style.display === 'block') {
                        positionModal(modalId);
                    }
                });
            });

            // Juga handle ketika sidebar di-toggle
            const sidebarToggle = document.querySelector('.bx-menu');
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function() {
                    // Beri delay sedikit untuk menunggu sidebar selesai animasi
                    setTimeout(() => {
                        const modals = ['createEventModal', 'editEventModal', 'viewEventModal'];
                        modals.forEach(modalId => {
                            const modal = document.getElementById(modalId);
                            if (modal && modal.style.display === 'block') {
                                positionModal(modalId);
                            }
                        });
                    }, 300);
                });
            }
        });

        // Search Function
        function searchTable() {
            const input = getElementSafe("search-input");
            if (!input) return;
            
            const searchValue = input.value.toLowerCase();
            const rows = document.querySelectorAll("tbody tr");
            rows.forEach(row => {
                const cells = Array.from(row.cells);
                const match = cells.some(cell => cell.textContent.toLowerCase().includes(searchValue));
                row.style.display = match ? "" : "none";
            });
        }

        // Modal Functions for Create
        function openCreateModal() {
            const modal = getElementSafe('createEventModal');
            if (modal) {
                modal.style.display = 'block';
                resetCreateForm();
                // Add one schedule item by default
                if (scheduleCount === 0) {
                    addScheduleItem();
                }
                // Posisikan modal di tengah area konten
                positionModal('createEventModal');
            }
        }

        function closeCreateModal() {
            const modal = getElementSafe('createEventModal');
            if (modal) modal.style.display = 'none';
        }

        // Modal Functions for View
        function closeViewModal() {
            const modal = getElementSafe('viewEventModal');
            if (modal) modal.style.display = 'none';
        }

        // Modal Functions for Edit
        function openEditModal(eventId) {
            fetch(`/admin/event/${eventId}`)
                .then(res => {
                    if (!res.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return res.json();
                })
                .then(data => {
                    // Fill form with event data
                    document.getElementById('edit_event_id').value = data.id;
                    document.getElementById('edit_title').value = data.title || '';
                    document.getElementById('edit_slug').value = data.slug || '';
                    document.getElementById('edit_description').value = data.description || '';
                    document.getElementById('edit_date').value = data.date || '';
                    document.getElementById('edit_time').value = data.time || '';
                    document.getElementById('edit_location').value = data.location || '';

                    // Preview main image if exists
                    const imagePreview = document.getElementById('edit_imagePreview');
                    if (data.image) {
                        imagePreview.src = `/storage/${data.image}`;
                        imagePreview.style.display = 'block';
                    } else {
                        imagePreview.style.display = 'none';
                    }

                    // Set form action
                    document.getElementById('editEventForm').action = `/admin/event/${data.id}`;

                    // Load schedule
                    loadEditSchedule(data.detail?.schedule);
                    
                    // Load existing gallery
                    loadEditGallery(data.detail?.gallery);

                    // Show modal
                    const modal = document.getElementById('editEventModal');
                    modal.style.display = 'block';
                    
                    // Posisikan modal di tengah area konten
                    positionModal('editEventModal');
                })
                .catch(err => {
                    console.error('Error loading event for edit:', err);
                    Swal.fire("Error", "Gagal memuat data event untuk edit", "error");
                });
        }

        function closeEditModal() {
            const modal = getElementSafe('editEventModal');
            if (modal) modal.style.display = 'none';
            resetEditForm();
        }

        // Close modals when clicking outside
        window.onclick = function(event) {
            const viewModal = getElementSafe('viewEventModal');
            const createModal = getElementSafe('createEventModal');
            const editModal = getElementSafe('editEventModal');
            
            if (event.target === viewModal) {
                closeViewModal();
            }
            if (event.target === createModal) {
                closeCreateModal();
            }
            if (event.target === editModal) {
                closeEditModal();
            }
        }

        // Image Preview for Create Form
        function previewImage(input, previewId) {
            const preview = getElementSafe(previewId);
            if (!preview) return;
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.style.display = 'none';
            }
        }

        // Gallery Preview for Create Form
        function previewGallery(input) {
            const previewContainer = getElementSafe('galleryPreview');
            if (!previewContainer) return;
            
            previewContainer.innerHTML = '';

            if (input.files) {
                galleryFiles = Array.from(input.files);

                galleryFiles.forEach((file, index) => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const galleryItem = document.createElement('div');
                        galleryItem.className = 'gallery-preview-item';
                        galleryItem.innerHTML = `
                            <img src="${e.target.result}" alt="Preview">
                            <button type="button" class="remove-gallery-item" onclick="removeGalleryImage(${index})">
                                <i class='bx bx-x'></i>
                            </button>
                        `;
                        previewContainer.appendChild(galleryItem);
                    }
                    reader.readAsDataURL(file);
                });
            }
        }

        function removeGalleryImage(index) {
            galleryFiles.splice(index, 1);

            // Update file input
            const dt = new DataTransfer();
            galleryFiles.forEach(file => dt.items.add(file));
            const galleryInput = getElementSafe('gallery');
            if (galleryInput) galleryInput.files = dt.files;

            // Refresh preview
            previewGallery(galleryInput);
        }

        // Schedule Management for Create Form
        function addScheduleItem() {
            scheduleCount++;
            const container = getElementSafe('scheduleContainer');
            if (!container) return;
            
            const scheduleItem = document.createElement('div');
            scheduleItem.className = 'schedule-item-create';
            scheduleItem.innerHTML = `
                <div class="form-group">
                    <label>Waktu</label>
                    <input type="time" name="schedule[${scheduleCount}][time]" required>
                </div>
                <div class="form-group">
                    <label>Aktivitas</label>
                    <input type="text" name="schedule[${scheduleCount}][activity]" required placeholder="Deskripsi aktivitas">
                </div>
                <button type="button" class="remove-schedule" onclick="this.parentElement.remove()">
                    <i class='bx bx-trash'></i> Hapus
                </button>
            `;
            container.appendChild(scheduleItem);
        }

        // Reset Create Form
        function resetCreateForm() {
            const form = getElementSafe('createEventForm');
            if (form) form.reset();
            
            const scheduleContainer = getElementSafe('scheduleContainer');
            if (scheduleContainer) scheduleContainer.innerHTML = '';
            
            const galleryPreview = getElementSafe('galleryPreview');
            if (galleryPreview) galleryPreview.innerHTML = '';
            
            const imagePreview = getElementSafe('imagePreview');
            if (imagePreview) imagePreview.style.display = 'none';
            
            scheduleCount = 0;
            galleryFiles = [];
        }

        // Schedule Management for Edit Form
        function loadEditSchedule(scheduleData) {
            const container = getElementSafe('edit_scheduleContainer');
            if (!container) return;
            
            container.innerHTML = '';
            editScheduleCount = 0;

            if (scheduleData && Object.keys(scheduleData).length > 0) {
                Object.values(scheduleData).forEach(item => {
                    addEditScheduleItem(item.time, item.activity);
                });
            } else {
                addEditScheduleItem(); // Add one empty item by default
            }
        }

        function addEditScheduleItem(time = '', activity = '') {
            editScheduleCount++;
            const container = getElementSafe('edit_scheduleContainer');
            if (!container) return;
            
            const scheduleItem = document.createElement('div');
            scheduleItem.className = 'schedule-item-create';
            scheduleItem.innerHTML = `
                <div class="form-group">
                    <label>Waktu</label>
                    <input type="time" name="schedule[${editScheduleCount}][time]" value="${time}" required>
                </div>
                <div class="form-group">
                    <label>Aktivitas</label>
                    <input type="text" name="schedule[${editScheduleCount}][activity]" value="${activity}" required placeholder="Deskripsi aktivitas">
                </div>
                <button type="button" class="remove-schedule" onclick="this.parentElement.remove()">
                    <i class='bx bx-trash'></i> Hapus
                </button>
            `;
            container.appendChild(scheduleItem);
        }

        // Gallery Management for Edit Form
        function loadEditGallery(galleryData) {
            const previewContainer = getElementSafe('edit_galleryPreview');
            if (!previewContainer) return;
            
            previewContainer.innerHTML = '';

            if (galleryData && galleryData.length > 0) {
                galleryData.forEach((imgPath, index) => {
                    const galleryItem = document.createElement('div');
                    galleryItem.className = 'gallery-preview-item';
                    galleryItem.innerHTML = `
                        <img src="/storage/${imgPath}" alt="Existing Gallery Image">
                        <button type="button" class="remove-gallery-item" onclick="removeExistingGalleryImage(${index})">
                            <i class='bx bx-x'></i>
                        </button>
                    `;
                    previewContainer.appendChild(galleryItem);
                });
            }
        }

        function previewEditGallery(input) {
            const previewContainer = getElementSafe('edit_galleryPreview');
            if (!previewContainer) return;
            
            if (input.files) {
                const newFiles = Array.from(input.files);
                editGalleryFiles = [...editGalleryFiles, ...newFiles];

                newFiles.forEach((file, index) => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const galleryItem = document.createElement('div');
                        galleryItem.className = 'gallery-preview-item';
                        galleryItem.innerHTML = `
                            <img src="${e.target.result}" alt="New Gallery Image">
                            <button type="button" class="remove-gallery-item" onclick="removeNewGalleryImage(${editGalleryFiles.length - newFiles.length + index})">
                                <i class='bx bx-x'></i>
                            </button>
                        `;
                        previewContainer.appendChild(galleryItem);
                    }
                    reader.readAsDataURL(file);
                });
            }
        }

        function removeExistingGalleryImage(index) {
            // For existing images, we'll need to handle this on the server side
            // For now, just remove from preview
            const previewContainer = getElementSafe('edit_galleryPreview');
            if (previewContainer) {
                const items = previewContainer.getElementsByClassName('gallery-preview-item');
                if (items[index]) {
                    items[index].remove();
                }
            }
            // Note: You might want to add hidden input fields to track deleted images
        }

        function removeNewGalleryImage(index) {
            editGalleryFiles.splice(index, 1);
            
            // Update file input
            const dt = new DataTransfer();
            editGalleryFiles.forEach(file => dt.items.add(file));
            const galleryInput = getElementSafe('edit_gallery');
            if (galleryInput) galleryInput.files = dt.files;
            
            // Refresh preview
            const previewContainer = getElementSafe('edit_galleryPreview');
            if (previewContainer) {
                previewContainer.innerHTML = '';
                loadEditGallery([]); // Clear and reload
                previewEditGallery(galleryInput);
            }
        }

        // Reset Edit Form
        function resetEditForm() {
            const form = getElementSafe('editEventForm');
            if (form) {
                form.reset();
                form.action = '';
            }
            
            const scheduleContainer = getElementSafe('edit_scheduleContainer');
            if (scheduleContainer) scheduleContainer.innerHTML = '';
            
            const galleryPreview = getElementSafe('edit_galleryPreview');
            if (galleryPreview) galleryPreview.innerHTML = '';
            
            const imagePreview = getElementSafe('edit_imagePreview');
            if (imagePreview) imagePreview.style.display = 'none';
            
            editScheduleCount = 0;
            editGalleryFiles = [];
        }

        // Helper function to check if value is empty
        function isEmpty(value) {
            return value === null || value === undefined || value === '' || 
                   (Array.isArray(value) && value.length === 0) ||
                   (typeof value === 'object' && Object.keys(value).length === 0);
        }

        // Helper function to format value or show empty state
        function formatValue(value, defaultValue = 'Tidak ada data') {
            return isEmpty(value) ? `<span class="empty">${defaultValue}</span>` : value;
        }

        // View Event Function
        function viewEvent(eventId) {
            fetch(`/admin/event/${eventId}`)
                .then(res => {
                    if (!res.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return res.json();
                })
                .then(data => {
                    const detail = data.detail || {};

                    // Parse schedule and gallery
                    const scheduleArr = detail.schedule ? Object.values(detail.schedule) : [];
                    const galleryArr = Array.isArray(detail.gallery) ? detail.gallery : [];

                    // Schedule HTML - Always show this section even if empty
                    const scheduleHtml = scheduleArr.length
                        ? scheduleArr.map(item => `
                            <div class="schedule-item">
                                <div class="schedule-time">${formatValue(item.time, 'Tidak ada waktu')}</div>
                                <div class="schedule-activity">${formatValue(item.activity, 'Tidak ada aktivitas')}</div>
                            </div>
                        `).join('')
                        : `
                            <div class="empty-state">
                                <i class='bx bx-calendar-x'></i>
                                <p>Tidak ada jadwal yang tersedia</p>
                            </div>
                        `;

                    // Gallery HTML - Always show this section even if empty
                    const galleryHtml = galleryArr.length
                        ? galleryArr.map(img => `
                            <img src="/storage/${img}" class="gallery-img" alt="Gallery Image">
                        `).join('')
                        : `
                            <div class="empty-state">
                                <i class='bx bx-image-alt'></i>
                                <p>Tidak ada gambar dalam galeri</p>
                            </div>
                        `;

                    // Main Image HTML - Always show this section even if empty
                    const mainImageHtml = data.image
                        ? `<img src="/storage/${data.image}" class="main-image" alt="${data.title}">`
                        : `
                            <div class="empty-state">
                                <i class='bx bx-image'></i>
                                <p>Tidak ada gambar utama</p>
                            </div>
                        `;

                    // Build the HTML for event details
                    const html = `
                        <div class="detail-section">
                            <div class="section-header">
                                <i class='bx bx-info-circle'></i>
                                <span>Informasi Utama</span>
                            </div>
                            <div class="section-content">
                                <div class="info-grid">
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class='bx bx-rename'></i>
                                        </div>
                                        <div class="info-content">
                                            <div class="info-label">Judul Event</div>
                                            <div class="info-value">${formatValue(data.title, 'Tidak ada judul')}</div>
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class='bx bx-link-alt'></i>
                                        </div>
                                        <div class="info-content">
                                            <div class="info-label">Slug</div>
                                            <div class="info-value">${formatValue(data.slug, 'Tidak ada slug')}</div>
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class='bx bx-calendar'></i>
                                        </div>
                                        <div class="info-content">
                                            <div class="info-label">Tanggal</div>
                                            <div class="info-value">${data.date ? new Date(data.date).toLocaleDateString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' }) : '<span class="empty">Tidak ada tanggal</span>'}</div>
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class='bx bx-time'></i>
                                        </div>
                                        <div class="info-content">
                                            <div class="info-label">Waktu</div>
                                            <div class="info-value">${formatValue(data.time, 'Tidak ada waktu')}</div>
                                        </div>
                                    </div>
                                    <div class="info-item">
                                        <div class="info-icon">
                                            <i class='bx bx-map'></i>
                                        </div>
                                        <div class="info-content">
                                            <div class="info-label">Lokasi</div>
                                            <div class="info-value">${formatValue(data.location, 'Tidak ada lokasi')}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="detail-section">
                            <div class="section-header">
                                <i class='bx bx-file'></i>
                                <span>Deskripsi Event</span>
                            </div>
                            <div class="section-content">
                                <div class="description-box">
                                    ${formatValue(data.description, 'Tidak ada deskripsi')}
                                </div>
                            </div>
                        </div>

                        <div class="detail-section">
                            <div class="section-header">
                                <i class='bx bx-images'></i>
                                <span>Galeri Event</span>
                            </div>
                            <div class="section-content">
                                <div class="image-section">
                                    <div class="main-image-container">
                                        <h4>Gambar Utama</h4>
                                        ${mainImageHtml}
                                    </div>
                                    <div class="gallery-container">
                                        <h4>Galeri Foto</h4>
                                        <div class="gallery-grid">
                                            ${galleryHtml}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="detail-section">
                            <div class="section-header">
                                <i class='bx bx-time-five'></i>
                                <span>Jadwal Acara</span>
                            </div>
                            <div class="section-content">
                                <div class="schedule-list">
                                    ${scheduleHtml}
                                </div>
                            </div>
                        </div>
                    `;

                    const eventDetails = getElementSafe('eventDetails');
                    if (eventDetails) {
                        eventDetails.innerHTML = html;
                    }
                    
                    const viewModal = getElementSafe('viewEventModal');
                    if (viewModal) {
                        viewModal.style.display = 'block';
                        // Posisikan modal di tengah area konten
                        positionModal('viewEventModal');
                    }
                })
                .catch(err => {
                    console.error('Error loading event details:', err);
                    Swal.fire("Error", "Gagal memuat detail event", "error");
                });
        }
    </script>
</body>
</html>