<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'PWL - POS Toko Bangunan') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Font: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- CoreUI & Bootstrap 5 -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('css')
</head>

<body>
    <!-- Sidebar -->
    @include('layouts.sidebar')

    <!-- Main Wrapper -->
    <div class="wrapper d-flex flex-column min-vh-100">
        <!-- Header -->
        @include('layouts.header')

        <!-- Main Content -->
        <div class="body flex-grow-1 px-3 py-3">
            <div class="container-fluid">
                <!-- Breadcrumb -->
                @include('layouts.breadcrumb')

                <!-- Content -->
                @yield('content')
            </div>
        </div>

        <!-- Footer -->
        @include('layouts.footer')
    </div>
</div>

<!-- Change Avatar Modal -->
<div class="modal fade" id="changeAvatarModal" tabindex="-1" aria-labelledby="changeAvatarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changeAvatarModalLabel">Ganti Foto Profil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="avatarForm" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <div class="row">
                            <div class="col-6 text-center">
                                <p class="text-muted mb-2">Foto Saat Ini</p>
                                @if (auth()->user()->photo)
                                    <img src="{{ asset('storage/profile/' . auth()->user()->photo) }}"
                                        class="rounded-circle" alt="Current Avatar" width="120" height="120">
                                @else
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->nama) }}&size=120&background=3498db&color=fff"
                                        class="rounded-circle" alt="Current Avatar" width="120" height="120">
                                @endif
                            </div>
                            <div class="col-6 text-center">
                                <p class="text-muted mb-2">Foto Baru</p>
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->nama) }}&size=120&background=95a5a6&color=fff" class="rounded-circle"
                                    alt="New Avatar" id="avatarPreview" width="120" height="120">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="file" class="form-control" id="avatarInput" name="photo" accept="image/*">
                        <small class="text-muted">Format: JPG, JPEG, PNG. Maksimum 2MB.</small>
                    </div>
                    <div class="alert alert-danger d-none" id="avatarError"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="saveAvatar">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

<!-- jQuery Validation -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>

<!-- Setup AJAX CSRF Token -->
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Logout handler for both buttons with confirmation
    $(document).on('click', '#logout-btn, #logout-btn-header', function(e) {
        e.preventDefault();
        
        Swal.fire({
            title: 'Konfirmasi Logout',
            text: 'Apakah Anda yakin ingin keluar dari aplikasi?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: '<i class="fas fa-sign-out-alt"></i> Ya, Logout',
            cancelButtonText: '<i class="fas fa-times"></i> Batal',
            reverseButtons: true,
            focusCancel: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Show loading
                Swal.fire({
                    title: 'Logging out...',
                    text: 'Mohon tunggu sebentar',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
                
                // Submit logout form
                $('#logout-form').submit();
            }
        });
    });

    // Avatar preview
    $('#avatarInput').on('change', function() {
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#avatarPreview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });

    // Avatar form submit
    $('#avatarForm').on('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        $('#avatarError').addClass('d-none');

        $.ajax({
            url: "{{ url('/profile/update-avatar') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('#saveAvatar').html('<i class="fas fa-spinner fa-spin"></i> Menyimpan...').prop('disabled', true);
            },
            success: function(response) {
                $('.avatar-img').attr('src', response.photo_url);
                if (typeof Swal !== 'undefined') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: response.message,
                        timer: 2000,
                        showConfirmButton: false
                    });
                }
                var modalEl = document.getElementById('changeAvatarModal');
                var modal = bootstrap.Modal.getInstance(modalEl);
                if (modal) modal.hide();
            },
            error: function(xhr) {
                if (xhr.status === 422 && xhr.responseJSON.errors && xhr.responseJSON.errors.photo) {
                    $('#avatarError').removeClass('d-none').html(xhr.responseJSON.errors.photo[0]);
                } else {
                    $('#avatarError').removeClass('d-none').html('Terjadi kesalahan. Silakan coba lagi.');
                }
            },
            complete: function() {
                $('#saveAvatar').html('Simpan').prop('disabled', false);
            }
        });
    });
</script>

@stack('js')

</body>
</html>
