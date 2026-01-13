<form action="{{ url('/penjualan/' . $penjualan->penjualan_id . '/update_ajax') }}" method="POST" id="form-edit">
    @csrf
    @method('PUT')
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title">Edit Transaksi Penjualan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    
                </button>
            </div>
            <div class="modal-body">
                <!-- Info Transaksi -->
                <div class="card mb-3">
                    <div class="card-header bg-light">
                        <h6 class="mb-0"><i class="fas fa-file-invoice"></i> Informasi Transaksi</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kode Penjualan <span class="text-danger">*</span></label>
                                    <input type="text" name="penjualan_kode" id="penjualan_kode" class="form-control" value="{{ $penjualan->penjualan_kode }}" required>
                                    <small id="error-penjualan_kode" class="error-text form-text text-danger"></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tanggal <span class="text-danger">*</span></label>
                                    <input type="datetime-local" name="penjualan_tanggal" id="penjualan_tanggal" class="form-control" value="{{ date('Y-m-d\TH:i', strtotime($penjualan->penjualan_tanggal)) }}" required>
                                    <small id="error-penjualan_tanggal" class="error-text form-text text-danger"></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Pembeli <span class="text-danger">*</span></label>
                                    <input type="text" name="pembeli" id="pembeli" class="form-control" value="{{ $penjualan->pembeli }}" required>
                                    <small id="error-pembeli" class="error-text form-text text-danger"></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>User/Kasir <span class="text-danger">*</span></label>
                                    <select name="user_id" id="user_id" class="form-control" required>
                                        <option value="">- Pilih User -</option>
                                        @foreach($user as $u)
                                            <option value="{{ $u->user_id }}" {{ $u->user_id == $penjualan->user_id ? 'selected' : '' }}>{{ $u->username }}</option>
                                        @endforeach
                                    </select>
                                    <small id="error-user_id" class="error-text form-text text-danger"></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Detail Barang -->
                <div class="card">
                    <div class="card-header bg-light">
                        <h6 class="mb-0"><i class="fas fa-shopping-cart"></i> Detail Barang</h6>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-sm btn-primary mb-3" onclick="addBarangRow()">
                            <i class="fas fa-plus"></i> Tambah Barang
                        </button>
                        
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm" id="table-barang">
                                <thead class="bg-light">
                                    <tr>
                                        <th style="width: 5%;">No</th>
                                        <th style="width: 35%;">Barang</th>
                                        <th style="width: 20%;">Harga</th>
                                        <th style="width: 15%;">Jumlah</th>
                                        <th style="width: 20%;">Subtotal</th>
                                        <th style="width: 5%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="barang-container">
                                    <!-- Existing rows will be loaded -->
                                </tbody>
                                <tfoot class="bg-light">
                                    <tr>
                                        <th colspan="4" class="text-right">TOTAL:</th>
                                        <th colspan="2">
                                            <span id="total-keseluruhan" class="font-weight-bold text-success">Rp 0</span>
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-bs-dismiss="modal" class="btn btn-warning">Batal</button>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>
    </div>
</form>

<script>
    let barangIndex = 0;
    let barangData = @json($barang);
    let existingDetails = @json($penjualan->penjualanDetail);

    $(document).ready(function() {
        // Load existing details
        existingDetails.forEach(detail => {
            addBarangRow(detail);
        });

        if (existingDetails.length === 0) {
            addBarangRow();
        }
    });

    function addBarangRow(detail = null) {
        barangIndex++;
        let selectedBarangId = detail ? detail.barang_id : '';
        let harga = detail ? detail.harga : '';
        let jumlah = detail ? detail.jumlah : 1;
        
        let html = `
            <tr id="row-${barangIndex}">
                <td class="text-center">${barangIndex}</td>
                <td>
                    <select name="barang_id[]" class="form-control form-control-sm barang-select" data-index="${barangIndex}" required>
                        <option value="">- Pilih Barang -</option>
                        ${barangData.map(b => `<option value="${b.barang_id}" data-harga="${b.harga_jual}" ${b.barang_id == selectedBarangId ? 'selected' : ''}>${b.barang_nama} - Rp ${formatRupiah(b.harga_jual)}</option>`).join('')}
                    </select>
                    <small class="error-text text-danger"></small>
                </td>
                <td>
                    <input type="number" name="harga[]" class="form-control form-control-sm harga-input" data-index="${barangIndex}" value="${harga}" readonly required>
                    <small class="error-text text-danger"></small>
                </td>
                <td>
                    <input type="number" name="jumlah[]" class="form-control form-control-sm jumlah-input" data-index="${barangIndex}" min="1" value="${jumlah}" required>
                    <small class="error-text text-danger"></small>
                </td>
                <td>
                    <input type="text" class="form-control form-control-sm subtotal-display" data-index="${barangIndex}" readonly>
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-danger btn-sm" onclick="removeBarangRow(${barangIndex})">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
        `;
        $('#barang-container').append(html);
        
        if (detail) {
            hitungSubtotal(barangIndex);
        }
        
        updateRowNumbers();
    }

    function removeBarangRow(index) {
        if ($('#barang-container tr').length > 1) {
            $(`#row-${index}`).remove();
            updateRowNumbers();
            hitungTotal();
        } else {
            Swal.fire('Peringatan', 'Minimal harus ada 1 barang!', 'warning');
        }
    }

    function updateRowNumbers() {
        $('#barang-container tr').each(function(index) {
            $(this).find('td:first').text(index + 1);
        });
    }

    $(document).on('change', '.barang-select', function() {
        let index = $(this).data('index');
        let harga = $(this).find(':selected').data('harga') || 0;
        $(`.harga-input[data-index="${index}"]`).val(harga);
        hitungSubtotal(index);
    });

    $(document).on('input', '.jumlah-input', function() {
        let index = $(this).data('index');
        hitungSubtotal(index);
    });

    function hitungSubtotal(index) {
        let harga = parseFloat($(`.harga-input[data-index="${index}"]`).val()) || 0;
        let jumlah = parseFloat($(`.jumlah-input[data-index="${index}"]`).val()) || 0;
        let subtotal = harga * jumlah;
        $(`.subtotal-display[data-index="${index}"]`).val(formatRupiah(subtotal));
        hitungTotal();
    }

    function hitungTotal() {
        let total = 0;
        $('.harga-input').each(function() {
            let index = $(this).data('index');
            let harga = parseFloat($(this).val()) || 0;
            let jumlah = parseFloat($(`.jumlah-input[data-index="${index}"]`).val()) || 0;
            total += (harga * jumlah);
        });
        $('#total-keseluruhan').text('Rp ' + formatRupiah(total));
    }

    function formatRupiah(angka) {
        return angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    $("#form-edit").validate({
        rules: {
            penjualan_kode: { required: true, maxlength: 20 },
            penjualan_tanggal: { required: true },
            pembeli: { required: true, maxlength: 50 },
            user_id: { required: true }
        },
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
                        $('.error-text').text('');
                        $.each(response.msgField, function(prefix, val) {
                            $('#error-' + prefix).text(val[0]);
                        });
                        Swal.fire({
                            icon: 'error',
                            title: 'Terjadi Kesalahan',
                            text: response.message
                        });
                    }
                }
            });
            return false;
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
</script>
