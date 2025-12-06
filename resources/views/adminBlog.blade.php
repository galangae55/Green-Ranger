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
                --success: #27ae60;
                --warning: #e67e22;
                --danger: #e74c3c;
                --info: #17a2b8;
            }

            /* Base Styles */
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: var(--poppins);
            }

            body {
                background: var(--light-bg);
            }

            /* SIDEBAR STYLES - UBAH FONT KE LATO */
            #sidebar {
                font-family: var(--lato) !important;
            }
            
            #sidebar .brand,
            #sidebar .side-menu,
            #sidebar .side-menu li,
            #sidebar .side-menu a,
            #sidebar .logout {
                font-family: var(--lato) !important;
            }
            
            #sidebar .brand .text {
                font-family: var(--lato) !important;
                font-weight: 700;
            }
            
            #sidebar .side-menu a {
                font-family: var(--lato) !important;
                font-weight: 400;
            }

            /* Head Title Section */
            .head-title {
                padding: 20px;
            }

            .head-title .left h1 {
                font-size: 36px;
                font-weight: 700;
                color: var(--text-dark);
                margin-bottom: 10px;
            }

            .breadcrumb {
                display: flex;
                list-style: none;
                padding: 0;
                color: var(--text-light);
            }

            .breadcrumb li {
                margin-right: 10px;
            }

            .breadcrumb li:not(:last-child)::after {
                content: '>';
                margin-left: 25px;
            }

            .breadcrumb li:last-child a {
                color: var(--primary);
            }

            .breadcrumb a {
                color: var(--text-light);
                text-decoration: none;
            }

            /* Table Data Section */
            .table-data {
                padding: 0 20px 20px;
            }

            .order {
                background: #fff;
                border-radius: 10px;
                padding: 24px;
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            }

            .order .head {
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin-bottom: 24px;
            }

            .order .head h3 {
                font-size: 24px;
                font-weight: 600;
                color: var(--text-dark);
                margin: 0;
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
                border-color: var(--primary);
                box-shadow: 0 0 0 2px rgba(58, 95, 76, 0.1);
            }

            /* Table Styles */
            table {
                width: 100%;
                border-collapse: collapse;
                background: #fff;
            }

            table thead {
                background-color: #f8f9fa;
            }

            table th {
                padding: 12px 15px;
                text-align: left;
                font-weight: 600;
                color: var(--text-dark);
                border-bottom: 2px solid #e9ecef;
                font-family: var(--poppins);
            }

            table td {
                padding: 12px 15px;
                border-bottom: 1px solid #e9ecef;
                font-family: var(--poppins);
            }

            table tr:hover {
                background-color: #f8f9fa;
            }

            /* Status Badge */
            .status {
                font-size: 12px;
                padding: 6px 16px;
                color: white;
                border-radius: 20px;
                font-weight: 600;
                display: inline-block;
            }

            .status.published {
                background: var(--success);
            }

            .status.draft {
                background: var(--warning);
            }

            /* Blog Image in Table */
            .blog-image {
                width: 40px;
                height: 40px;
                border-radius: 6px;
                object-fit: cover;
                margin-right: 12px;
            }

            .blog-title {
                display: flex;
                align-items: center;
            }

            /* Action Buttons */
            .action-buttons {
                display: flex;
                gap: 8px;
            }

            .btn {
                padding: 8px 16px;
                border: none;
                border-radius: 6px;
                cursor: pointer;
                font-size: 12px;
                font-weight: 600;
                transition: all 0.3s ease;
                display: flex;
                align-items: center;
                gap: 4px;
                font-family: var(--poppins);
                text-decoration: none;
            }

            .btn-primary {
                background-color: var(--primary);
                color: white;
            }

            .btn-primary:hover {
                background-color: var(--primary-dark);
            }

            .btn-warning {
                background-color: var(--warning);
                color: white;
            }

            .btn-warning:hover {
                background-color: #d35400;
            }

            .btn-danger {
                background-color: var(--danger);
                color: white;
            }

            .btn-danger:hover {
                background-color: #c0392b;
            }

            .btn-success {
                background-color: var(--success);
                color: white;
            }

            .btn-success:hover {
                background-color: #219653;
            }

            .btn-add {
                padding: 8px 16px;
                font-size: 12px;
                background-color: #3a5f4c;
                color: white;
                border-radius: 20px;
                font-weight: 700;
            }

            .btn-add:hover {
                background-color: #324a3c;
            }

            button i {
                margin-right: 5px;
            }

            /* Head Title Layout */
            .head-title {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            /* Tabs */
            .tabs {
                display: flex;
                margin: 20px;
                background: #fff;
                border-radius: 10px;
                padding: 8px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            }

            .tab {
                margin-right: 25px;
                padding: 12px 24px;
                cursor: pointer;
                border: none;
                background: none;
                font-size: 14px;
                font-weight: 600;
                color: var(--text-light);
                border-radius: 6px;
                transition: all 0.3s ease;
                font-family: var(--poppins);
            }

            .tab.active {
                background: var(--primary);
                color: white;
            }

            .tab-content {
                display: none;
            }

            .tab-content.active {
                display: block;
            }

            /* Modal Styles */
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

            .modal-content {
                width: 900px;
                padding: 0;
                border-radius: 16px;
                overflow: hidden;
                box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
                background: white;
                position: fixed;
                top: 50%;
                left: calc(50% + 130px);
                transform: translate(-50%, -50%);
                margin: 0;
                font-family: var(--poppins) !important;
                overflow-y: auto;
                max-height: 90vh;
            }

            @media (max-width: 1200px) {
                .modal-content {
                    left: calc(50% + 30px);
                }
            }

            @media (max-width: 768px) {
                .modal-content {
                    left: 50%;
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

            /* Schedule Section */
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
                background: var(--danger);
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
                background: var(--danger);
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

            /* Detail Sections for View Modal */
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

            .description-box {
                background: var(--light-bg);
                padding: 20px;
                border-radius: 10px;
                line-height: 1.6;
                color: var(--text-dark);
                border-left: 4px solid var(--gold);
                font-family: var(--poppins) !important;
            }

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

            .text-muted {
                color: #6c757d !important;
                font-size: 12px;
                margin-top: 5px;
                display: block;
            }

            /* Style untuk tombol dari kode kedua */
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

            .delete-button:hover {
                cursor: pointer;
                background-color: #a00d0d;
                color: #fff;
                transform: scale(1.05);
                transition: all 0.3s ease;
            }

            /* Responsive */
            @media (max-width: 768px) {
                .form-row {
                    flex-direction: column;
                }
                
                .schedule-item-create {
                    flex-direction: column;
                    align-items: stretch;
                }
                
                .order .head {
                    flex-direction: column;
                    gap: 15px;
                    align-items: flex-start;
                }
                
                .search-input {
                    width: 100%;
                }
                
                .tabs {
                    flex-wrap: wrap;
                }
                
                .tab {
                    flex: 1;
                    min-width: 120px;
                    text-align: center;
                }
            }
        </style>

        <title>Admin Blog Management</title>
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

        <!-- SIDEBAR - MENGGUNAKAN FONT LATO -->
        <section id="sidebar">
            <a href="/admin" class="brand">
                <i class='bx bxs-smile'></i>
                <span class="text">{{ Auth::user()->name ?? 'AdminHub' }}</span>
            </a>
            <ul class="side-menu top">
                <li><a href="/admin"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
                <li><a href="{{ route('admin.event') }}"><i class='bx bxs-calendar-event'></i>Event</a></li>
                <li><a href="/admin/volunteer"><i class='bx bxs-group'></i>Volunteer</a></li>
                <li><a href="/admin/donation"><i class='bx bxs-wallet'></i>Donation</a></li>
                <li><a href="/admin/kontak"><i class='bx bxs-message-dots'></i>Kontak</a></li>
                <li><a href="/admin/belanja"><i class='bx bxs-cart'></i>Belanja</a></li>
                <li><a href="/admin/produk"><i class='bx bxs-package' ></i><span class="text">Produk</span></a></li>
                <li class="active"><a href="/admin/blog-management"><i class='bx bxs-news'></i>Blog Management</a></li>
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

            <main style="height: 100vh; background-color: #eeeeee; padding: 7px 15px;">
                <div class="head-title">
                    <div class="left">
                        <h1>Blog Management</h1>
                        <ul class="breadcrumb">
                            <li><a href="/admin">Dashboard</a></li>
                            <li><a class="active" href="/admin/blog-management">Blog Management</a></li>
                        </ul>
                    </div>
                    <button class="btn btn-add" onclick="openModal('blog')">
                        <i class='bx bxs-plus-circle'></i>Add New Blog
                    </button>
                </div>

                <!-- Tabs -->
                <div class="tabs">
                    <button class="tab active" onclick="openTab('blogs')">Blogs</button>
                    <button class="tab" onclick="openTab('categories')">Categories</button>
                    <button class="tab" onclick="openTab('tags')">Tags</button>
                    <button class="tab" onclick="openTab('comments')">Comments</button>
                </div>

                <!-- Blogs Tab -->
                <div id="blogs" class="tab-content active">
                    <div class="table-data">
                        <div class="order">
                            <div class="head">
                                <h3>All Blogs</h3>
                                <div class="search-box">
                                    <input type="text" id="search-input" class="search-input" placeholder="Type here to search...">
                                </div>
                            </div>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Comments</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($blogs as $blog)
                                    <tr>
                                        <td>
                                            <div class="blog-title">
                                                <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="blog-image">
                                                <span>{{ Str::limit($blog->title, 30) }}</span>
                                            </div>
                                        </td>
                                        <td>{{ $blog->category->name ?? 'No Category' }}</td>
                                        <td>
                                            <span class="status {{ $blog->is_published ? 'published' : 'draft' }}">
                                                {{ $blog->is_published ? 'Published' : 'Draft' }}
                                            </span>
                                        </td>
                                        <td>{{ $blog->comments->count() }}</td>
                                        <td>
                                            <div class="action-buttons">
                                                <button class="btn btn-warning" onclick="editBlog({{ $blog->id }})">
                                                    <i class='bx bxs-edit'></i>Edit
                                                </button>
                                                <button class="btn btn-danger" onclick="deleteItem('blog', {{ $blog->id }})">
                                                    <i class='bx bxs-trash'></i>Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Categories Tab -->
                <div id="categories" class="tab-content">
                    <div class="table-data">
                        <div class="order">
                            <div class="head">
                                <h3>Categories</h3>
                                <button class="btn btn-add" onclick="openModal('category')">
                                    <i class='bx bxs-plus-circle'></i>Add Category
                                </button>
                            </div>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Blog Count</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->blogs_count }}</td>
                                        <td>
                                            <div class="action-buttons">
                                                <button class="btn btn-warning" onclick="editCategory({{ $category->id }})">
                                                    <i class='bx bxs-edit'></i>Edit
                                                </button>
                                                <button class="btn btn-danger" onclick="deleteItem('category', {{ $category->id }})">
                                                    <i class='bx bxs-trash'></i>Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Tags Tab -->
                <div id="tags" class="tab-content">
                    <div class="table-data">
                        <div class="order">
                            <div class="head">
                                <h3>Tags</h3>
                                <button class="btn btn-add" onclick="openModal('tag')">
                                    <i class='bx bxs-plus-circle'></i>Add Tag
                                </button>
                            </div>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Blog Count</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tags as $tag)
                                    <tr>
                                        <td>{{ $tag->name }}</td>
                                        <td>{{ $tag->blogs_count }}</td>
                                        <td>
                                            <div class="action-buttons">
                                                <button class="btn btn-warning" onclick="editTag({{ $tag->id }})">
                                                    <i class='bx bxs-edit'></i>Edit
                                                </button>
                                                <button class="btn btn-danger" onclick="deleteItem('tag', {{ $tag->id }})">
                                                    <i class='bx bxs-trash'></i>Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Comments Tab -->
                <div id="comments" class="tab-content">
                    <div class="table-data">
                        <div class="order">
                            <div class="head">
                                <h3>Comments</h3>
                                <div class="search-box">
                                    <input type="text" id="comment-search" class="search-input" placeholder="Type here to search...">
                                </div>
                            </div>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Comment</th>
                                        <th>Blog</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($comments as $comment)
                                    <tr>
                                        <td>{{ $comment->nama }}</td>
                                        <td>{{ Str::limit($comment->komentar, 50) }}</td>
                                        <td>{{ $comment->blog->title }}</td>
                                        <td>{{ $comment->created_at->format('d M Y') }}</td>
                                        <td>
                                            <!-- Di bagian Comments -->
                                            <button class="btn btn-danger" onclick="deleteItem('comment', {{ $comment->id }})">
                                                <i class='bx bxs-trash'></i>Delete
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </section>

        <!-- Blog Modal -->
    <!-- Blog Modal -->
