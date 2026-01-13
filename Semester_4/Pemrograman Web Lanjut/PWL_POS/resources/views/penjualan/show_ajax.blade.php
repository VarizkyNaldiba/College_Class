<div id="modal-master" class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header bg-info">
            <h5 class="modal-title">Detail Transaksi Penjualan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                
            </button>
        </div>
        <div class="modal-body">
            @if($penjualan)
                <!-- Info Transaksi -->
                <div class="card mb-3">
                    <div class="card-header bg-light">
                        <h6 class="mb-0"><i class="fas fa-file-invoice"></i> Informasi Transaksi</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-borderless">
                            <tr>
                                <th width="180px">Kode Penjualan</th>
                                <td>: {{ $penjualan->penjualan_kode }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Transaksi</th>
                                <td>: {{ date('d-m-Y H:i', strtotime($penjualan->penjualan_tanggal)) }}</td>
                            </tr>
                            <tr>
                                <th>Nama Pembeli</th>
                                <td>: {{ $penjualan->pembeli }}</td>
                            </tr>
                            <tr>
                                <th>User/Kasir</th>
                                <td>: {{ $penjualan->user->username ?? '-' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <!-- Detail Barang -->
                <div class="card">
                    <div class="card-header bg-light">
                        <h6 class="mb-0"><i class="fas fa-shopping-cart"></i> Detail Barang</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead class="bg-light">
                                    <tr>
                                        <th width="50px" class="text-center">No</th>
                                        <th>Nama Barang</th>
                                        <th width="150px" class="text-right">Harga</th>
                                        <th width="100px" class="text-center">Jumlah</th>
                                        <th width="150px" class="text-right">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $total = 0; @endphp
                                    @foreach($penjualan->penjualanDetail as $index => $detail)
                                        @php 
                                            $subtotal = $detail->harga * $detail->jumlah;
                                            $total += $subtotal;
                                        @endphp
                                        <tr>
                                            <td class="text-center">{{ $index + 1 }}</td>
                                            <td>{{ $detail->barang->barang_nama ?? '-' }}</td>
                                            <td class="text-right">Rp {{ number_format($detail->harga, 0, ',', '.') }}</td>
                                            <td class="text-center">{{ $detail->jumlah }}</td>
                                            <td class="text-right">Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="bg-light">
                                    <tr>
                                        <th colspan="4" class="text-right">TOTAL:</th>
                                        <th class="text-right text-success">Rp {{ number_format($total, 0, ',', '.') }}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            @else
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-triangle"></i> Data tidak ditemukan
                </div>
            @endif
        </div>
        <div class="modal-footer">
            <button type="button" data-bs-dismiss="modal" class="btn btn-secondary">Tutup</button>
        </div>
    </div>
</div>
