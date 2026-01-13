<form action="{{ url('/penjualan/' . $penjualan->penjualan_id . '/delete_ajax') }}" method="POST" id="form-delete">
    @csrf
    @method('DELETE')
    <div id="modal-master" class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title">Hapus Transaksi Penjualan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning">
                    <i class="fas fa-exclamation-triangle"></i>
                    <strong>Konfirmasi!</strong> Apakah Anda yakin ingin menghapus data transaksi berikut?
                </div>
                
                @if($penjualan)
                    <table class="table table-sm table-borderless">
                        <tr>
                            <th width="150px">Kode Penjualan</th>
                            <td>: {{ $penjualan->penjualan_kode }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>: {{ date('d-m-Y H:i', strtotime($penjualan->penjualan_tanggal)) }}</td>
                        </tr>
                        <tr>
                            <th>Pembeli</th>
                            <td>: {{ $penjualan->pembeli }}</td>
                        </tr>
                        <tr>
                            <th>User/Kasir</th>
                            <td>: {{ $penjualan->user->username ?? '-' }}</td>
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
                            tablePenjualan.ajax.reload();
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