<div id="blogModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2><i class='bx bxs-news'></i> <span id="blogModalTitle">Add New Blog</span></h2>
            <button class="modal-close" onclick="closeModal('blogModal')">&times;</button>
        </div>
        <div class="event-create-body">
            <form id="blogForm" method="POST" enctype="multipart/form-data">
                @csrf
                <div id="blogMethod"></div>
                
                <div class="form-group">
                    <label for="title">Judul *</label>
                    <input type="text" id="title" name="title" required>
                </div>
                
                <div class="form-group">
                    <label for="slug">Slug *</label>
                    <input type="text" id="slug" name="slug" required readonly>
                </div>
                
                <div class="form-group">
                    <label for="excerpt">Ringkasan *</label>
                    <textarea id="excerpt" name="excerpt" rows="3" required></textarea>
                </div>
                
                <div class="form-group">
                    <label for="blog_content">Content *</label>
                    <!-- GANTI id="content" MENJADI id="blog_content" -->
                    <textarea id="blog_content" name="content" rows="6" required placeholder="Full content of the blog"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="image">Gambar</label>
                    <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(this)">
                    <div class="image-preview-container">
                        <img id="imagePreview" class="image-preview" src="" alt="Preview">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="author">Penulis</label>
                    <input type="text" id="author" name="author">
                </div>
                
                <div class="form-group">
                    <label for="category_id">Kategori *</label>
                    <select id="category_id" name="category_id" required>
                        <option value="">Pilih Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="tags">Tag</label>
                    <select id="tags" name="tags[]" multiple style="height: 120px;">
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label>
                        <input type="checkbox" id="is_published" name="is_published" value="1" checked>
                        Publikasikan
                    </label>
                </div>
                
                <div class="form-actions">
                    <button type="button" class="btn btn-secondary" onclick="closeModal('blogModal')">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

        <!-- Category Modal -->
