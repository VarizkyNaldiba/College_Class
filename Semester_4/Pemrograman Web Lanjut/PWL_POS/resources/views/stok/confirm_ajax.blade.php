<form action="{{ url('/stok/' . $stok->stok_id . '/delete_ajax') }}" method="POST" id="form-delete">
    @csrf
    @method('DELETE')
    <div id="modal-master" class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title">Hapus Data Stok</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle"></i>
                    <strong>Konfirmasi!</strong> Apakah Anda yakin ingin menghapus data stok berikut?
                </div>
                
                @if($stok)
                    <table class="table table-sm table-borderless">
                        <tr>
                            <th width="150px">Barang</th>
                            <td>: {{ $stok->barang->barang_nama ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Supplier</th>
                            <td>: {{ $stok->supplier->supplier_nama ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>: {{ date('d-m-Y H:i', strtotime($stok->stok_tanggal)) }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah</th>
                            <td>: {{ $stok->stok_jumlah }}</td>
                        </tr>
                        <tr>
                            <th>User</th>
                            <td>: {{ $stok->user->username ?? '-' }}</td>
                        </tr>
                    </table>

                    <div class="alert alert-danger">
                        <small><i class="fas fa-info-circle"></i> Data yang dihapus tidak dapat dikembalikan!</small>
                    </div>
                @else
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-triangle"></i> Data tidak ditemukan
                    </div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" data-bs-dismiss="modal" class="btn btn-warning">Batal</button>
                <button type="submit" class="btn btn-danger">Ya, Hapus</button>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
        $("#form-delete").validate({
            submitHandler: function(form) {
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: $(form).serialize(),
                    success: function(response) {
                        if (response.status) {
                            $('#myModal').modal('hide');
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.message
                            });
                            tableStok.ajax.reload();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Terjadi Kesalahan',
                                text: response.message
                            });
                        }
                    }
                });
                return false;
            }
        });
    });
</script>
