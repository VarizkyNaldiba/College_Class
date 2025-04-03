<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
  </div>
  <strong>Copyright &copy; 2014-2021 
      <a href="https://adminlte.io">AdminLTE.io</a>.
  </strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).ready(function () {
    $('#logout-btn').click(function (e) {
        e.preventDefault();

        // Konfirmasi Logout dengan SweetAlert2
        Swal.fire({
            title: "Apakah Anda yakin?",
            text: "Anda akan keluar dari sistem!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, Logout!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ url('/logout') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}" // Kirim CSRF token untuk keamanan
                    },
                    success: function (response) {
                        if (response.status) {
                            Swal.fire({
                                title: "Logout Berhasil",
                                text: response.message,
                                icon: "success",
                                timer: 1500,
                                showConfirmButton: false
                            }).then(() => {
                                window.location.href = response.redirect; // Redirect ke halaman login
                            });
                        }
                    },
                    error: function (xhr) {
                        Swal.fire("Oops!", "Logout gagal, coba lagi!", "error");
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });
});
</script>