<div id="categoryModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2><i class='bx bxs-category'></i> <span id="categoryModalTitle">Add New Category</span></h2>
            <button class="modal-close" onclick="closeModal('categoryModal')">&times;</button>
        </div>
        <div class="event-create-body">
            <form id="categoryForm" action="{{ route('admin.blog-management.categories.store') }}" method="POST">
                @csrf
                <div id="categoryMethod"></div>
                
                <div class="form-group">
                    <label for="category_name">Name *</label>
                    <!-- Pastikan ID ini sama dengan yang di JavaScript -->
                    <input type="text" id="category_name" name="name" required>
                </div>
                
                <div class="form-group">
                    <label for="description">Description</label>
                    <!-- Pastikan ID ini sama dengan yang di JavaScript -->
                    <textarea id="description" name="description" rows="3"></textarea>
                </div>
                
                <div class="form-actions">
                    <button type="button" class="btn btn-secondary" onclick="closeModal('categoryModal')">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Category</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Tag Modal -->
<div id="tagModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2><i class='bx bxs-purchase-tag'></i> <span id="tagModalTitle">Add New Tag</span></h2>
            <button class="modal-close" onclick="closeModal('tagModal')">&times;</button>
        </div>
        <div class="event-create-body">
            <form id="tagForm" action="{{ route('admin.blog-management.tags.store') }}" method="POST">
                @csrf
                <div id="tagMethod"></div>
                
                <div class="form-group">
                    <label for="tag_name">Name *</label>
                    <!-- Pastikan ID ini sama dengan yang di JavaScript -->
                    <input type="text" id="tag_name" name="name" required>
                </div>
                
                <div class="form-actions">
                    <button type="button" class="btn btn-secondary" onclick="closeModal('tagModal')">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Tag</button>
                </div>
            </form>
        </div>
    </div>
