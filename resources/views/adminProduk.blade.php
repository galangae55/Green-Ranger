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
        .btn-primary {
            background-color: #3a5f4c;
            border-color: #3a5f4c;
        }
        
        .btn-primary:hover {
            background-color: #2d4a3a;
            border-color: #2d4a3a;
        }
        
        .table-img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 5px;
        }
        
        .modal-header {
            background-color: #3a5f4c;
            color: white;
        }
        
        .current-image {
            max-width: 200px;
            max-height: 200px;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 5px;
        }
    </style>

	<title>Admin Produk</title>
</head>
<body>
    @if(session('success'))
        <script>
            window.addEventListener('load', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: "{{ session('success') }}",
                    confirmButtonColor: '#3085d6',
                });
            });
        </script>
    @endif

    @if(session('error'))
        <script>
            window.addEventListener('load', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: "{{ session('error') }}",
                    confirmButtonColor: '#d33',
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
            <li>
				<a href="/admin/belanja">
					<i class='bx bxs-cart' ></i>
					<span class="text">Belanja</span>
				</a>
			</li>
            <!-- Menu Produk Baru -->
            <li class="active">
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
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Manajemen Produk Green Ranger</h1>
					<ul class="breadcrumb">
						<li>
							<a href="/admin">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="/admin/produk">Produk</a>
						</li>
					</ul>
				</div>
				<button type="button" class="btn-download" data-toggle="modal" data-target="#tambahProdukModal">
                    <i class='bx bxs-plus-circle' ></i>
					<span class="text">Tambah Produk</span>
				</button>
			</div>

			<div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Daftar Produk</h3>
                        <i class='bx bx-search'></i>
                        <input type="text" id="search-input" placeholder="Cari produk..." onkeyup="searchTable()" style="padding: 5px; width: 25%; font-family: 'Quicksand', sans-serif;">
                    </div>
                    
                    @if($products->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped" style="text-align: center">
                            <thead>
                                <tr>
                                    <th>Gambar</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Harga Diskon</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>
                                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="table-img">
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                    <td>
                                        @if($product->detail && $product->detail->discount_price)
                                            Rp {{ number_format($product->detail->discount_price, 0, ',', '.') }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if($product->detail && $product->detail->description)
                                            {{ Str::limit($product->detail->description, 50) }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-warning" onclick="editProduct({{ $product->id }})">
                                            <i class='bx bxs-edit'></i> Edit
                                        </button>
                                        <form action="{{ route('admin.produk.delete', $product->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus produk ini?')">
                                                <i class='bx bxs-trash'></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="alert alert-info text-center">
                        <i class='bx bxs-info-circle'></i> Belum ada produk. Silakan tambah produk baru.
                    </div>
                    @endif
                </div>
            </div>

            <!-- Modal Tambah Produk -->
            <div class="modal fade" id="tambahProdukModal" tabindex="-1" role="dialog" aria-labelledby="tambahProdukModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tambahProdukModalLabel">Tambah Produk Baru</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Nama Produk *</label>
                                            <input type="text" class="form-control" id="name" name="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Harga Normal *</label>
                                            <input type="number" class="form-control" id="price" name="price" min="0" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="discount_price">Harga Diskon (opsional)</label>
                                            <input type="number" class="form-control" id="discount_price" name="discount_price" min="0">
                                            <small class="form-text text-muted">Kosongkan jika tidak ada diskon</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="image">Gambar Produk *</label>
                                            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                                            <small class="form-text text-muted">Format: JPG, PNG, JPEG. Maksimal 2MB</small>
                                            <div id="imagePreview" class="mt-2" style="display: none;">
                                                <img id="preview" src="#" alt="Preview" style="max-width: 200px; max-height: 200px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description">Deskripsi Produk *</label>
                                    <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan Produk</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal Edit Produk -->
            <div class="modal fade" id="editProdukModal" tabindex="-1" role="dialog" aria-labelledby="editProdukModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editProdukModalLabel">Edit Produk</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="editProdukForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="edit_name">Nama Produk *</label>
                                            <input type="text" class="form-control" id="edit_name" name="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="edit_price">Harga Normal *</label>
                                            <input type="number" class="form-control" id="edit_price" name="price" min="0" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="edit_discount_price">Harga Diskon (opsional)</label>
                                            <input type="number" class="form-control" id="edit_discount_price" name="discount_price" min="0">
                                            <small class="form-text text-muted">Kosongkan jika tidak ada diskon</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="edit_image">Gambar Produk</label>
                                            <input type="file" class="form-control" id="edit_image" name="image" accept="image/*">
                                            <small class="form-text text-muted">Format: JPG, PNG, JPEG. Maksimal 2MB. Kosongkan jika tidak ingin mengubah gambar.</small>
                                            <div id="currentImageContainer" class="mt-2">
                                                <p>Gambar Saat Ini:</p>
                                                <img id="currentImage" src="" alt="Current Image" class="current-image">
                                            </div>
                                            <div id="editImagePreview" class="mt-2" style="display: none;">
                                                <p>Preview Gambar Baru:</p>
                                                <img id="edit_preview" src="#" alt="Preview" style="max-width: 200px; max-height: 200px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="edit_description">Deskripsi Produk *</label>
                                    <textarea class="form-control" id="edit_description" name="description" rows="4" required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Update Produk</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->

    <script>
        document.getElementById('admin-logout-button').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('admin-logout-form').submit();
        });

        function searchTable() {
            let input = document.getElementById("search-input").value.toLowerCase();
            let table = document.querySelector(".table-data table tbody");
            let rows = table.getElementsByTagName("tr");

            for (let i = 0; i < rows.length; i++) {
                let cells = rows[i].getElementsByTagName("td");
                let matchFound = false;

                for (let j = 0; j < cells.length; j++) {
                    let cellValue = cells[j].textContent || cells[j].innerText;
                    if (cellValue.toLowerCase().indexOf(input) > -1) {
                        matchFound = true;
                        break;
                    }
                }

                if (matchFound) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        }

        function editProduct(productId) {
            // Fetch product data via AJAX
            fetch(`/admin/produk/${productId}/edit`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(product => {
                    // Populate form fields
                    document.getElementById('edit_name').value = product.name;
                    document.getElementById('edit_price').value = product.price;
                    document.getElementById('edit_description').value = product.detail ? product.detail.description : '';
                    document.getElementById('edit_discount_price').value = product.detail ? product.detail.discount_price : '';
                    
                    // Show current image
                    const currentImage = document.getElementById('currentImage');
                    currentImage.src = "{{ asset('') }}" + product.image;
                    
                    // Set form action
                    document.getElementById('editProdukForm').action = `/admin/produk/${productId}`;
                    
                    // Show modal
                    $('#editProdukModal').modal('show');
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Gagal memuat data produk.',
                        confirmButtonColor: '#d33',
                    });
                });
        }

        // Preview image for tambah produk
        document.getElementById('image').addEventListener('change', function(e) {
            const preview = document.getElementById('preview');
            const previewContainer = document.getElementById('imagePreview');
            
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    previewContainer.style.display = 'block';
                }
                
                reader.readAsDataURL(this.files[0]);
            }
        });

        // Preview image for edit produk
        document.getElementById('edit_image').addEventListener('change', function(e) {
            const preview = document.getElementById('edit_preview');
            const previewContainer = document.getElementById('editImagePreview');
            
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    previewContainer.style.display = 'block';
                }
                
                reader.readAsDataURL(this.files[0]);
            }
        });

        // Reset modal ketika ditutup
        $('#tambahProdukModal').on('hidden.bs.modal', function () {
            document.getElementById('tambahProdukModal').reset();
            document.getElementById('imagePreview').style.display = 'none';
        });

        $('#editProdukModal').on('hidden.bs.modal', function () {
            document.getElementById('editImagePreview').style.display = 'none';
            document.getElementById('edit_image').value = '';
        });
    </script>

	<script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>