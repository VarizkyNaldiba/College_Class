<!-- Tambahkan meta CSRF di bagian <head> -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Modal Form Tambah Level -->
    <div id="modal-master" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="form-tambah" action="{{ route('level.store_ajax') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Level</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>ID Level</label>
                            <input type="text" name="level_id" id="level_id" class="form-control" required>
                            <small id="error-level_id" class="error-text form-text text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label>Nama Level</label>
                            <input type="text" name="level_nama" id="level_nama" class="form-control" required>
                            <small id="error-level_nama" class="error-text form-text text-danger"></small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Script jQuery & AJAX -->
    <script>
        $(document).ready(function () {
            $('#form-tambah').on('submit', function (e) {
                e.preventDefault(); // Mencegah reload halaman
    
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json',
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    beforeSend: function () {
                        $('.error-text').text('');
                    },
                    success: function (response) {
                        if (response.status) {
                            $('#modal-master').modal('hide');
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: response.message
                            });
                            $('#table_level').DataTable().ajax.reload(null, false);
                        } else {
                            $.each(response.errors, function (key, value) {
                                $('#error-' + key).text(value);
                            });
                            Swal.fire({
                                icon: 'error',
                                title: 'Terjadi Kesalahan!',
                                text: 'Silakan periksa kembali inputan Anda.'
                            });
                        }
                    },
                    error: function () {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Terjadi kesalahan pada server.'
                        });
                    }
                });
            });
        });
    </script>
    