</div>

        <script>
// ============================================
// SEARCH FUNCTIONALITY
// ============================================

document.getElementById('search-input')?.addEventListener('input', function() {
    const searchValue = this.value.toLowerCase();
    const rows = document.querySelectorAll('#blogs tbody tr');
    
    rows.forEach(row => {
        const title = row.querySelector('.blog-title span').textContent.toLowerCase();
        const category = row.cells[1].textContent.toLowerCase();
        const status = row.cells[2].textContent.toLowerCase();
        
        if (title.includes(searchValue) || category.includes(searchValue) || status.includes(searchValue)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});

document.getElementById('comment-search')?.addEventListener('input', function() {
    const searchValue = this.value.toLowerCase();
    const rows = document.querySelectorAll('#comments tbody tr');
    
    rows.forEach(row => {
        const name = row.cells[0].textContent.toLowerCase();
        const comment = row.cells[1].textContent.toLowerCase();
        const blog = row.cells[2].textContent.toLowerCase();
        
        if (name.includes(searchValue) || comment.includes(searchValue) || blog.includes(searchValue)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});

// ============================================
// TAB FUNCTIONALITY
// ============================================

function openTab(tabName) {
    const tabs = document.getElementsByClassName('tab-content');
    for (let i = 0; i < tabs.length; i++) {
        tabs[i].classList.remove('active');
    }
    document.getElementById(tabName).classList.add('active');
    
    const tabButtons = document.getElementsByClassName('tab');
    for (let i = 0; i < tabButtons.length; i++) {
        tabButtons[i].classList.remove('active');
    }
    event.currentTarget.classList.add('active');
}

// ============================================
// MODAL FUNCTIONALITY
// ============================================

function openModal(type) {
    if (type === 'blog') {
        document.getElementById('blogModal').style.display = 'block';
        document.getElementById('blogModalTitle').textContent = 'Add New Blog';
        document.getElementById('blogForm').action = "{{ route('admin.blog-management.blogs.store') }}";
        document.getElementById('blogMethod').innerHTML = '';
        document.getElementById('blogForm').reset();
        
        // Reset preview image
        const imagePreview = document.getElementById('imagePreview');
        if (imagePreview) {
            imagePreview.style.display = 'none';
            imagePreview.src = '';
        }
        
        // Reset tags
        const tagSelect = document.getElementById('tags');
        if (tagSelect) {
            for (let i = 0; i < tagSelect.options.length; i++) {
                tagSelect.options[i].selected = false;
            }
        }
        
        // Reset checkbox
        document.getElementById('is_published').checked = true;
        
        // === PERUBAHAN: Reset content yang baru ===
        const contentInput = document.getElementById('blog_content'); // GANTI DI SINI
        if (contentInput) contentInput.value = '';
    } 
    else if (type === 'category') {
        document.getElementById('categoryModal').style.display = 'block';
        document.getElementById('categoryModalTitle').textContent = 'Add New Category';
        document.getElementById('categoryForm').action = "{{ route('admin.blog-management.categories.store') }}";
        document.getElementById('categoryMethod').innerHTML = '';
        document.getElementById('categoryForm').reset();
    } else if (type === 'tag') {
        document.getElementById('tagModal').style.display = 'block';
        document.getElementById('tagModalTitle').textContent = 'Add New Tag';
        document.getElementById('tagForm').action = "{{ route('admin.blog-management.tags.store') }}";
        document.getElementById('tagMethod').innerHTML = '';
        document.getElementById('tagForm').reset();
    }
}

function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
}

// ============================================
// EDIT BLOG - UPDATED WITH CONTENT FIX
// ============================================

async function editBlog(blogId) {
    try {
        console.log('=== START editBlog ===');
        console.log('Blog ID:', blogId);
        
        const response = await fetch(`/admin/blog-management/blogs/${blogId}/data`);
        
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        
        const data = await response.json();
        console.log('API Response:', data);
        
        if (!data.success) {
            throw new Error(data.message || 'Failed to load blog data');
        }
        
        const blog = data.data;
        console.log('Blog data received:', blog);
        
        // Buka modal
        document.getElementById('blogModal').style.display = 'block';
        document.getElementById('blogModalTitle').textContent = 'Edit Blog';
        
        // Set form action dan method
        document.getElementById('blogForm').action = `/admin/blog-management/blogs/${blogId}`;
        document.getElementById('blogMethod').innerHTML = `
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        `;
        
        // Isi form dengan data blog - TIDAK BERUBAH KECUALI CONTENT
        document.getElementById('title').value = blog.title || '';
        
        // Slug (jika ada)
        const slugInput = document.getElementById('slug');
        if (slugInput) slugInput.value = blog.slug || '';
        
        document.getElementById('excerpt').value = blog.excerpt || '';
        
        // === PERUBAHAN PENTING: Ganti content selector ===
        const contentInput = document.getElementById('blog_content'); // GANTI DI SINI
        if (contentInput) {
            contentInput.value = blog.content || '';
            console.log('Content set successfully:', contentInput.value.length, 'chars');
        } else {
            console.error('Content textarea not found! ID should be blog_content');
        }
        
        document.getElementById('author').value = blog.author || '';
        document.getElementById('category_id').value = blog.category_id || '';
        document.getElementById('is_published').checked = blog.is_published || false;
        
        // Handle tags (tetap sama)
        const tagSelect = document.getElementById('tags');
        if (tagSelect && tagSelect.options) {
            // Reset semua options
            for (let i = 0; i < tagSelect.options.length; i++) {
                tagSelect.options[i].selected = false;
            }
            
            // Pastikan tags adalah array
            let tagsArray = [];
            if (blog.tags && Array.isArray(blog.tags)) {
                tagsArray = blog.tags;
            }
            
            // Select tags
            if (tagsArray.length > 0) {
                for (let i = 0; i < tagSelect.options.length; i++) {
                    const option = tagSelect.options[i];
                    const tagId = parseInt(option.value);
                    
                    if (!isNaN(tagId) && tagsArray.includes(tagId)) {
                        option.selected = true;
                    }
                }
            }
        }
        
        // Tampilkan preview gambar jika ada
        const imagePreview = document.getElementById('imagePreview');
        if (blog.image_url && imagePreview) {
            imagePreview.src = blog.image_url;
            imagePreview.style.display = 'block';
        } else if (imagePreview) {
            imagePreview.style.display = 'none';
            imagePreview.src = '';
        }
        
        console.log('=== END editBlog - SUCCESS ===');
        
    } catch (error) {
        console.error('=== ERROR in editBlog ===');
        console.error('Error details:', error);
        
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Gagal memuat data blog: ' + (error.message || 'Unknown error'),
            confirmButtonColor: '#3a5f4c',
            confirmButtonText: 'OK'
        });
    }
}

// ============================================
// EDIT CATEGORY
// ============================================

async function editCategory(categoryId) {
    try {
        console.log('=== START editCategory ===');
        console.log('Category ID:', categoryId);
        
        const response = await fetch(`/admin/blog-management/categories/${categoryId}/data`);
        console.log('Response status:', response.status);
        
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        
        const data = await response.json();
        console.log('Category API Response:', data);
        
        if (!data.success) {
            throw new Error(data.message || 'Failed to load category data');
        }
        
        const category = data.data;
        console.log('Category data:', category);
        
        // Buka modal
        document.getElementById('categoryModal').style.display = 'block';
        document.getElementById('categoryModalTitle').textContent = 'Edit Category';
        
        // Set form action dan method
        document.getElementById('categoryForm').action = `/admin/blog-management/categories/${categoryId}`;
        document.getElementById('categoryMethod').innerHTML = `
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        `;
        
        // Isi form dengan data category
        const categoryNameInput = document.getElementById('category_name');
        const descriptionInput = document.getElementById('description');
        
        if (categoryNameInput) {
            categoryNameInput.value = category.name || '';
            console.log('Category name set:', categoryNameInput.value);
        }
        
        if (descriptionInput) {
            descriptionInput.value = category.description || '';
            console.log('Description set:', descriptionInput.value);
        }
        
        console.log('=== END editCategory - SUCCESS ===');
        
    } catch (error) {
        console.error('=== ERROR in editCategory ===');
        console.error('Error details:', error);
        
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Gagal memuat data kategori: ' + (error.message || 'Unknown error'),
            confirmButtonColor: '#3a5f4c',
            confirmButtonText: 'OK'
        });
    }
}

// Edit Tag - DIPERBAIKI
async function editTag(tagId) {
    try {
        console.log('=== START editTag ===');
        console.log('Tag ID:', tagId);
        
        const response = await fetch(`/admin/blog-management/tags/${tagId}/data`);
        console.log('Response status:', response.status);
        
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        
        const data = await response.json();
        console.log('Tag API Response:', data);
        
        if (!data.success) {
            throw new Error(data.message || 'Failed to load tag data');
        }
        
        const tag = data.data;
        console.log('Tag data:', tag);
        
        // Buka modal
        document.getElementById('tagModal').style.display = 'block';
        document.getElementById('tagModalTitle').textContent = 'Edit Tag';
        
        // Set form action dan method
        document.getElementById('tagForm').action = `/admin/blog-management/tags/${tagId}`;
        document.getElementById('tagMethod').innerHTML = `
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        `;
        
        // Isi form dengan data tag
        const tagNameInput = document.getElementById('tag_name');
        
        if (tagNameInput) {
            tagNameInput.value = tag.name || '';
            console.log('Tag name set:', tagNameInput.value);
        }
        
        console.log('=== END editTag - SUCCESS ===');
        
    } catch (error) {
        console.error('=== ERROR in editTag ===');
        console.error('Error details:', error);
        
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Gagal memuat data tag: ' + (error.message || 'Unknown error'),
            confirmButtonColor: '#3a5f4c',
            confirmButtonText: 'OK'
        });
    }
}


// ============================================
// DELETE FUNCTION
// ============================================

// Delete function - Pastikan support untuk category dan tag
function deleteItem(type, id) {
    let url = '';
    let title = '';
    let text = '';
    
    if (type === 'blog') {
        url = `/admin/blog-management/blogs/${id}`;
        title = 'Delete Blog?';
        text = 'Are you sure you want to delete this blog? This action cannot be undone.';
    } else if (type === 'category') {
        url = `/admin/blog-management/categories/${id}`;
        title = 'Delete Category?';
        text = 'Are you sure you want to delete this category? Blogs with this category will lose the category assignment.';
    } else if (type === 'tag') {
        url = `/admin/blog-management/tags/${id}`;
        title = 'Delete Tag?';
        text = 'Are you sure you want to delete this tag? This will remove the tag from all associated blogs.';
    } else if (type === 'comment') {
        url = `/admin/blog-management/comments/${id}`;
        title = 'Delete Comment?';
        text = 'Are you sure you want to delete this comment?';
    }
    
    console.log(`Delete ${type} with ID ${id}:`, url);
    
    Swal.fire({
        title: title,
        text: text,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3a5f4c',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            // Create a form dynamically
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = url;
            form.style.display = 'none';
            
            // Add CSRF token
            const csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = '{{ csrf_token() }}';
            form.appendChild(csrfToken);
            
            // Add method spoofing for DELETE
            const method = document.createElement('input');
            method.type = 'hidden';
            method.name = '_method';
            method.value = 'DELETE';
            form.appendChild(method);
            
            // Append form to body and submit
            document.body.appendChild(form);
            console.log('Submitting delete form:', url);
            form.submit();
        }
    });
}

// ============================================
// UTILITY FUNCTIONS
// ============================================

// Image preview
function previewImage(input, previewId) {
    const preview = document.getElementById(previewId);
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
        preview.src = '';
    }
}

// Auto-generate slug from title
document.getElementById('title')?.addEventListener('input', function() {
    const title = this.value;
    const slug = title.toLowerCase()
        .replace(/[^\w\s-]/g, '')
        .replace(/\s+/g, '-')
        .replace(/--+/g, '-')
        .trim();
    
    const slugInput = document.getElementById('slug');
    if (slugInput) slugInput.value = slug;
});

// Logout
document.getElementById('admin-logout-button')?.addEventListener('click', function(event) {
    event.preventDefault();
    document.getElementById('admin-logout-form')?.submit();
});

// Close modal when clicking outside
window.onclick = function(event) {
    const modals = document.getElementsByClassName('modal');
    for (let i = 0; i < modals.length; i++) {
        if (event.target == modals[i]) {
            modals[i].style.display = 'none';
        }
    }
};

// ============================================
// DEBUGGING TOOLS
// ============================================

// Manual debug function
function debugBlogForm() {
    console.log('=== DEBUG BLOG FORM ===');
    const fields = ['title', 'slug', 'excerpt', 'content', 'author', 'category_id'];
    fields.forEach(field => {
        const el = document.getElementById(field);
        if (el) {
            console.log(`${field}:`, el.value ? el.value.substring(0, 50) + '...' : 'EMPTY');
        } else {
            console.log(`${field}: ELEMENT NOT FOUND`);
        }
    });
    
    // Check if modal is open
    const modal = document.getElementById('blogModal');
    console.log('Modal display:', modal ? modal.style.display : 'NO MODAL');
}

// Add debug command to console
setTimeout(() => {
    console.log('=== BLOG MANAGEMENT DEBUG COMMANDS ===');
    console.log('debugBlogForm() - Check all form fields');
    console.log('editBlog(ID) - Edit specific blog');
    console.log('openModal("blog"/"category"/"tag") - Open modal');
}, 1000);

// Test API endpoint directly
function testBlogApi(blogId) {
    console.log('Testing API for blog ID:', blogId);
    fetch(`/admin/blog-management/blogs/${blogId}/data`)
        .then(r => r.json())
        .then(data => {
            console.log('API Response:', data);
            console.log('Content from API:', data.data?.content?.substring(0, 100));
        })
        .catch(err => console.error('API Error:', err));
}

// Initialize on load
document.addEventListener('DOMContentLoaded', function() {
    console.log('Blog Management initialized');
});
</script>        
</body>
</html>